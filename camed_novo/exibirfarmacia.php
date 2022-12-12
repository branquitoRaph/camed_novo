<!-- Chamando o cabeçalho da página-->
<?php include_once 'header.php';
include_once 'farmacia.php';
//capturando o sintoma
$farmacia = new Farmacia();
$tabela = $farmacia->findbyFarmacia();
?>
<br>
<br>
	<!-- Criando a parte principal da página-->
	<div class = "container">
		<div class = "col-12">
			<h3 class = "main-title">Farmácia VS Preço</h3>
		</div>
		<div id="conteudo">
			<center>
				<table class = "table table-hover">
					<thead>
						<tr>
							<th scope="col">Farmácia</th>
							<th scope="col">Medicamento</th>
							<th scope="col">Preço na Farmácia</th>
							<th scope="col">Data</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (count($tabela)>0):
							foreach($tabela as $linha){
								?>
						<tr>
							<td><?php echo $linha['nomeFarmacia'];?></td>
							<td><?php echo $linha['medicamentoFarmacia'];?></td>
							<td><?php echo $linha['preco'];?></td>
							<td><?php echo $linha['dataFarmacia'];?></td>
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
