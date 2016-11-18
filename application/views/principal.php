<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?=base_url('assets/img/banner/') ?>/1.jpg" alt="Chania"  height="345">
      </div>
      <div class="carousel-caption">
       <h3>Chania</h3>
       <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
     </div>

      <div class="item">
        <img src="<?=base_url('assets/img/banner/') ?>/2.png" alt="Chania"  height="345">
      </div>

      <div class="item">
        <img src="<?=base_url('assets/img/banner/') ?>/3.png" alt="Flower"  height="345">
      </div>

      <div class="item">
        <img src="<?=base_url('assets/img/banner/') ?>/4.jpg" alt="Flower"  height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><!-- carrosel slide -->
</div><!-- container -->
<div class="container text-center">
  <h2>Produtos em destaque</h2><small>Estes são os produtos mais vendidos da loja:</small>
</div><!-- container -->

<div class="container">
    <div class="col-md-2">
      <ul class="list-group">
        <li class="list-group-item">Desktop
          <ul class="list-group">
            <li class="list-group-item"><a href="#">Placa mãe</a></li>
            <li class="list-group-item"><a href="#">Processador</a></li>
          </ul>
        </li>
        <li class="list-group-item">Notebook
          <ul class="list-group">
            <li class="list-group-item"><a href="#">Memória RAM</a></li>
            <li class="list-group-item"><a href="#">HD</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- col -->

    <div class="col-xs-6 col-sm-4  col-md-10">
        <ul class="list-inline">
          <?php foreach($produtos as $idx => $produto):?>
            <li href="<?=base_url('assets/img/banner/') ?>/4.jpg" class="thumbnail">
              <img src="<?=base_url('assets/img/produtos/') ?>/processador-intel-3.jpg" alt="Processador Intel I3" style="height:150px">
              <p class="text-center"><?=$produto->descricao.' '.$produto->marca ?><br>
                Valor: <?=$produto->valor ?> <br>
                <a href="<?=site_url("carrinho/adicionar_carrinho/{$produto->id}") ?>" class="btn btn-primary">Adicionar ao carrinho</a>
              </p>
            </li>
          <?php endforeach ?>
        </ul>
      <!-- col -->
    </div>
<!--  container-->
</div>
