<div class="container" >
  <?=$cabecalho; ?>
  <div class="col-sm-offset-4 col-sm-4">
    <?php if(isset($excluir)){ echo $excluir; } ?>
    <table class="table table-hover">
      <thead>
     <tr>
       <th>Nome</th>
       <th class="text-center" colspan="2"><a class="btn btn-success" href="<?=site_url('permissoes/inserir'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Inserir</a></th>
     </tr>
   </thead>
   <tbody>


     <?php
     foreach ($permissoes as $idx => $dado) {
       echo '<tr>
               <td>'.$dado['descricao'].'</td>
               <td>
               <a class="btn btn-danger" href="'.site_url('permissoes/excluir').'?id='.$dado['id'].'">
                 <i class="fa fa-trash-o fa-lg"></i> Excluir</a>
               </td>
               <td>
                 <a class="btn btn-primary" href="'.site_url('permissoes/editar').'?id='.$dado['id'].'">
                   <i class="fa fa-pencil fa-lg"></i> Editar</a>

               </td>
             </tr>';
     }
     ?>
     <tbody>
   </table>
   </div>
</div>
