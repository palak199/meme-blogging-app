<?php
echo validation_errors(); ?>
<?php echo form_open('index.php/users/login');?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h1 class="text-center"><?php echo $title;?></h1>
<form>
  <div class="form-group">
    <input type="text" class="form-control" name="username" required autofocus placeholder="username">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" required autofocus placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary d-block">Login</button>
</form>
</div>
</div>
   <?php echo form_close();?>