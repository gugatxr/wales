<div class="container">
  <?=$resultado_inserir ?>
  <div class="row">
    <div class="col-sm-1">
      <a class="btn btn-primary" href="<?=site_url('admin_control/usuarios'); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
    </div>
    <div class="col-sm-5">
      <?php echo validation_errors();
      echo form_open(site_url('admin_control/usuarios/adicionar')) ?>

      <div class="form-group">
        <label for="nome">Nome:</label>
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Clara da Silva">
      </div>

      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input name="usuario" type="text" class="form-control" id="usuario">
      </div>

      <div class="form-group">
        <label for="senha">Senha:</label>
        <input name="senha" type="password" class="form-control" id="senha">
      </div>
      <br>
      </div>
      <div class="col-md-5 ">

        <div class="form-group">
          <label for="email">Email:</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="clara@gmail.com">
        </div>
        <label for="permissoes">Permissão:</label></br>
        <select  name="permissao" class="form-control" id="permissoes">
          <?php
          foreach ($permissoes as $key => $dados) {
            //trata o valor retornado de list_groups() para array. Ele vem retornado um array de objetos

            $dados = get_object_vars($dados);
            echo '<option value="'.$dados['id'].'">'.
            $dados['descricao'];
            '</option>';
          } ?>
        </select>
        <br>
        <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
        </div>
      </div>
    </div>

    </form>

  </div>
</div>
