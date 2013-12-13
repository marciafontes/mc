<?php
	include_once 'ControllerPessoa.php';
	class ControllerArquivo 
	{
		private $actionPessoa;

		public function getAction()
		{
			if($this->actionPessoa)
				return $this->actionPessoa;
			return $this->actionPessoa = new ActionArquivo;
		}

		public function showLinkToFiles()
		{
			try
			{
				session_start();
					$idPessoa = $_SESSION['idUsuario'];
				session_write_close();
				$request  = new Request();
				$request->set('idPessoa',$idPessoa);

				$arquivos = $this->getAction()->get($request);	

				echo 'Aquivos adicionados por este usuario:<br><br>';
				foreach ($arquivos as $arquivo) {
						echo '<a  target="_blanck" href="upload/'.$arquivo->getNome().'.'.$arquivo->getExtensao().'">'.$arquivo->getNome().'</a>';
						echo '<a href="?remove=remove&target='.$arquivo->getId().'"> |remover </a><br>';
				}
				echo '<br><br>';
			}catch(NotFoundException $error)
			{
				echo $error;
			}
		}

		public function deleteFile(Request $request)
		{
			if($request->isElement('remove'))
			{
				try{
					$this->getAction()->remove($request);
					echo 'Exclusão realizada com sucesso';

					$controllerPessoa = new ControllerPessoa();
					$controllerPessoa->redirect('editar.php');
				}catch(OperationException $error)
				{
					echo 'Inf::'.$error->getMessage();
				}
			}
		}
	}
 ?>