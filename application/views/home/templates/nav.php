<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu Compacto</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Projeto Wales </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?=site_url('') ?>">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=site_url('carrinho') ?>"><i class="fa fa-lg fa-shopping-cart" alt="Carrinho de compras"></i> <?=$quantidade_carrinho?></a></li>
            <li><a href="<?=site_url('login') ?>">Login <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
