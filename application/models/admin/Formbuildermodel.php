<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formbuildermodel
 *
 * @author Syed Tausif Ali Shah
 */
class Formbuildermodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function getFieldList($type = NULL) {
        $query = is_null($type) ? "SELECT * FROM tbl_form_field" : "SELECT * FROM tbl_form_field WHERE field_type = :type";
        $statement = $this->prepQuery($query);
        !is_null($type) ? $statement->bindParam(':type', $type, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getField($id) {
        $query = "SELECT * FROM tbl_form_field WHERE pk_field_id = :id";
        $statement = $this->prepQuery($query);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getFieldAttributes() {
        $query = "SELECT * FROM tbl_field_attribute WHERE 1 ORDER BY field_attribute_required DESC , pk_field_attribute_id ASC";
        $statement = $this->prepQuery($query);

        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function insertNewField($param) {
        $query = "INSERT INTO tbl_form_field (field_label, field_type, field_attributes) VALUES (:flabel, :ftype, :fattributes);";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':flabel', $param['flabel'], PDO::PARAM_STR);
        $statement->bindParam(':ftype', $param['ftype'], PDO::PARAM_STR);
        $statement->bindParam(':fattributes', $param['fattributes'], PDO::PARAM_STR);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    public function insertNewForm($param) {
        $query = "INSERT INTO tbl_form (form_title) VALUES (:ftitle)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':ftitle', $param['ftitle'], PDO::PARAM_STR);

        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    public function updateForm($param) {
        $query = "UPDATE tbl_form SET  form_title = :ftitle WHERE pk_form_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':ftitle', $param['ftitle'], PDO::PARAM_STR);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function getFormList() {
        $query = "SELECT * FROM tbl_form";
        $statement = $this->prepQuery($query);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getFormDetail($id) {
        $query = "SELECT * FROM tbl_form AS f WHERE f.pk_form_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function getFormFields($id) {
        $query = "SELECT * FROM tbl_form_field AS ff
            LEFT JOIN tbl_r_form_field AS rff ON rff.fk_field_id = ff.pk_field_id
            WHERE rff.fk_form_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getFieldListUniquetoForm($id) {
        $query = "SELECT * FROM tbl_form_field WHERE pk_field_id NOT IN (SELECT fk_field_id FROM tbl_r_form_field WHERE fk_form_id = :id)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function addFieldFormRel($formId, $fieldId) {
        $query = "INSERT INTO tbl_r_form_field (fk_form_id, fk_field_id) VALUES (:formId, :fieldId);";
        return $this->runFormFieldRelFunc($query, $formId, $fieldId);
    }

    public function removeFieldFormRel($formId, $fieldId) {
        $query = "DELETE FROM tbl_r_form_field WHERE fk_form_id = :formId AND fk_field_id = :fieldId ";
        return $this->runFormFieldRelFunc($query, $formId, $fieldId);
    }

    private function runFormFieldRelFunc($query, $formId, $fieldId) {
        $statement = $this->prepQuery($query);
        $statement->bindParam(':formId', $formId, PDO::PARAM_INT);
        $statement->bindParam(':fieldId', $fieldId, PDO::PARAM_INT);
        if ($statement->execute()) {
            $response = array('query_status' => TRUE);
        } else {
            $response = array('query_status' => FALSE, 'message' => $this->errorInfo($statement));
        }
        return $response;
    }
    
    public function deleteForm($id) {
        $query = "DELETE FROM tbl_form WHERE pk_form_id = :id";
        return $this->runDeleteQuery($query, $id);
    }
    
    public function deleteField($id) {
        $query = "DELETE FROM tbl_form_field WHERE pk_field_id = :id";
        return $this->runDeleteQuery($query, $id);
    }
    
    private function runDeleteQuery($query, $id){
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

}
