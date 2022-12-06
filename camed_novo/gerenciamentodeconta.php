<?php
//Chamando o arquivo de conexão
require_once 'conexao.php';
include_once 'usuario.php';
//Verifica se o id do cliente está na URL da requisição HTTP
if(isset($_GET['idUsuario'])):
	//filter_var retorna false se o parâmetro não for inteiro, e caso contrário retorna um inteiro.
	$id=filter_var($_GET['idUsuario'], FILTER_VALIDATE_INT);
	if ($id):
		$usuario = new Usuario();	
		$linha = $usuario->find($id);
	else:
		echo "parâmetro inválido.";
	endif;
endif;
/*
if(session_status()=== PHP_SESSION_NONE){
	session_start();
	}
	//Condição para pegar o nome do usuário e guardar em uma variável
	if($_SESSION['logado'] == true){
		//Puxa o id com a session da página de login
		$id = (int) $_SESSION['id'];
	}
*/
?>
<!-- Chamando o cabeçalho da página-->
<?php include_once 'header.php';?>
<br>
<br>
<!-- Div para separar o arquivo, afim de organização -->
	<div class = "container">
		<div class = "col-12">
			<h3 class = "main-title">Gerenciamento de Conta</h3>
		</div>
		<div id = "conteudo">
			<!-- Centralizando e criando a tabela -->
			<center>
				<table class = "table table-hover">
					<thead>
							<tr>
								<th scope="col">Nome</th>
								<th scope="col">Sobrenome</th>
								<th scope="col">Data de Nascimento</th>
								<th scope="col">E-mail</th>
								<th scope="col">Senha</th>
							</tr>
					</thead>
					<tbody>
						<?php
						//Comando para pegar os dados da tabela medicamento
						$sql="SELECT idUsuario, nomeUsuario, senha, dataNascimento, sobrenomeUsuario, emailUsuario from usuario WHERE idUsuario = $id";
						//Pegando o resultado do comando
						$resultado= mysqli_query($conexao,$sql);
						//Condição se o número de linhas é maior que 0
						if (mysqli_num_rows($resultado)>0):
							//Loop para guardar os dados em uma variável
							while($dados =mysqli_fetch_array($resultado)):
						?>
						<tr>
							<td><?php echo $dados['nomeUsuario'];?></td>
							<td><?php echo $dados['sobrenomeUsuario'];?></td>
							<td><?php echo $dados['dataNascimento'];?></td>
							<td><?php echo $dados['emailUsuario'];?></td>
							<td><?php echo $dados['senha'];?></td>
						</tr>
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
							<td>-</td>
						</tr>
						<?php
						//Fecha condição
						endif;
						?>
						<!-- Fecha o corpo da tabela -->
					</tbody>
				<!-- Fecha a tabela e a centralização-->
				</table>
				<p>Deseja alterar alguma informação de sua conta? <a href="alterar.php">Clique aqui</a></p>
				<p>Deseja apagar sua conta? <a href="excluir.php">Clique aqui</a></p>
			</center>
		</div>
	<!-- Fecha a div -->
	</div>
<!-- Chamando o rodapé-->
<?php include_once 'footer.php';?>
