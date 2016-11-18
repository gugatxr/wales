<div class="container" >
  <?php //$cabecalho; ?>
  <div class="col-sm-offset-3 col-sm-4">
    <?=$resultado_excluir?>


    <table class="table table-hover">
      <thead>
        <div class="row">
          <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Email</th>
            <th class="text-center" colspan="2"><a class="btn btn-success" href="<?=site_url('admin_control/fornecedores/inserir')?>"><i class="fa fa-plus" aria-hidden="true"></i> Inserir</a></th>
          </tr>
        </div>
   </thead>
     <tbody>


       <?php foreach($fornecedores as $idx => $dado): ?>
         <?php $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.location.href='".site_url('admin_control/fornecedores/excluir/'.$dado->id)."'"?>
         <div class="row">
           <a href="#">
             <tr>
                 <td><?=$dado->nome ?></td>
                 <td><?=$dado->telefone ?></td>
                 <td><?=$dado->endereco ?></td>
                 <td><?=$dado->email ?></td>
               <td>
               <a class="btn btn-danger" onclick="<?=$vJavascript?>">
                 <i class="fa fa-trash-o fa-lg"></i> Excluir</a>
               </td>
               <td>
                 <a class="btn btn-primary" href="<?=site_url('admin_control/fornecedores/editar/'.$dado->id) ?>">
                   <i class="fa fa-pencil fa-lg"></i> Editar</a>

               </td>
             </tr>
           </a>
         </div>
      <?php endforeach; ?>
     </tbody>
   </table>
   </div>
</div>
