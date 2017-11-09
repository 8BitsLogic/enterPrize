<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author Syed Tausif Ali Shah
 */
class Dashboard extends Basecontroller {

    private $data;
    private $agentObj;
    private $dashboardObj;
    private $payementObj;

    public function __construct() {
        parent::__construct();
        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Agentmodel', 'Dashboardmodel', 'admin/Paymentmodel'));

        $this->data = array(
            'page' => array('title' => 'Dashboard'),
            'flashKey' => 'message_dashboard',
            'view' => 'site/agent/dashboard/'
        );

        $this->agentObj = new Agentmodel;
        $this->dashboardObj = new Dashboardmodel;
        $this->payementObj = new Paymentmodel;
    }

    public function index() {
        $this->loadSiteLayout($this->data['view'] . 'dashbaord', $this->data);
    }

    public function getProfile() {
        $this->data['agentDetail'] = $this->agentObj->getAgentDetail($this->agentDetail['pk_agent_id']);
        $this->data['enumValues']['education'] = $this->getEnumValues('tbl_agent', 'agent_education');
        $this->loadSiteLayout($this->data['view'] . 'profile', $this->data);
    }

    public function updateProfilePost() {
        if ($this->input->post('submit')) {
            $this->validateUpdateProfilePost();
            $agentArr = array(
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'nationality' => $this->input->post('nationality'),
//                'passport' => $this->input->post('pas_number'),
//                'visa_status' => $this->input->post('vstatus'),
//                'email' => $agentInvite['invite_email'],
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'dobDB' => date('Y-m-d', strtotime($this->input->post('dob'))),
                'education' => $this->input->post('education'),
                'ccity' => $this->input->post('city_current'),
                'ccity_area' => $this->input->post('city_area'),
                'work_city' => $this->input->post('city_work'),
//                'status' => 'active'
            );
            $this->updateProfile($agentArr);
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong. Please try again.', $this->alertMessages['warning']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
            $rUrl = 'dashboard/profile';
        }
        return redirect(base_url($rUrl));
    }

    private function updateProfile($agentArr) {
        $result = $this->dashboardObj->updateAgent($this->agentDetail['pk_agent_id'], $agentArr);
        $redirectURL = 'dashboard/profile';
        if ($result['query_status']) {
            $message = str_replace($this->alertMessages['str_replace'], 'Information updated succesfully', $this->alertMessages['success']);
        } else {
            $message = str_replace($this->alertMessages['str_replace'], $result['error_info'][0] . ':' . $result['error_info'][1], $this->alertMessages['warning']);
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url($redirectURL));
    }

    private function validateUpdateProfilePost() {
        return TRUE;
    }

    public function updatePassword() {
        if ($this->input->post('submit')) {
            $this->validateUpdatePasswrodPost();
            $password = $this->input->post('password');
            $result = $this->agentObj->updatePassword($this->agentDetail['pk_agent_id'], $password);
            if ($result['query_status']) {
                $message = str_replace($this->alertMessages['str_replace'], 'Password updated', $this->alertMessages['success']);
            } else {
                $message = str_replace($this->alertMessages['str_replace'], $result[0] . ':' . $result[2], $this->alertMessages['warning']);
            }
            $this->session->set_flashdata($this->data['flashKey'], $message);
            return redirect(base_url('dashboard/profile'));
        }
    }
    
    private function validateUpdatePasswrodPost() {
        return TRUE;
    }
    
    public function getEwalletInfo() {
        $id = $this->agentDetail['pk_agent_id'];
        $this->data['totalFunds'] = $this->payementObj->getAgentsTotalAvailableFunds($id);
        $this->data['totalPRpending'] = $this->payementObj->getAgentTotalPRpending($id);
        $this->data['PRpendingList'] = $this->payementObj->getAllPaymentRequestsforAgent($id, 'pending');
        $this->data['transIn'] = $this->payementObj->getAgentTransactions($id, 'deposit');
        $this->data['transOut'] = $this->payementObj->getAgentTransactions($id, 'withdraw');
        $this->loadSiteLayout($this->data['view'].'e-wallet', $this->data);
    }
    
    public function processPaymentRequest() {
        $rUrl = 'dashboard/ewallet';
        if($this->input->post('submit')){
            $this->validatePaymentRequest();
            $param = array(
                'amount' => $this->input->post('amount'),
                'agentId' => $this->agentDetail['pk_agent_id'],
            );
            $result = $this->payementObj->insertPaymentRequest($param);
            if($result['query_status']){
                $message = str_replace($this->alertMessages['str_replace'], 'New payment request posted', $this->alertMessages['success']);
                $rUrl .= '/payment_requst/'.$result['id'];
            }else{
                $message = str_replace($this->alertMessages['str_replace'], $result['error_info'][0] . ':' . $result['error_info'][2], $this->alertMessages['warning']);
            }
            
        }else{
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong. Please try again.', $this->alertMessages['warning']);
            
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url($rUrl));
    }
    
    private function validatePaymentRequest(){
        return TRUE;
    }
    
    public function paymentRequestDetails($prId) {
        $this->data['prDetail'] = $this->payementObj->getPaymentRequestDetail($prId);
        $this->loadSiteLayout($this->data['view'].'payment_request_detail', $this->data);
    }
    
    public function expenses() {
        $this->data['expenseList'] = $this->dashboardObj->getExpensesWtihAgentId($this->agentDetail['pk_agent_id']);
        $this->loadSiteLayout($this->data['view'].'expenses', $this->data);
    }
}
