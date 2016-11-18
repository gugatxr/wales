<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
<script>
 $( function() {
   var availableTags = [
     "ActionScript",
     "AppleScript",
     "Asp",
     "BASIC",
     "C",
     "C++",
     "Clojure",
     "COBOL",
     "ColdFusion",
     "Erlang",
     "Fortran",
     "Groovy",
     "Haskell",
     "Java",
     "JavaScript",
     "Lisp",
     "Perl",
     "PHP",
     "Python",
     "Ruby",
     "Scala",
     "Scheme"
   ];
   $( "#tags" ).autocomplete({
     source: availableTags
   });
 } );
 </script>
</script>
<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <a class="btn btn-primary" href="<?=site_url('admin_control/marcas/'); ?>" ><i class="fa fa-chevron-left  fa-lg" ></i> Voltar</a>
    </div>
    <div class="col-md-4">
          <?php echo validation_errors();
          echo form_open(site_url('admin_control/marcas/inserir')) ?>

          <div class="form-group">
            <label for="nome">Nome:</label>
            <input name="nome" type="text" class="form-control" id="nome">
          </div>
          <div class="ui-widget">
            <label for="tags">Tags: </label>
            <input id="tags">
          </div>

          <label for="tipo_logradouro">Tipo Logradouro:</label></br>
          <input id="tipo_logradouro">
          <br>
          <div class="btn-group btn-group-lg" role="group" aria-label="cadastrar">
            <button class="btn btn-lg btn-primary btn-block text-center" type="submit">Cadastrar</button>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
            <label for="cnpj">CNPJ:</label>
            <input name="cnpj" type="text" class="form-control" id="cnpj">
          </div>

          <div class="form-group">
            <label for="logradouro">Logradouro:</label>
            <input name="logradouro" type="text" class="form-control" id="logradouro">
          </div>
          <div class="form-group">
            <label for="observacao">Observações:</label>
            <textarea name="observacao" type="text" class="form-control" id="observacao"></textarea>
          </div>
      </div>
    </div>

    </form>

  </div>
</div>
<script src="<?=base_url("assets/js/jquery.min.js") ?>"></script>
<script src="<?=base_url("assets/js/jquery-ui.min.js") ?>"></script>
