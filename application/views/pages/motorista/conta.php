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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 20px;">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>motorista" style="font-family: 'Lato', sans-serif;">Rotæ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>motorista">Chamadas</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>motorista/conta">Conta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>motorista/login/logout">Sair</a>
              </li>
          </ul>
      </div>
    </div>
  </nav>
	<div class="container">
		<?php if($this->session->flashdata("msg")) : ?>
      		<p class="alert alert-success"><?= $this->session->flashdata("msg") ?></p>
    	<?php endif ?>
		<h2 style="padding-top: 20px; padding-bottom: 20px; display: inline-block; margin-right: 20px;">Conta de <?php echo $this->session->userdata("motorista_logado")["nome"]; ?></h2>
		<form>
  			<div class="form-group row">
    			<label for="nome" class="col-sm-2 col-form-label">Nome</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="nome" value="<?php echo $this->session->userdata('motorista_logado')['nome']; ?>">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="email" class="col-sm-2 col-form-label">E-mail</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="email" value="<?php echo $this->session->userdata('motorista_logado')['email']; ?>">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="cpf" class="col-sm-2 col-form-label">CPF</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="cpf" value="<?php echo $this->session->userdata('motorista_logado')['cpf']; ?>">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="telefone" value="<?php echo $this->session->userdata('motorista_logado')['telefone']; ?>">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="nascimento" class="col-sm-2 col-form-label">Nascimento</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="nascimento" value="
      				<?php
      					$data = date('d/m/Y', strtotime($this->session->userdata('motorista_logado')['nascimento']));
      					echo $data;
      				?>
      				">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="telefone" class="col-sm-2 col-form-label">Placa</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="telefone" value="<?php echo $this->session->userdata('motorista_logado')['placa']; ?>">
    			</div>
  			</div>
  			<div class="form-group row">
    			<label for="telefone" class="col-sm-2 col-form-label">CNH</label>
    			<div class="col-sm-10">
      				<input type="text" readonly class="form-control" id="telefone" value="<?php echo $this->session->userdata('motorista_logado')['cnh']; ?>">
    			</div>
  			</div>
		</form>
	</div>

	<!-- Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	<script>
      $(document).ready(function () {
        //Máscara para formulário
        var $CampoCpf = $("#cpf");
        $CampoCpf.mask('000.000.000-00', {reverse: true});
        var $CampoNasc = $("#nascimento");
        $CampoNasc.mask('00/00/0000', {reverse: true});
        var $CampoTele = $("#telefone");
        $CampoTele.mask('00000-0000', {reverse: true});
    	});
    </script>
</body>
</html>