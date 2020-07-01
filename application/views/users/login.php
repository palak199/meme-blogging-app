<?php
echo validation_errors(); ?>
<?php echo form_open('index.php/users/login');?>
<div class="row jumbotron">
<div class="col-8 offset-2">
<h1 class="text-center"><?php echo $title;?></h1>
<form">
  <div class="form-group">
    <input type="text" class="col-4 offset-4 form-control" name="username" required autofocus placeholder="username">
  </div>
  <div class="form-group">
    <input type="password" class="col-4 offset-4 form-control" name="password" required autofocus placeholder="Password">
  </div>
  <button type="submit" class="col-4 offset-4 btn btn-primary d-block">Login</button>
</form>
</div>
</div>
   <?php echo form_close();?>