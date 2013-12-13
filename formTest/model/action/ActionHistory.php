<?php 

	include_once 'model/entity/History.php';
	include_once 'persistence/HistoryPersistence.php';


	class ActionHistory
	{
		private $persistenceConnection;

		public function getPersistence()
		{
			if(!$this->persistenceConnection)
				return $this->persistenceConnection = new HistoryPersistence();
			return  $this->persistenceConnection;			 
		}

		public function save(Request $request)
		{
			try{
				$history = $request->buildObject(new History);
				$this->getPersistence()->persist($history);

			}catch(NoExecuteException $error)
			{
				throw new OperationException("Falha ao gerar historico");
			}
			
		}
	}	
?>