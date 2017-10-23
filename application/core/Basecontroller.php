<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Basecontroller extends CI_Controller {

    public $themeUrl;
    public $themeUrlSite;
    protected $uploadPath;
    protected $alertMessages;
    protected $agentDetail;
    protected $status = 'active';
    private $agentObj;
    public $agentSessionKey;

    public function __construct() {
        parent::__construct();

        $this->load->model(array('admin/Agentmodel'));

        $this->setThemeUrl();
//        $this->themeUrl = 'http://dev.enterprize/public';
//        $this->themeUrl = 'http://ep.fliegentech.com/public';
        $this->uploadPath = APPPATH . '../public/uploads/';
        $this->setAlertMessages();

        $this->agentObj = new Agentmodel;
        $this->agentSessionKey = 'agent_detail';
    }

    public function loadAdminLayout($data, $content_path) {
        if (empty($data)) {
            $data = array();
        }
        $template = 'admin/template/';
        $data['header'] = $this->load->view($template . 'header', $data, TRUE);
        $data['footer'] = $this->load->view($template . 'footer', $data, TRUE);
        $data['sidebar'] = $this->load->view($template . 'sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content_path, $data, TRUE);
        $this->load->view($template . 'template', $data);
    }

    public function loadSiteLayout($content_path, $data = array()) {
        $template = 'site/template/';
        $data['header'] = $this->load->view($template . 'header', $data, TRUE);
        $data['footer'] = $this->load->view($template . 'footer', $data, TRUE);
        $data['content'] = $this->load->view($content_path, $data, TRUE);
        $this->load->view($template . 'template', $data);
    }

    private function setThemeUrl() {
        $this->themeUrl = base_url('public');
        $this->themeUrlSite = base_url('public/front');
    }

    private function setAlertMessages() {
        $this->alertMessages = array(
            'str_replace' => '{{message}}',
            'success' => '<div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{message}}</div>',
            'info' => '<div class="alert alert-info alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{message}}</div>',
            'warning' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{message}}</div>',
            'danger' => '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{message}}</div>'
        );
    }

    protected function sendEmail($email, $from = 'no-reply@fliegentech.com', $cc = NULL) {

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->from($from);
        $this->email->to($email['to']);
        $this->email->cc($cc);
//        $this->email->bcc('them@their-example.com');

        $this->email->subject($email['subject']);
        $this->email->message($email['message']);

        return $this->email->send();
    }

    protected function getEnumValues($table, $field, $matches = NULL) {
        $type = $this->db->query("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'")->row(0)->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }

    protected function uploadFile($config, $file) {
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0775, TRUE);
        }
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($file)) {
            $response['upload_status'] = TRUE;
            $response['file_data'] = $this->upload->data();
        } else {
            $response['upload_status'] = FALSE;
            $response['error_message'] = $this->upload->display_errors();
        }
        return $response;
    }

    protected function getUsername($param) {
        $usernameStr = substr($param[0], 0, 1) . substr($param[1], 0, 1) . substr($param[2], -4);
        $result = $this->agentObj->getSimilarUsername($usernameStr);
        if (strlen($result) == 8) {
            $usernameStr = substr($result, 0, 2) . (intval(substr($result, 2)) + 1);
        } else {
            $usernameStr .= '00';
        }
        return $usernameStr;
    }

    protected function checkAgentLogin() {
        $this->agentDetail = $this->session->has_userdata($this->agentSessionKey) ? $this->session->userdata($this->agentSessionKey) : FALSE;
        return is_array($this->agentDetail) ? $this->agentObj->checkAgentisActive($this->agentDetail['pk_agent_id']) : FALSE;
    }

}
