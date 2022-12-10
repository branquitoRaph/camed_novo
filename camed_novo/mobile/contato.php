<?php
require_once('conexao.php');
// array de resposta
$resposta = array();
// verifica se todos os campos necessários foram enviados ao servidor
if (isset($_POST['descriCategoria']) && isset($_POST['descriMensagem'])) {
	// o método trim elimina caracteres especiais/ocultos da string
	$descriCategoria = trim($_POST['descriCategoria']);
	$descriMensagem = trim($_POST['descriMensagem']);
	// se o usuário ainda não existe, inserimos ele no bd.
	$insere = $db_con->prepare("INSERT INTO camed.MENSAGEM(descriMensagem, descriCategoria) VALUES('$descriMensagem', '$descriCategoria')");
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

