<div class="container" >
  <?php //$cabecalho; ?>
  <div class="col-sm-offset-3 col-sm-4">
    <?=$resultado_excluir?>


    <table class="table table-hover">
      <thead>
        <div class="row">
          <tr>
            <th>Descrição</th>
            <th class="text-center" colspan="2"><a class="btn btn-success" href="<?=site_url('admin_control/marcas/inserir')?>"><i class="fa fa-plus" aria-hidden="true"></i> Inserir</a></th>
          </tr>
        </div>
   </thead>
     <tbody>


       <?php foreach($marcas as $idx => $dado): ?>
         <?php $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.location.href='".site_url('admin_control/marcas/excluir/'.$dado->id)."'"?>
         <div class="row">
           <a href="#">
             <tr>
                 <td><?=$dado->descricao ?></td>
               <td>
               <a class="btn btn-danger" onclick="<?=$vJavascript?>">
                 <i class="fa fa-trash-o fa-lg"></i> Excluir</a>
               </td>
               <td>
                 <a class="btn btn-primary" href="<?=site_url('admin_control/marcas/editar/'.$dado->id) ?>">
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
