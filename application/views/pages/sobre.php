<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Rotae - Conta</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>" style="font-family: 'Lato', sans-serif;">Rotæ</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
			    <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			    	<li class="nav-item">
			        	<a class="nav-link" href="<?php echo base_url();?>">Mapa</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="<?php echo base_url();?>conta">Conta<span class="sr-only">(Página atual)</a>
			      	</li>
			      	<li class="nav-item active">
			        	<a class="nav-link" href="#">Sobre</a>
			      	</li>
			    </ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="padding-top: 20px; padding-bottom: 20px; display: inline-block; margin-right: 20px;">Sobre a Rotæ</h2>
				<img src="<?= base_url(); ?>assets/img/logo1.png" style="width: 100px; height: auto;">
			</div>
		</div>
		<div class="row">
			<div class="col" style="text-align: justify; text-justify: inter-word;">
				<h5>
					Rotæ é um aplicativo que tenta atender todas as suas necessidades especiais, feito com todo amor e dedicação. Nós da Rotæ procuramos resolver a falta de transporte adequado para pessoas com necessidades especiais ou deficiência, facilitando a busca por meios de transporte adaptados, sempre com segurança, confiança e um bom preço. Criado por seis estudantes preocupados com aqueles em nossa volta, temos como missão propor maior chances de inclusão no meio social e garantir acessibilidade para qualquer pessoa com alguma necessidade especial que busque nossos serviços.
				</h5>
			</div>
		</div>
	</div>

	<!-- Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>
</html>