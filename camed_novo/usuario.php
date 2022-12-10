<?php

require_once 'conexao.php';
require_once 'crud.php';
include_once 'database.php';

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
	
	private $idUsuario;
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
	
	public function update($idUsuario){
		$sql="UPDATE $this->table SET nomeUsuario = :nome, senha = :senha, dataNascimento = :nascimento , sobrenomeUsuario = :sobrenome, emailUsuario = :email WHERE idUsuario = :idUsuario ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nomeUsuario);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':nascimento', $this->dataNascimento);
		$stmt->bindParam(':sobrenome', $this->sobrenomeUsuario);
		$stmt->bindParam(':email', $this->emailUsuario);
		$stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
		return $stmt->execute();
	}
	/*
	public function excluir($idUsuario){
		$sql2="SELECT * FROM livro_pessoa_avalia WHERE fk_pessoa_codigo_pessoa = :id";
		$stmt2 = Database::prepare($sql2);	
		$stmt2->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt2->execute();
		$dados = $stmt2->fetch();

		$sql3="SELECT * FROM livro_pessoa_loca WHERE fk_pessoa_codigo_pessoa = :id";
		$stmt3 = Database::prepare($sql3);	
		$stmt3->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt3->execute();
		$dados1 = $stmt3->fetch();
		if($dados1['fk_pessoa_codigo_pessoa']){
			$sql4="DELETE FROM livro_pessoa_loca WHERE fk_pessoa_codigo_pessoa = :id";
			$stmt4 = Database::prepare($sql4);	
			$stmt4->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt4->execute();
		}

		if($dados['fk_pessoa_codigo_pessoa']){
			$sql1="DELETE FROM livro_pessoa_avalia WHERE fk_pessoa_codigo_pessoa = :id";
			$stmt1 = Database::prepare($sql1);	
			$stmt1->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt1->execute();
		}

		$sql="DELETE FROM pessoa WHERE codigo_pessoa = :id";
		$stmt = Database::prepare($sql);	
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
		}
	*/
}

?>
