<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Productmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Productmodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function getAllProducts($status = '%') {
        $query = "SELECT * FROM tbl_product WHERE product_status LIKE :status";
        $statement = $this->prepQuery($query);
        !is_null($status) ? $statement->bindParam(':status', $status, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getProductListNotAssociatedWithTraining($id, $status = NULL) {
        $query = is_null($status) ? "SELECT *  FROM tbl_product AS p 
            WHERE p.pk_product_id NOT IN (SELECT rtp.fk_product_id FROM tbl_r_training_product AS rtp WHERE rtp.fk_training_id = :id)" :
                "SELECT *  FROM tbl_product AS p 
            WHERE p.pk_product_id NOT IN (SELECT rtp.fk_product_id FROM tbl_r_training_product AS rtp WHERE rtp.fk_training_id = :id) AND p.product_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        !is_null($status) ? $statement->bindParam(':status', $status, PDO::PARAM_STR) : '';
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function insertProduct($param) {
        $query = "INSERT INTO tbl_product (product_title, product_descp, product_vendor_email, product_total_reward, product_agent_reward, product_status, product_create_date)
            VALUES (:title, :descp, :v_email, :totalReward, :agentReward, :status, now())";
        $statement = $this->prepQuery($query);
        $this->bindParamProduct($statement, $param);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['error_message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    public function updateProduct($param) {
        $query = "UPDATE tbl_product SET product_title = :title, product_descp = :descp, product_vendor_email = :v_email, product_total_reward = :totalReward, "
                . "product_agent_reward = :agentReward, product_status = :status WHERE pk_product_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $param['id'], PDO::PARAM_INT);
        $this->bindParamProduct($statement, $param);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
        } else {
            $response['query_status'] = FALSE;
            $response['error_message'] = $this->errorInfo($statement);
        }
        return $response;
    }
    
    private function bindParamProduct($statement, $param) {
        $statement->bindParam(':title', $param['prd_title'], PDO::PARAM_STR);
        $statement->bindParam(':descp', $param['prd_descp'], PDO::PARAM_STR);
        $statement->bindParam(':v_email', $param['v_email'], PDO::PARAM_STR);
        $statement->bindParam(':totalReward', $param['prd_total_reward'], PDO::PARAM_STR);
        $statement->bindParam(':agentReward', $param['prd_agent_reward'], PDO::PARAM_STR);
        $statement->bindParam(':status', $param['prd_status'], PDO::PARAM_STR);
        return;
    }

    public function getProductDetailwithId($id) {
        $query = "SELECT * FROM tbl_product WHERE pk_product_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }

    public function getProductTrainingListWithProductId($id, $status = '%') {
        $query = "SELECT * FROM tbl_r_training_product AS rtp
            LEFT JOIN tbl_training AS t ON t.pk_training_id = rtp.fk_training_id
            WHERE rtp.fk_product_id = :id AND t.training_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }

    public function getProductTestListWithProductId($id, $status = '%') {
        $query = "SELECT * FROM tbl_r_product_test AS rpt
            LEFT JOIN tbl_test AS t ON t.pk_test_id = rpt.fk_test_id
            WHERE rpt.fk_product_id = :id AND t.test_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }

    public function getLeadsListWithProductId($id) {
        $query = "SELECT l.*, a.agent_username, a.agent_email FROM tbl_lead AS l
            LEFT JOIN tbl_agent AS a ON a.pk_agent_id = l.fk_agent_id
            WHERE fk_product_id = :id
            ORDER BY l.lead_craete_date DESC ";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }

    public function toggleStatusProduct($id) {
        $query = "UPDATE tbl_product
            SET product_status = (SELECT CASE product_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_product_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM tbl_product WHERE pk_product_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
    
    public function getAllTrainingsNotAssociatedWithProduct($id, $status = 'active') {
        $query = "SELECT * FROM tbl_training
            WHERE training_status = :status AND pk_training_id NOT IN (SELECT fk_training_id FROM tbl_r_training_product WHERE fk_product_id = :id)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }
    
    public function getAllTestNotAssociatedWithProduct($id, $status = 'active') {
        $query = "SELECT * FROM tbl_test 
            WHERE test_status = :status AND pk_test_id NOT IN (SELECT fk_test_id FROM tbl_r_product_test WHERE fk_product_id = :id)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->rowCount() > 0 ? $result : FALSE;
    }
    
    public function updateProductLeadForm($prdId, $formId) {
        $query = "UPDATE tbl_product  SET  fk_form_id = :fId WHERE pk_product_id = :pId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':pId', $prdId,  PDO::PARAM_INT);
        $statement->bindParam(':fId', $formId,  PDO::PARAM_INT);
        
        if($statement->execute()){
            $response['query_status'] = TRUE;
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }        
        return $response;
    }
    
    public function updateProductDefaultImage($prdId, $image) {
        $query = "UPDATE tbl_product  SET  product_image = :image WHERE pk_product_id = :pId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':pId', $prdId,  PDO::PARAM_INT);
        $statement->bindParam(':image', $image,  PDO::PARAM_INT);
        
        if($statement->execute()){
            $response['query_status'] = TRUE;
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }        
        return $response;
    }
    
    public function removeProductLeadForm($prdId) {
        $query = "UPDATE tbl_product  SET  fk_form_id = NULL WHERE pk_product_id = :pId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':pId', $prdId,  PDO::PARAM_INT);
        
        if($statement->execute()){
            $response['query_status'] = TRUE;
        }else{
            $response['query_status'] = FALSE;
            $response['message'] = $this->errorInfo($statement);
        }        
        return $response;
    }

}
