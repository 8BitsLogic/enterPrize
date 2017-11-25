<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signup
 *
 * @author Syed Tausif Ali Shah
 */
class Signup extends Basecontroller {

    public $data;
    private $signupObj;
    private $agentObj;

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Signupmodel', 'admin/Agentmodel'));
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->data = array(
            'page' => array('title' => 'Agent Signup'),
            'flashKey' => 'message_signup',
            'view' => 'site/signup/'
        );

        $this->signupObj = new Signupmodel;
        $this->agentObj = new Agentmodel;
        
    }

    public function index($activationKey = NULL) {
        if(is_null($activationKey)){
            return redirect(base_url());
        }
        
        $agentInvite = $this->signupObj->verifyAgentInvite($activationKey);
        if (!$agentInvite) {
            $view = 'invalid_invitation';
        } else {
            $this->data['activationKey'] = $activationKey;
            $view = 'form_agent_signup';
            $this->data['enumValues'] = $this->getFieldEnumValues();
        }
        $this->loadSiteBasicHeaderLayout($this->data['view'] . $view, $this->data);
    }

    private function getFieldEnumValues() {
        $table = 'tbl_agent';
        $response['visa_status'] = $this->getEnumValues($table, 'agent_visa_status');
        $response['gender'] = $this->getEnumValues($table, 'agent_gender');
        $response['education'] = $this->getEnumValues($table, 'agent_education');
        return $response;
    }

    public function signupPost($activationKey) {
        $agentInvite = $this->signupObj->verifyAgentInvite($activationKey);
        if (!$agentInvite) {
            $view = 'invalid_invitation';
            $this->loadSiteLayout($this->data['view'] . $view, $this->data);
        }
        if ($this->input->post('submit')) {
            $this->validateSignupPost() ? '' : $this->index($activationKey);
            $agentArr = array(
                'activationKey' => $activationKey,
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'nationality' => $this->input->post('nationality'),
                'passport' => $this->input->post('pas_number'),
                'visa_status' => $this->input->post('vstatus'),
                'email' => $agentInvite['invite_email'],
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'dobDB' => date('Y-m-d', strtotime($this->input->post('dob'))),
                'education' => $this->input->post('education'),
                'ccity' => $this->input->post('city_current'),
                'ccity_area' => $this->input->post('city_area'),
                'work_city' => $this->input->post('city_work'),
                'status' => 'active');
            $this->saveNewAgent($agentArr);
        }else{
            return redirect(base_url('signup/'.$activationKey));
        }
    }

    private function saveNewAgent($agentArr) {
        $agentArr['username'] = $this->getUsername(array($agentArr['fname'], $agentArr['lname'], $agentArr['dob']));
        $agentArr['password'] = uniqid();
        $result = $this->agentObj->createAgent($agentArr);
        if ($result['query_status']) {
            $this->signupObj->delInvite($agentArr['email']);
            $this->sendSignupEmail($agentArr);
            $message = str_replace($this->alertMessages['str_replace'], 'Welcome to our site', $this->alertMessages['success']);
            $this->newAgentLogin($result['agent_id']);
            $redirectURL = 'dashboard';
        } else {
            $message = str_replace($this->alertMessages['str_replace'], $result['error_info'][0] . ':' . $result['error_info'][2], $this->alertMessages['warning']);
            $redirectURL = 'signup/' . $agentArr['activationKey'];
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url($redirectURL));
    }

    private function validateSignupPost() {
        $enumVals = $this->getFieldEnumValues();
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[50]|alpha');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[50]|alpha');
        $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[3]|max_length[50]|alpha');
        $this->form_validation->set_rules('dob','Date of Birth','trim|required|callback_match_date',array('match_date' => '%s should in be in "DD/MM/YYYY" format'));
        $this->form_validation->set_rules('gender','Gender','trim|required|in_list['. implode(',', $enumVals['gender']).']');
        $this->form_validation->set_rules('phone','Phone number','trim|required|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('vstatus','Visa Status','trim|required|in_list['. implode(',', $enumVals['visa_status']).']');
        $this->form_validation->set_rules('pas_number','Emirates ID/ Passport Number','trim|required|alpha_numeric');
        $this->form_validation->set_rules('education','Education','trim|in_list['. implode(',', $enumVals['education']).']');
        $this->form_validation->set_rules('city_current','Current City','trim|required|alpha');
        $this->form_validation->set_rules('city_area','City Area','trim|required|alpha');
        $this->form_validation->set_rules('city_work','Work City','trim|alpha');
        return $this->form_validation->run() ? TRUE : FALSE;
    }
    
    private function sendSignupEmail($param) {
        $email = array(
            'to' => $param['email'],
            'subject' => 'Welcome to Site',
            'message' => 'Welcome to site your info here <br> email : ' . $param['email'] . ' <br> password : ' . $param['password']
        );

        return $this->sendEmail($email);
    }
    
    public function newAgentLogin($id) {
        $agentDetail = $this->agentObj->getAgentDetail($id);
        $this->session->set_userdata('agent_detail', $agentDetail);
        return; 
    }

}
