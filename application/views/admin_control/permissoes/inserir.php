<div class="container">
    <?=$cabecalho;
    echo validation_errors();
    echo form_open('permissoes/inserir') ?>
  <div class="row text-centered">
    <div class="col-md-4 col-md-offset-4 ">
      Nome da permissão <input type="text" name="descricao" required >
    <hr class="hr-small">
  </div>
  </div>
  <div class="row text-center">
    <div class="col-md-offset-4 col-md-5 col-md-offset-3">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome Tabela</th>
            <th>Visualizar</th>
            <th>Inserir</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Usuários</td>
            <td><input type="checkbox" name="usuarios_visualizar" value="1" /></td>
            <td><input type="checkbox" name="usuarios_inserir" value="1" /></td>
            <td><input type="checkbox" name="usuarios_editar" value="1" /></td>
            <td><input type="checkbox" name="usuarios_excluir" value="1" /></td>
          </tr>
          <tr>
            <td>Permissões</td>
            <td><input type="checkbox" name="permissoes_visualizar" value="1" /></td>
            <td><input type="checkbox" name="permissoes_inserir" value="1" /></td>
            <td><input type="checkbox" name="permissoes_editar" value="1" /></td>
            <td><input type="checkbox" name="permissoes_excluir" value="1" /></td>      </tr>
        </tbody>
      </table>
      <!--  div table-->
    </div>

    <!--  div row-->
  </div>

  <div class="col-md-offset-4 col-md-5 col-md-offset-3">
    <div class="btn-group btn-group-lg" role="group" aria-label="...">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    </div>
    <a class="btn btn-primary" href="<?=site_url('permissoes'); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
  </div>
  </form>
<!-- div container -->
</div>
