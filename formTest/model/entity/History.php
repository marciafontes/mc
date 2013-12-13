<?php

	class History
	{
		private $id;
		private $idPessoa;
		private $data;


		public function setId($id)
		{
			$this->id = $id;
		}

		public function setIdPessoa($idPessoa)
		{
			$this->idPessoa = $idPessoa;
		}

		public function setData($data)
		{
			$this->data = $data;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getIdPessoa()
		{
			return $this->idPessoa;
		}

		public function getData()
		{
			return $this->data;
		}
	}
	
?>