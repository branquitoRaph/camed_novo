<?php
//Iniciar  Sessão
session_start();
//Conexão
require_once 'conexao.php';
//Se existir o "Enviar" , é porque clicaram no botão
if(isset($_POST['Enviar'])):
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
	$cep = mysqli_escape_string($conexao, $_POST['cep']);
	$logradouro = mysqli_escape_string($conexao, $_POST['logradouro']);
	$numero = mysqli_escape_string($conexao, $_POST['numero']);
	$cep = mysqli_escape_string($conexao, $_POST['complemento']);
	$bairro = mysqli_escape_string($conexao, $_POST['bairro']);
	$municipio = mysqli_escape_string($conexao,$_POST['municipio']);
	$uf = mysqli_escape_string($conexao,$_POST['uf']);
	//Sanitizando os campos de nome e sobrenome
	$bairroSanitize = filter_var($bairro, FILTER_SANITIZE_STRING);
	//$municipioSanitize = filter_var($municipio, FILTER_SANITIZE_STRING);
	//$ufSanitize = filter_var($uf, FILTER_SANITIZE_STRING);
	//Fazendo o comando para o SQL
	$sql="INSERT INTO endereco(numero, CEP, descricao) VALUES ($numero, '$cep', '$logradouro');
	INSERT INTO bairro(descriBairro) VALUES ('$bairroSanitize');
	INSERT INTO municipio(descriMunicipio) VALUES ('$municipio');
	INSERT INTO estado(descriEstado) VALUES ('$uf');";
	
	//var_dump ($sql);
	//Condição de que se foi enviado
	if(mysqli_query($conexao, $sql)):
		//Irá fazer a sessão da mensagem (Cadastrado com sucesso)
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		echo "entrei";
		//E manda para o login
		header('Location: login.php');
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
					<h1 id = "h1l">Endereço</h1>
					<!-- Abrindo um formulário para Cadastro-->
					<form class = "p-4 p-md-5 border rounded-3 bg-light" action="formEnd.php" method="POST">
						<div class="form-group">
							<label for="cep">CEP</label>
							<input type="text" class="form-control" id = "cep" placeholder = "CEP (Código de Endereço Postal)" pattern = "[0-9]{5}[0-9]{3}" name = "cep" required title = "CEP">
						</div>
						<div class="form-group">
							<label for="logradouro">Logradouro</label>
							<input type="text" class="form-control" id = "logradouro" name = "logradouro" placeholder = "Logradouro" title = "Logradouro">
						</div>
						<div class="form-group">
							<label for="numero">Número</label>
							<input type="number" class="form-control" id = "numero" name = "numero" placeholder = "Número" title = "Número">
						</div>
						<div class="form-group">
							<label for="complemento">Complemento</label>
							<input type="text" class="form-control" id = "complemento" name = "complemento" placeholder = "Complemento" title = "Complemento">
						</div>
						<div class="form-group">
							<label for="bairro">Bairro</label>
							<input type="text" class="form-control" id = "bairro" name = "bairro" placeholder = "Bairro" title = "Bairro">
						</div>
						<div class="form-group">
							<label for="cidade">Cidade</label>
							<input type="text" class="form-control" id = "cidade" name = "cidade" placeholder = "Município" title = "Município">
						</div>
						<div class="form-group">
							<label for="uf">Estado</label>
							<select id="uf" class="form-control">
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						</div>
						<input type="submit" class="btn btn-primary btn-lg btn-block" name = "Enviar" value = "Finalizar">
					</form>
					<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
						<script>
								$("#cep").focusout(function(){
								//Início do Comando AJAX
								$.ajax({
									//O campo URL diz o caminho de onde virá os dados
									//É importante concatenar o valor digitado no CEP
									url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
									//Aqui você deve preencher o tipo de dados que será lido,
									//no caso, estamos lendo JSON.
									dataType: 'json',
									//SUCESS é referente a função que será executada caso
									//ele consiga ler a fonte de dados com sucesso.
									//O parâmetro dentro da função se refere ao nome da variável
									//que você vai dar para ler esse objeto.
									success: function(resposta){
										//Agora basta definir os valores que você deseja preencher
										//automaticamente nos campos acima.
										$("#logradouro").val(resposta.logradouro);
										$("#complemento").val(resposta.complemento);
										$("#bairro").val(resposta.bairro);
										$("#cidade").val(resposta.localidade);
										$("#uf").val(resposta.uf);
										//Vamos incluir para que o Número seja focado automaticamente
										//melhorando a experiência do usuário
										$("#numero").focus();
									}
								});
							});
						</script>
				</div>
			</div>
		</div>
	</div>
<!-- Chamando o rodapé-->
<?php include_once 'footer2.php';?>

