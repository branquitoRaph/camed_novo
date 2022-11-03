<?php
//Classe de cliente
include_once 'endereco.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['Enviar'])):
	
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
	$cep = mysqli_escape_string($conexao,$_POST['cep'],);
	$descriLogradouro = mysqli_escape_string($conexao,$_POST['logradouro']);
	$numero = mysqli_escape_string($conexao,$_POST['numero']);
	$complemento = mysqli_escape_string($conexao,$_POST['complemento']);
	$bairro = mysqli_escape_string($conexao,$_POST['bairro']);
	$municipio = mysqli_escape_string($conexao,$_POST['cidade']);
	$estado = mysqli_escape_string($conexao,$_POST['estado']);
	//Sanitizando os campos
	$descriLogradouroSanitize = filter_var($descriLogradouro, FILTER_SANITIZE_STRING);
	$complementoSanitize = filter_var($complemento, FILTER_SANITIZE_STRING);
	$bairroSanitize = filter_var($bairro, FILTER_SANITIZE_STRING);
	$municipioSanitize = filter_var($municipio, FILTER_SANITIZE_STRING);
	$estadoSanitize = filter_var($estado, FILTER_SANITIZE_STRING);

	$endereco = new Endereco();
	$endereco->setCep($cep);
	$endereco->setLogradouro($descriLogradouroSanitize);
	$endereco->setNumero($numero);
	$endereco->setComplemento($complementoSanitize);
	$endereco->setBairro($bairroSanitize);
	$endereco->setMunicipio($municipioSanitize);
	$endereco->setEstado($estadoSanitize);
	
	if($endereco->insert()):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: login.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location: cadastro.php');
	endif;
endif;

?>
