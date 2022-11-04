<!-- Chamando o cabeçalho da página -->
<?php include_once 'header.php';?>
	<main>
		<!-- Slide carrosel -->
		<div class = "container-fluid">
			<div id = "mainSlider" class = "carousel slide" data-ride = "carousel">
				<ol class = "carousel-indicators">
					<li data-target = "#mainSlider" data-slide-to = "0" class = "active"></li>
					<li data-target = "#mainSlider" data-slide-to = "1"></li>
					<li data-target = "#mainSlider" data-slide-to = "2"></li>
				</ol>
				<div class = "carousel-inner">
					<div class = "carousel-item active">
						<img src = "img/banner7.png" class = "d-block w-100" alt = "Está a procura de medicamentos?">
						<div class = "carousel-caption d-nome d-md-block">
							<h2>Está a procura de medicamentos?</h2>
							<p>Conte conosco, temos uma busca simples de medicamentos baseado em seu sintoma.</p>
							<a href = "#" class = "main-btn">Ver sintomas</a>
						</div>
					</div>
					<div class = "carousel-item">
						<img src = "img/banner7.png" class = "d-block w-100" alt = "Quer saber mais sobre nós?">
						<div class = "carousel-caption d-nome d-md-block">
							<h2>Quer saber mais sobre nós?</h2>
							<p>Entre em sobre nós.</p>
							<a href = "#" class = "main-btn">Sobre nós</a>
						</div>
					</div>
					<div class = "carousel-item">
						
						<img src = "img/banner7.png" class = "d-block w-100" alt = "Noticias">
						<div class = "carousel-caption d-nome d-md-block">
							<h2>Quer ficar atento?</h2>
							<p>Aqui temos as últimas notícias sobre o mundo da saúde.</p>
							<a href = "#" class = "main-btn">Ver notícias</a>
						</div>
					</div>
				</div>
				<a href = "#mainSlider" class = "carousel-control-prev" role = "button" data-slide = "prev">
					<span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
					<span class = "sr-only">Previous</span>
				</a>
				<a href = "#mainSlider" class = "carousel-control-next" role = "button" data-slide = "next">
					<span class = "carousel-control-next-icon" aria-hidden = "true"></span>
					<span class = "sr-only">Next</span>
				</a>
			</div>
			<!-- Sobre -->
			<div id = "about-area">
				<div class = "container">
					<div class = "row">
						<div class = "col-12">
							<h3 class = "main-title">Sobre o Camed</h3>
						</div>
						<div class = "col-md-6">
							<img class = "img-fluid" src = "img/logo_grande.png" alt = "Camed">
						</div>
						<div class = "col-md-6">
							<h3 class = "about-title">Um catálogo de medicamentos com responsabilidade</h3>
							<p>Nós, desenvolvedores da Ca'Med, pretendemos facilitar a pesquisa por medicamentos.</p>
							<p>Criando uma plataforma em que seja possível encontrar somente pelos sintomas, remédios para o tratamento de certos problemas.</p>
							<p>Este trabalho é ministrado pelos estudantes João Eid Dias Pinto, Jonathan Castro Silva e Raphael da Silva Branco.</p>
							<p>Supervisionado pelos professores Carlons Lins Borges Azevedo, Daniel Trindade Ribeiro, Marta Talitha Carvalho Freire de Amorim e Moisés Savedra Omena.</p>
							<p>Temos como objetivo te ajudar a encontrar o medicamento que você precisa</p>
							<p>Outros diferenciais:</p>
							<ul id = "about-list">
								<li><i class = "fas fa-check"></i>Acesso ao PMVC (Preço Máximo Vendido ao Consumidor);</li>
								<li><i class = "fas fa-check"></i>Encontra a bula do medicamento;</li>
								<li><i class = "fas fa-check"></i>Indica se o medicamento precisa ou não de prescrição médica;</li>
								<li><i class = "fas fa-check"></i>Segurança das informações;</li>
								<li><i class = "fas fa-check"></i>Tabela de comparação do PMVC com o preço encontrado nas farmácias.</li>
							</ul>
							<p>Este trabalho está em desenvolvimento. As funcionalidades serão aprimoradas para ajudar cada vez mais vocês!</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Sintomas -->
			<div id = "services-area">
				<div class = "container">
					<div class = "row">
						<div class = "col-12">
							<h3 class = "main-title">Sintomas</h3>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Febre</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="1">Febre</option>
									</select>
									<button id = "btnNoticia"type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Alergia</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="2">Alergia</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Dor de cabeça</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="3">Dor de cabeça</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Dores Musculares</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="4">Dores Musculares</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Dores Instestinais</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="5">Dores Intestinais</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Gases</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="6">Gases</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Vômito</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="7">Vômito</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Diarréia</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="8">Diarréia</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Pressão</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="9">Pressão</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
						<div class = "col-md-4 service-box">
							<h4>Azia</h4>
							<p>Clique em procurar e você encontrará os medicamentos deste sintoma.</p>
							<div class="div-select">
								<form action="exibirsintoma.php" method="post">
									<select name="sintomas" id="sintomas">
										<option value="10">Azia</option>
									</select>
									<button type="submit" class="btn btn-primary">Procurar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Noícias -->
			<div id = "noticias">
				<div class = "container">
					<div class = "row">
						<div class = "col-12">
							<h3 class = "main-title">Notícias</h3>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 1</h5>
									<p class="card-text">Anvisa proíbe a comercialização de produtos da marca Kinder</p>
									<a href="https://www.msn.com/pt-br/noticias/brasil/anvisa-pro-c3-adbe-comercializa-c3-a7-c3-a3o-de-produtos-kinder-no-brasil/ar-AAWeYKm" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 2</h5>
									<p class="card-text">Medicamentos ficarão mais caro, reajuste de 10%</p>
									<a href="https://cbn.globoradio.globo.com/media/audio/371414/medicamentos-podem-ficar-ate-10-mais-caros.htm#:~:text=Medicamentos%20podem%20ficar%20at%C3%A9%2010%25%20mais%20caros%20A,infla%C3%A7%C3%A3o%20do%20ano%20passado%2C%20que%20fechou%20em%2010%2C06%25." class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 3</h5>
									<p class="card-text">Vacina da Janssen tem registro definitivo no Brasil</p>
									<a href="https://ccnewsbrasil.com/publicacao/covid-vacina-da-janssen-recebe-registro-definitivo-da-anvisa-1649181455" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 4</h5>
									<p class="card-text">Aprovada a regulamentação de bulas digitais de medicamentos</p>
									<a href="https://www.aarb.org.br/aprovada-regulamentacao-da-bula-de-remedios-digital/" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 5</h5>
									<p class="card-text">Venda de antigripais aumentou em 94%</p>
									<a href="https://veja.abril.com.br/coluna/radar/depois-da-pandemia-venda-de-antigripais-cresce-94/" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 6</h5>
									<p class="card-text">Primeiro remédio para apneia do sono reduziu em até 41% pausas na respiração durante a noite</p>
									<a href="https://oglobo.globo.com/saude/medicina/primeiro-remedio-para-apneia-do-sono-reduziu-em-ate-41-pausas-na-respiracao-durante-noite-mostra-estudo-25477402" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 7</h5>
									<p class="card-text">Viagra: pacientes com hipertensão sofrem com falta de remédio no DF</p>
									<a href="https://www.metropoles.com/distrito-federal/viagra-pacientes-com-hipertensao-sofrem-com-falta-de-remedio-no-df" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
						<div class = "col-md-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Notícia 8</h5>
									<p class="card-text">Governo muda regras para venda de remédios na Farmácia Popular</p>
									<a href="https://www.minhavida.com.br/saude/noticias/27310-governo-muda-regras-para-venda-de-remedios-na-farmacia-popular" class="card-link">Link da notícia</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
<!-- Chamando o rodapé da página -->
<?php include_once 'footer.php';?>
