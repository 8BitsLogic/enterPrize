<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Dashboard extends Basecontroller {

    private $data;
            
    function __construct() {
        parent::__construct();
        
    }

    public function index() {
        
        $this->loadAdminLayout($this->data, 'admin/dashboard/content');
    }

}
