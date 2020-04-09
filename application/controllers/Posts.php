<?php 
    class Posts extends CI_Controller{
        public function index(){
            $data['title']='Latest posts';
            $data['posts']=$this->post_model->get_posts();
            //$data['ratings']=$this->post_model->get_likes();
            $this->load->view('templates/header');
            $this->load->view('posts/index',$data);
            $this->load->view('templates/footer');
            
        }
        
        public function view($slug=NULL){
            $data['post']=$this->post_model->get_posts($slug);
            $post_id=$data['post']['id'];
            $data['comments']=$this->comment_model->get_comments($post_id);
            if(empty($data['post'])){
                show_404();
            }
            $data['title']=$data['post']['title'];
            $this->load->view('templates/header');
            $this->load->view('posts/view',$data);
            $this->load->view('templates/footer');
        }

        public function create(){
            if(!$this->session->userdata('logged_in')){
                redirect('index.php/users/login');
            }
            $data['title']='Create Post';
            $data['categories']=$this->post_model->get_categories();
            $this->form_validation->set_rules('body','Body','required');
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()===FALSE){
            $this->load->view('templates/header');
            $this->load->view('posts/create',$data);
            $this->load->view('templates/footer');

        }
        else{
            #uploading imgs
            #but you need to give access to public of the destination directory
            $config['upload_path']='./assets/images/posts';
            $config['max_width']='2000';
            $config['max_height']='2000';
            $config['max_size']='2048';
            $config['allowed_types']='jpg|gif|png';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('userfile')){
                $errors=array('error'=>$this->upload->display_errors());
                $post_image='noimage.jpg';
                echo $errors['error'];
            }
                else{
                    $data=array('upload_data'=>$this->upload->data());
                    $post_image=$_FILES['userfile']['name'];
            }
            $this->post_model->create_post($post_image);
            $this->session->set_flashdata('post_created','post created');
    

            redirect('index.php/posts');
        }
    }
    public function delete($id){
        if($this->session->userdata('user_id')!=$this->post_model->get_posts($slug)['user_id'])
        redirect('index.php/posts');
        if(!$this->session->userdata('logged_in')){
            redirect('index.php/users/login');
        }
        $this->post_model->delete_post($id);
        $this->session->set_flashdata('post_deleted','post has been deleted');

        redirect('index.php/posts');
            
    }
    public function edit($slug){
        if(!$this->session->userdata('logged_in')){
            redirect('index.php/users/login');
        }
        if($this->session->userdata('user_id')!=$this->post_model->get_posts($slug)['user_id'])
        redirect('index.php/posts');
        $data['post']=$this->post_model->get_posts($slug);
        $data['categories']=$this->post_model->get_categories();
            if(empty($data['post'])){
                show_404();
            }
            $data['title']='Edit Post';
            $this->load->view('templates/header');
            $this->load->view('posts/edit',$data);
            $this->load->view('templates/footer');
 
    }
    public function update(){
        if(!$this->session->userdata('logged_in')){
            redirect('index.php/users/login');
        }
        $this->post_model->update_post();
        $this->session->set_flashdata('post_updated','post has been updated');
        redirect('index.php/posts');
    }
    
  public function like(){

    $t=$this->rating_model->add_like();
    echo $t;
    
    
  }

}

  

