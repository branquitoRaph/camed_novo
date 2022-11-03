<!-- Criando o rodapé da página-->
	<footer>
		<div id = "contact-area">
			<div class = "container">
				<div class = "row">
					<div class = "col-md-12">
						<h3 class = "main-title">Fale Conosco</h3>
					</div>
					<div class = "col-md-4 contact-box">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<p><span class = "contact-title">Ligue para: </span>+55 (27) 3065-9289</p>
						<p><span class = "contact-title">Horários: </span>08:00 - 17:00</p>
					</div>
					<div class = "col-md-4 contact-box">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<p><span class = "contact-title">Envie um e-mail: </span>camed@gmail.com</p>
					</div>
					<div class = "col-md-4 contact-box">
						<i class="fa fa-map" aria-hidden="true"></i>
						<p><span class = "contact-title">Quer nos encontrar? </span></p>
						<p>Estamos no IFES - Campus Serra</p>
					</div>
					<div class = "col-md-6" id = "msg-box">
						<p>Ou, nos deixe uma mensagem:</p>
					</div>
					<div class = "col-md-6" id = "contact-form">
						<form action="home.php" method="POST">
							<input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Digite seu e-mail">
							<input type = "text" class = "form-control" placeholder =  "Infome a categoria: Elogio, Sugestão ou Crítica" name = "assunto" id = "assunto">
							<textarea class = "form-control" rows = "3" placeholder = "Sua mensagem" name = "msg"></textarea>
							<input type = "submit" class = "main-btn" value = "Enviar">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id = "copy-area">
			<div class = "container">
				<div class = "col-md-12">
					<p>Desenvolvido por <a href = "#">Ca'Med</a> &copy; 2022</p>
				</div>
			</div>
		</div>
	<!-- Fechando o rodapé-->
	</footer>
	<script src="js/script.js"></script>
	<!-- Fechando o corpo da página-->
</body>
<!-- Fechando o arquivo html-->
</html>
