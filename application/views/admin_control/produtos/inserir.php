<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <a class="btn btn-primary" href="<?=site_url('admin_control/produtos/'); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
    </div>
    <div class="col-sm-4">
      <?php echo validation_errors();
      echo form_open(site_url('admin_control/produtos/inserir')) ?>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input name="descricao" type="text" class="form-control" id="descricao">
      </div>

      <div class="form-group">
        <label for="vlr_compra">Valor de Compra:</label>
        <input name="vlr_compra" type="number" class="form-control" id="vlr_compra">
      </div>

      <div class="form-group">
        <label for="vlr_venda">Valor de venda:</label>
        <input name="vlr_venda" type="number" class="form-control" id="vlr_venda">
      </div>
      <div class="form-group">
        <label for="codigo_barras">Código de barras:</label>
        <input name="codigo_barras" type="number" class="form-control" id="codigo_barras">
      </div>
      <br>
      </div>
      <div class="col-md-4">

        <div class="form-group">
          <label for="quantidade">Quantidade:</label>
          <input name="quantidade" type="number" class="form-control" id="quantidade" value="0">
        </div>
        <label for="marca">Marca:</label></br>
        <select  name="marca" class="form-control" id="marca">
          <?php
          foreach ($marcas as $key => $dados) {
            //trata o valor retornado de list_groups() para array. Ele vem retornado um array de objetos

            echo "<option value='$dados->id'>".
            $dados->descricao.
            '</option>';
          } ?>
        </select>
        <br>
        <label>Exibe na loja virtual:</label>
        <div class="radio">
          <label><input name="mostra_loja" type="radio" id="mostra_loja" value="1">Sim</label>
          <label><input name="mostra_loja" type="radio" id="mostra_loja" value="0" checked="">Não</label>
        </div>

        <br>
        <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
        </div>
      </div>
    </div>

    </form>

  </div>
</div>
