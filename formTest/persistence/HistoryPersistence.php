<?php 
	
	include_once 'Persistence.php';
	include_once 'model/entity/History.php';


	class HistoryPersistence extends Persistence
	{
		public function persist(History $history)
		{
			$this->sql = ' INSERT INTO history (idPessoa,data) VALUES (?,?)';
			$this->prepare();
			$this->setParam($history->getIdPessoa());
			$this->setParam($history->getData());

			return $this->execute();
		}
	}

?>