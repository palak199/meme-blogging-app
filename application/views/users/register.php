
<?php
echo validation_errors(); ?>
<?php echo form_open('index.php/users/register');?>
<div class="jumbotron">
<h2 class="text-center">
<?= $title ?>
</h2>
    <div class="form_group row justify-content-md-center">
    <label class="justify-center">name</label>
    <input type="text" class="col-12 col-sm-4 mb-1 form-control" name="name" placeholder="enter your name" >
    </div>
    <div class="form_group row justify-content-md-center">
    <label>zipcode</label>
    <input type="text" class="col-4 m-1 form-control" name="zipcode" placeholder="enter your zipcode" >
    </div>
    <div class="form_group row justify-content-md-center">
    <label>username</label>
    <input type="text" class="col-4 m-1 form-control" name="username" placeholder="enter a username" >
    </div>
    <div class="form_group row justify-content-md-center">
    <label>email</label>
    <input type="email" class="col-4 m-1 form-control form-control" name="email" placeholder="enter email" >
    </div>
    <div class="form_group row justify-content-md-center">
    <label>Password</label>
    <input type="password" class="col-4 m-1 form-control" name="password" placeholder="password" >
    </div>
    <div class="form_group row justify-content-md-center">
    <label>confirm password</label>
    <input type="password" class="col-4 m-1 form-control" name="password2" placeholder="confirm password" >
    </div>
    <button type="submit" class="offset-4 btn-lg btn-danger">register</button>
    </div>
    <?php echo form_close();?>
