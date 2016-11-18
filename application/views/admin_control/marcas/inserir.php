<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <a class="btn btn-primary" href="<?=site_url('admin_control/marcas/'); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
    </div>
    <div class="col-md-offset-3 col-md-4">
      <?php echo validation_errors();
      echo form_open(site_url('admin_control/marcas/inserir')) ?>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input name="descricao" type="text" class="form-control" id="descricao">
      </div>

        <br>
        <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
          <button class="btn btn-lg btn-primary btn-block text-center" type="submit">Cadastrar</button>
        </div>
      </div>
    </div>

    </form>

  </div>
</div>
