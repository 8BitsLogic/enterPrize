<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailCMS
 *
 * @author Syed
 */
class EmailCMS extends Basecontroller {

    private $data;
    private $eCmsObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/EmailCMSmodel');
        $this->eCmsObj = new EmailCMSmodel;
        $this->data = array(
            'page' => array('title' => 'Email CMS'),
            'flashKey' => 'message_emailCMS',
            'view' => 'admin/email_CMS/'
        );
    }

    public function index() {
        $this->data['emailList'] = $this->eCmsObj->getEmail();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'email_grid');
    }

    public function newEmail() {
        $this->data['emailTemplateList'] = $this->eCmsObj->getEmailSetting();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'email_new');
    }

    public function detailEmail($emailId) {
        $this->fetchEmailData($emailId);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'email_preview');
    }

    public function editEmail($emailId) {
        $this->fetchEmailData($emailId);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'email_edit');
    }

    private function fetchEmailData($emailId) {
        $this->data['emailDetail'] = $this->eCmsObj->getEmail($emailId)[0];
        $this->data['emailDetail']['emailTemplate'] = $this->eCmsObj->getEmailSetting($this->data['emailDetail']['fk_email_setting_id'])[0];
        $this->data['emailTemplateList'] = $this->eCmsObj->getEmailSetting();
        return;
    }

    public function saveEmail($emailId = NULL) {
        if ($this->input->Post('submit')) {
            $this->validateEmailPost();
            is_null($emailId) ? $this->saveEmailNew() : $this->saveEmailEdit($emailId);
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again', $this->alertMessages['warning']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
            redirect(base_url('admin/email_cms/new'));
        }
    }

    private function saveEmailNew() {
        $result = $this->eCmsObj->insertEmail($this->input->post());
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New Email Added', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $redirectUrl = $result['query_status'] ? 'view/' . $result['id'] : 'new';
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/email_cms/' . $redirectUrl));
    }

    private function saveEmailEdit($emailId) {
        $post = $this->input->post();
        $post['email_id'] = $emailId;
        $result = $this->eCmsObj->updateEmail($post);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Email updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/email_cms/edit/' . $emailId));
    }

    private function validateEmailPost() {
        return TRUE;
    }

    public function emailDelete($emailId) {
        $message = $this->eCmsObj->deleteEmail($emailId) ?
                str_replace($this->alertMessages['str_replace'], 'Email deleted.', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], 'operation failed, try again.', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/email_cms'));
    }

    public function settingIndex() {
        $this->data['settingList'] = $this->eCmsObj->getEmailSetting();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'setting_grid');
    }
    
    public function settingPreview($id) {
        $result = $this->eCmsObj->getEmailSetting($id);
        $this->data['emailPreview'] = $result[0];
        $this->loadAdminLayout($this->data, $this->data['view'].'email_template_preview');
    }

    public function settingNew() {
        $this->loadAdminLayout($this->data, $this->data['view'] . 'setting_new');
    }

    public function settingEdit($id) {
        $this->data['settingDetail'] = $this->eCmsObj->getEmailSetting($id)[0];
        $this->loadAdminLayout($this->data, $this->data['view'] . 'setting_edit');
    }

    public function settingSavePost($id = NULL) {
        is_null($id) ? $this->settingSaveNew() : $this->settingSaveEdit($id);
    }

    private function settingSaveNew() {
        if ($this->input->post('submit')) {
            $this->validateSetting();
            $result = $this->eCmsObj->insertEmailSetting($this->input->post());
            $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New setting added', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
            $redirectUrl = $result['query_status'] ? 'edit/' . $result['id'] : 'new';
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong try again.', $this->alertMessages['warning']);
            $redirectUrl = 'new';
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/email_cms/setting/' . $redirectUrl));
    }

    private function settingSaveEdit($id) {
        if ($this->input->post('submit')) {
            $this->validateSetting();
            $post = $this->input->post();
            $post['setting_id'] = $id;
            $result = $this->eCmsObj->updateEmailSetting($post);
            $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Setting Updated', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong try again.', $this->alertMessages['warning']);
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/email_cms/setting/edit/' . $id));
    }

    private function validateSetting() {
        return TRUE;
    }

    public function settingDelete($id) {
        $reuslt = $this->eCmsObj->deleteEmailSetting($id);
        $message = $reuslt ? str_replace($this->alertMessages['str_replace'], 'Setting deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], 'Could not compelete request, try again', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/email_cms/setting'));
    }

}
