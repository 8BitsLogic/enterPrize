<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Communitymodel
 *
 * @author Syed
 */
class Communitymodel extends Commonmodel {

    public function __construct() {
        parent::__construct();
    }

    public function insertPost($param) {
        $query = "INSERT INTO tbl_post ( post_title, post_descp, post_create_date, fk_agent_id)
            VALUES (:title, :descp, NOW(), :agentId)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':title', $param['title'], PDO::PARAM_STR);
        $statement->bindParam(':descp', $param['descp'], PDO::PARAM_STR);
        $statement->bindParam(':agentId', $param['agentId'], PDO::PARAM_INT);
        $result = $statement->execute();

        $response = array(
            'query_status' => $result ? TRUE : FALSE,
            'id' => $result ? $this->lastInsertId() : FALSE,
            'error_message' => $result ? '' : $this->errorInfo($statement)
        );

        return $response;
    }

    public function getPosts($status = '%', $id = '%') {
        $query = "SELECT p.*, a.agent_username
            FROM tbl_post AS p
            LEFT JOIN tbl_agent AS a ON a.pk_agent_id = p.fk_agent_id
            WHERE pk_post_id LIKE :id AND post_status LIKE :status ORDER BY post_status DESC";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function insertComment($param) {
        $query = "INSERT INTO tbl_post_comments (pk_comment_id, fk_post_id, comment_descp, comment_create_date, fk_agent_id)
            VALUES (:commentId, :postId, :descp, NOW(), :agentId)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':commentId', $param['commentId'], PDO::PARAM_STR);
        $statement->bindParam(':postId', $param['postId'], PDO::PARAM_STR);
        $statement->bindParam(':descp', $param['descp'], PDO::PARAM_STR);
        $statement->bindParam(':agentId', $param['agentId'], PDO::PARAM_INT);
        $result = $statement->execute();

        $response = array(
            'query_status' => $result ? TRUE : FALSE,
            'id' => $result ? $this->lastInsertId() : FALSE,
            'error_message' => $result ? '' : $this->errorInfo($statement)
        );

        return $response;
    }

    public function getComments($status = '%', $postId = '%', $commentId = '%') {
        $query = "SELECT pc.*, a.agent_username FROM tbl_post_comments AS pc
            LEFT JOIN tbl_agent AS a ON a.pk_agent_id = pc.pk_comment_id
            WHERE pc.fk_post_id LIKE :postId AND pc.comment_status LIKE :status AND pc.pk_comment_id LIKE :commentId
            ORDER BY pc.comment_create_date DESC";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
        $statement->bindParam(':commentId', $commentId, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getCommentCount($postId = '%', $commentStatus = 'review') {
        $query = "SELECT COUNT(pk_comment_id) AS comment_count FROM tbl_post_comments WHERE comment_status LIKE :status AND fk_post_id LIKE :postId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
        $statement->bindParam(':status', $commentStatus, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() ? $statement->fetch(PDO::FETCH_ASSOC)['comment_count'] : FALSE;
    }

    public function deleteQuery($postId) {
        $query = "DELETE FROM tbl_post WHERE pk_post_id = :postId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
        return $statement->execute() ? TRUE : FALSE;
    }
    
    public function deleteComment($commentId) {
        $query = "DELETE FROM tbl_post_comments WHERE pk_comment_id = :commentId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':commentId', $commentId, PDO::PARAM_STR);
        return $statement->execute() ? TRUE : FALSE;
    }

    public function updateQueryfeatured($queryId, $featured) {
        $query = "UPDATE tbl_post SET post_featured = :featured WHERE pk_post_id = :queryId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':featured', $featured, PDO::PARAM_BOOL);
        $statement->bindParam(':queryId', $queryId, PDO::PARAM_INT);
        $result = $statement->execute();
        $response['query_status'] = $result ? TRUE : FALSE;
        $response['error_message'] = $result ? '' : $this->errorInfo($statement);

        return $response;
    }
    
    public function updateQueryStatus($queryId, $status) {
        $query = "UPDATE tbl_post SET post_status = :status WHERE pk_post_id = :queryId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':queryId', $queryId, PDO::PARAM_INT);
        $result = $statement->execute();

        $response['query_status'] = $result ? TRUE : FALSE;
        $response['error_message'] = $result ? '' : $this->errorInfo($statement);

        return $response;
    }

    public function updateCommentStatus($commentId, $status) {
        $query = "UPDATE tbl_post_comments SET comment_status = :status WHERE pk_comment_id = :commentId";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        $result = $statement->execute();

        $response['query_status'] = $result ? TRUE : FALSE;
        $response['error_message'] = $result ? '' : $this->errorInfo($statement);

        return $response;
    }

}
