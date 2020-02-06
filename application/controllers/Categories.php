<?php
/* this controls categories/
-lets a user create category
-lets all users view categories
-segregates posts acc their category
*/
     class Categories extends CI_Controller{
         public function index(){
             $data['title']='Categories';
             $data['categories']=$this->category_model->get_categories();
             $this->load->view('templates/header');
             $this->load->view('categories/index', $data);
             $this->load->view('templates/footer');

             

         }
         public function create(){
            if(!$this->session->userdata('logged_in'))
                redirect('index.php/users/login');
             $data['title']='Create category';
             $this->form_validation->set_rules('name','Name','required');
             if($this->form_validation->run()===FALSE){
                 $this->load->view('templates/header');
                 $this->load->view('categories/create');
                 $this->load->view('templates/footer');

             }
             else{
                 $this->category_model->create_category();
                 $this->session->set_flashdata('category_created','post has been created');

                 redirect('categories');
             }

         }
         public function posts($id){
             $data['title']=$this->category_model->get_category($id)->name;
             $data['posts']=$this->post_model->get_posts_by_category($id);
             
             $this->load->view('templates/header');
             $this->load->view('posts/index', $data);
             $this->load->view('templates/footer');

         }
         
     }