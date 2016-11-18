<div class="container">

<div class="col-xs-12 ">
  <div class="block-center">
    <table class="table">
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Marca</th>
          <th>Valor</th>
          <th class="text-center"><a class="btn btn-danger" href="<?=site_url('carrinho/limpar_carrinho') ?>">Limpar carrinho</a></th>
        </tr>

      </thead>
      <tbody>
        <?php
          $valor_total = 0;
          foreach ($carrinho as $produto):
          ?>
          <tr>
            <td>
              <?=$produto['descricao'] ?>
            </td>
            <td>
              <?=$produto['marca'] ?>
            </td>
            <td>
              <?=$produto['valor'] ?>
            </td>
            <td>
              <a class="btn btn-danger" href="<?=site_url("carrinho/remover_carrinho/{$produto['array_id']}") ?>">Remover</a>
            </td>
          </tr>
        <?php endforeach?>
        <tr>
          <td colspan="2">Total</td>
          <td><?=$valor_total_carrinho ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
