<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet-routing-machine.css" />
	<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/leaflet-routing-machine.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:400i&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<title>Rotae - Mapa</title>
</head>
<body>
	<div id="map"></div>
  <script type="text/javascript">
  <?php
    $js = json_encode($preco);
    echo "var precos = " . $js . ";\n";
    echo "var defaultmodalidade = " . $default . ";\n";
  ?>
  </script>
	<script src="<?php base_url(); ?>assets/js/map.js"></script>
	<div class="dropup" style="position: fixed; z-index: 99999; bottom: 0;">
  		<button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img src="https://freeiconshop.com/wp-content/uploads/edd/menu-rounded-solid.png" width="20" height="20">
  		</button>
  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  		<h6 class="dropdown-header"><?php echo $this->session->userdata("usuario_logado")["nome"]; ?></h6>
	    <a class="dropdown-item" href="<?php base_url(); ?>conta">Conta</a>
      <div class="dropdown-divider"></div>
	    <a class="dropdown-item" href="<?php echo base_url(); ?>site/sobre">Sobre</a>
      <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout">Sair</a>
  	</div>
  </div>
  <div class="container-fluid" id="msgcontainer" style="position: fixed; z-index: 99998; bottom: 10vh; pointer-events: none;">
      <div class="row">
        <div class="col"></div>
        <div class="col-md-auto caixa" id="popupvalor" style="pointer-events: auto;">
          <div class="row" style="pointer-events: auto;">
            <div class="col-4 colunaesq">
              <div class="roundbutton md1"></div>
              <div class="text-center" id="textomodalidade">Modalidade cadastrada</div>
            </div>
            <div class="col-8">
              <select class="form-control" onchange="selecao()" id="modalidade" name="modalidade" style="margin-top: 20px" required>
                <option value="default" hidden>Outra modalidade</option>
                <option value="1">Cadeirante</option>
                <option value="2">Deficiente visual</option>
                <option value="3">Deficiente auditivo</option>
                <option value="4">Deficiente mental</option>
                <option value="5">Deficiente intelectual</option>
                <option value="6">Deficiente físico</option>
                <option value="7">Idoso</option>
                <option value="8">Gestante</option>
                <option value="9">Mudo</option>
                <option value="10">Deficiente múltiplo</option>
              </select>
              <span class="texto">
                <p class="texto"><b>Total:</b> R$<span id="valor">X.XX</span></p>
                <p class="texto"><b>Tempo estimado:</b> <span id="tempo">XX</span> min.</p>
                <p class="texto"><b>Distância:</b> <span id="distancia">XX</span>km</p>
              </span>
            </div>
          </div>
          <div class="row" style="margin-top: 10px; pointer-events: auto;">
            <div class="col">
              <button type="button" class="btn btn-dark btn-block" onclick="submit()">Confirmar viagem</button>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </div>
  </div>
</body>
</html>	