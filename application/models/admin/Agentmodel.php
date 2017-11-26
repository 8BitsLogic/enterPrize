<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agentmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Agentmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function getAllAgents($status = NULL) {

        $query = is_null($status) ?
                "SELECT * FROM tbl_agent WHERE 1" :
                "SELECT * FROM tbl_agent WHERE agent_status = ':status'";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function toggleStatus($id) {
        $query = "UPDATE tbl_agent
            SET agent_status = (SELECT CASE agent_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_agent_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function createAgent($param) {
        $query = "INSERT INTO tbl_agent (agent_username, agent_first_name, agent_middle_name, agent_last_name, agent_email, agent_phone, 
            agent_nationality, agent_passport, agent_visa_status, agent_gender, agent_dob, agent_education, agent_current_city, 
            agent_current_city_area, agent_work_city, agent_password, agent_status, agent_create_date)
            VALUES (:username, :fname, :mname, :lname, :email, :phone, :nationality, :passport, :visa_status, :gender, 
            :dob, :education, :ccity, :ccity_area, :work_city, SHA1(:password), :status, NOW());";
        $statement = $this->prepQuery($query);
        $this->bindStatementCreateAgent($statement, $param);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['agent_id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['error_info'] = $statement->errorInfo();
        }
        return $response;
    }

    public function updateAgent($id, $param) {
        $query = "UPDATE tbl_agent
            SET agent_first_name = :fname, agent_middle_name = :mname, agent_last_name = :lname,
            agent_email = :email, agent_phone = :phone, agent_nationality = :nationality,
            agent_passport = :passport, agent_visa_status = :visa_status, agent_gender = :gender,  agent_dob = :dob,
            agent_education = :education, agent_current_city = :ccity, agent_current_city_area = :ccity_area,
            agent_work_city = :work_city, agent_status = :status
            WHERE pk_agent_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $this->bindStatmentAgent($statement, $param);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
        } else {
            $response['query_status'] = FALSE;
            $response['error_info'] = $statement->errorInfo();
        }
        return $response;
    }

    private function bindStatementCreateAgent($statement, $param) {
        $statement->bindParam(':username', $param['username'], PDO::PARAM_STR);
        $statement->bindParam(':password', $param['password'], PDO::PARAM_STR);
        $this->bindStatmentAgent($statement, $param);
        return;
    }

    private function bindStatmentAgent($statement, $param) {
        $statement->bindParam(':fname', $param['fname'], PDO::PARAM_STR);
        $statement->bindParam(':mname', $param['mname'], PDO::PARAM_STR);
        $statement->bindParam(':lname', $param['lname'], PDO::PARAM_STR);
        $statement->bindParam(':email', $param['email'], PDO::PARAM_STR);
        $statement->bindParam(':phone', $param['phone'], PDO::PARAM_STR);
        $statement->bindParam(':nationality', $param['nationality'], PDO::PARAM_STR);
        $statement->bindParam(':passport', $param['passport'], PDO::PARAM_STR);
        $statement->bindParam(':visa_status', $param['visa_status'], PDO::PARAM_STR);
        $statement->bindParam(':gender', $param['gender'], PDO::PARAM_STR);
        $statement->bindParam(':dob', $param['dobDB'], PDO::PARAM_STR);
        $statement->bindParam(':education', $param['education'], PDO::PARAM_STR);
        $statement->bindParam(':ccity', $param['ccity'], PDO::PARAM_STR);
        $statement->bindParam(':ccity_area', $param['ccity_area'], PDO::PARAM_STR);
        $statement->bindParam(':work_city', $param['work_city'], PDO::PARAM_STR);
        $statement->bindParam(':status', $param['status'], PDO::PARAM_STR);
        return;
    }

    public function getSimilarUsername($username) {
        $query = "SELECT agent_username FROM tbl_agent WHERE agent_username LIKE ('" . $username . "%') ORDER BY agent_username DESC LIMIT 1";
        $statement = $this->prepQuery($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result['agent_username'] : FALSE;
    }

    public function deleteAgent($id) {
        $query = "DELETE FROM tbl_agent WHERE pk_agent_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getAgentDetail($id) {
        $query = "SELECT * FROM tbl_agent WHERE pk_agent_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function getAllInvites() {
        $query = "SELECT * FROM tbl_agent_invite";
        $statement = $this->prepQuery($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result : FALSE;
    }

    public function saveInvite($param) {
        $query = "INSERT INTO tbl_agent_invite (invite_email, invite_name, invite_activation_key)
            VALUES (:email, :name, MD5(:uId))";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':email', $param['email'], PDO::PARAM_STR);
        /*
         * fix below 
         * $statement->bindParam(':name', $param['name'], PDO::PARAM_STR);
         */
        $statement->bindParam(':name', $param['uId'], PDO::PARAM_STR);
        $statement->bindParam(':uId', $param['uId'], PDO::PARAM_STR);
        return $statement->execute();
    }

    public function updatePassword($id, $password) {
        $query = "UPDATE tbl_agent SET agent_password = SHA1(:password) WHERE pk_agent_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
        } else {
            $response['query_status'] = FALSE;
            $response['error_info'] = $statement->errorInfo();
        }
        return $response;
    }
    
    public function checkAgentisActive($agentId) {
        $query = "SELECT *  FROM tbl_agent WHERE pk_agent_id = :id AND agent_status = 'active'";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $agentId, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? TRUE : FALSE;
        
    }

}
