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
class Cmsmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function getAllPages($status = NULL) {
        $query = is_null($status) ? "SELECT * FROM tbl_pages" : "SELECT * FROM tbl_pages WHERE page_status = :status";
        $statement = $this->prepQuery($query);
        !is_null($status) ? $statement->bindParam(':status', $status, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getPageDetail($id) {
        $query = "SELECT * FROM tbl_pages WHERE pk_page_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }

    public function insertPage($param) {
        $query = "INSERT INTO tbl_pages (page_title, page_alias, page_content, page_status, page_create_date)
            VALUES ( :title, :alias, :descp, :status, NOW());";
        $statement = $this->prepQuery($query);
        $this->bindParamPages($statement, $param);
        if($statement->execute()){
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    public function updatePage($param) {
        $query = "UPDATE tbl_pages SET page_title = :title, page_alias = :alias, page_content = :descp, page_status = :status WHERE pk_page_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);
        $this->bindParamPages($statement, $param);
        if($statement->execute()){
            $response['query_status'] = TRUE;
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    private function bindParamPages($statment, $param) {
        $statment->bindParam(':title', $param['title'], PDO::PARAM_STR);
        $statment->bindParam(':alias', $param['alias'], PDO::PARAM_STR);
        $statment->bindParam(':descp', $param['descp'], PDO::PARAM_STR);
        $statment->bindParam(':status', $param['status'], PDO::PARAM_STR);
        return;
    }

    public function deletePage($id) {
        $query = "DELETE FROM tbl_pages WHERE pk_page_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function statusTogglePage($id) {
        $query = "UPDATE tbl_pages
            SET page_status = (SELECT CASE page_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_page_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

}
