<?php
/* this is view of specific post and for its owner, there is an option of editing and deleting as well*/
?>
<h2>
<?php echo $post['title'];?></h2>
<div>
<?php echo $post['body'];?>
</div>
<div>
<img style="height:250px; width:250px;" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>">

</div>
<?php if($this->session->userdata('user_id')==$post['user_id']): ?>
<?php echo form_open('index.php/posts/delete/'.$post['id']);?>
<input type="submit" value="delete" class="btn btn-danger">
</form>
<a class="btn btn-default" href="<?php echo base_url();?>index.php/posts/edit/<?php echo $post['slug'];?>">Edit</a>
<?php endif;?>
<hr>

<h3>comments</h3>
<?php if($comments): ?>
<?php foreach($comments as $comment): ?>
<div>
<p><?php echo $comment['body'];?></p>
<small>
by [<?php echo $comment['name'];?>]</small>
</div>
<?php endforeach; ?>
<?php else:?>
<p> no comments yet</p>
<?php endif;?>
<hr>
<h3>add comment</h3>
<?php /*letting one add a comment*/?>
<?php
echo validation_errors(); ?>
<?php echo form_open('index.php/comments/create/'.$post['id']);?>
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
    <label>body</label>
    <textarea type="text" name="body" class="form-control">
    </textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']?>">
    <button class="btn btn-primary" type="submit">Submit</button>

</form>