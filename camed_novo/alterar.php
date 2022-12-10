<?php
//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//Chamando o arquivo da classe
include_once 'usuario.php';
//se existir o "Enviar" , é porque clicaram no botão
if(isset($_POST['Enviar'])):
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$senha=filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
	$nascimento=filter_var($_POST['data']);
	$sobrenome=filter_var($_POST['sobrenome'], FILTER_SANITIZE_STRING);
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$idUsuario =filter_var($_POST['idUsuario'], FILTER_SANITIZE_NUMBER_INT); 
	
	
	$usuario = new Usuario();
	$usuario->setNome($nome);
	$usuario->setSenha($senha);
	$usuario->setNascimento($nascimento);
	$usuario->setSobrenome($sobrenome);
	$usuario->setEmail($email);
	
	if($usuario->update($idUsuario)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../home.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../gerenciamentodeconta.php');
	endif;
endif;
?>
