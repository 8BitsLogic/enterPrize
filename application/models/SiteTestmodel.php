<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteTestmodel
 *
 * @author Syed
 */
class SiteTestmodel extends Commonmodel{
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllTest($agentId, $attempt = 1, $status = '%') {
        $query = "SELECT * FROM tbl_test
            WHERE test_status LIKE :status AND
            pk_test_id NOT IN (SELECT DISTINCT fk_test_id FROM tbl_test_attempt WHERE test_attempt = :attempt AND fk_agent_id = :agentId)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':attempt', $attempt, PDO::PARAM_INT);
        $statement->bindParam(':agentId', $agentId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }
    
    public function insertTestAttempt($param) {
        $query = "INSERT INTO tbl_test_attempt (fk_agent_id, fk_test_id, total_question, correct_answer, test_attempt)
            VALUES (:userId, :testId, :totalQ, :correctA, :attempt);";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':userId', $param['user_id'], PDO::PARAM_INT);
        $statement->bindParam(':testId', $param['test_id'], PDO::PARAM_INT);
        $statement->bindParam(':totalQ', $param['total'], PDO::PARAM_INT);
        $statement->bindParam(':correctA', $param['correct'], PDO::PARAM_INT);
        $statement->bindParam(':attempt', $param['pass'], PDO::PARAM_INT);
        
        if($statement->execute()){
            $response['query_status'] = TRUE;
        }else{
            $response['query_status'] = FALSE;
            $response['error_message'] = $this->errorInfo($statement);
        }
        return $response;
    }
}
