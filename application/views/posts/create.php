<?=
 $title;
?> 
<?php echo validation_errors(); ?>
<?php 
#multipart lets you add different files
/*
-name in input tag is from where data is set into vars
*/
echo form_open_multipart('index.php/posts/create');?> 
<form>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
    <?php foreach($categories as $category): ?>
<option value="<?php echo $category['id']?>"><?php echo $category['name']; ?> 
    <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea type="password" class="form-control" name="body" placeholder="add text">
  </textarea>
  </div>
  <div class="form-group">
    <label>Upload Image</label>
    <?php # writing name="userfile" is compulsary n specific ?>
    <input type="file" class="form-control" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>