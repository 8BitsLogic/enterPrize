<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lead
 *
 * @author Syed Tausif Ali Shah
 */
class Lead extends Basecontroller {

    private $data;
    protected $leadObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Leadmodel');

        $this->data = array(
            'page' => array('title' => 'Product Leads'),
            'view' => 'admin/lead/',
            'flashKey' => 'message_lead'
        );
        $this->leadObj = new Leadmodel;
    }

    public function index() {
        $this->data['leadList'] = $this->leadObj->getAllLeads();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function detailLead($id) {
        $this->data['leadDetail'] = $this->leadObj->getLeadDetail($id);
        $this->data['statusArray'] = array('pending');
        $this->data['statusArrayComplete'] = array('pending', 'declined', 'approved');
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail');
    }

    public function postExternalNotes($id) {
        if ($this->input->post('submit')) {
            if ($this->validateExternalNotes()) {
                $result = $this->leadObj->updateLeadExternalNotes($id, $this->input->post('enotes'));
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'External note posted', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
                $this->session->set_flashdata($this->data['flashKey'], $message);
            }
        }
        return redirect(base_url('admin/lead/detail/' . $id));
    }

    private function validateExternalNotes() {
        return TRUE;
    }

    public function approveLead($id) {
        $param = array('id' => $id, 'status' => 'approved', 'inotes' => 'Lead approved', 'enotes' => 'Lead approved' );
//                Update Lead status to approved
        $updateStatus = $this->leadObj->updateLeadStatus($param);
        $message = $updateStatus ? str_replace($this->alertMessages['str_replace'], 'Status updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $updateStatus, $this->alertMessages['warning']);

        if ($updateStatus) {
//        Make desposit transaction Agent
            $transaction = $this->leadObj->insertTransactionDeposit($id);
            $message .= $transaction ? str_replace($this->alertMessages['str_replace'], 'Agent reward posted', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $updateStatus, $this->alertMessages['warning']);
            $messageLeadInternalNotes = $transaction ? 'Agent reward posted. ' : 'Could not post agent reward. ';
//        Make deposit transation COB
            $cobTransaction = $this->leadObj->insertCob($id);
            $message .= $cobTransaction ? str_replace($this->alertMessages['str_replace'], 'COB transaction successful', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $updateStatus, $this->alertMessages['warning']);

//            Update internal notes
            $result = $this->leadObj->updateLeadInternalNotes($id, $messageLeadInternalNotes);
            $message .= $result ? str_replace($this->alertMessages['str_replace'], 'Internal notes updated.', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $updateStatus, $this->alertMessages['warning']);
        }

        $this->session->set_flashdata($this->data['flashKey'], $message);

        return redirect(base_url('admin/lead/detail/' . $id));
    }

    public function declineLead($id) {
        if ($this->input->post('submit')) {
            if ($this->validateDeclineLead()) {
//                decline Lead
                $internalResult = $this->leadObj->updateLeadStatus(array(
                    'id' => $id,
                    'status' => 'declined',
                    'inotes' => $this->input->post('inotes'),
                    'enotes' => $this->input->post('enotes'),
                ));
                $message = $internalResult ? str_replace($this->alertMessages['str_replace'], 'Lead Declined', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $internalResult, $this->alertMessages['warning']);


////                post external notes
//                $extNoteResult = $this->leadObj->updateLeadExternalNotes($id, $this->input->post('cust_notes'));
//                $message .= $extNoteResult ? str_replace($this->alertMessages['str_replace'], 'External notes updated', $this->alertMessages['success']) :
//                        str_replace($this->alertMessages['str_replace'], $extNoteResult, $this->alertMessages['warning']);
                $this->session->set_flashdata($this->data['flashKey'], $message);
            }
        }
        return redirect(base_url('admin/lead/detail/' . $id));
    }

    private function validateDeclineLead() {
        return TRUE;
    }

    public function postInternalNotes($id) {
        if ($this->input->post('submit')) {
            if ($this->validateInternalNotes()) {
                $result = $this->leadObj->updateLeadInternalNotes($id, $this->input->post('inotes'));
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'Notes updated', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
                $this->session->set_flashdata($this->data['flashKey'], $message);
            }
        }
        return redirect(base_url('admin/lead/detail/' . $id));
    }

    private function validateInternalNotes() {
        return TRUE;
    }

}
