<h1><?=
$title
?></h1>
<div>


<?php if($this->session->userdata('logged_in')):?>
<h4>yo! <?php echo ($this->session->userdata('username'));?></h4>
<?php endif?>
<?php
/*this lets you see all posts */
foreach($posts as $post) :

    ?>
    <div class="row">
    <div class="col-md-3 offset-md-3">
    <h3><?php echo $post['title'] ?></h3>
    <img style="height:250px; width:250px;" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    <br>
    </div>
    <div id="posts" class="col-md-3 mt-5">  
    <p class="lead">
    <?php echo $post['body'] ?> <br>
    <?php echo $post['id'];?>
    </p>
    <strong>#<?php echo $post['name'] ?></strong> 
    <br>
    <a class="btn btn-danger" href="<?php echo site_url('index.php/posts/'.$post['slug']); ?>">Read more</a></p><br>
    <?php if($this->session->userdata('logged_in')):?>
    <p><a id="a_<?php echo $post['id'];?>" onclick="savelike(<?php echo $post['id'];?>,<?php echo $this->session->userdata('logged_in');?>)">
     <i class="fa fa-thumbs-up"></i>
     <span id="like_<?php echo $post['id'];?>"> 
     <?php echo $post['like_count']. " likes";?>      
     </span>
     </a>
    </p> 
    <?php else: ?>
    <p>log in first</p>
    <?php endif ?>   
</div>
<br>
</div>
<?php endforeach;?>
</div>
<div>

<script type="text/javascript">

function savelike(postid,userid){

        $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/posts/like",
                data: {
                    'postid':postid,
                    'userid':userid
                },
                //dataType:'JSON',
                success: function (response) {
    
                $("#like_"+postid).html(response+" you Liked this");
                  
                },
                error: function(err,textStatus){
                    alert(err);
                }              

            });
            
}
</script>