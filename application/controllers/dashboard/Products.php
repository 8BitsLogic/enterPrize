<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *
 * @author Syed Tausif Ali Shah
 */
class Products extends Basecontroller{
    
    private $data;
    private $aProductObj;
    
    public function __construct() {
        parent::__construct();
        
        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Productmodel'));

        $this->data = array(
            'page' => array('title' => 'Products'),
            'flashKey' => 'message_dashboard_products',
            'view' => 'site/agent/product/'
        );
        
        $this->aProductObj = new Productmodel;

    }
    
    public function index() {
        $this->data['productList'] = $this->aProductObj->getAllProducts('active');
        
    }
    
    private function getAgentProductList(){
        $prdList = $this->aProductObj->getAllProducts('active');
        if(is_array($prdList)){
            
        }
    }
    
}
