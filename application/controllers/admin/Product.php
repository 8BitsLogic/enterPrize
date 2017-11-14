<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Syed Tausif Ali Shah
 */
class Product extends Basecontroller {

    private $data;
    protected $productObj;
    protected $trainingObj;
    protected $testObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Productmodel');
        $this->load->model('admin/Trainingmodel');
        $this->load->model('admin/Testmodel');
        $this->load->model('admin/Formbuildermodel');

        $this->data = array(
            'page' => array('title' => 'Product'),
            'view' => 'admin/product/',
            'flashKey' => 'message_product',
        );
        $this->productObj = new Productmodel;
        $this->trainingObj = new Trainingmodel;
        $this->testObj = new Testmodel;
    }

    public function index() {
        $this->data['productList'] = $this->productObj->getAllProducts();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function detailProduct($id) {
        $this->getProductDetails($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail');
    }

    protected function getProductDetails($id) {
        $this->data['productDetail'] = $this->productObj->getProductDetailwithId($id);
        $this->data['productLeads'] = $this->productObj->getLeadsListWithProductId($id);
        $this->data['productTrainings'] = $this->productObj->getProductTrainingListWithProductId($id);
        $this->data['productTests'] = $this->productObj->getProductTestListWithProductId($id);
        $this->data['productGallery'] = $this->getProductGallery($id);
        return;
    }

    protected function getAllProductRelationsList($id) {
        $this->data['trainingList'] = $this->productObj->getAllTrainingsNotAssociatedWithProduct($id);
        $this->data['testList'] = $this->productObj->getAllTestNotAssociatedWithProduct($id);
    }

    public function newProduct() {

        $this->loadAdminLayout($this->data, $this->data['view'] . 'new');
    }

    public function editProduct($id) {
        $this->getProductDetails($id);
        $this->getAllProductRelationsList($id);
        $fbObj = new Formbuildermodel;
        if (is_null($this->data['productDetail']['fk_form_id'])) {

            $this->data['formList'] = $fbObj->getFormList();
        } else {
            $this->data['productForm'] = $fbObj->getFormDetail($this->data['productDetail']['fk_form_id']);
            $this->data['productFormFields'] = $fbObj->getFormFields($this->data['productDetail']['fk_form_id']);
        }
        $this->loadAdminLayout($this->data, $this->data['view'] . 'edit');
    }

    public function postProduct($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validateProduct()) {
                $post = $this->input->post();
                $post['id'] = $id;
                is_null($id) ? $this->saveNewProduct($post) : $this->updateProduct($post);
            }
        }
    }

    private function saveNewProduct($param) {
        $result = $this->productObj->insertProduct($param);
        if ($result['query_status']) {
            isset($_FILES['prd_img']) ? $this->uploadProductPhoto($result['id']) : '';
            $message = $this->session->flashdata($this->data['flashKey']) .
                    str_replace($this->alertMessages['str_replace'], 'New product added', $this->alertMessages['success']);
            $this->session->set_flashdata('message_prduct', $message);
            $urlString = 'detail/' . $result['id'];
        } else {
            $this->session->set_flashdata($this->data['flashKey'], str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']));
            $this->session->set_flashdata('data_product', $param);
            $urlString = 'new';
        }
        return redirect(base_url('admin/product/' . $urlString));
    }

    private function updateProduct($param) {
        isset($_FILES['prd_img']) ? $this->uploadProductPhoto($param['id']) : '';
        $result = $this->productObj->updateProduct($param);
        $message .= $this->session->flashdata($this->data['flashKey']) . $result['query_status'] ?
                str_replace($this->alertMessages['str_replace'], 'Updated Successful', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/product/edit/' . $param['id']));
    }

    private function uploadProductPhoto($id) {
        $config['upload_path'] = $this->uploadPath . '../images/products/' . $id . '/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1024;
        $config['file_name'] = sha1(explode('.', $_FILES['prd_img']['name'])[0]) . '.' . explode('.', $_FILES['prd_img']['name'])[1];
        $result = $this->uploadFile($config, 'prd_img');
        if ($result['upload_status']) {
            $this->session->set_flashdata($this->data['flashKey'], str_replace($this->alertMessages['str_replace'], 'Image uploaded.', $this->alertMessages['warning']));
        } else {
            $this->session->set_flashdata($this->data['flashKey'], str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']));
            return redirect(base_url('admin/product/edit/' . $id));
        }
    }

    private function validateProduct() {
        return TRUE;
    }

    public function toggleStatusProduct($id) {
        $message = $this->productObj->toggleStatusProduct($id) ?
                str_replace($this->alertMessages['str_replace'], 'Status updated successful', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], 'Status update failed', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/product'));
    }

    public function deleteProduct($id) {
        $message = $this->productObj->deleteProduct($id) ?
                str_replace($this->alertMessages['str_replace'], 'Product deletion successful', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], 'Product deletion failed', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/product'));
    }

    public function propertyAction($prdId, $action, $property, $propId) {
        switch ($action) {
            case 'add':
                $this->addProperty($prdId, $property, $propId);
                break;
            case 'remove':
                $this->removeProperty($prdId, $property, $propId);
                break;
            default:
                $this->session->set_flashdata($this->data['flashKey'], str_replace($this->alertMessages['str_replace'], 'Action not found', $this->alertMessages['warning']));
                break;
        }
        return redirect(base_url('admin/product/edit/' . $prdId));
    }

    private function addProperty($prdId, $property, $propId) {
        switch ($property) {
            case 'training':
                $result = $this->trainingObj->insertTrainingProductRelation($propId, $prdId);
                break;
            case 'test':
                $result = $this->testObj->insertTestProductRelation($propId, $prdId);
                break;
            default :
                $message = str_replace($this->alertMessages['str_replace'], 'Property not found', $this->alertMessages['warning']);
                break;
        }
        $message = isset($message) ? $message : $result ? str_replace($this->alertMessages['str_replace'], $property . ' added', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return;
    }

    private function removeProperty($prdId, $property, $propId) {
        switch ($property) {
            case 'training':
                $result = $this->trainingObj->deleteTrainingProductRel($propId, $prdId);
                break;
            case 'test':
                $result = $this->testObj->removeProductTestRelation(array('test_ids' => $propId, 'prd_ids' => $prdId));
                break;
            default:
                $message = str_replace($this->alertMessages['str_replace'], 'Property not found', $this->alertMessages['warning']);
                break;
        }
        $message = isset($message) ? $message : $result ? str_replace($this->alertMessages['str_replace'], $property . ' unlinked', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return;
    }

    public function addProductForm($prdId, $formId) {
        $result = $this->productObj->updateProductLeadForm($prdId, $formId);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Lead form attached to Product', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['success']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/product/edit/' . $prdId));
    }

    public function removeProductForm($prdId) {
        $result = $this->productObj->removeProductLeadForm($prdId);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Lead form removed from Product', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['success']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/product/edit/' . $prdId));
    }

    public function removePhoto($id, $file) {
//        echo $this->uploadPath.'../images/products/'.$id.'/'.$file;exit;
        $message = !unlink($this->uploadPath.'../images/products/'.$id.'/'.$file) ? 
                str_replace($this->alertMessages['str_replace'], 'Could not remove file', $this->alertMessages['warning']):
                str_replace($this->alertMessages['str_replace'], 'File removed', $this->alertMessages['success']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/product/edit/' . $id));
    }
}