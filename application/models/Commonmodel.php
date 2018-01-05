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

    protected function lastInsertId() {
        return $this->db->conn_id->lastInsertId();
    }

    protected function errorInfo($statement) {
        $error = $statement->errorInfo();
        return $error[0] != 00000 ? $error[0] . ': ' . $error[2] : FALSE;
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

    public function getLeadCountForInterval($interval, $status = '%') {
        $query = "SELECT COUNT(pk_lead_id) AS rowcount
            FROM tbl_lead  WHERE lead_status LIKE (:status) AND ".$this->leadCountWhereClause($interval);
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() ? $statement->fetch(PDO::FETCH_ASSOC)['rowcount'] : FALSE;
    }

    private function leadCountWhereClause($value) {
        $whereClauseArr = array(
            'DATE_FORMAT(lead_craete_date,"%Y-%u") = DATE_FORMAT(NOW(), "%Y-%u")' => 'cWeek',
            'DATE_FORMAT(lead_craete_date,"%Y-%u") = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 WEEK), "%Y-%u")' => 'pWeek',
            'DATE_FORMAT(lead_craete_date,"%Y-%m") = DATE_FORMAT(NOW(), "%Y-%m")' => 'cMonth',
            'DATE_FORMAT(lead_craete_date,"%Y-%m") = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 MONTH), "%Y-%m")' => 'pMonth',
            'YEAR(lead_craete_date) = YEAR(NOW())' => 'cYear',
            'YEAR(lead_craete_date) = YEAR(DATE_SUB(NOW(), INTERVAL 1 YEAR))' => 'pYear'
        );
        return array_search($value, $whereClauseArr);
    }
    
    public function getTopPerformer($limitCount = 4) {
        $query = "SELECT COUNT(l.pk_lead_id) AS 'lead_count', l.fk_agent_id, a.agent_username
            FROM tbl_lead AS l
            LEFT JOIN tbl_agent AS a ON l.fk_agent_id = a.pk_agent_id
            WHERE YEAR(lead_craete_date) = YEAR(NOW())
            GROUP BY fk_agent_id WITH ROLLUP LIMIT $limitCount";
        $statement = $this->prepQuery($query);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function getProductleadGeneratedforYear($year = null) {
        $year = is_null($year) ? date('Y') : $year;
        $query = "SELECT COUNT(l.pk_lead_id) AS 'lead_count', l.fk_product_id, p.product_title
            FROM tbl_lead AS l
            LEFT JOIN tbl_product AS p ON l.fk_product_id = p.pk_product_id
            WHERE YEAR(lead_craete_date) = :year
            GROUP BY l.fk_product_id ASC WITH ROLLUP ";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':year', $year, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount()? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

}
