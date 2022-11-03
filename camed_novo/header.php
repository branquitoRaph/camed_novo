<!DOCTYPE html>
<html>
<!-- Criando o Cabeçalho do código/página -->
<head>
<?php
	//Chamando a conexão com o banco de dados
	require_once("conexao.php");
	//Condição para não dar erro no session_start(), pois ele já inicia em outra página
	if(session_status()=== PHP_SESSION_NONE) {
			session_start();
	}
	//Condição para pegar o nome do usuário e guardar em uma variável
	if($_SESSION['logado'] == true){
		$id = (int) $_SESSION['id'];
		//Comando sql para selecionar o nome do usuário a partir do id do usuário logado
		$sql = "SELECT  nomeUsuario from usuario where $id = idUsuario;";
		//Efetivamente pega os dados (conectando e mandando o comando)
		$query = mysqli_query($conexao,$sql);
		//Guarda usando a função mysqli_fecth_array
		$resultado = mysqli_fetch_array($query);
		//Atribui o valor recebido (indíce 0) para a variável $titulo
		$titulo = $resultado[0];
	}
?>
	<!-- Codificação (especificações da página) -->
	<meta http-equiv = "content-type" content = "text/html; charset=utf-8 unicode_ci">
	<!-- Título da página-->
	<title><?php echo $titulo;?></title>
	<!-- Chamando o css externo (para estilizar a página)-->
	<link href = "https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel = "stylesheet">
	<link rel = "stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Fechando o cabeçalho-->
</head>
<!-- Criando o corpo da página -->
<body>
	<!-- Scrip do Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/0f40ec3d2d.js" crossorigin="anonymous"></script>
	<script src="js/progressbar.min.js"></script>
	<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
	<!-- Criando o cabeçalho da página -->
	<header>
		<div class = "container" id = "nav-container">
			<nav class = "navbar navbar-expand-lg fixed-top">
				<a href = "#" class = "navbar-brand">
					<img id = "logo" src = "img/logo_header_camed.png" alt = "Camed"> Camed
				</a>
				<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbar-links" aria-controls = "navbar-links" aria-expanded = "false" aria-label = "Toggle navigation">
					<span class = "navbar-toggler-icon"></span>
				</button>
				<div class = "collapse navbar-collapse justify-content-end" id = "navbar-links">
					<div class = "navbar-nav">
						<a class = "nav-item nav-link" id = "home-menu" href = "home.php">Home</a>
						<a class = "nav-item nav-link" id = "sobre-menu">Sobre</a>
						<a class = "nav-item nav-link" id = "tabela-menu" href = "farmacia.php">Farmácia VS Preço</a>
						<a class = "nav-item nav-link" id = "contact-area">Contato</a>
						<a class = "nav-item nav-link" id = "services-menu" href = "gerenciamentodeconta.php">Gerenciamento de Conta</a>
					</div>
				</div>
			</nav>
		</div>
	<!-- Fechando o cabeçalho -->
	</header>
