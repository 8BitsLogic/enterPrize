<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agent
 *
 * @author Syed Tausif Ali Shah
 */
class Agent extends Basecontroller {

    private $data;
    private $agentObj;

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Agentmodel');

        $this->agentObj = new Agentmodel;
        $this->data = array(
            'page' => array('title' => 'Agent'),
            'view' => 'admin/agent/'
        );
    }

    public function index() {
        $this->data['agentList'] = $this->Agentmodel->getAllAgents();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'content');
    }

    public function newAgent() {
        $this->data['formTitle'] = 'Create New Agent';
        $this->data['enumValues'] = $this->getFieldEnumValues();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_agent_profile');
    }

    public function editAgent($id) {
        $this->data['formTitle'] = 'Update Agent Profile';
        $this->data['enumValues'] = $this->getFieldEnumValues();
        $this->data['agentDetail'] = $this->agentObj->getAgentDetail($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_agent_profile');
    }

    private function getFieldEnumValues() {
        $table = 'tbl_agent';
        $response['visa_status'] = $this->getEnumValues($table, 'agent_visa_status');
        $response['gender'] = $this->getEnumValues($table, 'agent_gender');
        $response['education'] = $this->getEnumValues($table, 'agent_education');
        $response['status'] = $this->getEnumValues($table, 'agent_status');
        return $response;
    }

    public function agentPost($id = NULL) {
        if ($this->input->post()) {
            $this->validateAgent();
            $agentArr = array('fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'nationality' => $this->input->post('nationality'),
                'passport' => $this->input->post('pas_number'),
                'visa_status' => $this->input->post('vstatus'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'dobDB' => date('Y-m-d', strtotime($this->input->post('dob'))),
                'education' => $this->input->post('education'),
                'ccity' => $this->input->post('city_current'),
                'ccity_area' => $this->input->post('city_area'),
                'work_city' => $this->input->post('city_work'),
                'status' => $this->input->post('status'));
            is_null($id) ? $this->saveNewAgent($agentArr) : $this->upadteAgent($id, $agentArr);
        }
    }

    private function upadteAgent($id, $agentArr) {
        $result = $this->agentObj->updateAgent($id, $agentArr);
        $message = $result['query_status'] ?
                str_replace($this->alertMessages['str_replace'], 'Agent Profile updated.', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result[0] . ':' . $result[2], $this->alertMessages['warning']);
        $this->session->set_flashdata('message_agent', $message);
        return redirect('admin/agent/edit/' . $id);
    }

    private function saveNewAgent($agentArr) {
        $agentArr['username'] = $this->getUsername(array($agentArr['fname'], $agentArr['lname'], $agentArr['dob']));
        $agentArr['password'] = uniqid();
        $result = $this->agentObj->createAgent($agentArr);
        if ($result['query_status']) {
            $this->sendEmailSignup($agentArr);
            $message = str_replace($this->alertMessages['str_replace'], 'New Agent created.', $this->alertMessages['success']);
            $redirectURL = 'admin/agent/detail/' . $result['agent_id'];
        } else {
            $message = str_replace($this->alertMessages['str_replace'], $result[0] . ':' . $result[2], $this->alertMessages['warning']);
            $redirectURL = 'admin/agent/new';
        }
        $this->session->set_flashdata('message_agent', $message);
        return redirect(base_url($redirectURL));
    }

    private function sendEmailSignup($param) {
        $email = array(
            'to' => $param['email'],
            'subject' => 'Welcome to Site',
            'message' => 'Welcome to site your info here'
        );

        return $this->sendEmail($email);
    }

    private function validateAgent() {
        return TRUE;
    }

    public function inviteAgent() {
        $this->data['inviteList'] = $this->agentObj->getAllInvites();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'invite');
    }

    public function inviteAgentPost() {
        if ($this->input->post('submit')) {
            if ($this->validateAgentInvite()) {
                $param = array(
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('name'),
                    'uId' => uniqid(),
                );
                if($this->sendEmailInvite($param['email'], base_url('signup/'.$param['uId']))){
                    $this->agentObj->saveInvite($param);
                    $message =  str_replace($this->alertMessages['str_replace'], 'Invite sent to: ' . $param['email'], $this->alertMessages['success']);
                }else{
                    $message = str_replace($this->alertMessages['str_replace'], 'could not send invite email', $this->alertMessages['warning']);
                }
                
                $this->session->set_flashdata('message_agent', $message);
            }
        }
        return redirect(base_url('admin/agent/invite'));
    }

    private function sendEmailInvite($to, $inviteUrl) {
        $email = array(
            'to' => $to,
            'subject' => 'Your are invited',
            'message' => 'Your are invited to join <a href="'.$inviteUrl.'">CLICK HERE</a> to signup'
        );
        return $this->sendEmail($email);
    }

    private function validateAgentInvite() {
        return TRUE;
    }

    public function toggleStatus($id) {
        $this->agentObj->toggleStatus($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Status update successful.', $this->alertMessages['success']);
        $this->session->set_flashdata('agent_message', $message);
        return redirect(base_url('admin/agent'));
    }

    public function delete($id) {
        $this->agentObj->deleteAgent($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Agent delteted.', $this->alertMessages['success']);
        $this->session->set_flashdata('agent_message', $message);
        return redirect(base_url('admin/agent'));
    }

    public function detail($id) {
        $this->data['agentDetail'] = $this->agentObj->getAgentDetail($id);

        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail');
    }

}
