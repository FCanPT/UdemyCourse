<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller {
    
    public function show() {
        //$this->load->model('user_model');
        $data['results'] =  $this->user_model->get_users();
        
        $this->load->view('user_view', $data);
    }
    
    public function insert() {
        $username = 'peter';
        $password = 'secret';
        
        $this->user_model->create_users([
            'username' => $username,
            'password' => $password            
            ]);
    }
    
    public function update() {
        
        $id = 3;
        
        $username = 'William';
        $password = 'notsosecret';
        
        $this->user_model->update_users([
            'username' => $username,
            'password'=> $password
            ], $id);
        
    }
    
    public function delete() {
        
        $id = 3;
                
        $this->user_model->delete_users($id);
        
    }
    
    public function login() {
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]' );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]' );
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]' );
        
        if( $this->form_validation->run() == FALSE ){  //Não correu, algo aconteceu
            
            $data = array (
                'errors' => validation_errors()
                );
        
            $this->session->set_flashdata($data);
            redirect('home');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user_id = $this->user_model->login_user($username, $password);
            
            if ($user_id) {
                $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'logged_in' => true                    
                            );
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success', 'You are now logged in');
                redirect('home/index');
//                $data['main_view'] = 'home_view';
//                $this->load->view('layouts/main', $data);
            } else {
                $this->session->set_flashdata('login_failed', 'Sorry, You are not logged in.');
                redirect('home/index');
            }
        }
        
        
            
    }
    
    public function logout() {
        $this->session->sess_destroy();
        
        redirect('home/logout');
    }
    
    public function register() {
        
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]' );
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]' );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|valid_email' );
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]' );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]' );
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]' );
       
        if( $this->form_validation->run() == FALSE ){  //Não correu, algo aconteceu
                        
            $data['main_view']='users/register_view';
        
            $this->load->view('layouts/main', $data);
        } else {
                        
            if ($this->user_model->create_user()){
                $this->session->set_flashdata('register_success', 'You are now registered');
                //redirect('home/index');
                redirect('home/index');
            } else {
                $this->session->set_flashdata('register_failed', 'Sorry, You are registered.');
                redirect('home/index');
            }
        }
        
        
    }
}