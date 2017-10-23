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

    public function getAllProducts($status = '%') {
        $query = "SELECT *, CASE WHEN ((temp.clear_test/temp.test_count) = 1) THEN TRUE ELSE FALSE END AS prd_unlock
            FROM tbl_product AS p
            LEFT JOIN (SELECT rpt.fk_product_id, COUNT(rpt.fk_test_id) AS test_count,
            COUNT((SELECT ta.test_attempt FROM tbl_test_attempt AS ta WHERE ta.test_attempt = 1 AND ta.fk_test_id = rpt.fk_test_id)) AS clear_test
            FROM tbl_r_product_test AS rpt
            WHERE 1
            GROUP BY rpt.fk_product_id) AS temp ON p.pk_product_id = temp.fk_product_id
            WHERE p.product_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

}
