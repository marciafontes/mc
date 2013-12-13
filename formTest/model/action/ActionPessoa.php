<?php 

include_once 'model/entity/Pessoa.php';
include_once 'model/entity/User.php';
include_once 'persistence/PessoaPersistence.php';
include_once 'library/exception/OperationException.php';
include_once 'library/exception/NotFoundException.php';
include_once 'model/action/ActionHistory.php';
include_once 'library/UploadFile.php';
include_once 'model/action/ActionArquivo.php';

class ActionPessoa
{
	private $persistenceConnection;
	
	public function getPersistence()
	{
		if(!$this->persistenceConnection)
			return $this->persistenceConnection = new PessoaPersistence();
		return  $this->persistenceConnection;			 
	}	

	public function save(Request $request)
	{
		try{
			$pessoa = $request->buildObject(new Pessoa);
				$idSaved = $this->getPersistence()->persist($pessoa);
				$data  = date('y-m-d h:m:s');
				$request->set('data',$data);
				$request->set('idPessoa',$idSaved);
			$actionHistory = new ActionHistory();
			$actionHistory->save($request);
					
			$uploadFile = new UploadFile();
			$request->update('nome',$uploadFile->getName());
			$request->set('extensao',$uploadFile->getExtension());
			$actionArquivo = new ActionArquivo();
			$actionArquivo->save($request);		

		}catch(NoExecuteException $error){
			throw new OperationException('Falha ao salvar estas informações');
		}
	}

	public function getPessoa()
	{
		//TODO poderia ter um hash
		//TODO poderia ter upSession
		try
		{
			session_start();
				$idPessoa = $_SESSION['idUsuario'];
			session_write_close();
			return $this->getPersistence()->selectWithId($idPessoa);
		}catch(NoConnectionException $error){
			throw new NotFoundException("Falha ao acessas as informa&ccedil;&otilde;o");
			
		}
		
	}

	public function access(Request $request)
	{	
		try
		{
			$user = $request->buildObject(new Pessoa);
			$userResponse =  $this->getPersistence()->selectWithCpfAndEmail($user);
			if($userResponse){
				$this->setPropertiesAuthenticated($userResponse);
				return true;
			}else return false;  
		 	
		}catch(NotFoundException $error)
		{
			throw new  NotFoundException('Cadastro não encontrado');
		}
		
	}

	public function atualizar(Request $request)
	{
		try{
			$pessoa = $request->buildObject(new Pessoa);

			$this->getPersistence()->update($pessoa);
			$uploadFile = new UploadFile();
			$request->update('nome',$uploadFile->getName());
			$request->releaseKey('id','idPessoa');
			$request->set('extensao',$uploadFile->getExtension());
			$actionArquivo = new ActionArquivo();
			$actionArquivo->save($request);
	
		}catch(NoExecuteException $error){
			throw new NoExecuteException("Falha ao atualizar");
			
		}
	}

	private function setPropertiesAuthenticated($user)
	{
		session_start();
			$_SESSION['idUsuario'] = $user->getId();
		session_write_close();
	}	
}

?>