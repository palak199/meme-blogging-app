<?php
class Rating_model extends CI_Model{

    public function __construct(){
        $this->load->database();}

        //$fetchlikes=$this->db->query('select * from rating where post_id=3');
        
        public function add_like(){
            $postid=$this->input->post('postid');
            $userid=$this->input->post('userid');
            $q=$this->db->query('select * from rating where post_id="'.$postid.'" AND  user_id="'.$userid.'"')->num_rows();
            if ($q==0){
                $data=array(

                'post_id'=>$this->input->post('postid'),
                'user_id'=>$this->input->post('userid'),
                'rating'=>1,
            );
            $this->db->insert('rating',$data);
            $this->db->query('update posts set like_count=like_count+1 where id="'.$postid.'"');}
            $this->db->select('like_count');
            $this->db->from('posts');
            $this->db->where('id',$postid);
            return $this->db->get()->row()->like_count;
                 
        }
        
        
        }
        
        
    