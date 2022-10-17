<?php
//Chamando o arquivo de conexão
require_once 'conexao.php';
if(session_status()=== PHP_SESSION_NONE){
			session_start();
	}
	//Condição para pegar o nome do usuário e guardar em uma variável
	if($_SESSION['logado'] == true){
		//Puxa o id com a session da página de login
		$id = (int) $_SESSION['id'];
	}
?>
<!-- Chamando o cabeçalho da página-->
<?php include_once 'header.php';?>
<!-- Div para separar o arquivo, afim de organização -->
<div class="row">
	<!-- Quebra de linha -->
	<br>
	<h1><p>Gerenciamento de Conta</p></h1>
	<!-- Centralizando e criando a tabela -->
	<center>
		<tbody>
			<?php
			//Comando para pegar os dados da tabela medicamento
			$sql="SELECT idUsuario, nomeUsuario, sobrenomeUsuario, cepUsuario, emailUsuario, senhaUsuario from usuario WHERE idUsuario = $id";
			//Pegando o resultado do comando
			$resultado= mysqli_query($conexao,$sql);
			//Condição se o número de linhas é maior que 0
			if (mysqli_num_rows($resultado)>0):
				//Loop para guardar os dados em uma variável
				while($dados =mysqli_fetch_array($resultado)):
?>
			<!-- Escreve os dados -->
			<div class="display">
				<input disabled value="<?php  echo $dados['nomeUsuario'];?>">
				<input disabled value="<?php  echo $dados['sobrenomeUsuario'];?>">
				<input disabled value="<?php  echo $dados['cepUsuario'];?>">
				<input disabled value="<?php  echo $dados['emailUsuario'];?>">
				<input disabled value="<?php  echo $dados['senhaUsuario'];?>">
			</div>
<?php 
			//Fecha o loop
			 endwhile;
			//Se não, tabela vazia
			else: ?>
				<tr class="tr">
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
<?php
			//Fecha condição
			endif;
?>
		<!-- Fecha o corpo da tabela -->
		</tbody>
	<!-- Fecha a tabela e a centralização-->
	</center>
	<br>
<!-- Fecha a div -->
</div>
	<br>
	<br>
	<!-- Parágrafo para fazer cadastro, caso não tenha login -->
	<p>Deseja alterar alguma informação de sua conta? <a href="alterar.php">Clique aqui</a></p>
	<!-- Parágrafo para fazer cadastro, caso não tenha login -->
	<p>Deseja apagar sua conta? <a href="excluir.php">Clique aqui</a></p>
<!-- Chamando o rodapé-->
<?php include_once 'footer.php';?>
