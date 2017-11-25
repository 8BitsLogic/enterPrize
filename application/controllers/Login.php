<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Syed Tausif Ali Shah
 */
class Login extends Basecontroller{
    
    private $data;
    private $loginObj;
    
    public function __construct() {
        parent::__construct();
        $this->uri->segment(1) == 'logout' ? '' : $this->checkAgentLogin() ? redirect(base_url()) : '';
        
        $this->load->model(array('Loginmodel'));

        $this->data = array(
            'page' => array('title' => 'Agent Login'),
            'flashKey' => 'message_login',
            'view' => 'site/login/'
        );

        $this->loginObj = new Loginmodel;
        
    }
    
    public function index() {
        $this->loadLayoutnoHF($this->data['view'].'login', $this->data);
    }
    
    public function tryLogin() {
        $redirectUrl = 'login';
        if($this->input->post('submit')){
            $this->validateLoginPost()? '' : $this->index();
            $userLogin = $this->loginObj->tryUserLogin($this->input->post());
            if(is_array($userLogin) && $userLogin['agent_status'] == 'active'){
                $this->session->set_userdata($this->agentSessionKey, $userLogin);
                $message = str_replace($this->alertMessages['str_replace'], 'Login Successful', $this->alertMessages['success']);
                $redirectUrl = '';
            }elseif (is_array($userLogin) && $userLogin['agent_status'] == 'inactive') {
                $message = str_replace($this->alertMessages['str_replace'], 'Your account has been suspended, contact our support for more details.', $this->alertMessages['danger']);
                $redirectUrl = 'login';
            }
            else{
                $message = str_replace($this->alertMessages['str_replace'], 'Email or password is incorrect. Try again', $this->alertMessages['danger']) ;
            }
            
        }else{
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again.', $this->alertMessages['warning']);
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url($redirectUrl));
    }
    
    private function validateLoginPost(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        return $this->form_validation->run() ? TRUE : FALSE;
    }
    
    public function logout() {
        session_destroy();
        return redirect(base_url());
    }
}
