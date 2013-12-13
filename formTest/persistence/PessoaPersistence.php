<?php
	include_once 'Persistence.php';
	include_once 'model/entity/Pessoa.php';

	class PessoaPersistence extends Persistence 
	{	
		public function persist(Pessoa $pessoa){

			$this->sql = 'INSERT INTO pessoa (nome,cpf,rg,endereco,email
								,telefone,celular,cep,cnpj,complemento,informacao
								,outros,telefone_comercial,observacao) 
								VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
				$this->prepare();
				//passagem de parametros
				$this->setParam($pessoa->getNome());
				$this->setParam($pessoa->getCpf());
				$this->setParam($pessoa->getRg());
				$this->setParam($pessoa->getEndereco());
				$this->setParam($pessoa->getEmail());
				$this->setParam($pessoa->getTelefone());
				$this->setParam($pessoa->getCelular());
				$this->setParam($pessoa->getCep());
				$this->setParam($pessoa->getCnpj());
				$this->setParam($pessoa->getComplemento());
				$this->setParam($pessoa->getInformacao());
				$this->setParam($pessoa->getOutros());
				$this->setParam($pessoa->getTelefone_comercial());
				$this->setParam($pessoa->getObservacao());

			return 	$this->executeLastId();
		}

		public function selectWithCpfAndEmail(Pessoa $pessoa)
		{
			$this->sql = 'SELECT * FROM pessoa WHERE cpf = ? AND email = ?';
			$this->prepare();

			$this->setParam($pessoa->getCpf());
			$this->setParam($pessoa->getEmail());

			return $this->fetchObject('Pessoa');

		}

		public function selectWithId($idPessoa)
		{
			$this->sql = 'SELECT * FROM pessoa WHERE id = ?';
			$this->prepare();

			$this->setParam($idPessoa);

			return $this->fetchObject('Pessoa');
		}


		//TODO passagem de params duplicada (REFACTORY);
		public function update(Pessoa $pessoa)
		{
			$this->sql = 'UPDATE pessoa set nome = ?, cpf = ? , rg = ? , endereco = ?,
									email = ? , telefone = ?, celular = ?, cep = ? , cnpj = ?, 
									complemento = ?, informacao = ?, outros = ?, telefone_comercial = ?,
									observacao = ? WHERE id = ?';

			$this->prepare();
				$this->setParam($pessoa->getNome());
				$this->setParam($pessoa->getCpf());
				$this->setParam($pessoa->getRg());
				$this->setParam($pessoa->getEndereco());
				$this->setParam($pessoa->getEmail());
				$this->setParam($pessoa->getTelefone());
				$this->setParam($pessoa->getCelular());
				$this->setParam($pessoa->getCep());
				$this->setParam($pessoa->getCnpj());
				$this->setParam($pessoa->getComplemento());
				$this->setParam($pessoa->getInformacao());
				$this->setParam($pessoa->getOutros());
				$this->setParam($pessoa->getTelefone_comercial());
				$this->setParam($pessoa->getObservacao());
				$this->setParam($pessoa->getId());

			return $this->execute();
		}
	}