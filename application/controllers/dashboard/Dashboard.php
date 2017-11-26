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
    private $slideObj;

    public function __construct() {
        parent::__construct();
        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Agentmodel', 'Dashboardmodel', 'admin/Paymentmodel', 'admin/Slidemodel', 'Communitymodel'));

        $this->data = array(
            'page' => array('title' => 'Dashboard'),
            'flashKey' => 'message_dashboard',
            'view' => 'site/agent/dashboard/',
            'agentPic' => $this->getAgentPic(),
            'availableFunds' => $this->getAgentAvailableFunds($this->agentDetail['pk_agent_id']),
        );
        $this->agentObj = new Agentmodel;
        $this->dashboardObj = new Dashboardmodel;
        $this->payementObj = new Paymentmodel;
        $this->slideObj = new Slidemodel;
    }

    public function index() {
        $this->data['slides'] = $this->slideObj->getAllSlides('active');
        $postList = $this->Communitymodel->getPosts('publish');
        $this->data['postList'] = is_array($postList) ? array_slice($postList, 0, 8) : FALSE;
        $this->loadSiteLayout($this->data['view'] . 'dashbaord', $this->data);
    }

    public function getProfile() {
        $this->data['page']['title'] = 'Profile';
        $this->data['agentDetail'] = $this->agentObj->getAgentDetail($this->agentDetail['pk_agent_id']);
        $this->data['enumValues']['education'] = $this->getEnumValues('tbl_agent', 'agent_education');
        $this->loadSiteLayout($this->data['view'] . 'profile', $this->data);
    }

    public function updateProfilePost() {
        if ($this->input->post('submit')) {
            if ($this->validateUpdateProfilePost()) {
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
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong. Please try again.', $this->alertMessages['warning']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
            $rUrl = 'dashboard/profile';
        }
        $this->getProfile();
//        return redirect(base_url($rUrl));
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
        $enumVals = array(
            'education' => $this->getEnumValues('tbl_agent', 'agent_education'),
            'gender' => $this->getEnumValues('tbl_agent', 'agent_gender')
        );
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[50]|alpha');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[50]|alpha');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|min_length[3]|max_length[50]|alpha');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|callback_match_date', array('match_date' => '%s should in be in "DD/MM/YYYY" format'));
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|in_list[' . implode(',', $enumVals['gender']) . ']');
        $this->form_validation->set_rules('phone', 'Phone number', 'trim|required|numeric|min_length[10]|max_length[13]');
//        $this->form_validation->set_rules('vstatus', 'Visa Status', 'trim|required|in_list[' . implode(',', $enumVals['visa_status']) . ']');
//        $this->form_validation->set_rules('pas_number', 'Emirates ID/ Passport Number', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('education', 'Education', 'trim|in_list[' . implode(',', $enumVals['education']) . ']');
        $this->form_validation->set_rules('city_current', 'Current City', 'trim|required|alpha');
        $this->form_validation->set_rules('city_area', 'City Area', 'trim|required|alpha');
        $this->form_validation->set_rules('city_work', 'Work City', 'trim|alpha');
        return $this->form_validation->run() ? TRUE : FALSE;
    }

    public function updatePassword() {
        if ($this->input->post('submit')) {
            if ($this->validateUpdatePasswrodPost()) {
                $password = $this->input->post('pass');
                $result = $this->agentObj->updatePassword($this->agentDetail['pk_agent_id'], $password);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Password updated', $this->alertMessages['success']) :
                        $message = str_replace($this->alertMessages['str_replace'], $result[0] . ':' . $result[2], $this->alertMessages['warning']);
                $this->session->set_flashdata($this->data['flashKey'], $message);
            }
            $this->getProfile();
        }
    }

    private function validateUpdatePasswrodPost() {
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[8]|max_length[200]|alpha_numeric');
        $this->form_validation->set_rules('pass_match', 'Confirm Password', 'trim|required|min_length[8]|max_length[200]|alpha_numeric|matches[pass]');
        return $this->form_validation->run() ? TRUE : FALSE;
    }

    public function getEwalletInfo() {
        $this->data['page']['title'] = 'E-Wallet';
        $id = $this->agentDetail['pk_agent_id'];
        $this->data['totalFunds'] = $this->payementObj->getAgentsTotalAvailableFunds($id);
        $this->data['totalPRpending'] = $this->payementObj->getAgentTotalPRpending($id);
        $this->data['PRpendingList'] = $this->payementObj->getAllPaymentRequestsforAgent($id, 'pending');
        $this->data['transactions'] = $this->payementObj->getAgentTransactions($id);
        $this->loadSiteLayout($this->data['view'] . 'e-wallet', $this->data);
    }

    public function processPaymentRequest() {
        if ($this->input->post('submit')) {
            if ($this->validatePaymentRequest()) {
                $param = array(
                    'amount' => $this->input->post('amount'),
                    'agentId' => $this->agentDetail['pk_agent_id'],
                );
                $result = $this->payementObj->insertPaymentRequest($param);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New payment request posted', $this->alertMessages['success']) :
                        $message = str_replace($this->alertMessages['str_replace'], $result['error_info'][0] . ':' . $result['error_info'][2], $this->alertMessages['warning']);
                $this->session->set_flashdata($this->data['flashKey'], $message);
                $result['query_status'] ? redirect(base_url('/payment_requst/' . $result['id'])) : '';
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong. Please try again.', $this->alertMessages['warning']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
        }        
        $this->getEwalletInfo();
    }

    private function validatePaymentRequest() {
        $this->form_validation->set_rules('amount', 'Cashout Amount', 'trim|required|integer');
        return $this->form_validation->run() ? TRUE : FALSE;
    }

    public function paymentRequestDetails($prId) {
        $this->data['page']['title'] = 'Payment Request Details';
        $this->data['prDetail'] = $this->payementObj->getPaymentRequestDetail($prId);
        $this->loadSiteLayout($this->data['view'] . 'payment_request_detail', $this->data);
    }

    public function expenses() {
        $this->data['expenseList'] = $this->dashboardObj->getExpensesWtihAgentId($this->agentDetail['pk_agent_id']);
        $this->loadSiteLayout($this->data['view'] . 'expenses', $this->data);
    }

    public function uploadPic() {
        if ($this->input->post('submit')) {
            $this->validatePic();
            $config['upload_path'] = $this->uploadPath . 'user/' . $this->agentDetail['pk_agent_id'] . '/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024;
            $config['file_name'] = $this->agentDetail['pk_agent_id'];
            $config['overwrite'] = TRUE;
            $result = $this->uploadFile($config, 'pic');

            if ($result['upload_status']) {
                $message = str_replace($this->alertMessages['str_replace'], 'Picture upload successful.', $this->alertMessages['success']);
            } else {
                $message = str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
            }
            $this->session->set_flashdata($this->data['flashKey'], $message);
        }
        $this->getProfile();
    }

    private function validatePic() {
        $this->form_validation->set_rules('pic', 'Profile Picture', 'required');
        return TRUE;
    }

}
