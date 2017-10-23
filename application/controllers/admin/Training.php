<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Training
 *
 * @author Syed Tausif Ali Shah
 */
class Training extends Basecontroller {

    //put your code here
    private $trainingObj;
    private $productObj;
    private $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Trainingmodel');
        $this->load->model('admin/Productmodel');

        $this->data = array(
            'page' => array('title' => 'Training'),
            'view' => 'admin/training/'
        );
        $this->data['view'] = 'admin/training/';
        $this->trainingObj = new Trainingmodel();
        $this->productObj = new Productmodel();
    }

    public function index() {
        $this->data['triningList'] = $this->trainingObj->getAllTraining();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function detail($id) {
        $this->getTrainingData($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail');
    }

    public function edit($id) {
        $this->getTrainingData($id);
        $this->data['productList'] = $this->productObj->getProductListNotAssociatedWithTraining($id, 'active');
        $this->loadAdminLayout($this->data, $this->data['view'] . 'edit');
    }

    private function getTrainingData($id) {
        $this->data['trainingDetail'] = $this->trainingObj->getTrainingDetail($id);
        $this->data['trainingResources'] = $this->trainingObj->getTrainigResourcesWithTid($id);
        $this->data['trainingProducts'] = $this->trainingObj->getTrainigProductListWithTid($id);
        return;
    }

    public function newTraining() {
        $this->loadAdminLayout($this->data, $this->data['view'] . 'new_training');
    }

    public function postTraining($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validateTraining()) {
                $trainingArr = array(
                    'title' => $this->input->post('title'),
                    'descp' => $this->input->post('descp'),
                    'status' => $this->input->post('status')
                );
                is_null($id) ? $this->saveNewTraining($trainingArr) : $this->updateTraining($id, $trainingArr);
            }
        }
    }

    private function updateTraining($id, $param) {
        $result = $this->trainingObj->updateTraining($id, $param);
        $message = $result['query_status'] ?
                str_replace($this->alertMessages['str_replace'], 'Training Updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $this->session->set_flashdata('message_training', $message);
        $this->session->set_flashdata('data_training', $param);
        return redirect(base_url('admin/training/edit/' . $id));
    }

    private function saveNewTraining($param) {
        $result = $this->trainingObj->insertTraining($param);
        $message = $result['query_status'] ?
                str_replace($this->alertMessages['str_replace'], 'New Training created', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $redirectUrl = $result['query_status'] ? 'detail/' . $result['id'] : 'new';
        $this->session->set_flashdata('message_training', $message);
        $this->session->set_flashdata('data_training', $param);
        return redirect(base_url('admin/training/' . $redirectUrl));
    }

    private function validateTraining() {
        return TRUE;
    }

    public function deleteTraining($id) {
        $result = $this->trainingObj->deleteTraining($id);
        $message = $result ?
                str_replace($this->alertMessages['str_replace'], 'Training Deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata('message_training', $message);
        return redirect(base_url('admin/training'));
    }

    public function toggleStatusTraining($id) {
        $result = $this->trainingObj->toggleStatusTraining($id);
        $message = $result ?
                str_replace($this->alertMessages['str_replace'], 'Status updated.', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata('message_training', $message);
        return redirect(base_url('admin/training'));
    }

    public function postTrainingResource($id) {
        if ($this->input->post('submit')) {
            switch ($this->input->post('r_type')) {
                case "video link":
                    $this->validateSimpleResource() ? $this->saveTrainingResource($id, $this->input->post()) : '';
                    break;
                case 'image':
                case 'pdf':
                    $this->validateFileResource() ? $this->uploadTrainingResource($id, $this->input->post()) : '';
                    break;
            }
        }
    }

    private function uploadTrainingResource($id, $post) {
        $config['upload_path'] = $this->uploadPath . 'training/' . $id . '/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size'] = 1024;
        $result = $this->uploadFile($config, 'r_link');
        if ($result['upload_status']) {
            $post['r_link'] = $this->themeUrl . '/uploads/training/' . $id . '/' . $result['file_data']['file_name'];
            $this->saveTrainingResource($id, $post);
        } else {
            $this->session->set_flashdata('message_training', str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']));
            return redirect(base_url('admin/training/edit/' . $id));
        }
    }

    private function saveTrainingResource($id, $post) {
        $param = array(
            'id' => $id,
            'title' => $post['r_title'],
            'type' => $post['r_type'],
            'link' => $post['r_link']
        );
        $result = $this->trainingObj->insertResource($param);
        $message = $result ?
                str_replace($this->alertMessages['str_replace'], 'New resource added', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['success']);
        $this->session->set_flashdata('message_training', $message);
        return redirect(base_url('admin/training/edit/' . $id));
    }

    private function validateFileResource() {
        return TRUE;
    }

    private function validateSimpleResource() {
        return TRUE;
    }

    public function updateTrainingResource($id, $func, $resourceId) {
        switch ($func) {
            case 'remove':
                $this->removeTrainingResource($id, $resourceId);
                break;
        }
    }

    private function removeTrainingResource($id, $resourceId) {

        $message = '';
        $result = $this->trainingObj->getTrainigResourceDetal($id, $resourceId);
        if (is_array($result) && !in_array($result['resource_type'], array('video link'))) {
            if (!unlink(str_replace($this->themeUrl . '/uploads/', $this->uploadPath, $result['resource_link']))) {
                $message = str_replace($this->alertMessages['str_replace'], 'could not remove file', $this->alertMessages['warning']);
            }
        }
        $delResult = $this->trainingObj->deleteTrainingResource($id, $resourceId);
        $message .= $delResult ? str_replace($this->alertMessages['str_replace'], 'Resource removed from DB', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $delResult, $this->alertMessages['success']);
        $this->session->set_flashdata('message_training', $message);
        return redirect(base_url('admin/training/detail/' . $id));
    }

    public function updateTrainingProduct($id, $func, $pId = NULL) {
        switch ($func) {
            case 'add':
                $result = $this->addTrianingtoProduct($id);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Training assigned to Prodcut' , $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
                break;
            case 'remove':
                $result = $this->trainingObj->deleteTrainingProductRel($id, $pId);
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'Training removed from Product', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
                break;
        }
        $this->session->set_flashdata('message_training', $message);
        return redirect(base_url('admin/training/edit/' . $id));
    }

    private function addTrianingtoProduct($id) {
        if ($this->input->post('submit')) {
            if($this->validateTrainingProduct()) {
                $result = $this->trainingObj->insertTrainingProductRel($id, implode(',', $this->input->post('prd-list')));
                $response['query_status'] = $result ? $result : FALSE;
                $response['error_message'] = $result ? '' : $result;
            }
        }
        return $response;
    }

    private function validateTrainingProduct() {
        return TRUE;
    }

}
