<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Community
 *
 * @author Syed
 */
class Community extends Basecontroller {

    private $data;
    private $comObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('Communitymodel');

        $this->comObj = new Communitymodel;
        $this->data = array(
            'page' => array('title' => 'Community Queries'),
            'flashKey' => 'message_community',
            'view' => 'admin/community/'
        );
    }

    public function index() {
        $this->data['queryList'] = $this->comObj->getPosts();
        is_array($this->data['queryList']) ? $this->commentCount() : '';
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function detailQuery($queryId) {
        $this->data['queryDetail'] = $this->comObj->getPosts('%', $queryId)[0];
        $this->data['commentList'] = $this->comObj->getComments('%', $queryId);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'query_detail');
    }

    private function commentCount() {
        foreach ($this->data['queryList'] as $key => $value) {
            $this->data['queryList'][$key]['comment_count'] = $this->comObj->getCommentCount($value['pk_post_id']);
        }
        return;
    }

    public function deleteQuery($queryId) {
        $result = $this->comObj->deleteQuery($queryId);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Post Deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], 'Delete failed, try again.', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/community/queries'));
    }

    public function statusQuery($queryId, $statusR) {
        $status = !in_array($statusR, array('block', 'publish')) ? 'block' : $statusR;
        $result = $this->comObj->updateQueryStatus($queryId, $status);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Query status updated to '.$status, $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/community/queries/' . $queryId . '/detail'));
    }
    
    public function statusComment($queryId, $commentId, $statusR) {
        $status = !in_array($statusR, array('blocked', 'publish')) ? 'blocked' : $statusR;
        $result = $this->comObj->updateCommentStatus($commentId, $status);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Comment status updated to '.$status, $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/community/queries/' . $queryId . '/detail'));
    }
    
    public function deleteComment($queryId, $commentId) {
        $result = $this->comObj->deleteComment($commentId);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Comment Deleted', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], 'Delete failed, try again.', $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/community/queries/'.$queryId.'/detail'));
    }
    
    public function featuredQuery($queryId, $setR) {
        $set = !in_array($setR, array('set', 'unset')) ? FALSE : $setR == 'set' ? FALSE : TRUE;
        $result = $this->comObj->updateQueryfeatured($queryId, $set);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'operation successful.', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/community/queries/' . $queryId . '/detail'));
    }

}
