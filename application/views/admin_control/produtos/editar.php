<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <a class="btn btn-primary" href="<?=site_url('admin_control/produtos/'); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
    </div>
    <div class="col-sm-4">
      <?php echo validation_errors();
      echo form_open(site_url("admin_control/produtos/editar/{$dados_produto[0]->id}")) ?>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input name="descricao" type="text" class="form-control" id="descricao" value="<?=$dados_produto[0]->descricao?>">
      </div>

      <div class="form-group">
        <label for="vlr_compra">Valor de Compra:</label>
        <input name="vlr_compra" type="number" class="form-control" id="vlr_compra" value="<?=$dados_produto[0]->vlr_compra?>">
      </div>

      <div class="form-group">
        <label for="vlr_venda">Valor de venda:</label>
        <input name="vlr_venda" type="number" class="form-control" id="vlr_venda" value="<?=$dados_produto[0]->vlr_venda?>">
      </div>
      <div class="form-group">
        <label for="codigo_barras">Código de barras:</label>
        <input name="codigo_barras" type="number" class="form-control" id="codigo_barras" value="<?=$dados_produto[0]->codigo_barras?>">
      </div>
      <br>
      </div>
      <div class="col-md-4">

        <div class="form-group">
          <label for="quantidade">Quantidade:</label>
          <input name="quantidade" type="number" class="form-control" id="quantidade" value="<?=$dados_produto[0]->quantidade?>">
        </div>
        <label for="marca">Marca:</label></br>
        <select  name="marca" class="form-control" id="marca">
          <?php
          foreach ($marcas as $key => $dados) {
            //trata o valor retornado de list_groups() para array. Ele vem retornado um array de objetos
            if($dados->id != $dados_produto[0]->id_marca):
              echo "<option value='$dados->id'>";
            else:
              echo "<option value='$dados->id' selected>";
            endif;
            echo $dados->descricao.
            '</option>';
          } ?>
        </select>
        <br>

        <label>Exibe na loja virtual:</label>
        <div class="radio">
          <?php if($dados_produto[0]->mostra_loja === '1'){ ?>
            <label><input name="mostra_loja" type="radio" id="mostra_loja" value="1" checked>Sim </label>
            <label><input name="mostra_loja" type="radio" id="mostra_loja" value="0"> Não</label>
          <?php }else{ ?>
            <label><input name="mostra_loja" type="radio" id="mostra_loja" value="1">Sim </label>
            <label><input name="mostra_loja" type="radio" id="mostra_loja" value="0" checked>Não</label>
          <?php } ?>
        </div>

        <br>
        <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
        </div>
        <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
          <a class="btn btn-lg btn-primary btn-block" href="<?=site_url('admin_control/produtos/adicionar_fotos')?>">Adicionar fotos produtos</a>
        </div>
      </div>
    </div>

    </form>

  </div>
</div>
