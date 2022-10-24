<?php

require_once 'crud.php';

/**
Objetivo: Classe responsável por representar todas as operações com o usuario


Atributos:
$nome- nome do usuario
$sobrenome - sobrenome do usuario
$email - email do usuario
$nascimento - data de nascimento do usuario
$senha - senha do usuario
$idUsuario - identificador

Métodos:
insert - insere um cliente na tabela usuario

**/

class Usuario extends CRUD{
	
	protected $table ='usuario';
	
	private $idUsuario
	private $nome;
	private $senha;
	private $nascimento;
	private $sobrenome;
	private $email;
	
	//Função para setar e pegar o id
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	//Função para setar e pegar o nome
	public function setNome($nome){
		$this->nomeUsuario = $nome;
	}
	public function getNome(){
		return $this->nomeUsuario;
	}
	//Função para setar e pegar a senha
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}
	//Função para setar e pegar a data de nsacimento
	public function setNascimento($nascimento){
		$this->dataNascimento = $nascimento;
	}
	public function getNascimento(){
		return $this->dataNascimento;
	}
	//Função para setar e pegar o sobrenome
	public function setSobrenome($sobrenome){
		$this->sobrenomeUsuario = $sobrenome;
	}
	public function getSobrenome(){
		return $this->sobrenomeUsuario;
	}
	//Função para setar e pegar o email
	public function setEmail($email){
		$this->emailUsuario = $email;
	}
	public function getEmail($email){
			return $this->emailUsuario;
	}
	
	public function insert(){
		$sql="INSERT INTO $this->table (nomeUsuario, senha, dataNascimento, sobrenomeUsuario, emailUsuario) VALUES (:nome,:senha,:nascimento,:sobrenome,:email);";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nomeUsuario);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':nascimento', $this->dataNascimento);
		$stmt->bindParam(':sobrenome', $this->sobrenomeUsuario);
		$stmt->bindParam(':email', $this->emailUsuario);
		return $stmt->execute();
		
	}
	
	public function logar(){
		$sql = "SELECT idUsuario, emailUsuario FROM $this->table WHERE emailUsuario = :email and senha = :senha";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(":idUsuario", $this->idUsuario);
		$stmt->bindParam(":email", $this->emailUsuario);
		$stmt->bindParam(":senha", $this->senha);
		$stmt->execute();

		return $stmt->fetch();
	}
}

?>
