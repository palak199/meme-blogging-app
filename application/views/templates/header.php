<html>
<head>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<title>
memestation
</title>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">memestation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/posts">posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/categories">categories</a>
      </li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php 
    //checking if there's a login or not
    if(!$this->session->userdata('logged_in')):?>
    <li>
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/login">login</a>
    </li> 
    <li>
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/register">register</a>
    </li>
    <?php endif;?>
    <?php if($this->session->userdata('logged_in')):?>
    <li>
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/posts/create">create post</a>
    </li>
    <li>
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/categories/create">create category</a>
    </li>
    <li>
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/logout">logout</a>
    </li> 
    <?php endif;?>
    </ul>
    </div> 
</nav>
<?php
# all the alerts are mentioned here ?>
<div class="container">
<?php if($this->session->flashdata('user_registered')):?>
<?php echo '<p class="alert">'.$this->session->flashdata('user_registered').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('user_loggedout')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('post_created')):?>
<?php echo '<p class="alert">'.$this->session->flashdata('post_created').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('post_deleted')):?>
<?php echo '<p class="alert">'.$this->session->flashdata('post_deleted').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('post_updated')):?>
<?php echo '<p class="alert">'.$this->session->flashdata('post_updated').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('category_created')):?>
<?php echo '<p class="alert">'.$this->session->flashdata('category_created').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('login_failed')):?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
<?php endif ?>

<?php if($this->session->flashdata('user_loggedin')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
<?php endif ?>

</div>