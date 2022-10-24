<?php
//Classe de cliente
include_once 'usuario.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['Enviar'])):
	
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
	$nome = mysqli_escape_string($conexao,$_POST['nome'],);
	$senha = md5(mysqli_escape_string($conexao,$_POST['senha'])); //Senha criptografada com o MD5
	$data = mysqli_escape_string($conexao,$_POST['data']);
	$sobrenome = mysqli_escape_string($conexao,$_POST['sobrenome']);
	$email = mysqli_escape_string($conexao,$_POST['email']);
	//Sanitizando os campos de nome e sobrenome
	$nomeSanitize = filter_var($nome, FILTER_SANITIZE_STRING);
	$sobrenomeSanitize = filter_var($sobrenome, FILTER_SANITIZE_STRING);
	//Validando o campo de e-mail
	$emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);

	$usuario = new Usuario();
	$usuario->setNome($nomeSanitize);
	$usuario->setSenha($senha);
	$usuario->setNascimento($data);
	$usuario->setSobrenome($sobrenomeSanitize);
	$usuario->setEmail($emailValidate);
	
	if($usuario->insert()):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: login.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location: cadastro.php');
	endif;
endif;

?>
