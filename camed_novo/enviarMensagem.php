<?php
//Classe de cliente
include_once 'mensagem.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['Enviar'])):
	
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
	$descriMensagem = mysqli_escape_string($conexao,$_POST['msg'],);
	$descriCategoria = mysqli_escape_string($conexao,$_POST['assunto']);
	$emailContato = mysqli_escape_string($conexao,$_POST['emailContato']);
	//Sanitizando os campos
	$descriMensagemSanitize = filter_var($descriMensagem, FILTER_SANITIZE_STRING);
	$descriCategoriaSanitize = filter_var($descriCategoria, FILTER_SANITIZE_STRING);
	$emailContatoValidate = filter_var($emailContato, FILTER_VALIDATE_EMAIL);

	$mensagem = new Mensagem();
	$mensagem->setMensagem($descriMensagemSanitize);
	$mensagem->setCategoria($descriCategoriaSanitize);
	$mensagem->setEmailContato($emailContatoValidate);
	
	if($mensagem->insert()):
		$_SESSION['mensagem'] = "Mensagem enviada com sucesso!";
	else:
		$_SESSION['mensagem'] = "Erro no envio da mensagem!";
	endif;
endif;

?>

