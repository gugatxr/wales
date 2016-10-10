<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$title ?></title>

  <!-- Bootstrap Core CSS -->

  <link href="<?=base_url("assets/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <!-- <link href="<?=base_url("assets/vendor/metisMenu/metisMenu.min.css") ?>" rel="stylesheet"> -->

  <!-- Custom CSS -->
  <!-- <link href="<?=base_url("assets/dist/css/sb-admin-2.css")?>" rel="stylesheet"> -->

  <!-- Custom Fonts -->
  <link href="<?=base_url("assets/vendor/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css">

  <!--  Meu css -->
  <link href="<?=base_url("assets/css/my_style.css") ?>" rel="stylesheet" type="text/css">

  <!--  carrega css que altera os selects dos forms-->
  <link href="<?=base_url("assets/css/bootstrap-select.min.css") ?>" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->



  <link href="<?=base_url("assets/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
</head>
<body >
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url() ?>">Projeto Wales </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Site</a></li>
              <li><a href="#about">Email</a></li>
                <?php
              if ($this->aauth->is_loggedin()){
                echo '<li><a href="'.base_url('index.php/fornecedores').'">Fornecedores</a></li>';
              echo '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configurações <span class="caret"></span></a>
                <ul class="dropdown-menu">

                  <li><a href="'.site_url("usuarios").'">Usuários</a></li>

                  <li role="separator" class="divider"></li>
                  <li><a href="'.site_url('permissoes').'">Permissões</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Estatisticas</li>
                  <li><a href="#">Últimos usuários logados</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a "> '.date("d/m/Y").'</a></li>

              <li><a >'.$this->session->nome.'</a></li>
                <li><a href="'.base_url('index.php/login/logout').'">Sair</a></li>';
              }
              ?>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
