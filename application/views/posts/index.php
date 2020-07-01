
<div>


<?php if($this->session->userdata('logged_in')):?>
<h2 class="text-center text-success">welcome <?php echo ($this->session->userdata('username'));?></h2>
<?php endif?>
<?php
/*this lets you see all posts */
foreach($posts as $post) :

    ?>
    <div class="row m-4">
    <div class="col-12 col-sm-3 offset-md-3">
    <h3><?php echo $post['title'] ?></h3>
    <img 
    class="img-fluid" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    <br>
    </div>
    <div id="posts" class="col-md-3 mt-5">  
    <p class="lead">
    <?php echo $post['body'] ?> <br>
    </p>
    <strong>#<?php echo $post['name'] ?></strong> 
</div>
</div>
    <div class="row">
        <div class="col-12 col-sm-3 offset-4">
    <a class="btn btn-danger" href="<?php echo site_url('index.php/posts/'.$post['slug']); ?>">Read more</a>
</p><br>
</div>
<div class="col-12 col-sm-3">
    <?php if($this->session->userdata('logged_in')):?>
    <p><a id="a_<?php echo $post['id'];?>" onclick="savelike(<?php echo $post['id'];?>,<?php echo $this->session->userdata('logged_in');?>)">
     <i class="btn fa fa-thumbs-up"></i>
     <span id="like_<?php echo $post['id'];?>"> 
     <?php echo $post['like_count']. " likes";?>      
     </span>
     </a></p>
    </div>
    </div> 
     <?php else: ?>
   <p class="text-danger">seems like you are not logged in</p>
   <?php endif ?>  
</div>

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
    
                $("#like_"+postid).html(" you and " +response+ " others Liked this");
                  
                },
                error: function(err,textStatus){
                    alert(err);
                }              

            });
            
}
</script>