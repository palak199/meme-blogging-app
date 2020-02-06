<?php
/* view for letting a user edit his/her post */
?>

<?=
 $title;
?> 
<?php echo validation_errors(); ?>
<?php echo form_open('index.php/posts/update');?>
<form>
<input type="hidden" name="id" value="<?php echo $post['id']?>" >
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post['title']?>" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea type="password" class="form-control" name="body" value="<?php echo base_url("index.php/posts/edit".$post['slug'])?>">
    <?php echo $post['body']?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
    <?php foreach($categories as $category): ?>
<option value="<?php echo $category['id']?>"><?php echo $category['name']; ?> 
    <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
