<?php
//Iniciar  Sessão
session_start();
//Conexão
require_once 'conexao.php';
?>
<!-- Criando o corpo da página-->
<!-- Chamando o cabeçalho da página-->
<?php include_once 'header2.php';?>
	<!-- Título com tamanho em h1-->
	<div id = "cadastro">
		<br>
		<br>
		<div class = "container">
			<div class = "row açign-items-center">
				<div class = "col-md-10 mx-auto col-lg-5">
					<h1 id = "h1l">Cadastro</h1>
					<!-- Abrindo um formulário para Cadastro-->
					<form class = "p-4 p-md-5 border rounded-3 bg-light" action="criarUsuario.php" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="fnome">Nome</label>
								<input type="text" class="form-control" id = "fname" name = "nome" placeholder="Nome">
							</div>
							<div class="form-group col-md-6">
								<label for="sobrenome">Sobrenome</label>
								<input type="text" class="form-control" id = "lname" name = "sobrenome" placeholder="Sobrenome">
							</div>
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" id = "campo" name = "email" placeholder="E-mail">
						</div>
						<div class="form-group">
							<label for="senha">Senha</label>
							<input type="password" class="form-control" id = "pwd" name = "senha" minlength = "8" placeholder="Senha">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="dataNascimento">Data de Nascimento</label>
								<input type="date" class="form-control" id = "fdata" name = "data">
							</div>
						</div>
						<input type="submit" class="btn btn-primary btn-lg btn-block" name = "Enviar" value = "Prosseguir">
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- Chamando o rodapé-->
<?php include_once 'footer2.php';?>
