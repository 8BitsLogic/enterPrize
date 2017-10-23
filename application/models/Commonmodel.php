<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commonmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Commonmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    protected function prepQuery($query) {
        return $this->db->conn_id->prepare($query);
    }
    
    protected function lastInsertId(){
        return $this->db->conn_id->lastInsertId();
    }
    
    protected function errorInfo($statement) {
        $error = $statement->errorInfo();
        return $error[0] != 00000 ?  $error[0].': '.$error[2] : FALSE;
    }
    
    public function getAllSlides($status = 'active') {
        $query = "SELECT * FROM tbl_slider WHERE slide_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
        
    }
    
    public function getStaticPage($slug) {
        $query = "SELECT * FROM tbl_pages WHERE page_alias = :slug";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':slug', $slug, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }
}
