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
	$sql="UPDATE usuario SET senha ='$senha' WHERE idUsuario=$id";
	if(mysqli_query($conexao,$sql)):
		$_SESSION['mensagem'] = "Senha alterada com sucesso!";
		header('Location: login.php');
	else:
		$_SESSION['mensagem'] = "Erro ao alterar senha!";
		header('Location: alterar.php');
	endif;
endif;		

//<!-- Chamando o cabeçalho da página -->
include_once 'header.php';
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
	<div id = "alterar">
		<br>
		<br>
		<div class = "container">
			<div class = "row açign-items-center">
				<div class = "col-md-10 mx-auto col-lg-5">
					<h3 class = "main-title">Alterar Dados</h3>
					<br>
					<form class = "p-4 p-md-5 border rounded-3 bg-light" method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<label for="pwd">Nova Senha</label>
							<input type="password" id = "pwd" class="form-control" id="email" minlength = "8" name = "senha" placeholder="Nova Senha">
						</div>
						<input type="submit" class="btn btn-primary btn-lg btn-block" name = "Enviar" value = "Confirmar">
					</form>
					<p>Deseja voltar ao gerenciamento de sua conta? <a href="gerenciamentodeconta.php">Clique aqui</a></p>
				</div>
			</div>
		</div>
	</div>
<!-- Chamando o rodapé-->
<?php include_once 'footer.php';?>
