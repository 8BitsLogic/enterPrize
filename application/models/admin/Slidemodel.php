<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cmsmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Slidemodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }
    
    public function getAllSlides($status = NULL) {
        $query = is_null($status) ? "SELECT * FROM tbl_slider ORDER BY slide_create_date DESC" : "SELECT * FROM tbl_slider WHERE slide_status = :status ORDER BY slide_create_date DESC";
        $statement = $this->prepQuery($query);
        !is_null($status) ? $statement->bindParam(':status', $status, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function getSlideDetail($id) {
        $query = "SELECT * FROM tbl_slider WHERE pk_slide_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function insertSlide($param) {
        $query = "INSERT INTO tbl_slider (slide_link, slide_location, slide_create_date)
            VALUES (:link, :sloc, NOW())";
        $statement = $this->prepQuery($query);
        $this->bindParamSlide($statement, $param);
        if($statement->execute()){
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }
        return $response;        
    }
    
    public function updateSlide($param) {
        $query = "UPDATE tbl_slider SET slide_link = :link, slide_location = :sloc WHERE pk_slide_id = :id";
        $statement = $this->prepQuery($query);
        $this->bindParamSlide($statement, $param);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);
        if($statement->execute()){
            $response['query_status'] = TRUE;
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }
        return $response;        
    }
    
    private function bindParamSlide($statment, $param) {
        $statment->bindParam(':link', $param['slideLink']['slink'], PDO::PARAM_STR);
        $statment->bindParam(':sloc', $param['slideLink']['sloc'], PDO::PARAM_STR);
        return;
    }

    public function deleteSlide($id) {
        $query = "DELETE FROM tbl_slider WHERE pk_slide_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function statusToggleSlide($id) {
        $query = "UPDATE tbl_slider
            SET slide_status = (SELECT CASE slide_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_slide_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }
    
    public function updateSlidePos($id, $pos) {
        $query = "UPDATE tbl_slider SET slide_number = :pos WHERE pk_slide_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':pos', $pos, PDO::PARAM_INT);
        return $statement->execute();
        
    }

}
