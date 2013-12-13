<?php

	include_once 'library/exception/NoExecuteException.php';
	include_once 'library/exception/NoConnectionException.php';

	class Persistence
	{
		private $pdoConnection;
		private $stmt;
		private $indexList;
		protected $sql;


		public function Persistence()
		{
			try{
				$this->pdoConnection = new PDO(
									'mysql:dbname=form_test;host=localhost;charset=utf8'
									,'root'
									,'');	
			}catch(PDOException $error){
				throw new NoConnectionException('Problemas na conexão');
			}
			
		}
	

		public function prepare()
		{

			try{
				$this->setStmt($this->pdoConnection->prepare($this->sql));
				$this->indexList = 0;
			}catch (PDOException $error)
			{
				echo $error->getMessage();
			}
		}


		public function setParam($dataBind)
		{
			$this->getStmt()->bindParam(++$this->indexList,$dataBind);
		}

		public function execute()
		{
			try
			{
				return $this->getStmt()->execute();
					
			}catch (PDOStatement $error)
			{
				throw new NoExecuteException('Error: Falha na execução do serviço');
				return false;
			}
		}

		public function executeLastId()
		{
			try
			{
				$this->getStmt()->execute();
				return $this->pdoConnection->lastInsertId();
			}catch(PDOException $error)
			{
				throw new NoExecuteException('Error: Falha na execução do serviço');
			}
		}


		public function fetchObject($objectName)
		{
			try {
				$this->getStmt()->execute();
				$result = $this->getStmt()->fetchObject($objectName);
				$this->getStmt()->closeCursor();
				return $result;

			}catch (PDOException $error){
				throw  new NoConnectionException();
			}

			return false;
		}

		public function fetchAllObject($objectName)
		{
			try
			{
				$this->getStmt()->execute();
				$result = $this->getStmt()->fetchAll(PDO::FETCH_CLASS,$objectName);
				$this->getStmt()->closeCursor();
				return $result;
					
			}catch (PDOException $error){
				throw new NoConnectionException();
			}

			return false;
		}



		public function getStmt()
		{
			return $this->stmt;
		}

		public function setStmt($stmt)
		{
			$this->stmt = $stmt;
		}
}
?>