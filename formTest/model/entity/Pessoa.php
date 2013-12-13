<?php

class Pessoa
{	
	private $id;
	private $nome;
	private $cpf;
	private $rg;
	private $endereco;
	private $email;
	private $telefone;
	private $celular;
	private $cep;
	private $cnpj;
	private $complemento;
	private $informacao;
	private $outros;
	private $telefone_comercial;
	private $observacao;


	public function getId()
	{
		return $this->id;
	}
	public function getNome()
	{
		return $this->nome;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function getRg()
	{
		return $this->rg;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function getCelular()
	{
		return $this->celular;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function getCnpj()
	{
		return $this->cnpj;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function getInformacao()
	{
		return $this->informacao;
	}

	public function getOutros()
	{
		return $this->outros;
	}

	public function getTelefone_comercial()
	{
		return $this->telefone_comercial;
	}

	public function getObservacao()
	{
		return $this->observacao;
	}


	
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function setRg($rg)
	{
		$this->rg = $rg;
	}

	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setTelefone($telefone)
	{
		$this->telefone  = $telefone;
	}

	public function setCelular($celular)
	{
		$this->celular = $celular;
	}

	public function setCep($cep)
	{
		$this->cep = $cep;
	}

	public function setCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}

	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}

	public function setInformacao($informacao)
	{
		$this->informacao = $informacao;
	}

	public function setOutros($outros)
	{
		$this->outros = $outros;
	}

	public function setTelefone_comercial($telefone_comercial)
	{
		$this->telefone_comercial = $telefone_comercial;
	}

	public function setObservacao($observacao)
	{
		$this->observacao = $observacao;
	}

}

?>