<!-- Chamando o cabeçalho da página-->
<?php include_once 'header.php';
include_once 'medicamento.php';
//capturando o sintoma
$sintoma= $_POST['sintomas'];
?>
<br>
<br>
<?php
	$medicamento = new Medicamento();
	$tabela = $medicamento->findbySintoma($sintoma);
	if (count($tabela)>0):
		foreach($tabela as $linha){
			$receita = $linha['necessarioReceita'];
			if ($receita==1):
				$receita = 'Precisa de receita';
			else:
				$receita = 'Não precisa de receita';
			endif
			?>
	<!-- Criando a parte principal da página-->
	<div class = "container">
		<div class = "col-12">
			<h3 class = "main-title"><?php echo "Sintoma escolhido: ". $linha['nomeSintoma'];?></h3>
		</div>
		<div id="conteudo">
			<center>
				<table class = "table table-hover">
					<thead>
						<tr>
							<th scope="col">Medicamento</th>
							<th scope="col">PMVC</th>
							<th scope="col">Necessita Receita</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $linha['nome'];?></td>
							<td><?php echo $linha['PMVC'];?></td>
							<td><?php echo $linha[$receita];?></td>
						</tr>
						<?php 
						} 
						else: ?>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>-</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</center>
		</div>
	<!-- Fechando a parte principal da página-->
	</div>
	<!-- Criando o rodapé-->
	<?php include_once 'footer.php';?>
