<div class="container">
<div class="col-md-offset-4">

<?php

echo validation_errors();

echo form_open('usuarios/editar') ?>

  <label for="nome">*Nome:</label>
    <input type="text" name="nome" value="<?php echo $usuario[0]['nome'] ?>" id="nome"/></br>

  <label for="usuario">*Usuário:</label>
    <input type="text" name="usuario" / value="<?php echo $usuario[0]['usuario'] ?>" id="usuario"></br>

  <label for="senha">Senha (Deixe em branco para manter a mesma):</label>
    <input type="password" name="senha"  id="senha"></br>

  <label for="email">*Email: </label>
    <input type="text" name="email" value="<?php echo $usuario[0]['email'] ?>" id="email"></br>

  <label for="permissoes">Permissão</label>
    <select  name="id_permissoes" id="permissoes">
      <?php
      foreach ($permissoes as $key => $dados) {
        echo '<option value="'.$dados['id'].'">'.
                $dados['descricao'];
              '</option>';
      } ?>

    </select></br><br>

    <input type="hidden" name="id_usuario" value="<?php echo $usuario[0]['id'] ?>">
  <input type="submit" name="submit" value="Editar" />
</form>
<a class="btn btn-primary" href="<?=base_url(); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
</div>
</div>
