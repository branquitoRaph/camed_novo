<?php
//Chamando o arquivo de conexão
require_once 'conexao.php';
//<!-- Chamando o cabeçalho da página-->
include_once 'header2.php';
?>
	<!-- Abrindo um formulário para login-->
	<!-- Título em tamanho h1-->
	<div id = "login">
		<br>
		<br>
		<div class = "container">
			<div class = "row açign-items-center">
				<div class = "col-md-10 mx-auto col-lg-5">
					<h1 id = "h1l">Login do Usuário</h1>
					<br>
					<form class = "p-4 p-md-5 border rounded-3 bg-light" action="logando.php" method = "POST">
						<div class="form-group">
							<label for="email">Endereço de email</label>
							<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name = "email" placeholder="Seu email">
							<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
						</div>
						<div class="form-group">
							<label for="pwd">Senha</label>
							<input type="password" class="form-control" id="pwd" name = "pwd" minlength = "8" placeholder="Senha">
						</div>
						<input type="submit" class="btn btn-primary btn-lg btn-block" name = "Enviar" value = "Enviar">
					</form>
					<!-- Parágrafo para fazer cadastro, caso não tenha login -->
					<p>Não possui login? <a href="cadastro.php">Cadastre-se agora</a></p>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'footer.php';?>
