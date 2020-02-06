<h1><?=
$title
?></h1>
<div>
<?php
/*this lets you see all posts */
foreach($posts as $post) :
    ?>
    <div class="row">
    <div class="col-3">
    <h3><?php echo $post['title'] ?></h3>
    
    <img style="height:250px; width:250px;" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    <br>
    </div>
    <div class="col-9">  
    <p class="lead">
    <?php echo $post['body'] ?>
    </p>
    <strong>#<?php echo $post['name'] ?></strong> 
    <br>
    <a class="btn btn-danger" href="<?php echo site_url('index.php/posts/'.$post['slug']); ?>">Read more</a></p>
</div>
</div>
<br>
<?php endforeach;?>

