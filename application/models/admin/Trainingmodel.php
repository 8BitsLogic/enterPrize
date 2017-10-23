<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trainingmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Trainingmodel extends Commonmodel {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getAllTraining($status = NULL) {
        $query = is_null($status) ? "SELECT *  FROM tbl_training" : "SELECT * FROM tbl_training WHERE training_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getTrainingDetail($id, $status = '%') {
        $query = "SELECT * FROM tbl_training WHERE pk_training_id = :id AND training_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : $this->errorInfo($statement);
    }

    public function insertTraining($param) {
        $query = "INSERT INTO tbl_training (training_title, training_descp, training_status, training_create_date)
            VALUES (:title, :descp, :status, NOW());";
        $statement = $this->prepQuery($query);
        $this->bindTrainingQuery($statement, $param);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
            $response['id'] = $this->lastInsertId();
        } else {
            $response['query_status'] = FALSE;
            $response['error_message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    public function updateTraining($id, $param) {
        $query = "UPDATE tbl_training SET training_title = :title, training_descp = :descp, training_status = :status WHERE pk_training_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $this->bindTrainingQuery($statement, $param);
        if ($statement->execute()) {
            $response['query_status'] = TRUE;
        } else {
            $response['query_status'] = FALSE;
            $response['error_message'] = $this->errorInfo($statement);
        }
        return $response;
    }

    private function bindTrainingQuery($statement, $param) {
        $statement->bindParam(':title', $param['title'], PDO::PARAM_STR);
        $statement->bindParam(':descp', $param['descp'], PDO::PARAM_STR);
        $statement->bindParam(':status', $param['status'], PDO::PARAM_STR);
        return;
    }

    public function toggleStatusTraining($id) {
        $query = "UPDATE tbl_training
            SET training_status = (SELECT CASE training_status WHEN 'active' THEN 'inactive' ELSE 'active' END)
            WHERE pk_training_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function deleteTraining($id) {
        $query = "DELETE FROM tbl_training WHERE pk_training_id = :id";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function insertResource($param) {
        $query = "INSERT INTO tbl_training_resource ( fk_training_id, resource_title, resource_type, resource_link, resource_create_date )
            VALUES ( :trainingId, :title, :type, :link, NOW())";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':trainingId', $param['id'], PDO::PARAM_INT);
        $statement->bindParam(':title', $param['title'], PDO::PARAM_STR);
        $statement->bindParam(':type', $param['type'], PDO::PARAM_STR);
        $statement->bindParam(':link', $param['link'], PDO::PARAM_STR);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function getTrainigResourcesWithTid($id, $srcStatus='%') {
        $query = "SELECT * FROM tbl_training_resource WHERE fk_training_id = :id AND resource_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $srcStatus, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowcount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getTrainigProductListWithTid($id, $prdStatus = '%') {
        $query = "SELECT * FROM tbl_r_training_product AS rtp
            LEFT JOIN tbl_product AS p ON p.pk_product_id = rtp.fk_product_id
            WHERE rtp.fk_training_id = :id AND p.product_status LIKE :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $prdStatus, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowcount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function deleteTrainingResource($id, $rId) {
        $query = "DELETE FROM tbl_training_resource WHERE pk_resource_id = :rId AND fk_training_id = :id ";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':rId', $rId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function deleteTrainingProductRel($id, $pId) {
        $query = "DELETE FROM tbl_r_training_product WHERE fk_training_id = :id AND fk_product_id = :pId ";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':pId', $pId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }

    public function getTrainigResourceDetal($id, $rId) {
        $query = "SELECT * FROM tbl_training_resource WHERE pk_resource_id = :rId AND fk_training_id = :id ";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':rId', $rId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowcount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }

    public function insertTrainingProductRel($id, $pIds, $prdStatus = 'active') {
        $query = "INSERT INTO tbl_r_training_product (fk_training_id, fk_product_id)
                SELECT :id, pk_product_id FROM tbl_product WHERE pk_product_id IN (" . $pIds . ") AND product_status = :status";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $prdStatus, PDO::PARAM_STR);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }
    
    public function insertTrainingProductRelation($tId, $pId) {
        $query = "INSERT INTO tbl_r_training_product (fk_training_id, fk_product_id) VALUES (:tId, :pId)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':tId', $tId, PDO::PARAM_INT);
        $statement->bindParam(':pId', $pId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : $this->errorInfo($statement);
    }
    
}