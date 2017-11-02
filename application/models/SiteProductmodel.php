<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteProductmodel
 *
 * @author Syed Tausif Ali Shah
 */
class SiteProductmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function checkProductUnlockedWithAgentId($prdId, $agentId) {
        $query = "";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':prdId', $prdId, PDO::PARAM_INT);
        $statement->bindParam(':agentId', $agentId, PDO::PARAM_INT);

        $statement->execute();
    }

    public function getAllProducts($status = '%', $prId = '%') {
        $query = "SELECT *, CASE WHEN ((temp.clear_test/temp.test_count) = 1) THEN TRUE ELSE FALSE END AS prd_unlock
            FROM tbl_product AS p
            LEFT JOIN (SELECT rpt.fk_product_id, COUNT(rpt.fk_test_id) AS test_count,
            COUNT((SELECT ta.test_attempt FROM tbl_test_attempt AS ta WHERE ta.test_attempt = 1 AND ta.fk_test_id = rpt.fk_test_id LIMIT 1)) AS clear_test
            FROM tbl_r_product_test AS rpt
            WHERE 1
            GROUP BY rpt.fk_product_id) AS temp ON p.pk_product_id = temp.fk_product_id
            WHERE p.product_status = :status AND p.pk_product_id LIKE :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':id', $prId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getProductDetailWithProductId($productId, $status = 'active') {
        
    }

    public function getProductTestListWithProductId($prId, $agentId, $status = '%') {
        $query = "SELECT * FROM tbl_r_product_test AS rpt
            LEFT JOIN tbl_test AS t ON t.pk_test_id = rpt.fk_test_id
            WHERE rpt.fk_product_id = :prId AND t.test_status LIKE :status AND 
                rpt.fk_test_id NOT IN (SELECT fk_test_id FROM tbl_test_attempt WHERE fk_agent_id = :agentId AND test_attempt = 1)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':prId', $prId, PDO::PARAM_INT);
        $statement->bindParam(':agentId', $agentId, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }

    public function getProductLeadForm($prId) {
        $query = "SELECT * FROM tbl_product AS p
            LEFT JOIN tbl_form AS f ON f.pk_form_id = p.fk_form_id
            LEFT JOIN tbl_r_form_field AS rff ON rff.fk_form_id = f.pk_form_id
            LEFT JOIN tbl_form_field AS ff ON ff.pk_field_id = rff.fk_field_id
            WHERE p.pk_product_id = :id AND NOT ISNULL(f.pk_form_id)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $prId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function insertLead($param) {
        $query = "INSERT INTO tbl_lead (fk_product_id, fk_agent_id, lead_detail, lead_craete_date) VALUES (:prId, :agentId, :detail, NOW())";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':prId', $param['prdId'], PDO::PARAM_INT);
        $statement->bindParam(':agentId', $param['agentId'], PDO::PARAM_INT);
        $statement->bindParam(':detail', $param['leadData'], PDO::PARAM_STR);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['lead_id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['error_message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    public function updateLeadForwarded($leadId) {
        $query = "UPDATE tbl_lead SET lead_forward = 1 WHERE pk_lead_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $leadId, PDO::PARAM_INT);
        return $statement->execute();
    }
    
}
