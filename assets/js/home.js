function like(e){
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('Posts/addlike');?>",
        data: "Storyid="+storyid,
        success: function (response) {
         $("#like_"+storyid).html(response+" Likes");
          
        }
    });

}

