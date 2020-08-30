<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <title>Rotae - Cadastro</title>
  </head>
  <body>
    <div class="container h-100">
    
    <?php if($this->session->flashdata("erro")) : ?>
      <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
    <?php endif ?>

    <div class="d-flex justify-content-center h-100">
      <div class="user_card" style="height: 630px; margin-top: 10%;">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="https://i.imgur.com/mQxvUx8.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form action="<?php base_url(); ?>cadastro/submit" method="POST">
            <p><center style="color: white;">Cadastro Usuário</center></p>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="nome" class="form-control input_user" placeholder="Nome" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              </div>
              <input type="text" id="cpf" name="cpf" class="form-control input_user" placeholder="CPF" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" class="form-control input_user" placeholder="E-mail" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" id="telefone" name="telefone" class="form-control input_user" placeholder="Telefone" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="text" id="nascimento" name="nascimento" class="form-control input_user" placeholder="Nascimento" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-star"></i></span>
              </div>
              <select class="form-control" id="modalidade" name="modalidade" required>
                <option value="" hidden>Necessidade especial</option>
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
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="senha" class="form-control input_pass" placeholder="Senha" required>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
              </div>
            </div>
              <div class="d-flex justify-content-center mt-3 login_container">
                <input type="submit" value="Cadastrar" class="btn login_btn">
              </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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