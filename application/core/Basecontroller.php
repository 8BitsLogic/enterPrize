<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Basecontroller extends CI_Controller {

    public $themeUrl;
    public $themeUrlSite;
    public $theme;
    protected $uploadPath;
    protected $alertMessages;
    protected $agentDetail;
    protected $status = 'active';
    private $agentObj;
    private $paymentObj;
    private $template;
    private $templateAdmin;
    public $agentSessionKey;

    public function __construct() {
        parent::__construct();

        $this->load->model(array('admin/Agentmodel', 'admin/Paymentmodel'));

        $this->setThemeUrl();
//        $this->themeUrl = 'http://dev.enterprize/public';
//        $this->themeUrl = 'http://ep.fliegentech.com/public';
        $this->uploadPath = APPPATH . '../public/uploads/';
        $this->setAlertMessages();
        
        $this->agentObj = new Agentmodel;
        $this->paymentObj = new Paymentmodel;
        $this->agentSessionKey = 'agent_detail';
    }

    protected function getAgentDetail() {
        return $this->agentDetail;
    }

    protected function getAgentAvailableFunds($id) {
        return $this->paymentObj->getAgentsTotalAvailableFunds($id);
    }

    protected function getAgentPic($agentId = NULL) {
        $agentId = is_null($agentId) ? $this->agentDetail['pk_agent_id'] : $agentId;
        $readDir = $this->uploadPath . 'user/' . $agentId;
        $picDir = $this->openDir($readDir)[0];
        $response = $picDir ? $this->themeUrl . '/uploads/user/' . $agentId . '/' . $picDir : $this->themeUrl.'/images/avatar.bmp';
        return $response;
    }
    
    protected function addAgentPic($postList) {
        foreach($postList as $postKey => $postVal){
            $postList[$postKey]['agent_pic'] = $this->getAgentPic($postVal['fk_agent_id']);
        }
        return $postList;
    }

    protected function openDir($path) {
        $map = directory_map($path);
        $dir = is_array($map) ? $map : FALSE;
        return $dir;
    }

    public function loadAdminLayout($data, $content_path) {
        if (empty($data)) {
            $data = array();
        }
        $data['header'] = $this->load->view($this->templateAdmin . 'header', $data, TRUE);
        $data['footer'] = $this->load->view($this->templateAdmin . 'footer', $data, TRUE);
        $data['sidebar'] = $this->load->view($this->templateAdmin . 'sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content_path, $data, TRUE);
        $this->load->view($this->templateAdmin . 'template', $data);
    }

    public function loadSiteLayout($content_path, $data = array()) {
        $data['header'] = $this->load->view($this->template . 'header', $data, TRUE);
        $data['footer'] = $this->load->view($this->template . 'footer', $data, TRUE);
        $data['content'] = $this->load->view($content_path, $data, TRUE);
        $this->load->view($this->template . 'template', $data);
    }
    
    public function loadSiteBasicHeaderLayout($content_path, $data = array()) {
        $data['header'] = $this->load->view($this->template . 'header_basic', $data, TRUE);
        $data['footer'] = $this->load->view($this->template . 'footer', $data, TRUE);
        $data['content'] = $this->load->view($content_path, $data, TRUE);
        $this->load->view($this->template . 'template', $data);
    }

    public function loadLayoutnoHF($content_path, $data = array()) {
        $data['content'] = $this->load->view($content_path, $data, TRUE);
        $this->load->view($this->template . 'template_noHF', $data);
    }

    private function setThemeUrl() {
        $this->theme = 'radium-theme/';
        $this->template = $this->theme.'template/';
        $this->templateAdmin = 'admin/template/';

        $this->themeUrl = base_url('public/');
        $this->themeUrlSite = $this->themeUrl.$this->theme;
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
        $config['mailtype'] = 'html';
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

    protected function sendAttachementEmail($email, $file, $from = 'no-reply@fliegentech.com', $cc = NULL) {

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->from($from);
        $this->email->to($email['to']);
        $this->email->cc($cc);
//        $this->email->bcc('them@their-example.com');

        $this->email->subject($email['subject']);
        $this->email->message($email['message']);

//        attach file to email;

        $this->email->attach($file);

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

    protected function saveJsontoText($data, $filePath, $fileName) {
        echo 'saving file';
        if (!is_dir($filePath)) {
            mkdir($filePath, 0775, TRUE);
        }
        $textFile = $filePath . '/' . $fileName;
        $fh = fopen($textFile, 'w') or FALSE;
        if ($fh) {
            fwrite($fh, $data);
            fclose($fh);
            $response = TRUE;
        } else {
            $response = FALSE;
        }
        return $response;
    }

    protected function getProductGallery($id) {
        $path = $this->uploadPath . '../images/products/' . $id;
        $dir = $this->openDir($path);
        return $dir;
    }
    
    protected function findFileInDir($dir, $file) {
        $dirContent = is_dir($dir) ? array_diff(scandir($dir), array('..', '.')) : FALSE;
        return in_array($file, $dirContent);
    }

    public function match_date($date) {
        return (bool) preg_match("/^([0-9]|0[1-9]|[12][0-9]|3[01])[\/]([1-12]|0[1-9]|1[012])[\/](19|20)\d\d$/", $date);
    }
    
    private function randomColorPart() {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    protected function randomColor() {
        return $this->randomColorPart().$this->randomColorPart().$this->randomColorPart();
    }
}
