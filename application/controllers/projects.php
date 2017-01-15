<?php

class Projects extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
        
        $this->session->set_flashdata('no_access', 'You are not allowed or not logged in.'); 
        
        redirect('home/index');
        } else {
            $this->load->model('project_model');
        }
    }
    
    public function index() {
        
        
        $data['projects'] = $this->project_model->get_projects();
        
        $data['main_view'] = 'projects/index';
                
        $this->load->view('layouts/main', $data);
    }
    
    public function display($project_id) {
        
        $data['project_data'] = $this->project_model->get_project($project_id);
        
        $data['main_view'] = 'projects/display';
                
        $this->load->view('layouts/main', $data);
    }

    public function create() {
        
        if ($this->input->post('aux')) {
            $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required' );
            $this->form_validation->set_rules('project_body', 'Project Description', 'trim|required' );
        }
              
        if ($this->form_validation->run() == FALSE){
            
            $data['main_view'] = "projects/create";
            $this->load->view('layouts/main', $data);
            
        }else{
            
            $data = array(
                        'project_user_id' => $this->session->userdata('user_id'),
                        'project_name' => $this->input->post('project_name'),
                        'project_body' => $this->input->post('project_body')
                        );
            
            $result = $this->project_model->create_project($data);
            $this->session->set_flashdata('project_created', 'Project created successfully');
            
            redirect('projects/index');
        }
    }  
       
    public function edit() {
        
        $project_id = $this->input->post('id');
        
        if ($this->input->post('aux')) {
            $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required' );
            $this->form_validation->set_rules('project_body', 'Project Description', 'trim|required' );
        }
        
        $data['project_data'] = $this->project_model->get_project($project_id);
        
        
        
        if ($this->form_validation->run() == FALSE){
            
            $data['main_view'] = "projects/edit";
            $this->load->view('layouts/main', $data);
            
        }else{

            if ($data['project_data']->project_name != $this->input->post('project_name')){
                $data['project_data']->project_name = $this->input->post('project_name');
                $go_update = TRUE;
            }
            if ($data['project_data']->project_body != $this->input->post('project_body')){
                $data['project_data']->project_body = $this->input->post('project_body');
                $go_update = TRUE;
            }
            
            if ($go_update) {
                $result = $this->project_model->edit_project($data['project_data']);
                $this->session->set_flashdata('project_edited', 'Project edited');
            } else {
                $this->session->set_flashdata('project_edited', 'Project not edited');
            }
            redirect('projects/index');
        }
    }
    
    public function delete() {
        
        if ($this->input->post('id')){
            $this->project_model->delete_project($this->input->post('id')); 
            $this->session->set_flashdata('project_edited', 'Project deleted');
        } else {
            $this->session->set_flashdata('project_edited', 'Project not deleted');
        }
        redirect('projects/index');
    }
}
