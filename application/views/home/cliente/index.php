<div class="container" >
  <?php //$cabecalho; ?>
  <div class="col-sm-offset-3 col-sm-4">
    <?php if(isset($excluir)){ echo $excluir; } ?>

    <table class="table table-hover">
      <thead>
        <div class="row">
          <tr>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Permissão</th>
            <th class="text-center" colspan="2"><a class="btn btn-success" href="<?=site_url('admin_control/usuarios/adicionar')?>"><i class="fa fa-plus" aria-hidden="true"></i> Inserir</a></th>
          </tr>
        </div>
   </thead>
     <tbody>


       <?php foreach($usuarios as $idx => $dado): ?>
         <?php $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.location.href='".site_url('admin_control/usuarios/excluir')."/".$dado['id']."'" ?>
         <div class="row">
            <tr>
             <td><?=$dado['nome'] ?></td>
             <td><?=$dado['usuario']?></td>
             <td><?=$dado['email']?></td>
             <td><?=$dado['permissao']?></td>
             <td>
             <a class="btn btn-danger" onclick="<?=$vJavascript?>">
               <i class="fa fa-trash-o fa-lg"></i> Excluir</a>
             </td>
             <td>
               <a class="btn btn-primary" href="<?=site_url('admin_control/usuarios/editar') ?>/<?=$dado['id'] ?>">
                 <i class="fa fa-pencil fa-lg"></i> Editar</a>

             </td>
           </tr>
         </div>
      <?php endforeach; ?>
     </tbody>
   </table>
   </div>
</div>
