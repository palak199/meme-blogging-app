<h1><?=
$title
?></h1>
<div>
<?php
/*this lets you see all posts */
foreach($posts as $post) :
    ?>
    <?php
$like_count=$this->post_model->count_post_like($post->id);
$o=(object)$post;
?>
    <div class="row">
    <div class="col-md-3 offset-md-3">
    <h3><?php echo $post['title'] ?></h3>
    <img style="height:250px; width:250px;" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    <br>
    </div>
    <div id="posts" class="col-md-3 mt-5">  
    <p class="lead">
    <?php echo $post['body'] ?>
    </p>
    <strong>#<?php echo $post['name'] ?></strong> 
    <br>
    <a class="btn btn-danger" href="<?php echo site_url('index.php/posts/'.$post['slug']); ?>">Read more</a></p>
    <button onClick="like(<?php echo $post['id']?>)">like</button>
                    <!-- Like counter -->
<span id="like_count"><?php echo sizeof($like_count);?></span>
</div>
</div>
<br>
<?php endforeach;?>

<script src="<?php echo base_url();?>assets/js/home.js"></script>