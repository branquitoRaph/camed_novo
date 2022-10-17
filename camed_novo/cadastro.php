<?php
//Iniciar  Sessão
session_start();
//Conexão
require_once 'conexao.php';
//Se existir o "Enviar" , é porque clicaram no botão
if(isset($_POST['Enviar'])):
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
	$nome = mysqli_escape_string($conexao,$_POST['nome']);
	$sobrenome = mysqli_escape_string($conexao,$_POST['sobrenome']);
	$email = mysqli_escape_string($conexao,$_POST['email']);
	$senha = md5(mysqli_escape_string($conexao,$_POST['senha'])); //Senha criptografada com o MD5
	$data = mysqli_escape_string($conexao,$_POST['data']);
	//Sanitizando os campos de nome e sobrenome
	$nomeSanitize = filter_var($nome, FILTER_SANITIZE_STRING);
	$sobrenomeSanitize = filter_var($sobrenome, FILTER_SANITIZE_STRING);
	//Validando o campo de e-mail
	$emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);
	//Fazendo o comando para o SQL
	$sql="INSERT INTO usuario(nomeUsuario, senha, dataNascimento, sobrenomeUsuario, emailUsuario) VALUES ('$nomeSanitize', '$senha', '$data', '$sobrenomeSanitize', '$email');";
	//Condição de que se foi enviado
	if(mysqli_query($conexao, $sql)):
		//Irá fazer a sessão da mensagem (Cadastrado com sucesso)
		$_SESSION['mensagem'] = "Prosseguir para endereço!";
		//E manda para o login
		header('Location: formEnd.php');
	//Se não
	else:
		//Mostra a mensagem Erro ao cadastrar
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
	//Fecha os ifs
	endif;
endif;
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
					<form class = "p-4 p-md-5 border rounded-3 bg-light" action="cadastro.php" method="POST">
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
