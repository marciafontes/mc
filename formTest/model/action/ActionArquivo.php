<?php 
	
	include_once 'model/entity/Arquivo.php';
	include_once 'persistence/ArquivoPersistence.php';

	class ActionArquivo
	{
		private $persistenceConnection;
		
		public function getPersistence()
		{
			if(!$this->persistenceConnection)
				return $this->persistenceConnection = new ArquivoPersistence();

			return $this->persistenceConnection;
		}

		public function save(Request $request)
		{		
			try
			{
				$arquivo = $request->buildObject(new Arquivo);
				$this->getPersistence()->persist($arquivo);	

			}catch(NoExecuteException $error)
			{
				throw new OperationException("Falha ao salvar o arquivo");
			}
		}

		public function get(Request $request)
		{
			try
			{
				$arquivo = $request->buildObject(new Arquivo);
				return $this->getPersistence()->selectAll($arquivo);

			}catch(NoConnectionException $error)
			{
				throw new NotFoundException('Nenhum resultado encontrado');
			}
			
		}

		public function remove(Request $request)
		{
			try{
				$request->releaseKey('target','id');
				
				session_start();
				 $request->set('idPessoa',$_SESSION['idUsuario']);
				session_write_close();

				$arquivo = $request->buildObject(new Arquivo);


				$this->getPersistence()->deleFromIdAndIdPessoa($arquivo);

			}catch(NoExecuteException $error)
			{
				throw new OperationException('Falha ao remover arquivo');
				
			}

		}
	}


?>