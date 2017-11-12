<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paymentmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Paymentmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function getAllPaymentRequests($status = '%') {
        $query = "SELECT pr.pk_payment_request_id, pr.payment_request_amount, pr.payment_request_status, DATE_FORMAT(pr.payment_request_create_date, '%d-%m-%Y') AS 'create_date', a.pk_agent_id, a.agent_username
                 FROM tbl_payment_request AS pr
                 LEFT JOIN tbl_agent AS a ON a.pk_agent_id = pr.fk_agent_id
                 WHERE payment_request_status LIKE :status ORDER BY payment_request_create_date DESC";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : $this->errorInfo($statement);
    }
    
    public function getAllPaymentRequestsforAgent($agentId, $status = NULL) {
        $query = is_null($status) ? "SELECT pr.pk_payment_request_id, pr.payment_request_amount, pr.payment_request_status, DATE_FORMAT(pr.payment_request_create_date, '%d-%m-%Y') AS 'create_date', a.pk_agent_id, a.agent_username
                 FROM tbl_payment_request AS pr
                 LEFT JOIN tbl_agent AS a ON a.pk_agent_id = pr.fk_agent_id
                 WHERE fk_agent_id = :id ORDER BY payment_request_create_date DESC" :
                "SELECT pr.pk_payment_request_id, pr.payment_request_amount, pr.payment_request_status, DATE_FORMAT(pr.payment_request_create_date, '%d-%m-%Y') AS 'create_date', a.pk_agent_id, a.agent_username
                 FROM tbl_payment_request AS pr
                 LEFT JOIN tbl_agent AS a ON a.pk_agent_id = pr.fk_agent_id
                 WHERE fk_agent_id = :id AND payment_request_status = :status ORDER BY payment_request_create_date DESC";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $agentId, PDO::PARAM_INT);
        !is_null($status) ? $statement->bindParam(':status', $status, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : $this->errorInfo($statement);
    }

    public function getPaymentRequestDetail($id) {
        $query = "SELECT * FROM tbl_payment_request AS pr
            LEFT JOIN tbl_agent AS a ON a.pk_agent_id = pr.fk_agent_id 
            LEFT JOIN tbl_transactions AS t ON t.pk_transaction_id = pr.fk_transaction_id
            WHERE pk_payment_request_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : $this->errorInfo($statement);
    }

    public function updatePRstatus($param) {
        $query = "UPDATE tbl_payment_request SET 
            payment_request_internal_notes = 
            CASE WHEN payment_request_internal_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes, '<br>', payment_request_internal_notes) END,
            payment_request_status = :status
            WHERE pk_payment_request_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);
        $statement->bindParam(':status', $param['status'], PDO::PARAM_STR);
        $statement->bindParam(':notes', $param['notes'], PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function updatePRstatusN($id, $nt, $status, $notes = NULL) {
        $query = "UPDATE tbl_payment_request SET 
            payment_request_internal_notes = 
            CASE WHEN payment_request_internal_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes, '<br>', payment_request_internal_notes) END,
            payment_request_status = :status
            WHERE pk_payment_request_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        is_null($notes) ? $statement->bindParam(':notes', $nt, PDO::PARAM_STR) : $statement->bindParam(':notes', $notes, PDO::PARAM_STR);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function updatePRinternalNotes($id, $notes) {
        $query = "UPDATE tbl_payment_request SET 
            payment_request_internal_notes = 
            CASE WHEN payment_request_internal_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes, '<br>', payment_request_internal_notes) END
            WHERE pk_payment_request_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':notes', $notes, PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function updatePRcustomerNotes($id, $custNotes) {
        $query = "UPDATE tbl_payment_request SET 
            payment_request_customer_notes = 
            CASE WHEN payment_request_customer_notes IS NULL THEN
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes)
            ELSE CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : ', :notes, '<br>', payment_request_customer_notes) END
            WHERE pk_payment_request_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':notes', $custNotes, PDO::PARAM_STR);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function insertTransactionWithdraw($prId, $amount) {
        $query = "INSERT INTO tbl_transactions (pk_transaction_id, fk_agent_id, transaction_amount, transaction_descp, transaction_type, fk_payment_request_id)
            SELECT UUID(), pr.fk_agent_id, 
            (SELECT :amount*-1 FROM tbl_transactions AS t WHERE t.fk_agent_id = pr.fk_agent_id) AS 'transaction_amount',
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y'), ' : Withdraw processed for payment request# ', pr.pk_payment_request_id) AS 'descp', 'withdraw', pr.pk_payment_request_id
            FROM tbl_payment_request AS pr
            WHERE pk_payment_request_id = :prId
            HAVING transaction_amount != 0";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':prId', $prId, PDO::PARAM_INT);
        $statement->bindParam(':amount', $amount, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function updatePRtransactionId($id, $tId) {
        $query = "UPDATE tbl_payment_request SET  fk_transaction_id = :tId WHERE pk_payment_request_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':tId', $tId, PDO::PARAM_INT);

        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function getTransactionIdforPRid($id) {
        $query = "SELECT pk_transaction_id FROM tbl_transactions  WHERE fk_payment_request_id = :id ORDER BY transaction_create_date DESC LIMIT 1";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return count($result) > 0 ? $result['pk_transaction_id'] : FALSE;
    }

    public function getTransactionDetailforPRid($id) {
        $query = "SELECT * FROM tbl_transactions  WHERE fk_payment_request_id = :id ORDER BY transaction_create_date DESC";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getAgentTransactions($id, $type = '%') {
        $query = "SELECT * FROM tbl_transactions WHERE fk_agent_id = :id AND transaction_type LIKE :type";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function getAgentsTotalAvailableFunds($agentId) {
        
        $query = "SELECT SUM(transaction_amount) AS 'total_funds' FROM tbl_transactions WHERE fk_agent_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $agentId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC)['total_funds'] : FALSE;
    }
    
    public function getAgentTotalPRpending($agentId) {
        $query = "SELECT SUM(payment_request_amount) AS 'pending_total' "
                . "FROM tbl_payment_request WHERE payment_request_status = 'pending' AND fk_agent_id = :id ";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $agentId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC)['pending_total'] : FALSE;
    }
    
    public function insertPaymentRequest($param) {
        $query = "INSERT INTO tbl_payment_request
            (payment_request_amount, fk_agent_id, payment_request_customer_notes, payment_request_internal_notes, payment_request_create_date)
            VALUES (:amount, :agentId, 
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : Payment request created for amount : ',:amount), 
            CONCAT(DATE_FORMAT(NOW(), '%m-%d-%Y %H:%i:%s'), ' : Payment request created for amount : ',:amount), NOW())";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':amount', $param['amount'], PDO::PARAM_STR);
        $statement->bindParam(':agentId', $param['agentId'], PDO::PARAM_STR);
//        $statement->bindParam(':extNotes', $param['extNotes'], PDO::PARAM_STR);
//        $statement->bindParam(':intNotes', $param['intNotes'], PDO::PARAM_STR);
        
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['error_info'] = $statement->errorInfo();
        }
        return $response;
    }

}
