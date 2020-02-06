
<?php echo validation_errors(); ?>
<?php 
#multipart lets you add different files
echo form_open_multipart('index.php/categories/index');?> 
<form>
  <div class="form-group">
    <label>Name</label>
    <input type="test" placeholder="enter name" name="name" class="form-control">
    </div>
  <div class="form-group">
    <label>Upload Image</label>
    <?php # writing name="userfile" is compulsary n specific ?>
    <input type="file" class="form-control" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>