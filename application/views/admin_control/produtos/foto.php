<div class="container">



  <?php echo $error;?>

    <?php echo form_open_multipart('admin_control/produtos/fotos/'.$id);?>

      <input type="file" name="userfile" size="20" />

      <br><br>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input name="descricao" type="text" class="form-control" id="descricao">
      </div>
      <input class="btn btn-default" type="submit" value="Enviar" />
      <a href="<?=site_url('admin_control')?>" class="btn btn-info">Home</a>
    </form>

</div>
