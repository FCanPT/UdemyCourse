<?php

class Home extends CI_Controller {
    
    public function index() {
        
        if($this->session->userdata('logged_in')){
                   
            $user_id = $this->session->userdata('user_id');

            $this->load->model('project_model');
            $data['projects'] = $this->project_model->get_allProjects($user_id);    

            $data['main_view'] = 'projects/index';
        
            $this->load->view('layouts/main', $data);  
        } else {
        
        $data['main_view'] = 'home_view';
        
        $this->load->view('layouts/main', $data);  
        
        }
    }
    
     public function logout() {
        
        $data['main_view'] = 'home_view';
        $data['logout_success'] = 'You are now logged out';
        
        $this->load->view('layouts/main', $data);  
    }
}
