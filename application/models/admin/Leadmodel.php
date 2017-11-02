<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Leadmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Leadmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function getAllLeads($status = NULL) {
        $query = is_null($status) ? "SELECT l.pk_lead_id, p.pk_product_id, p.product_title, 
            a.pk_agent_id, a.agent_username, l.lead_status, DATE_FORMAT(l.lead_craete_date, '%d-%m-%Y') AS 'create_date'
            FROM tbl_lead AS l 
            LEFT JOIN tbl_agent AS a ON a.pk_agent_id = l.fk_agent_id
            LEFT JOIN tbl_product AS p ON p.pk_product_id = l.fk_product_id
            ORDER BY l.lead_craete_date DESC" :
                "SELECT l.pk_lead_id, p.pk_product_id, p.product_title, a.pk_agent_id, a.agent_username, l.lead_status, DATE_FORMAT(l.lead_craete_date, '%d-%m-%Y') AS 'create_date'
                    FROM tbl_lead AS l 
                    LEFT JOIN tbl_agent AS a ON a.pk_agent_id = l.fk_agent_id
                    LEFT JOIN tbl_product AS p ON p.pk_product_id = l.fk_product_id
                    WHERE l.lead_status = :status ORDER BY l.lead_craete_date DESC";
        $statement = $this->prepQuery($query);

        !is_null($status) ? $statement->bindParam(':status', $status, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : $this->errorInfo($statement);
    }

    public function getLeadDetail($id, $status = '%') {
        $query = "SELECT * FROM tbl_lead AS l
            LEFT JOIN tbl_agent AS a ON a.pk_agent_id = l.fk_agent_id
            LEFT JOIN tbl_product AS p ON p.pk_product_id = l.fk_product_id
            WHERE l.pk_lead_id = :id AND l.lead_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }

    public function updateLeadStatus($param) {
        $query = "UPDATE tbl_lead SET 
            lead_notes = 
            CASE WHEN lead_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :inotes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :inotes, '<br>', lead_notes) END,
            lead_external_notes = 
            CASE WHEN lead_external_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :enotes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :enotes, '<br>', lead_external_notes) END,
            lead_status = :status
            WHERE pk_lead_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);
        $statement->bindParam(':status', $param['status'], PDO::PARAM_STR);
        $statement->bindParam(':inotes', $param['inotes'], PDO::PARAM_STR);
        $statement->bindParam(':enotes', $param['enotes'], PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function updateLeadInternalNotes($id, $notes) {
        $query = "UPDATE tbl_lead SET 
            lead_notes = 
            CASE WHEN lead_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes, '<br>', lead_notes) END
            WHERE pk_lead_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':notes', $notes, PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function updateLeadExternalNotes($id, $custNotes) {
        $query = "UPDATE tbl_lead SET 
            lead_external_notes = 
            CASE WHEN lead_external_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes, '<br>', lead_external_notes) END
            WHERE pk_lead_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':notes', $custNotes, PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function insertTransactionDeposit($leadId) {
        $query = "INSERT INTO tbl_transactions (pk_transaction_id, fk_agent_id, transaction_amount, transaction_descp, transaction_type, transaction_create_date)
            SELECT UUID(), l.fk_agent_id, p.product_agent_reward, CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y'), ' : Deposit amount for lead# ', :leadId) AS 'descp', 'deposit', NOW()
            FROM tbl_lead AS l
            LEFT JOIN tbl_product AS p ON l.fk_product_id = p.pk_product_id
            WHERE l.pk_lead_id = :leadId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':leadId', $leadId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }
    
    public function insertCob($leadId) {
        $query = "INSERT INTO tbl_cob (pk_cob_id, fk_lead_id, cob_amount, cob_create_date)
            SELECT UUID(), l.pk_lead_id, (p.product_total_reward - p.product_agent_reward) AS 'reward', NOW()
            FROM tbl_lead AS l
            LEFT JOIN tbl_product AS p ON l.fk_product_id = p.pk_product_id
            WHERE l.pk_lead_id = :leadId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':leadId', $leadId, PDO::PARAM_INT);
        
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

}
