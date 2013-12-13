<?php
	include_once 'library/Request.php';
	include_once 'library/UploadFile.php';
	include_once 'library/Validator.php';
	include_once 'model/action/ActionPessoa.php';
	include_once 'model/action/ActionArquivo.php';

	class ControllerPessoa
	{
		private $actionPessoa;

		public function getAction()
		{
			if($this->actionPessoa)
				return $this->actionPessoa;
			return $this->actionPessoa = new ActionPessoa;
		}

		public function savePessoa(Request $request)
		{	
			if($request->isElement('cadastrar'))
				$this->savePessoaWithItensRequired($request);

			if($request->isElement('cadastrarDepois'))
				$this->savePessoaWithCpfAndEmail($request);

		}

		public function savePessoaWithCpfAndEmail(Request $request)
		{
			$validator = new Validator();
			$validator->setElementCondition($request->getKey('email'),'Login','required;');
			$validator->setElementCondition($request->getKey('cpf'),'Cpf','required;cpf;');

			if($validator->isValid())
			{
				try{
					$this->getAction()->save($request);
					$this->messageScriptAlert('Cadastro realizaso com sucesso!');
					$this->redirect('index.php');
				}catch(OperationException $error){
						echo $error->getMessge();
				}
				

			}else $this->showErros();
		}

		public function savePessoaWithItensRequired(Request $request)
		{
			$validator = $this->validateToSave($request);
			
				if($validator->isValid())
				{
					try{
											
						$this->getAction()->save($request);	
						$this->messageScriptAlert('Cadastro realizaso com sucesso!');
						$this->redirect('index.php');
					}catch(OperationException $error){
						echo $error->getMessge();
					}
				}else $validator->showErros();
		}
		


		public function authenticate(Request $request)
		{
			if($request->isElement('acesso'))
			{
				$validator  = new Validator;
				$validator->setElementCondition($request->getKey('email'),'Login','required;');
				$validator->setElementCondition($request->getKey('cpf'),'Cpf','required;cpf;');

				if($validator->isValid())
				{
					try{
						$response = $this->getAction()->access($request);
						if($response){
							$this->messageScriptAlert('Acesso realizado. Redirecionando...');
							$this->redirect('editar.php');
						}
							
						echo 'Usuario invalido';
						

					}catch(NotFoundException $error)
					{
						echo 'doSomething '. $error->getMessage();
					}
					

				}else $validator->showErros();
			}
		}

		public function desconnect()
		{	
			session_start();
			session_destroy();
			$this->messageScriptAlert('At&eacute; depois =) !');
			$this->redirect('index.php');
		}

	
		private function validateToSave(Request $request)
		{
			$validator  =  new Validator();
				
				$validator->setElementCondition($request->getKey('nome'),'Nome','required;');
				$validator->setElementCondition($request->getKey('rg'),'Rg','required;rg;');
				$validator->setElementCondition($request->getKey('cpf'),'Cpf','required;cpf;');
				$validator->setElementCondition($request->getKey('cnpj'),'Cnpj','required;cnpj;');
				$validator->setElementCondition($request->getKey('cep'),'Cep','required;cep;');
				$validator->setElementCondition($request->getKey('endereco'),'Endere&ccedil;o','required;');
				$validator->setElementCondition($request->getKey('informacao'),'Informa&ccedil;&otilde;es','required;');
				$validator->setElementCondition($request->getKey('telefone'),'Telefone','required;cellphone;');

			return $validator;
		}

		public function edit(Request $request)
		{
			if($request->isElement('cadastrar'))
			{
				$validator = $this->validateToSave($request);

				if($validator->isValid())
				{
					try{

						session_start();
							$request->set('id',$_SESSION['idUsuario']);
						session_write_close();
						
						$this->getAction()->atualizar($request);
						$this->messageScriptAlert('Operacao realizada com sucesso!');
						$this->redirect('index.php');

					}catch(NoExecuteException $error)
					{
						echo $error;
					}

				}else echo $validator->showErrors();

			}
		}

		public function showById()
		{
			try
			{
				return $this->getAction()->getPessoa();	

			}catch(NotFoundException $error)
			{
				echo $error;
			}
			
		}

		private function redirect($page)
		{
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0;URL='.$page.'">';
			die;
		}

		private function messageScriptAlert($message)
		{
			echo '<script>alert("'.$message.'");</script>';
		}


	

	}
?>