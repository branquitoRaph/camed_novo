<?php
//Chamando o arquivo de conexão
require_once 'conexao.php';
//Inicia a sessão
session_start();
//se existir o "Enviar" , é porque clicaram no botão
if(isset($_POST['Enviar'])):
	echo "entrou";
	$senha=md5(mysqli_escape_string($conexao,$_POST['senha']));
	if(session_status()=== PHP_SESSION_NONE){
			session_start();
	}
	//Condição para pegar o nome do usuário e guardar em uma variável
	if($_SESSION['logado'] == true){
		//Puxa o id com a session da página de login
		$id = (int) $_SESSION['id'];
	}
	//$senha=md5(mysqli_escape_string($conexao,$_POST['senha']));	
	$sql="UPDATE usuario SET senhaUsuario ='$senha' WHERE idUsuario=$id";
	if(mysqli_query($conexao,$sql)):
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: ../rootTrab/login.php');
	else:
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: ../rootTrab/login.php');
	endif;
endif;		
?>
<!-- Chamando o cabeçalho da página -->
<?php include_once 'header.php';?>
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
	<!-- Abrindo um formulário para alterar dados-->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<!-- Texto que aparece-->
		<label for = "pwd">Nova Senha:</label>
		<!-- Campo de digitação-->
		<input type = "password" id = "pwd" name = "senha" minlength = "8" placeholder = "Nova Senha" <br><br><br>
		<!-- Campo de enviar-->
		<input type = "submit" name = "Enviar" value = "Confirmar">
	<!-- Fechando o formulário-->
	</form>
	<!-- Quebra de linha -->
	<br>
	<!-- Parágrafo para fazer cadastro, caso não tenha login -->
	<p>Deseja voltar ao gerenciamento de sua conta? <a href="gerenciamentodeconta.php">Clique aqui</a></p>
<!-- Chamando o rodapé-->
<?php include_once 'footer.php';?>
