<?php
/* all the users/ urls are controlled here 
-to create sessions
-to register
-to login
-to logout
-sessions are enabled using helpers of autoload
*/?>
<?php   
    class Users extends CI_Controller{
        public function register(){
            $data['title']="register";
            $this->form_validation->set_rules('name','Name','required'); #required field is put using this
            $this->form_validation->set_rules('username','userName','required|callback_check_username_exists'); 
            #this is custom created fxn so keyword callback_fxn_name format  is used  
            $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','confirm password','required','matches[password]');
            if($this->form_validation->run()===FALSE){  #checking if the html form is verified
                $this->load->view('templates/header');
                $this->load->view('users/register',$data);
                $this->load->view('templates/footer');
    

            }
            else{
                $enc_password=md5($this->input->post('password')); #storing the password in enc way
                $this->user_model->register($enc_password); 
                $this->session->set_flashdata('user_registered','you are registered u can now log in'); #this customizes the views
                redirect('index.php/posts');
            }

    }
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','oops that username is already taken'); #ensuring if two people dont use same userame
            if($this->user_model->check_username_exists($username)){
                return true;
    }
             else
                return false;
        
    }
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','oops that email is already in use'); #same here
            if($this->user_model->check_email_exists($username)){
            return true;
    }
            else
            return false;
        
    }
    #login view controller
    public function login(){
        $data['title']="login";
        $this->form_validation->set_rules('username','userName','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()===FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');


        }
        else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $user_id=$this->user_model->login($username,$password);
            if($user_id){
                $userdata=array(
                    'user_id'=>$user_id,
                    'username'=>$username,
                    'password'=>$password,
                    'logged_in'=>true
                );
                $this->session->set_userdata($userdata);
                $this->session->set_flashdata('user_loggedin','you are logged in');
                redirect('index.php/posts');


            }
            else{
                $this->session->set_flashdata('login_failed','invalid username or password');
                redirect('index.php/users/login');

            }
            $this->session->set_flashdata('user_loggedin','you are registered you are now logged in');
            redirect('index.php/posts');
        }

}
#logout
public function logout(){
    #session ending is done by unsetting all values
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('user_name');
    $this->session->set_flashdata('user_loggedout','you are now loggedout');
    redirect('index.php/users/login');
}

   
    }