<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboardmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Dashboardmodel extends Commonmodel{
    public function __construct() {
        parent::__construct();
    }
    
    public function updateAgent($id, $param) {
        $query = "UPDATE tbl_agent
            SET agent_first_name = :fname, agent_middle_name = :mname, agent_last_name = :lname, agent_phone = :phone, agent_nationality = :nationality,
            agent_gender = :gender,  agent_dob = :dob, agent_education = :education, agent_current_city = :ccity, 
            agent_current_city_area = :ccity_area, agent_work_city = :work_city
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

    private function bindStatmentAgent($statement, $param) {
        $statement->bindParam(':fname', $param['fname'], PDO::PARAM_STR);
        $statement->bindParam(':mname', $param['mname'], PDO::PARAM_STR);
        $statement->bindParam(':lname', $param['lname'], PDO::PARAM_STR);
//        $statement->bindParam(':email', $param['email'], PDO::PARAM_STR);
        $statement->bindParam(':phone', $param['phone'], PDO::PARAM_STR);
        $statement->bindParam(':nationality', $param['nationality'], PDO::PARAM_STR);
//        $statement->bindParam(':passport', $param['passport'], PDO::PARAM_STR);
//        $statement->bindParam(':visa_status', $param['visa_status'], PDO::PARAM_STR);
        $statement->bindParam(':gender', $param['gender'], PDO::PARAM_STR);
        $statement->bindParam(':dob', $param['dobDB'], PDO::PARAM_STR);
        $statement->bindParam(':education', $param['education'], PDO::PARAM_STR);
        $statement->bindParam(':ccity', $param['ccity'], PDO::PARAM_STR);
        $statement->bindParam(':ccity_area', $param['ccity_area'], PDO::PARAM_STR);
        $statement->bindParam(':work_city', $param['work_city'], PDO::PARAM_STR);
//        $statement->bindParam(':status', $param['status'], PDO::PARAM_STR);
        return;
    }
}
