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
class Product extends Basecontroller{
    
    private $data;
    private $aPrdObj;
    private $prdObj;
    
    public function __construct() {
        parent::__construct();
        
        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Productmodel', 'SiteProductmodel'));

        $this->data = array(
            'page' => array('title' => 'Product'),
            'flashKey' => 'message_dashboard_product',
            'view' => 'site/agent/product/'
        );
        
        $this->aPrdObj = new Productmodel;
        $this->prdObj = new SiteProductmodel;
    }
    
    public function index() {
        $this->data['productList'] = $this->prdObj->getAllProducts('active');
        $this->loadSiteLayout($this->data['view'].'all_product', $this->data);
    }
    
    private function checkProductLockStatus(){
        
    }
}
