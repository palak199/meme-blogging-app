<?php
/* the user model that actually saves and retrieves data
-here you put actual queries
-you set data
-in auto load you mention all models used
*/
    class User_model extends CI_Model{
        public function register($enc_password){
            $data=array(
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'username'=>$this->input->post('username'),
                'password'=>$enc_password,
                'zipcode'=>$this->input->post('zipcode')
            );
            return $this->db->insert('users',$data);
        }

        public function check_username_exists($username){
            #the fxn we were using to add a new user requires this, if the database already has that username it returns false
            $query=$this->db->get_where('users',array('username'=>$username));
            if(empty($query->row_array())){
                return true;
    
            }
            else return false;
        }

        public function check_email_exists($email){
            $query=$this->db->get_where('users',array('email'=>$email));
            if(empty($query->row_array())){
                return true;
    
            }
            else return false;
        }

        public function login($username,$password){
            $this->db->where('username',$username); #finding person in db
            $this->db->where('password',$password); 
            $result=$this->db->get('users'); #storing it in $result
            if($result->num_rows()==1)
            #assigning user to id
            return $result->row(0)->id;
            else return false;
        }
    }