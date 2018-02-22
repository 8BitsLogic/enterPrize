<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Syed
 */
class Product extends Basecontroller {

    private $data;
    private $aPrdObj;
    private $prdObj;
    private $aleadObj;

    public function __construct() {
        parent::__construct();

        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Productmodel', 'SiteProductmodel', 'admin/Leadmodel'));

        $this->data = array(
            'page' => array('title' => 'Product'),
            'flashKey' => 'message_dashboard_product',
            'view' => $this->theme.'agent/product/',
            'leadView' => $this->theme.'agent/lead/',
            'agentPic' => $this->getAgentPic(),
            'availableFunds' => $this->getAgentAvailableFunds($this->agentDetail['pk_agent_id']),
        );

        $this->aPrdObj = new Productmodel;
        $this->prdObj = new SiteProductmodel;
        $this->aleadObj = new Leadmodel;
    }

    public function index($unlock = '%') {
        $this->data['productList'] = $this->prdObj->getAllProducts($this->status, $unlock, '%', $this->agentDetail['pk_agent_id']);
        switch ($unlock) {
            case 1:
                $this->data['page']['sub-title'] = 'Unlocked Product List';
                break;
            case 0:
                $this->data['page']['sub-title'] = 'Unlocked Product List';
                break;
            default:
                $this->data['page']['sub-title'] = 'Product List';                
                break;
        }
        $this->loadSiteLayout($this->data['view'] . 'all_product', $this->data);
    }

    public function detail($id) {
        $this->data['productDetail'] = $this->prdObj->getAllProducts($this->status, '%', $id, $this->agentDetail['pk_agent_id'])[0];
        !$this->data['productDetail'] ? redirect(base_url('product')) : '';
        $this->getProductDetails($id);
        $this->loadSiteLayout($this->data['view'] . 'detial', $this->data);
    }

    private function getProductDetails($id) {
        $this->data['productGallery'] = $this->getProductGallery($id);
        $this->data['trainingList'] = $this->aPrdObj->getProductTrainingListWithProductId($id, $this->status);
        $this->data['trainingView'] = 'site/agent/training/';
        $this->data['testList'] = $this->prdObj->getProductTestListWithProductId($id, $this->agentDetail['pk_agent_id'], $this->status);
        $this->data['testView'] = 'site/agent/test/';
        $this->data['leadForm'] = $this->data['productDetail']['prd_unlock'] ?
                $this->prdObj->getProductLeadForm($id)[0] : FALSE;
        return;
    }

    public function loadLeadForm($prId) {
        $this->data['productDetail'] = $this->prdObj->getAllProducts($this->status, '1',$prId, $this->agentDetail['pk_agent_id'])[0];
        $this->data['productDetail']['photo'] = $this->getProductGallery($prId)[0];
        $this->data['page']['title'] = 'Capture Lead - '. $this->data['productDetail']['product_title'];
        $this->data['leadForm'] = is_array($this->data['productDetail']) && $this->data['productDetail']['prd_unlock'] ?
                $this->prdObj->getProductLeadForm($prId) : redirect(base_url('product'));
        $this->loadSiteLayout($this->data['leadView'] . 'leadForm', $this->data);
    }

    public function leadPost($id) {
        if ($this->input->post('submit')) {
            $this->validateLeadPost();
//            $leadForm = $this->getLeadForm($id);
            $this->saveLead($id, $this->input->post());
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong. Try again', $this->alertMessages['warning']);
            $redirectUrl = 'product/' . $id . '/lead';
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url($redirectUrl));
    }

    private function validateLeadPost() {
//        write validation code here;
        return TRUE;
    }

    private function getLeadForm($prdId) {
        $productDetail = $this->prdObj->getAllProducts($this->status, $prId)[0];
        $leadForm = is_array($productDetail) && $productDetail['prd_unlock'] ?
                $this->prdObj->getProductLeadForm($prId) : FALSE;
        $message = $leadForm ? '' : str_replace($this->alertMessages['str_replace'], 'Product is not valid or is not available for lead generation', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['falshKey'], $message);
        return $leadForm ? $leadForm : redirect(base_url('product/detail/' . $id));
    }

    private function saveLead($prId, $post) {
        $cPost = $this->cleanPost($post);
        if (count($cPost) > 0) {
            $leadJson = json_encode($cPost);
            $result = $this->prdObj->insertLead(array(
                'prdId' => $prId,
                'agentId' => $this->agentDetail['pk_agent_id'],
                'leadData' => $leadJson,
            ));
            $message = $result['query_status'] ?
                    str_replace($this->alertMessages['str_replace'], 'Application successful', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
            $result['query_status'] ? $this->sendLeadtoCompany($leadJson, $result['lead_id']) : '';
            $redirectUrl = 'lead/detail/' . $result['lead_id'];
        } else {
            $message = str_replace($this->alertMessages['str_repoace'], 'Form post has errors, check and verify', $this->alertMessages['warning']);
            $redirectUrl = 'product/' . $prId . '/lead';
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url($redirectUrl));
    }

    private function cleanPost($post) {
        foreach ($post as $key => $value) {
            if (in_array($key, array('submit'))) {
                unset($post[$key]);
            }
        }
        return $post;
    }

    private function writeLeadJson($lead, $leadId) {
        $filePath = $this->uploadPath . 'leads/' . date('Ymd');
        $fileName = $leadId . '.txt';
        $result = $this->saveJsontoText($lead, $filePath, $fileName);
        $response = $result ?
                array('write_status' => TRUE,
            'file' => $filePath . '/' . $fileName) :
                array('write_status' => FALSE,
            'error_message' => 'Unable to write file, try again');
        return $response;
    }

    private function sendLeadtoCompany($lead, $leadId, $cmpnyEmail = 'catchlead@yopmail.com') {
        $message = $this->session->flashdata($this->data['flashKey']);
        $result = $this->writeLeadJson($lead, $leadId);
        if ($result['write_status']) {
            $email = array(
                'to' => $cmpnyEmail,
                'subject' => "lead for product",
                'message' => 'please find attached'
            );
            if ($this->sendAttachementEmail($email, $result['file'])) {
                $this->prdObj->updateLeadForwarded($leadId);
            }
        } else {
            $message .= str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return;
    }

    public function detailLead($leadId) {
        $this->data['page'] = array('title' => 'Lead Detail');
        $this->data['leadDetail'] = $this->aleadObj->getLeadDetail($leadId);
        if (!$this->data['leadDetail']) {
            $message = str_replace($this->alertMessages['str_replace'], 'Lead data not found', $this->alertMessages['warning']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
            return redirect(base_url('product'));
        }
        $this->loadSiteLayout($this->data['leadView'].'detail', $this->data);
    }

}
