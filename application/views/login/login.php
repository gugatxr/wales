<link href="<?=base_url("assets/vendor/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?=base_url("assets/css/signin.css") ?>" rel="stylesheet">

<!-- <div class="container">


  <p>Por favor faça o login</p>
  <form method="POST" action='<?=base_url() ?>'>
    <input placeholder="Usuário"  type="text" autofocus required>
    <input placeholder="Senha"  type="password" required>

    <button  class="btn btn-lg btn-success btn-block">Login</button>

  </form>

</div> -->
<div class="container">

  <!-- <form  method="POST"action='<?=site_url('login') ?>'> -->
    <?php echo validation_errors();

    echo form_open(site_url('login'),'class="form-signin"') ?>
    <h2 class="form-signin-heading">Por favor faça o login</h2>
    <label for="inputEmail" class="sr-only">Email ou usuário</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Email ou usuário" name="usuario" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>

    <input type='hidden' name='login' value='sim' />

    <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
    </br>
    <?php if(isset($resultado)):
      echo $resultado;
    endif;
    ?>
  </form>

</div> <!-- /container -->
<?php
