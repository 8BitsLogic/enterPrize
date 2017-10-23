<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Syed Tausif Ali Shah
 */
class Index extends Basecontroller{
    
    public $data;
    private $cmObj;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model(array('Commonmodel'));
        
        $this->data = array(
            'page' => array('title' => 'BYOB | Home'),
            'flashKey' => '',
            'view' => 'site/home/'
        );
        
        $this->cmObj = new Commonmodel;
    }
    
    public function index() {
        $this->checkAgentLogin() ? redirect(base_url('dashboard')) : redirect(base_url('login'));
        $this->data['slideList'] = $this->cmObj->getAllSlides();
        $this->loadSiteLayout($this->data['view'].'index', $this->data);
    }
    
    public function staticPages($slug) {
        $this->data['pageData'] = $this->cmObj->getStaticPage($slug);
        if(!$this->data['pageData']){
            return redirect(base_url());
        }
        $this->loadSiteLayout($this->data['view'].'static_page_template1', $this->data);
    }
}
