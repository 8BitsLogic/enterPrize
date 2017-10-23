<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test
 *
 * @author Syed Tausif Ali Shah
 */
class Test extends Basecontroller {

    public $data;
    protected $testObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Testmodel');

        $this->data = array(
            'page' => array('title' => 'Test'),
            'view' => 'admin/test/'
        );
        $this->testObj = new Testmodel;
    }

    public function index() {
        $this->data['testList'] = $this->testObj->getAllTest();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid_test');
    }

    public function newTest() {
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_test');
    }

    public function editTest($id) {
        $this->getTestDetails($id);
        $this->getTestRelatedList();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_test');
    }

    public function postTest($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validateTest()) {
                $testArr = array(
                    'test_title' => $this->input->post('test_title'),
                    'test_descp' => $this->input->post('test_descp'),
                    'test_status' => $this->input->post('test_status'),
                    'id' => $id
                );
                $response = is_null($id) ? $this->testObj->newTest($testArr) : $this->testObj->updateTest($testArr);
                $message = str_replace($this->alertMessages['str_replace'], 'Success', $this->alertMessages['success']);
                $this->session->set_flashdata('message_test', $message);
            }
        }
        return redirect(base_url('admin/test'));
    }

    private function validateTest() {
        return TRUE;
    }

    public function detailTest($id) {
        $this->getTestDetails($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail_test');
    }

    private function getTestDetails($id) {
        $this->data['testDetail'] = $this->testObj->getTestDetail($id);
        $this->data['testQuestionList'] = $this->testObj->getTestQuestionList($id);
        $this->data['testProductList'] = $this->testObj->getTestProductList($id);
        return;
    }

    private function getTestRelatedList() {
        $this->data['questionList'] = $this->testObj->getAllQuestion('active');
        return;
    }

    public function deleteTest($id) {
        $this->testObj->deleteTest($id);
        $this->testObj->deleteRelTestQuestionwithTestId($id);
        $this->testObj->deleteRelProductTestwithTestId($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Test Deleted.', $this->alertMessages['success']);
        $this->session->set_flashdata('message_test', $message);
        return redirect(base_url('admin/test'));
    }

    public function toggleStatusTest($id) {
        $this->testObj->toggleStatusTest($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Status updated.', $this->alertMessages['success']);
        $this->session->set_flashdata('message_test', $message);
        return redirect(base_url('admin/test'));
    }

    public function testQuestionList($id, $func) {
        switch ($func) {
            case "add":
                $this->addQuestiontoTest($id);
                break;

            case "remove":
                $this->removeQuestionforTest($id);
                break;

            case "remove-product":
                $this->removeRelProductTest($id);
                break;

            default:
                return redirect(base_url('admin/test'));
                break;
        }
    }
    
    private function removeRelProductTest($id){
        if ($this->input->post('submit')) {
            if($this->validatePrdList()){
                $param = array(
                    'test_ids' => $id,
                    'prd_ids' => implode(',', $this->input->post('prd-list'))
                );
                $this->testObj->removeProductTestRelation($param);
                $message = str_replace($this->alertMessages['str_replace'], 'Test removed from product', $this->alertMessages['success']);
                $this->session->set_flashdata('message_test', $message);
            }
        }
        return redirect(base_url('admin/test/edit/'. $id));
    }
    
    private function validatePrdList() {
        return TRUE;
    }

    private function addQuestiontoTest($id) {
        if ($this->input->post('submit')) {
            if ($this->validateQuestionList()) {
                $param = array(
                    'test_id' => $id,
                    'question_ids' => implode(',', $this->input->post('questions'))
                );
                $this->testObj->updateTestQuestionList($param);
                $message = str_replace($this->alertMessages['str_replace'], 'Question added to Test', $this->alertMessages['success']);
            }
        }
        return redirect(base_url('admin/test/edit/' . $id));
    }

    private function removeQuestionforTest($id) {
        if ($this->input->post('submit')) {
            if ($this->validateQuestionList()) {
                $param = array(
                    'test_ids' => $id,
                    'question_ids' => implode(',', $this->input->post('questions'))
                );
                $this->testObj->removeQuestionTestRleation($param);
                $message = str_replace($this->alertMessages['str_replace'], 'Question removed from Test', $this->alertMessages['success']);
            }
        }
        return redirect(base_url('admin/test/edit/' . $id));
    }

    private function validateQuestionList() {
        return TRUE;
    }

//    functions for Questions
    public function listQuestion() {
        $this->data['questionList'] = $this->testObj->getAllQuestion();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid_question');
    }

    public function newQuestion() {
        $this->data['answerList'] = $this->testObj->getAllAnswer('active');
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_question');
    }

    public function detailQuestion($id) {
        $this->getQuestionDetails($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'detail_question');
    }

    private function getQuestionDetails($id) {
        $this->data['questionDetail'] = $this->testObj->getQuestionDetail($id);
        $this->data['questionChoicesList'] = $this->testObj->getQuestionChoiceList($id);
        $this->data['questionTestList'] = $this->testObj->getTestforQuestion($id);
        return;
    }

    private function getQuestionRelatedLists() {
        $this->data['answerList'] = $this->testObj->getAllAnswer('active');
//        $this->data['testList'] = $this->testObj->getAllTest('active');
        return;
    }

    public function editQuestion($id) {
        $this->getQuestionRelatedLists();
        $this->getQuestionDetails($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_question');
    }

    public function postQuestion($id = NULL) {
        $response = FALSE;
        if ($this->input->post('submit')) {
            if ($this->validateQuestion()) {
                $questionArr = array(
                    'question' => $this->input->post('question'),
                    'status' => $this->input->post('status') != 'active' ? 'inactive' : $this->input->post('status'),
                    'id' => $id
                );
                $response = is_null($id) ? $this->testObj->newQuestion($questionArr) : $this->testObj->updateQuestion($questionArr);
                $message = str_replace($this->alertMessages['str_replace'], 'Success', $this->alertMessages['success']);
                $this->session->set_flashdata('message_question', $message);
            }
        }
        return redirect(base_url('admin/test/question/edit/' . $id));
    }

    public function questionChoices($id, $func) {
        switch ($func) {
            case "add":
            case "remove":
                $this->addRemoveQuestionChoices($id, $func);
                break;

            case "correct":
                $this->setCorrectChoice($id);
                break;

            case "remove-test":
                $this->removeQuestionTestRelation($id);
                break;

            default:
                return redirect(base_url('admin/test/question'));
        }
    }

    private function removeQuestionTestRelation($id) {
        if ($this->input->post('submit')) {
            if ($this->validateTestChoices()) {
                $param['test_ids'] = implode(',', $this->input->post('test-list'));
                $param['question_ids'] = $id;
                $message = $this->testObj->removeQuestionTestRleation($param) ?
                        str_replace($this->alertMessages['str_replace'], 'Question removed from test set.', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again.', $this->alertMessages['warning']);
                $this->session->set_flashdata('message_question', $message);
            }
        }
        return redirect(base_url('admin/test/question/edit/' . $id));
    }

    private function validateTestChoices() {
        return TRUE;
    }

    private function setCorrectChoice($id) {
        if ($this->input->post('submit')) {
            if ($this->validateCorrectChoice()) {
                $choiceId = $this->input->post('correct-choice');
                $message = $this->testObj->updateQuestionCorrectChoice($id, $choiceId) ?
                        str_replace($this->alertMessages['str_replace'], 'New answer update successful.', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again.', $this->alertMessages['warning']);
                $this->session->set_flashdata('message_question', $message);
            }
        }
        return redirect(base_url('admin/test/question/edit/' . $id));
    }

    private function validateCorrectChoice() {
        return TRUE;
    }

    private function addRemoveQuestionChoices($id, $func) {
        if ($this->input->post('submit')) {
            if ($this->questionChoiceValidate()) {
                $param = array(
                    'func' => $func == 'add' ? $func : 'remove',
                    'question_id' => $id,
                    'ids' => implode(',', $this->input->post('choices'))
                );
                $this->testObj->questionChoiceUpdate($param);
                $message = $func == 'add' ?
                        str_replace($this->alertMessages['str_replace'], 'New option added.', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], 'Option removed.', $this->alertMessages['warning']);
                $this->session->set_flashdata('message_question', $message);
            }
        }
        return redirect(base_url('admin/test/question/edit/' . $id));
    }

    private function questionChoiceValidate() {
        return TRUE;
    }

    private function validateQuestion() {
        return TRUE;
    }

    public function deleteQuestion($id) {
        $this->testObj->deleteQuestion($id);
        $this->testObj->deleteRelChoiceQuestion($id);
        $this->testObj->deleteRelTestQuestionwithQuestionId($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Question Deleted.', $this->alertMessages['success']);
        $this->session->set_flashdata('message_question', $message);
        return redirect(base_url('admin/test/question'));
    }

    public function toggleStatusQuestion($id) {
        $this->testObj->toggleStatusQuestion($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Status update successful.', $this->alertMessages['succsess']);
        $this->session->set_flashdata('message_question', $message);
        return redirect(base_url('admin/test/question'));
    }

//    Functions for answers
    public function listAnswer() {
        $this->data['answerList'] = $this->testObj->getAllAnswer();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid_answer');
    }

    public function newAnswer() {
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_answer');
    }

    public function editAnswer($id) {
        $this->data['answerDetail'] = $this->testObj->getAnswerDetail($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'form_answer');
    }

    public function postAnswer($id = NULL) {
        $response = FALSE;
        if ($this->input->post('submit')) {
            if ($this->validateAnswer()) {
                $answerArr = array(
                    'answer' => $this->input->post('answer'),
                    'status' => $this->input->post('status') != 'active' ? 'inactive' : $this->input->post('status'),
                    'id' => $id
                );
                $response = is_null($id) ? $this->testObj->newAnswer($answerArr) : $this->testObj->updateAnswer($answerArr);
                $message = str_replace($this->alertMessages['str_replace'], 'Success.', $this->alertMessages['success']);
                $this->session->set_flashdata('message_answer', $message);
            }
        }
        return redirect(base_url('admin/test/answer'));
    }

    private function validateAnswer() {
        return TRUE;
    }

    public function deleteAnswer($id) {
        $this->testObj->deleteAnswer($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Answer delteted..', $this->alertMessages['warning']);
        $this->session->set_flashdata('message_answer', $message);
        return redirect(base_url('admin/test/answer'));
    }

    public function toggleStatusAnswer($id) {
        $this->testObj->toggleStatusAnswer($id);
        $message = str_replace($this->alertMessages['str_replace'], 'Status update successful.', $this->alertMessages['success']);
        $this->session->set_flashdata('message_answer', $message);
        return redirect(base_url('admin/test/answer'));
    }

}
