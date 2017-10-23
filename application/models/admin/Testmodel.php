<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Testmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Testmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

//    functions for test
    public function getAllTest($status = '%') {
        $query = "SELECT * FROM tbl_test WHERE test_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function newTest($param) {
        $query = "INSERT INTO tbl_test (test_title, test_descp, test_status, test_crate_date)
            VALUES (:title, :descp, :status, NOW())";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':title', $param['test_title'], PDO::PARAM_STR);
        $statement->bindParam(':descp', $param['test_descp'], PDO::PARAM_STR);
        $statement->bindParam(':status', $param['test_status'], PDO::PARAM_STR);
        return $statement->execute();
    }

    public function updateTest($param) {
        $query = "UPDATE tbl_test 
            SET test_title = :title,
            test_descp = :descp,
            test_status = :tstatus
            WHERE pk_test_id= :id;";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':title', $param['test_title'], PDO::PARAM_STR);
        $statement->bindParam(':descp', $param['test_descp'], PDO::PARAM_STR);
        $statement->bindParam(':tstatus', $param['test_status'], PDO::PARAM_STR);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);
        return $statement->execute();
    }

    public function updateTestQuestionList($param) {
        $query = "INSERT INTO tbl_r_test_question (fk_test_id, fk_question_id)
                SELECT :tId, pk_question_id FROM tbl_test_question WHERE pk_question_id IN (" . $param['question_ids'] . ") AND question_status = 'active'";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':tId', $param['test_id'], PDO::PARAM_INT);
        return $statment->execute();
    }

    public function getTestDetail($id, $status = '%') {
        $query = "SELECT * FROM tbl_test WHERE pk_test_id = :id AND test_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }
    
    public function getTestProductList($id, $status = '%') {
        $query = "SELECT *
            FROM tbl_r_product_test AS rpt
            LEFT JOIN tbl_product AS p ON p.pk_product_id = rpt.fk_product_id
            WHERE rpt.fk_test_id = :id AND p.product_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result)>0 ? $result : FALSE;
        
    }

    public function getTestQuestionList($id, $status = '%') {
        $query = "SELECT rtq.*, tq.question_descp, tq.question_status, ta.pk_answer_id, ta.answer_descp, ta.answer_status
            FROM tbl_r_test_question AS rtq
            LEFT JOIN tbl_test_question AS tq ON tq.pk_question_id = rtq.fk_question_id
            LEFT JOIN tbl_test_answer AS ta ON ta.pk_answer_id = tq.fk_answer_id
            WHERE rtq.fk_test_id IN (SELECT pk_test_id FROM tbl_test) AND 
            tq.pk_question_id IN (SELECT pk_question_id FROM tbl_test_question)  AND rtq.fk_test_id = :id AND tq.question_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function deleteTest($id) {
        $query = "DELETE FROM tbl_test WHERE pk_test_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteRelTestQuestionwithTestId($id) {
        $query = "DELETE FROM tbl_r_test_question WHERE fk_test_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
    
    public function removeProductTestRelation($param) {
        $query = "DELETE FROM tbl_r_product_test WHERE fk_test_id IN (".$param['test_ids'].") AND fk_product_id IN (".$param['prd_ids'].")";
        $statement = $this->prepQuery($query);
        return $statement->execute();
    }

    public function deleteRelProductTestwithTestId($id) {
        $query = "DELETE FROM tbl_r_product_test WHERE fk_test_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function toggleStatusTest($id) {
        $query = "UPDATE tbl_test
            SET test_status = (SELECT CASE test_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_test_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

//  functions for Questions  
    public function getAllQuestion($status = NULL) {
        $query = is_null($status) ?
                "SELECT * FROM tbl_test_question AS tq LEFT JOIN tbl_test_answer AS ta ON ta.pk_answer_id = tq.fk_answer_id" :
                "SELECT * FROM tbl_test_question AS tq LEFT JOIN tbl_test_answer AS ta ON ta.pk_answer_id = tq.fk_answer_id WHERE question_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function getQuestionDetail($id) {
        $query = "SELECT * FROM tbl_test_question AS tq 
            LEFT JOIN tbl_test_answer AS ta ON ta.pk_answer_id = tq.fk_answer_id
            WHERE tq.pk_question_id = :id";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':id', $id, PDO::PARAM_INT);
        $statment->execute();
        $result = $statment->fetch(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function getChoicesforQuestion($id) {
        $query = "SELECT a.*, q.pk_question_id, q.fk_answer_id AS 'correct_id'
            FROM tbl_r_question_answer AS qa
            LEFT JOIN tbl_test_answer AS a ON a.pk_answer_id = qa.fk_answer_id
            LEFT JOIN tbl_test_question AS q ON q.pk_question_id = qa.fk_question_id
            WHERE pk_question_id = :id";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':id', $id, PDO::PARAM_INT);
        $statment->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function getTestforQuestion($id) {
        $query = "SELECT t.*, tq.*
            FROM tbl_r_test_question AS tq
            LEFT JOIN tbl_test AS t ON t.pk_test_id = tq.fk_test_id
            LEFT JOIN tbl_test_question AS q ON q.pk_question_id = tq.fk_question_id
            WHERE pk_question_id = :id";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':id', $id, PDO::PARAM_INT);
        $statment->execute();
        $result = $statment->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function newQuestion($param) {
        $query = "INSERT INTO tbl_test_question (question_descp, question_status, question_create_date)
            VALUES (:question, :status, NOW())";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':question', $param['question'], PDO::PARAM_STR);
        $statment->bindParam(':status', $param['status'], PDO::PARAM_STR);
        $statment->execute();
        return TRUE;
    }

    public function updateQuestion($param) {
        $query = "UPDATE tbl_test_question 
            SET question_descp = :question, 
            question_status = :status
            WHERE pk_question_id = :id";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':question', $param['question'], PDO::PARAM_STR);
        $statment->bindParam(':status', $param['status'], PDO::PARAM_STR);
        $statment->bindParam(':id', $param['id'], PDO::PARAM_STR);
        $statment->execute();
        return TRUE;
    }

    public function getQuestionChoiceList($id, $status = '%') {
        $query = "SELECT * FROM tbl_r_question_answer AS qa
            LEFT JOIN tbl_test_answer AS ta ON ta.pk_answer_id = qa.fk_answer_id
            WHERE qa.fk_question_id = :id AND ta.answer_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function removeQuestionTestRleation($param) {
        $query = "DELETE FROM tbl_r_test_question WHERE fk_question_id IN (" . $param['question_ids'] . ") AND fk_test_id IN (" . $param['test_ids'] . ")";
        $statment = $this->prepQuery($query);
        return $statment->execute();
    }

    public function questionChoiceUpdate($param) {
        $query = $param['func'] == 'add' ?
                "INSERT INTO tbl_r_question_answer
                    (fk_question_id, fk_answer_id)
                    SELECT :qId, pk_answer_id FROM tbl_test_answer WHERE pk_answer_id IN (" . $param['ids'] . ") AND answer_status = 'active'" :
                "DELETE FROM tbl_r_question_answer WHERE fk_question_id = :qId AND fk_answer_id IN (" . $param['ids'] . ")";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':qId', $param['question_id'], PDO::PARAM_INT);
        return $statement->execute();
    }

    public function updateQuestionCorrectChoice($id, $choiceId) {
        $query = "UPDATE tbl_test_question SET  fk_answer_id = :choiceId WHERE pk_question_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':choiceId', $choiceId, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteQuestion($id) {
        $query = "DELETE FROM tbl_test_question WHERE pk_question_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteRelChoiceQuestion($id) {
        $query = "DELETE FROM tbl_r_question_answer WHERE fk_question_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteRelTestQuestionwithQuestionId($id) {
        $query = "DELETE FROM tbl_r_test_question WHERE fk_question_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function toggleStatusQuestion($id) {
        $query = "UPDATE tbl_test_question
            SET question_status = (SELECT CASE question_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_question_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

//    functions for Answers
    public function getAllAnswer($status = NULL) {
        $query = is_null($status) ?
                "SELECT * FROM tbl_test_answer" :
                "SELECT * FROM tbl_test_answer WHERE answer_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function getAnswerDetail($id) {
        $query = "SELECT * FROM tbl_test_answer WHERE pk_answer_id = :id";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':id', $id, PDO::PARAM_INT);
        $statment->execute();
        $result = $statment->fetch(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function newAnswer($param) {
        $query = "INSERT INTO tbl_test_answer (answer_descp, answer_status, answer_create_date)
            VALUES (:answer, :status, NOW())";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':answer', $param['answer'], PDO::PARAM_STR);
        $statment->bindParam(':status', $param['status'], PDO::PARAM_STR);
        $statment->execute();
        return TRUE;
    }

    public function updateAnswer($param) {
        $query = "UPDATE tbl_test_answer 
            SET answer_descp = :answer, 
            answer_status = :status
            WHERE pk_answer_id = :id";
        $statment = $this->prepQuery($query);
        $statment->bindParam(':answer', $param['answer'], PDO::PARAM_STR);
        $statment->bindParam(':status', $param['status'], PDO::PARAM_STR);
        $statment->bindParam(':id', $param['id'], PDO::PARAM_STR);
        $statment->execute();
        return TRUE;
    }

    public function toggleStatusAnswer($id) {
        $query = "UPDATE tbl_test_answer
            SET answer_status = (SELECT CASE answer_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_answer_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteAnswer($id) {
        $query = "DELETE FROM tbl_test_answer WHERE pk_answer_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
    
    public function insertTestProductRelation($tId, $pId) {
        $query = "INSERT INTO tbl_r_product_test (fk_product_id, fk_test_id) VALUES (:pId, :tId)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':tId', $tId, PDO::PARAM_INT);
        $statement->bindParam(':pId', $pId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }
    
}
