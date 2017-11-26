<?php

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

        $this->checkAgentLogin() ? '' : redirect(base_url());

        $this->load->model(array('Communitymodel'));

        $this->data = array(
            'page' => array('title' => 'Community'),
            'flashKey' => 'message_community',
            'view' => 'site/agent/community/',
            'agentPic' => $this->getAgentPic(),
            'availableFunds' => $this->getAgentAvailableFunds($this->agentDetail['pk_agent_id']),
        );
        $this->comObj = new Communitymodel;
    }

    public function index() {
        $this->data['postList'] = $this->comObj->getPosts($this->getPublish());
        $this->loadSiteLayout($this->data['view'] . 'all_post', $this->data);
    }

    public function detailPost($id) {
        $postList = $this->comObj->getPosts($this->getPublish());
        $this->data['postList'] = is_array($postList) ? array_slice($postList, 0, 2) : '';
        
        $this->data['postDetail'] = $this->comObj->getPosts($this->getPublish(), $id)[0];
        $this->data['postDetail']? '' : redirect(base_url('community'));
        $this->data['postComments'] = $this->comObj->getComments($this->getPublish(), $id);
        $this->loadSiteLayout($this->data['view'] . 'post_detail', $this->data);
    }

    public function newPost() {
        $this->loadSiteLayout($this->data['view'] . 'new_post', $this->data);
    }

    public function saveNewPost() {
        if ($this->input->post('submit')) {
            if ($this->validateNewPost()) {
                $post = $this->input->post();
                $post['agentId'] = $this->agentDetail['pk_agent_id'];
                $result = $this->comObj->insertPost($post);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New query posted.', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
                $this->session->set_flashdata($this->data['flashKey'], $message);
                $result['query_status'] ? redirect(base_url('community/post/' . $result['id'])) : $this->newPost();
            } else {
                $this->newPost();
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again', $this->alertMessages['warning']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
            $this->newPost();
        }
    }

    private function validateNewPost() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('descp', 'Description', 'trim|required|alpha_numeric_spaces');
        return $this->form_validation->run() ? TRUE : FALSE;
    }
    
    public function saveComment($postId) {
        if($this->input->post('submit')){
            if($this->validateCommentPost()){
                $post = $this->input->post();
                $post['commentId'] = uniqid();
                $post['agentId'] = $this->agentDetail['pk_agent_id'];
                $post['postId'] = $postId;
                $result = $this->comObj->insertComment($post);
                $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New comment posted.', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']);
            }else{
                return $this->detailPost($postId);
            }
        }else {
            $message = str_replace($this->alertMessages['str_replace'], 'Something went wrong, try again', $this->alertMessages['warning']);
        }
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('community/post/'.$postId));
    }
    
    private function validateCommentPost() {
        $this->form_validation->set_rules('descp', 'Comment', 'trim|required|alpha_numeric_spaces');
        return $this->form_validation->run() ? TRUE : FALSE;
    }

    private function getPublish() {
        return 'publish';
    }

}
