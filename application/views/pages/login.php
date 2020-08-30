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

    <title>Rotae - Login</title>
  </head>
  <body>
    <div class="container h-100">
    <?php if($this->session->flashdata("msg")) : ?>
      <p class="alert alert-success"><?= $this->session->flashdata("msg") ?></p>
    <?php endif ?>
    <?php if($this->session->flashdata("erro")) : ?>
      <p class="alert alert-danger"><?= $this->session->flashdata("erro") ?></p>
    <?php endif ?>
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="https://i.imgur.com/mQxvUx8.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form action="login/submit" method="POST">
            <p><center style="color: white;">Login Usuário</center></p>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="email" name="email" class="form-control input_user" placeholder="E-mail" required>
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
                <input type="submit" name="button" value="Login" class="btn login_btn">
              </div>
          </form>
        </div>
    
        <div class="mt-4">
          <div class="d-flex justify-content-between links">
            <a href="<?= base_url(); ?>cadastro" style="color: white;">Cadastre-se</a>
            <a href="<?= base_url(); ?>motorista" style="color: white;">Login Motorista</a>
          </div>
        </div>
      </div>
    </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>