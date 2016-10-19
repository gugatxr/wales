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
              <li><a href="#">Email</a></li>
              <li><a href="<?=base_url('index.php/fornecedores') ?>">Fornecedores</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configurações <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?=site_url("admin_control/usuarios") ?>">Usuários</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?=site_url('admin_control/permissoes') ?>">Permissões</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a><?=date("d/m/Y") ?></a></li>
              <li><a ><?=$this->session->nome ?></a></li>
              <li><a href="<?=site_url('admin_control/login/logout')?>">Sair</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
<?php
