<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailCMSmodel
 *
 * @author Syed
 */
class EmailCMSmodel extends Commonmodel{
    public function __construct() {
        parent::__construct();
    }
    
    public function getEmail($emailId = '%') {
        $query = "SELECT * FROM tbl_email WHERE pk_email_id LIKE :emailId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':emailId', $emailId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;        
    }
    
    public function insertEmail($param) {
        $query = "INSERT INTO tbl_email ( email_subject, email_body, fk_email_setting_id) VALUES (:subject, :body, :fk_setting_Id)";
        $statement = $this->prepQuery($query);
        $this->bindParamEmail($statement, $param);        
        $result = $statement->execute();
        $response['query_status'] = $result ? TRUE : FALSE;
        $response['id'] = $result ? $this->lastInsertId() : FALSE;
        $response['error_message'] = $result ? FALSE : $this->errorInfo($statement);
        return $response;
    }
    
    public function updateEmail($param) {
        $query = "UPDATE tbl_email SET email_subject = :subject, email_body = :body, fk_email_setting_id = :fk_setting_Id "
                . "WHERE pk_email_id = :emailId";
        $statement = $this->prepQuery($query);
        $this->bindParamEmail($statement, $param);
        $statement->bindParam(':emailId', $param['email_id'], PDO::PARAM_STR);
        $result = $statement->execute();
        $response['query_status'] = $result ? TRUE : FALSE;
        $response['error_message'] = $result ? FALSE : $this->errorInfo($statement);
        return $response;
    }
    
    private function bindParamEmail($statement, $param) {
        $statement->bindParam(':subject', $param['email_subject'], PDO::PARAM_STR);
        $statement->bindParam(':body', $param['email_body'], PDO::PARAM_STR);
        $statement->bindParam(':fk_setting_Id', $param['template_id'], PDO::PARAM_INT);
        return;
    }
    
    public function deleteEmail($emailId) {
        $query = "DELETE FROM tbl_email WHERE pk_email_id = :emailId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':emailId', $emailId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : FALSE;
    }
    
    public function insertEmailSetting($param) {
        $query = "INSERT INTO tbl_email_setting ( email_template) VALUES (:template)";
        $statement = $this->prepQuery($query);
        $this->bindParamEmailSetting($statement, $param);
        $result = $statement->execute();
        $response['query_status'] = $result ? TRUE : FALSE;
        $response['id'] = $result ? $this->lastInsertId() : FALSE;
        $response['error_message'] = $result ? FALSE : $this->errorInfo($statement);
        return $response;
    }
    
    public function updateEmailSetting($param) {
        $query = "UPDATE tbl_email_setting 
            SET email_template = :template
            WHERE pk_email_setting_id = :settingId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':settingId', $param['setting_id'], PDO::PARAM_INT);
        $this->bindParamEmailSetting($statement, $param);
        $result = $statement->execute();
        $response['query_status'] = $result ? TRUE : FALSE;
        $response['error_message'] = $result ? FALSE : $this->errorInfo($statement);
        return $response;
    }
    
    private function bindParamEmailSetting($statement, $param){
        $statement->bindParam(':template', $param['email_template'], PDO::PARAM_STR);
        return;
    }
    
    public function getEmailSetting($id='%') {
        $query = "SELECT * FROM tbl_email_setting WHERE pk_email_setting_id LIKE :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function deleteEmailSetting($id) {
        $query = "DELETE FROM tbl_email_setting WHERE pk_email_setting_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute()? TRUE : FALSE;        
    }
}
