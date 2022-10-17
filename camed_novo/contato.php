<?php
//Iniciar  Sessão
session_start();
//chamando o arquivo de conexão
require_once 'conexao.php';
//Se existir o "Enviar" , é porque clicaram no botão
if(isset($_POST['Enviar'])):
	//Limpando os campos e enviando pelo método POST conectando com o arquivo de conexão
	$nome=mysqli_escape_string($conexao,$_POST['nome']);
	$tipo=mysqli_escape_string($conexao,$_POST['assunto']);
	$msg=mysqli_escape_string($conexao,$_POST['msg']);
	//Sanitizando os campos de nome e sobrenome
	$nomeSanitize = filter_var($nome, FILTER_SANITIZE_STRING);
	//Manda o comando para o banco de dados, pegando e confirmando os dados (consulta o banco de dados)
	$sql="INSERT INTO contato(nomeUsuario, sobrenomeUsuario, cepUsuario, emailUsuario, mensagem) VALUES ('$nomeSanitize', '$sobrenomeSanitize', '$cep', '$emailValidate', '$msg')";
	//Condição para ver se a mensagem foi enviada para o banco de dados
	if(mysqli_query($conexao, $sql)):
		//Se foi, vai mostrar que a mensagem foi enviada com sucesso
		$_SESSION['mensagem'] = "Mensagem enviada com sucesso!";
		//header('Location: home.php');
	//Se não
	else:
		//Mostra a mensagem negativa
		$_SESSION['mensagem'] = "Erro ao enviar mensagem!";		
	//Fecha os ifs
	endif;
endif;	
?>
<!-- Chamando o cabeçalho da página -->
<?php include_once 'header.php';?>
	<!-- Título com tamanho em h1 -->
	<h1>Deixe a sua mensagem</h1>
	<!-- Abrindo um formulário para Cadastro -->
	<form action="contato.php" method="POST">
		<!-- Texto que aparece -->
		<label for = "fname">Nome:</label>
		<!-- Campo de digitação -->
		<input type = "text" id = "fname" name = "nome" placeholder = "Digite seu nome"><br><br>
		<!-- Campo de seleção -->
		<input type = "radio" id = "assunto" name = "assunto" value = "elogio">
		<!-- Texto que aparece -->
		<label for = "assunto">Elogio</label><br>
		<!-- Campo de seleção -->
		<input type = "radio" id = "assunto" name = "assunto" value = "critica">
		<!-- Texto que aparece -->
		<label for = "assunto">Crítica</label><br>
		<!-- Campo de seleção -->
		<input type = "radio" id = "assunto" name = "assunto" value = "sugestao">
		<!-- Texto que aparece -->
		<label for = "assunto">Sugestão</label><br>
		<!-- Texto que aparece -->
		<label for = "text"><br>Mensagem:</label>
		<!-- Campo de digitação -->
		<input type = "text" id = "msg" name = "msg" minlength = "8" placeholder = "Escreva uma mensagem"><br><br>
		<!-- Campo de enviar -->
		<input type = "submit" name = "Enviar" value = "Enviar">
	<!-- Fechando o formulário -->
	</form>
	<!-- Criando o rodapé -->
	<?php include_once 'footer.php';?>
