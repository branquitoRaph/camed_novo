<?php

require_once 'crud.php';

/**
Objetivo: Classe responsável por representar todas as operações com o endereco


Atributos:
	idEndereco 
	cep
	descriLogradouro
	numero
	complemento
	bairro
	municipio
	estado

Métodos:
insert - insere um endereco na tabela endereco

**/

class Endereco extends CRUD{
	
	protected $table = 'endereco';
	
	private $idEndereco;
	private $cep;
	private $descriLogradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $municipio;
	private $estado;
	
	//Função para setar e pegar o id
	public function setIdEndereco($idEndereco){
		$this->idEndereco = $idEndereco;
	}
	public function getIdEndereco(){
		return $this->idEndereco;
	}
	//Função para setar e pegar o CEP
	public function setCep($cep){
		$this->cep = $cep;
	}
	public function getCep(){
		return $this->cep;
	}
	//Função para setar e pegar o logradouro
	public function setLogradouro($descriLogradouro){
		$this->descriLogradouro = $descriLogradouro;
	}
	public function getLogradouro(){
		return $this->descriLogradouro;
	}
	//Função para setar e pegar o número
	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function getNumero(){
		return $this->numero;
	}
	//Função para setar e pegar o complemento
	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}
	public function getComplemento(){
		return $this->complemento;
	}
	//Função para setar e pegar o bairro
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	public function getBairro($bairro){
			return $this->bairro;
	}
	//Função para setar e pegar o municipio
	public function setMunicipio($municipio){
		$this->municipio = $municipio;
	}
	public function getMunicipio($municipio){
			return $this->municipio;
	}
	//Função para setar e pegar o estado
	public function setEstado($estado){
		$this->estado = $estado;
	}
	public function getEstado($estado){
			return $this->estado;
	}

	public function insert(){
		$sql="INSERT INTO $this->table (cep, descriLogradouro, numero, complemento, bairro, municipio, estado) VALUES (:cep, :descriLogradouro, :numero, :complemento, :bairro, :municipio, :estado);";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':descriLogradouro', $this->descriLogradouro);
		$stmt->bindParam(':numero', $this->numero);
		$stmt->bindParam(':complemento', $this->complemento);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':municipio', $this->municipio);
		$stmt->bindParam(':estado', $this->estado);
		return $stmt->execute();
	}
}

?>

