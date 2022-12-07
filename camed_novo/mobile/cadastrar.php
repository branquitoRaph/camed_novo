<?php
require_once('conexao.php');
// array de resposta
$resposta = array();
// verifica se todos os campos necessários foram enviados ao servidor
if (isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['nascimento']) && isset($_POST['email']) && isset($_POST['senha'])) {
	// o método trim elimina caracteres especiais/ocultos da string
	$nome = trim($_POST['nome']);
	$sobrenome = trim($_POST['sobrenome']);
	$nascimento = trim($_POST['nascimento'];
	$email = trim($_POST['email'];
	$senha = trim($_POST['senha'];
	// o bd não armazena diretamente a senha do usuário, mas sim 
	// um código hash que é gerado a partir da senha.
	$cripto = password_hash($senha, PASSWORD_DEFAULT);
	// antes de registrar o novo usuário, verificamos se ele já
	// não existe.
	$existe = db_con->prepare("SELECT emailUsuario FROM USUARIO WHERE emailUsuario='$email'");
	$existe->execute();
	if ($existe->rowCount() > 0) { 
		// se já existe um usuario para login
		// indicamos que a operação não teve sucesso e o motivo
		// no campo de erro.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Usuário já cadastrado!";
	}
	else {
		// se o usuário ainda não existe, inserimos ele no bd.
		$insere = db_con->prepare("INSERT INTO USUARIO(nomeUsuario, senha, dataNascimento, sobrenomeUsuario, emailUsuario) VALUES('$nome', '$cripto', '$nascimento', '$sobrenome', '$email')");
	 
		if ($insere->execute()) {
			// se a consulta deu certo, indicamos sucesso na operação.
			$resposta["sucesso"] = 1;
		}
		else {
			// se houve erro na consulta, indicamos que não houve sucesso
			// na operação e o motivo no campo de erro.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "erro BD: " . $insere->error;
		}
	}
}
else {
	// se não foram enviados todos os parâmetros para o servidor, 
	// indicamos que não houve sucesso
	// na operação e o motivo no campo de erro.
	$resposta["sucesso"] = 0;
	$resposta["erro"] = "faltam parametros";
}
// A conexão com o bd sempre tem que ser fechada
$db_con = null;
// converte o array de resposta em uma string no formato JSON e 
// imprime na tela.
echo json_encode($resposta);
?>
