<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cms
 *
 * @author Syed Tausif Ali Shah
 */
class Cms extends Basecontroller {

    private $data;
    protected $cmsObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Cmsmodel');

        $this->data = array(
            'page' => array('title' => 'CMS'),
            'view' => 'admin/cms/'
        );
        $this->cmsObj = new Cmsmodel;
    }

    public function index() {
        $this->data['pageList'] = $this->cmsObj->getAllPages();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function newPage() {
        $this->data['subTitle'] = "Add new Page";
        $this->loadAdminLayout($this->data, $this->data['view'] . 'new');
    }

    public function editPage($id) {
        $this->data['subTitle'] = "Edit Page";
        $this->data['id'] = $id;
        $this->data['pageDetail'] = $this->cmsObj->getPageDetail($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'new');
    }

    public function postPage($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validatePagePost()) {
                $post = $this->input->post();
                $post['id'] = $id;
                $post['alias'] = strtolower(preg_replace('/[^\\w.-]/', '-', $post['alias']));
                is_null($id) ? $this->insertNewPage($post) : $this->updatePage($post);
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Error in posting data', $this->alertMessages['danger']);
            $this->session->set_flashdata('message_cms', $message);
            $redictUrl = is_null($id) ? 'new' : 'edit/'.$id;
            return redirect(base_url('admin/cms/'.$redictUrl));
        }
    }

    private function insertNewPage($param) {
        $result = $this->cmsObj->insertPage($param);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New page created', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
        $redirectUrl = $result['query_status'] ? 'edit/' . $result['id'] : 'new';
        $this->session->set_flashdata('message_cms', $message);
        return redirect(base_url('admin/cms/' . $redirectUrl));
    }

    private function updatePage($param) {
        $result = $this->cmsObj->updatePage($param);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Page updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
        $this->session->set_flashdata('message_cms', $message);
        return redirect(base_url('admin/cms/edit/' . $param['id']));
    }

    private function validatePagePost() {
        return TRUE;
    }

    public function detailPage($id) {
        $this->data['pageDetail'] = $this->cmsObj->getPageDetail($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail');
    }

    public function toggleStatusPage($id) {
        $result = $this->cmsObj->statusTogglePage($id);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Status updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['success']);
        $this->session->set_flashdata('message_cms', $message);
        return redirect(base_url('admin/cms'));
    }

    public function deletePage($id) {
        $result = $this->cmsObj->deletePage($id);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Page deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['success']);
        $this->session->set_flashdata('message_cms', $message);
        return redirect(base_url('admin/cms'));
    }

}
