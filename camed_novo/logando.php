<?php
	include_once("conexao.php");
	include("usuario.php");
	session_start();
	if(isset($_POST['Enviar'])){
		$usuario = new Usuario();
		$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$senha = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
		//Condição se os campos de login e senha estão vazios
		if(empty($email) or empty($senha)):
			//Guardando no array de erro
			$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
		//Se não
		else:
			$cripto = md5($senha);
			$usuario->setEmail($email);
			$usuario->setSenha($cripto);
			$consulta = $usuario->logar();
			//echo 'entrou';
			if ($consulta):
			//Guardando os dados com a função mysqli_fetch_array
				//$dados=mysqli_fetch_array($resultado);
			//Sessão para logar o usuário
			//$_SESSION['logado'] = true;
			//Sessão para guardar o id do usuário logado
			//$_SESSION['id'] = $dados[0];
			//Manda o usuário para a página principal
				header('Location: home.php');
			//Se não
			else:
				//Fala que houve um erro com os dados
				$erros[]="Usuário e senha não conferem.";
			//Fechando os ifs
			endif;
		endif;
	}
?>
