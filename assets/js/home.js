function like(id){
  $.ajax({
    
      type:"post",
      //url:"<?php echo base_url('Posts.php/like_post')?>",
      //url:"/like_post",
      data:"{id:id}",
      success:function(val){
        if(val==1){
        $("#like_count").html(val);
      }
      else {
        alert("err");
      }


      }
    
  });
}