<?php
//Chamando o arquivo de conexão
require_once 'conexao.php';
//Inicia a sessão
session_start();
//se existir o "Enviar" , é porque clicaram no botão

if(isset($_POST['Enviar'])):
	
	
	
	if(session_status()=== PHP_SESSION_NONE){
			session_start();
	}
	//Condição para pegar o nome do usuário e guardar em uma variável
	if($_SESSION['logado'] == true){
		//Puxa o id com a session da página de login
		$id = (int) $_SESSION['id'];
		
	}
	
	
		
	$sql="DELETE FROM usuario WHERE idUsuario=$id";
	
	echo $sql;
	
	
	if(mysqli_query($conexao,$sql)):
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: ../rootTrab/login.php');
	else:
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: ../rootTrab/login.php');
	endif;
	
endif;		
?>
<!-- Chamando o cabeçalho da página-->
<?php include_once 'header.php';?>
	<!-- Título em tamanho h1-->
	<h1>Excluir conta</h1><br>
<?php
	//Condição de checamento de dados
	if(!empty($erros)):
		//Loop de erro
		foreach($erros as $erro):
			//Imprime erro
			echo $erro;
		//Fecha o loop
		endforeach;
	//Fecha o if
	endif;
?>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type = "submit" name = "Enviar" value = "Confirmar">
		<!-- Parágrafo para fazer cadastro, caso não tenha login -->
		<p>Deseja voltar ao login? <a href="login.php">Clique aqui</a></p>
	</form>
<!-- Chamando o rodapé-->
<?php include_once 'footer.php';?>
