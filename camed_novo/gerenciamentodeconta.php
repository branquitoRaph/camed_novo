<?php
//Chamando o arquivo de conexão
require_once 'conexao.php';
include_once 'usuario.php';
//Verifica se o id do cliente está na URL da requisição HTTP
if(isset($_GET['idUsuario'])):
	//filter_var retorna false se o parâmetro não for inteiro, e caso contrário retorna um inteiro.
	$idUsuario=filter_var($_GET['idUsuario'], FILTER_VALIDATE_INT);
	if ($idUsuario):
		$usuario = new Usuario();
		$linha = $usuario->find($idUsuario);
	else:
		echo "parâmetro inválido.";
	endif;
endif;
?>
<!-- Chamando o cabeçalho da página-->
<?php include_once 'header.php';?>
<br>
<br>
<!-- Div para separar o arquivo, afim de organização -->
	<div id = "atualizar">
		<br>
		<br>
		<div class = "container">
			<div class = "row açign-items-center">
				<div class = "col-md-10 mx-auto col-lg-5">
					<h1 id = "h1l">Gerenciamento de Conta</h1>
					<!-- Abrindo um formulário para Cadastro-->
					<form class = "p-4 p-md-5 border rounded-3 bg-light" action="alterar.php" method="POST">
						<input type="hidden" name="idUsuario" value="<?php echo $linha['idUsuario']; ?>">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="fnome">Nome</label>
								<input type="text" class="form-control" id = "fname" name = "nome" value = "<?php echo $linha['nomeUsuario']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="sobrenome">Sobrenome</label>
								<input type="text" class="form-control" id = "lname" name = "sobrenome" value = "<?php echo $linha['sobrenomeUsuario']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" id = "campo" name = "email" value = "<?php echo $linha['emailUsuario']; ?>">
						</div>
						<div class="form-group">
							<label for="senha">Senha</label>
							<input type="password" class="form-control" id = "pwd" name = "senha" minlength = "8" placeholder="Senha">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="dataNascimento">Data de Nascimento</label>
								<input type="date" class="form-control" id = "fdata" name = "data" value = "<?php echo $linha['dataNascimento']; ?>">
							</div>
						</div>
						<input type="submit" class="btn btn-primary btn-lg btn-block" name = "Enviar" value = "Atualizar">
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- Chamando o rodapé-->
<?php include_once 'footer.php';?>
