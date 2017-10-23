<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formbuilder
 *
 * @author Syed Tausif Ali Shah
 */
class Formbuilder extends Basecontroller {

    private $data;
    private $fbObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Formbuildermodel');

        $this->data = array(
            'page' => array('title' => 'Form Builder'),
            'view' => 'admin/form_builder/',
            'flashKey' => 'message_fb'
        );
        $this->fbObj = new Formbuildermodel;
    }

    public function index() {
        $this->data['formList'] = $this->fbObj->getFormList();
        $this->loadAdminLayout($this->data, $this->data['view'].'form_grid');
    }

    public function deleteForm($id) {
        $result = $this->fbObj->deleteForm($id);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Form Deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/list'));
    }
    
    public function fieldList($type = NULL) {
        $this->data['fieldList'] = $this->fbObj->getFieldList($type);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'field_grid');
    }

    public function viewField($id) {
        $this->data['fieldInfo'] = $this->fbObj->getField($id);

        $this->loadAdminLayout($this->data, $this->data['view'] . 'partials/input_field');
    }

    public function createNewField() {
        $this->data['fieldAttributes'] = $this->fbObj->getFieldAttributes();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'partials/field_form');
    }

    public function postField($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validateFieldPost()) {
                $param['fattributes'] = $this->attributeArraytoStr();
                $param['flabel'] = $this->input->post('flabel');
                $param['ftype'] = $this->input->post('ftype');
                $result = $this->fbObj->insertNewField($param);
                if ($result['query_status']) {
                    $message = str_replace($this->alertMessages['str_replace'], 'New Field Created', $this->alertMessages['success']);
                    $redirectUrl = 'list';
                } else {
                    $message = str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
                    $redirectUrl = 'new';
                }
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Try again, something went wrong.', $this->alertMessages['warning']);
            $redirectUrl = 'new';
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/field/' . $redirectUrl));
    }

    private function attributeArraytoStr() {
        $skipArr = array('flabel', 'submit', 'ftype');
        $attStr = '';
        foreach ($this->input->post() as $key => $value) {
            if (isset($value) && $value != "" && !in_array($key, $skipArr)) {
                $attStr .= ' ' . $key . '="' . $value . '"';
            }
        }

        return $attStr != '' ? $attStr : FALSE;
    }

    private function validateFieldPost() {
        return TRUE;
    }

    public function deleteField($id) {
        $result = $this->fbObj->deleteField($id);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Field Deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/field/list'));
    }

    public function newForm() {
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_new');
    }

    public function editForm($id) {
        $this->data['formDetail'] = $this->fbObj->getFormDetail($id);
        $this->data['formFieldList'] = $this->fbObj->getFormFields($id);
        $this->data['fieldList'] = $this->fbObj->getFieldListUniquetoForm($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_edit');
    }

    public function saveForm($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validateFormPost()) {
                $param = array('ftitle' => $this->input->post('ftitle'), 'id' => $id);
                is_null($id) ? $this->saveNewForm($param) : $this->saveUpdatedForm($param);
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Try again, something went wrong.', $this->alertMessages['warning']);
            $redirectUrl = 'new';
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/form/' . $redirectUrl));
    }

    private function saveNewForm($param) {
        $result = $this->fbObj->insertNewForm($param);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New Form Created', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
        $redirectUrl = $result['query_status'] ? 'edit/' . $result['id'] : 'new';
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/form/' . $redirectUrl));
    }

    private function saveUpdatedForm($param) {
        $result = $this->fbObj->updateForm($param);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Form updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/form/edit/' . $param['id']));
    }

    private function validateFormPost() {
        return TRUE;
    }

    public function updateFormFieldRel($formId, $fieldId, $func) {
        switch ($func) {
            case 'add':
                $result = $this->fbObj->addFieldFormRel($formId, $fieldId);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Field added to Form', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
                break;
            case 'remove':
                $result = $this->fbObj->removeFieldFormRel($formId, $fieldId);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Field removed from Form', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
                break;
            default:
                $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again.', $this->alertMessages['warning']);
                break;
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/form_builder/form/edit/'.$formId));
    }
    
    public function detailForm($id) {
        $this->data['formDetail'] = $this->fbObj->getFormDetail($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_detail');
    }

}
