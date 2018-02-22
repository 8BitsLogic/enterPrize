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
class Training extends Basecontroller{
    
    private $data;
    private $aTrainingObj;


    public function __construct() {
        parent::__construct();
        
        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Trainingmodel'));

        $this->data = array(
            'page' => array('title' => 'Trainings'),
            'flashKey' => 'message_dashboard_trainings',
            'view' => $this->theme. 'agent/training/',
            'agentPic' => $this->getAgentPic(),
            'availableFunds' => $this->getAgentAvailableFunds($this->agentDetail['pk_agent_id']),
        );
        
        $this->aTrainingObj = new Trainingmodel;
    }
    
    public function index() {
        $this->data['trainingList'] = $this->aTrainingObj->getAllTraining('active');
        $this->loadSiteLayout($this->data['view'].'all_training', $this->data);
    }
    
    public function detail($id) {
        $this->getTrainingData($id);
        $this->data['trainingDetail'] ? '' : redirect(base_url('training'));
        $this->loadSiteLayout($this->data['view'] . 'detail', $this->data);
    }

    private function getTrainingData($id) {
        $this->data['trainingDetail'] = $this->aTrainingObj->getTrainingDetail($id, 'active');
        $this->data['trainingResources'] = $this->aTrainingObj->getTrainigResourcesWithTid($id, 'active');
        $this->data['trainingProducts'] = $this->aTrainingObj->getTrainigProductListWithTid($id, 'active');
        return;
    }
}
