<div class="container" >
  <?=$cabecalho; ?>
  <div class="col-sm-offset-4 col-sm-4">
    <?php if(isset($excluir)){ echo $excluir; } ?>
    <table class="table table-hover">
      <thead>
     <tr>
       <th>Nome</th>
       <th>Usuário</th>
       <th>Permissão</th>
       <th class="text-center" colspan="2"><a class="btn btn-success" href="<?=site_url('usuarios/adicionar')?>"><i class="fa fa-plus" aria-hidden="true"></i> Inserir</a></th>
     </tr>
   </thead>
   <tbody>


     <?php
     foreach ($usuarios as $idx => $dado) {
       $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.conteudo.location.href='".site_url('usuarios/excluir')."?id=".$dado['id']."'";
       echo '<tr>
               <td>'.$dado['nome'].'</td>
               <td>'.$dado['usuario'].'</td>
               <td>'.$dado['descricao'].'</td>
               <td>'.
               '<a href="'.site_url('usuarios/excluir')."?id=".$dado['id'].'" class="btn btn-danger" onclick="'.$vJavascript.'" >'
              //  '<a  class="btn btn-danger" onclick="'.$vJavascript.'" >'

               .'
                 <i class="fa fa-trash-o fa-lg"></i> Excluir</a>
               </td>
               <td>
                 <a class="btn btn-primary" href="'.site_url('usuarios/editar').'?id='.$dado['id'].'">
                   <i class="fa fa-pencil fa-lg"></i> Editar</a>

               </td>
             </tr>';
     }

     ?>
     <tbody>
   </table>
   </div>
</div>
