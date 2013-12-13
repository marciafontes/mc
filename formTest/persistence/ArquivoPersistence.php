<?php 

	class ArquivoPersistence extends Persistence
	{
		public function persist(Arquivo $arquivo)
		{
			$this->sql = 'INSERT INTO arquivo (idPessoa,nome,extensao) 
							VALUES (?,?,?)';

			$this->prepare();

			$this->setParam($arquivo->getIdPessoa());
			$this->setParam($arquivo->getNome());
			$this->setParam($arquivo->getExtensao());

			return $this->execute();
		}


		public function selectAll(Arquivo $arquivo)
		{
			$this->sql = 'SELECT * FROM arquivo WHERE idPessoa = ?';

			$this->prepare();
			$this->setParam($arquivo->getIdPessoa());

			return $this->fetchAllObject('Arquivo');
		}

		public function deleFromIdAndIdPessoa(Arquivo $arquivo)
		{
			$this->sql = 'DELETE FROM arquivo WHERE id = ? and idPessoa = ?';
			$this->prepare();

			$this->setParam($arquivo->getId());
			$this->setParam($arquivo->getIdPessoa());

			return $this->execute();
		}
	}
?>