<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test
 *
 * @author Syed
 */
class Test extends Basecontroller {

    private $data;
    private $aTestObj;
    private $testObj;

    public function __construct() {
        parent::__construct();

        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('admin/Testmodel', 'SiteTestmodel'));
        $this->load->library(array('imgWrite/ImgWrite'));
        $this->load->helper('string_helper');

        $this->data = array(
            'page' => array('title' => 'Tests'),
            'flashKey' => 'message_dashboard_test',
            'view' => $this->theme. 'agent/test/',
            'agentPic' => $this->getAgentPic(),
            'availableFunds' => $this->getAgentAvailableFunds($this->agentDetail['pk_agent_id']),
        );

        $this->aTestObj = new Testmodel;
        $this->testObj = new SiteTestmodel;
    }

    public function index() {
        $this->data['testList'] = $this->testObj->getAllTest($this->agentDetail['pk_agent_id'], 1, $this->status);
        $this->loadSiteLayout($this->data['view'] . 'all_test', $this->data);
    }

    public function detail($testId) {
        $this->getTestData($testId);
        $this->data['testDetail'] && $this->data['testQuestions'] ? '' : redirect(base_url('test'));
        $this->loadSiteLayout($this->data['view'] . 'detail', $this->data);
    }

    private function getTestData($testId) {
        $this->data['testDetail'] = $this->aTestObj->getTestDetail($testId, $this->status);
        $this->data['testProducts'] = $this->aTestObj->getTestProductList($testId, $this->status);
        $this->data['testQuestions'] = $this->aTestObj->getTestQuestionList($testId, $this->status);
        return;
    }

    public function takeTest($testId) {
        $this->getTestData($testId);
        $this->data['testDetail'] && $this->data['testQuestions'] ? '' : redirect(base_url('test'));
        $this->data['questionList'] = $this->aTestObj->getTestQuestionList($testId, $this->status);
        $this->makeQuestionChoiceList();
        $this->loadSiteLayout($this->data['view'] . 'take_test', $this->data);
    }

    private function makeQuestionChoiceList() {
        while (list($key, $value) = each($this->data['questionList'])) {
            $choiceList = $this->aTestObj->getQuestionChoiceList($value['fk_question_id'], $this->status);
            if (!$choiceList) {
                unset($this->data['questionList'][$key]);
            } else {
                $this->data['choiceList'][$value['fk_question_id']] = $choiceList;
            }
        }
        return;
    }

    public function testAttempt($testId) {
        if ($this->input->post('submit')) {
            $this->validateTestPost();
            $this->processResult($testId);
            $this->data['attempt']['pass'] ? $this->testSuccess($testId) : $this->loadSiteLayout($this->data['view'] . 'test_result_fail', $this->data);
        } else {
            return redirect(base_url('test/take_test/' . $testId));
        }
    }
    
    private function testSuccess($testId) {
//        echo '<pre>';
//        var_dump($this->agentDetail, $this->data);
        $this->getTestData($testId);
        $fullName = $this->agentDetail['agent_first_name'].' '.$this->agentDetail['agent_middle_name'].' '.$this->agentDetail['agent_last_name'];
        $this->data['certificate'] = $this->signCertificate($this->agentDetail['pk_agent_id'], $fullName, $this->data['testDetail']['test_title']);
        $this->data['agentDetail'] = $this->agentDetail;
        $this->loadSiteLayout($this->data['view'].'test_result', $this->data);
    }

    private function processResult($testId) {
        $correctAnswer = $this->correctAnswerList($this->aTestObj->getTestQuestionList($testId, $this->status));
        $attempt = $this->compareAnswers($correctAnswer, $this->input->post('question'));
        $attempt['pass'] = ($attempt['correct'] / $attempt['total']) == 1 ? 1 : 0;
        $attempt['test_id'] = $testId;
        $attempt['user_id'] = $this->agentDetail['pk_agent_id'];
        $this->data['attempt'] = $attempt;
        $this->testObj->insertTestAttempt($attempt);
    }

    private function compareAnswers($correctAnwer, $postAnswer) {
        $response['total'] = count($correctAnwer['correct_choice']);
        $response['wrongQuestions'] = array();
        $response['correct'] = 0;
        foreach ($correctAnwer['correct_choice'] as $aKey => $ans) {
            if (isset($postAnswer[$aKey]) && $postAnswer[$aKey] == $ans) {
                $response['correct'] ++;
            } else {
                array_push($response['wrongQuestions'], $correctAnwer['question'][$aKey]);
            }
        }
        return $response;
    }

    private function correctAnswerList($questionList) {
        $response = FALSE;
        foreach ($questionList as $question) {
            $response['correct_choice'][$question['fk_question_id']] = $question['pk_answer_id'];
            $response['question'][$question['fk_question_id']] = $question['question_descp'];
        }
        return $response;
    }

    private function validateTestPost() {
        return TRUE;
    }

    private function signCertificate($userId, $fullName, $testName) {
        /*
         * userId
         * full name
         * test name
         */
        $imgObj = new ImgWrite();
        $image_filepath = $this->themeUrl . '/images/cert_sample.png';
        $imageSavePath = APPPATH . '/../public/uploads/user/'.$userId.'/certificate';
        $this->certDir($imageSavePath);
        $imageSaveName = 'cert-' . date('Ymd') . '-' . random_string('alnum', 8) .'-'.substr(preg_replace('~[\\\\/:*?"<>|.,!@#$%^&(){}| ]~', '_', $testName), 0, 150). '.jpg';
        $imgObj->signCertificate(substr($fullName, 0 , 19), $image_filepath, $this->themeUrl, $imageSavePath, $imageSaveName);
        return $imageSaveName;
    }
    
    private function certDir($dirPath) {
        $slug = explode('uploads/user/', $dirPath)[1];
        foreach (explode('/', $slug) as $key => $value) {
            $this->dirCheck($dirPath, $value);
        }
        return;
    }
    
    private function dirCheck($dirPath, $slug){
        $chkPath = explode($slug, $dirPath)[0].$slug;
        return is_dir($chkPath) ? TRUE : mkdir($chkPath, 0777, TRUE);
    }

    private function testFailed($param) {
        
    }

}
