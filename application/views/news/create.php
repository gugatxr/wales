<h2><?php echo $title; ?></h2>

<?php echo validation_errors();?>

<?php echo form_open(site_url('controller/function/uri'));?>
  <!-- <form action='create' method='post' > -->
    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />
    <button>asdadij</button>
</form>



<?php echo uri_string() //base_url('news/local/123');?>
