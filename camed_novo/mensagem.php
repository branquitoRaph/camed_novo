<?php

require_once 'crud.php';

/**
Objetivo: Classe responsável por representar todas as operações na entidade mensagem


Atributos:
idMensagem
descriMensagem
descriCategoria
emailContato

Métodos:
insert - insere um endereco na tabela mensagem

**/

class Mensagem extends CRUD{
	
	protected $table = 'mensagem';
	
	private $idMensagem;
	private $descriMensagem;
	private $descriCategoria;
	private $emailContato;
	
	//Função para setar e pegar o id
	public function setIdMensagem($idMensagem){
		$this->idMensagem = $idMensagem;
	}
	public function getIdMensagem(){
		return $this->idMensagem;
	}
	
	//Função para setar e pegar a mensagem
	public function setMensagem($descriMensagem){
		$this->descriMensagem = $descriMensagem;
	}
	public function getMensagem(){
		return $this->descriMensagem;
	}
	
	//Função para setar e pegar a categoria da mensagem
	public function setCategoria($descriCategoria){
		$this->descriCategoria = $descriCategoria;
	}
	public function getCategoria(){
		return $this->descriCategoria;
	}
	
	//Função para setar e pegar o email do contato
	public function setEmailContato($emailContato){
		$this->emailContato = $emailContato;
	}
	public function getEmailContato(){
		return $this->emailContato;
	}

	public function insert(){
		$sql="INSERT INTO $this->table (descriMensagem, descriCategoria, emailContato) VALUES (:descriMensagem, :descriCategoria, :emailContato);";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':descriMensagem', $this->descriMensagem);
		$stmt->bindParam(':descriCategoria', $this->descriCategoria);
		$stmt->bindParam(':emailContato', $this->emailContato);
		return $stmt->execute();
	}
}

?>


