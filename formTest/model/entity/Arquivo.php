<?php 
	
	class Arquivo
	{

		private $id;
		private $idPessoa;
		private $nome;
		private $extensao;


		public function setId($id)
		{
			$this->id = $id;
		}

		public function setIdPessoa($idPessoa)
		{
			$this->idPessoa = $idPessoa;
		}

		public function setNome($nome)
		{
			$this->nome = $nome; 
		}

		public function setExtensao($extensao)
		{
			$this->extensao = $extensao;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getIdPessoa()
		{
			return $this->idPessoa;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function getExtensao()
		{
			return $this->extensao;
		}


	}
?>
