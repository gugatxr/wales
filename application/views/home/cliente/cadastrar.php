<div class="container">
  <?=$resultado_inserir ?>
  <div class="row">
    <div class="col-sm-offset-4 col-sm-5">
      <?php echo validation_errors();
      echo form_open(site_url('cliente/cadastrar')) ?>

          <div class="form-group">
              <label for="nome">Nome:</label>
              <input name="nome" type="text" class="form-control" id="nome" placeholder="Clara da Silva">
          </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="clara@gmail.com">
              </div>
              <div class="form-group">
                <label for="senha">Senha:</label>
                <input name="senha" type="password" class="form-control" id="senha">
              </div>
              <br>
          <!-- /.col -->
          </div>
        <!-- /.row -->
        </div>
        <div class="col-xs-12 text-center">
            <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
            </div>
            <a class="btn btn-primary" href="<?=site_url(); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
        </div>
    </form>
  </div>
</div>
