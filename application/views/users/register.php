<h2>
<?= $title ?>
</h2>
<?php
echo validation_errors(); ?>
<?php echo form_open('index.php/users/register');?>
    <div class="form_group">
    <label>name</label>
    <input type="text" class="form-control" name="name" placeholder="enter your name" >
    </div>
    <div class="form_group">
    <label>zipcode</label>
    <input type="text" class="form-control" name="zipcode" placeholder="enter your zipcode" >
    </div>
    <div class="form_group">
    <label>username</label>
    <input type="text" class="form-control" name="username" placeholder="enter a username" >
    </div>
    <div class="form_group">
    <label>email</label>
    <input type="email" class="form-control" name="email" placeholder="enter email" >
    </div>
    <div class="form_group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="password" >
    </div>
    <div class="form_group">
    <label>confirm password</label>
    <input type="password" class="form-control" name="password2" placeholder="confirm password" >
    </div>
    <button type="submit" class="btn btn-danger">register</button>

    <?php echo form_close();?>
