<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico" />
  <title>Rotae - Viagens</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>motorista">Chamadas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>motorista/conta">Conta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>motorista/login/logout">Sair</a>
              </li>
          </ul>
      </div>
    </div>
  </nav>
    <div class="container-fluid">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#chamadopendente" role="tab" aria-controls="chamadopendente" aria-selected="true">Viagens não atendidas</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#chamadoprogresso" role="tab" aria-controls="chamadoprogresso" aria-selected="false">Viagens em progresso</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#chamadoconcluido" role="tab" aria-controls="chamadoconcluido" aria-selected="false">Viagens concluídas</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="chamadopendente" role="tabpanel" aria-labelledby="chamadopendente-tab">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Modalidade</th>
                  <th scope="col">Status</th>
              </tr>
          </thead>
          <tbody>
              <?php
              foreach($tabela as $d) {
                if ($d->status == 0) {
                  echo "<tr>".
                       "<td>".$d->id."</td>".
                       "<td>".$d->nome."</td><td>";
                  switch ($d->modalidade) {
                    case 0:
                        echo 'Cadeirante';
                        break;
                    case 1:
                        echo 'Deficiente visual';
                        break;
                    case 2:
                        echo 'Deficiente auditivo';
                        break;
                    case 3:
                        echo 'Deficiente mental';
                        break;
                    case 4:
                        echo 'Deficiente intelectual';
                        break;
                    case 5:
                        echo 'Deficiente físico';
                        break;
                    case 6:
                        echo 'Idoso';
                        break;
                    case 7:
                        echo 'Gestante';
                        break;
                    case 8:
                        echo 'Mudo';
                        break;
                    case 9:
                        echo 'Deficiente múltiplo';
                        break;
                }
                  echo "<td><a class='btn btn-success btn-block' href='". base_url() ."motorista/viagem/atender/".$d->id."' role='button' style='color: white;'>Atender</a><a class='btn btn-primary btn-block' role='button' target='_blank' href='https://www.google.com/maps/dir/?api=1&origin=".$d->origem_latlng."&destination=".$d->destino_latlng."&travelmode=driving' style='color: white;'>Obter rotas</a></td></tr>";
                }
              }
              ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="tab-pane fade" id="chamadoprogresso" role="tabpanel" aria-labelledby="chamadoprogresso-tab">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
              <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Valor</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              <?php
              foreach($tabela as $d) {
                if ($d->status == 1 && $d->cpf_moto == $this->session->userdata("motorista_logado")["cpf"]) {
                  echo "<tr>".
                       "<td>".$d->id."</td>".
                       "<td>".$d->nome."</td>".
                       "<td>R$".$d->valor."</td>";
                  echo "<td><a class='btn btn-success btn-block' role='button' href='". base_url() ."motorista/viagem/concluir/".$d->id."' style='color: white;'>Concluir</a><a class='btn btn-primary btn-block' role='button' target='_blank' href='https://www.google.com/maps/dir/?api=1&origin=".$d->origem_latlng."&destination=".$d->destino_latlng."&travelmode=driving' style='color: white;'>Obter rotas</a></td></tr>";
                }
              }
              ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="tab-pane fade" id="chamadoconcluido" role="tabpanel" aria-labelledby="chamadoconcluido-tab">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
              <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Destino</th>
                  <th>Data</th>
                  <th>Data conclusão</th>
              </tr>
          </thead>
          <tbody>
              <?php
              foreach($tabela as $d) {
                if ($d->status == 2 && $d->cpf_moto == $this->session->userdata("motorista_logado")["cpf"]) {
                  echo "<tr>".
                       "<td>".$d->id."</td>".
                       "<td>".$d->nome."</td>".
                       "<td>".explode(",", $d->destino)[0].",".explode(",", $d->destino)[1].",".explode(",", $d->destino)[2]."."."</td>".
                       "<td>".$d->data."</td>".
                       "<td>".$d->dataconcluida."</td></tr>";
                }
              }
              ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    
  </div>
</body>
</html>