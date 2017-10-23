<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Payment
 *
 * @author Syed Tausif Ali Shah
 */
class Payment extends Basecontroller {

    private $data;
    protected $paymentObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Paymentmodel');

        $this->data = array(
            'page' => array('title' => 'Payment Request'),
            'view' => 'admin/payment/'
        );
        $this->paymentObj = new Paymentmodel;
    }

    public function index() {
        $this->data['prList'] = $this->paymentObj->getAllPaymentRequests();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function detailPR($id) {
        $this->data['prDetail'] = $this->paymentObj->getPaymentRequestDetail($id);
        $this->data['prTdetail'] = $this->paymentObj->getTransactionDetailforPRid($id);
        $this->data['statusArray'] = array('pending', 'processing');
        $this->data['statusArrayWhold'] = array('pending', 'processing', 'on hold');
//        $this->paymentObj->updatePRstatusN($id, 'Status changed to processing', 'processing');
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail');
    }

    public function prOnHold($id) {
        if ($this->input->post('submit')) {
            if ($this->validateStatusUpdate()) {
                $result = $this->paymentObj->updatePRstatusN($id, 'Status changed to On Hold', 'on hold', $this->input->post('notes'));
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'Payment request put on hold', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
                $this->session->set_flashdata('message_payment', $message);
            }
        }
        return redirect(base_url('admin/payment/detail/' . $id));
    }

    private function validateStatusUpdate() {
        return TRUE;
    }

    public function postCustomerNotes($id) {
        if ($this->input->post('submit')) {
            if ($this->validateCustomerNotes()) {
                $result = $this->paymentObj->updatePRcustomerNotes($id, $this->input->post('cust_notes'));
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'Customer note posted', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
                $this->session->set_flashdata('message_payment', $message);
            }
        }
        return redirect(base_url('admin/payment/detail/' . $id));
    }

    private function validateCustomerNotes() {
        return TRUE;
    }

    public function approvePR($id) {
        $param = array(
            'id' => $id,
            'status' => 'approved',
            'notes' => 'Payment request approved'
        );
//                insert transaction withdraw amount
        $transactionResult = $this->paymentObj->insertTransactionWithdraw($id);
        $message = $transactionResult ? str_replace($this->alertMessages['str_replace'], 'New transaction posted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $transactionResult, $this->alertMessages['warning']);

//                update payment request status to approve
        $transactionId = $this->paymentObj->getTransactionIdforPRid($id);
        $this->paymentObj->updatePRtransactionId($id, $transactionId);
        $param['notes'] .= ' - Transaction# '.$transactionId;
        $internalResult = $this->paymentObj->updatePRstatus($param);
        $message .= $internalResult ? str_replace($this->alertMessages['str_replace'], 'Payment status approved', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $internalResult, $this->alertMessages['warning']);
        
//                post customer notes
        $cusNoteResult = $this->paymentObj->updatePRcustomerNotes($id, $param['notes']);
        $message .= $cusNoteResult ? str_replace($this->alertMessages['str_replace'], 'Customer notes posted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $cusNoteResult, $this->alertMessages['warning']);
        $this->session->set_flashdata('message_payment', $message);

        return redirect(base_url('admin/payment/detail/' . $id));
    }

    public function declinePR($id) {
        if ($this->input->post('submit')) {
            if ($this->validateRejectPR()) {
//                update payment request status to approve
                $internalResult = $this->paymentObj->updatePRstatusN($id, 'Payment request Declined', 'declined', $this->input->post('notes'));
                $message = $internalResult ? str_replace($this->alertMessages['str_replace'], 'Payment status Declined', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $internalResult, $this->alertMessages['warning']);


//                post customer notes
                $cusNoteResult = $this->paymentObj->updatePRcustomerNotes($id, $this->input->post('cust_notes'));
                $message .= $cusNoteResult ? str_replace($this->alertMessages['str_replace'], 'Customer notes updated', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $cusNoteResult, $this->alertMessages['warning']);
                $this->session->set_flashdata('message_payment', $message);
            }
        }
        return redirect(base_url('admin/payment/detail/' . $id));
    }

    private function validateRejectPR() {
        return TRUE;
    }

    public function postInternalNotes($id) {
        if ($this->input->post('submit')) {
            if ($this->validateInternalNotes()) {
                $result = $this->paymentObj->updatePRinternalNotes($id, $this->input->post('notes'));
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'Notes updatesd', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
                $this->session->set_flashdata('message_payment', $message);
            }
        }
        return redirect(base_url('admin/payment/detail/' . $id));
    }

    private function validateInternalNotes() {
        return TRUE;
    }

}
