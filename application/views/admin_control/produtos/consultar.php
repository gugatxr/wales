<div class="container" >
  <?php //$cabecalho; ?>
  <div class="col-md-offset-4 col-md-4 text-center ">
    <?=$resultado_excluir?>
  </div>
  <div class="col-sm-offset-3 col-sm-4">
    <table class="table table-hover">
      <thead>
        <div class="row">
          <tr>
            <th>Descrição</th>
            <th>Valor Venda</th>
            <th>Quantidade</th>
            <th>Mostra Loja</th>
            <th class="text-center" colspan="2"><a class="btn btn-success" href="<?=site_url('admin_control/produtos/inserir')?>"><i class="fa fa-plus" aria-hidden="true"></i> Inserir</a></th>
          </tr>
        </div>
   </thead>
     <tbody>


       <?php foreach($produtos as $idx => $dado): ?>
         <?php $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.location.href='".site_url('admin_control/produtos/excluir/'.$dado->id)."'"?>
         <div class="row">
           <a href="#">
             <tr>
                 <td><?=$dado->descricao ?></td>
                 <td><?=$dado->vlr_venda ?></td>
                 <td><?=$dado->quantidade ?></td>
                 <td><?=$dado->mostra_loja ?></td>
               <td>
               <a class="btn btn-danger" onclick="<?=$vJavascript?>">
                 <i class="fa fa-trash-o fa-lg"></i> Excluir</a>
               </td>
               <td>
                 <a class="btn btn-primary" href="<?=site_url('admin_control/produtos/editar/'.$dado->id) ?>">
                   <i class="fa fa-pencil fa-lg"></i>Editar</a>

               </td>
             </tr>
           </a>
         </div>
      <?php endforeach; ?>
     </tbody>
   </table>
   </div>
</div>
