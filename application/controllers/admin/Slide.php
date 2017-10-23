<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slide
 *
 * @author Syed Tausif Ali Shah
 */
class Slide extends Basecontroller {

    private $data;
    protected $slideObj;

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Slidemodel');

        $this->data = array(
            'page' => array('title' => 'Home Page Slides'),
            'view' => 'admin/slider/',
            'flashKey' => 'message_slide'
        );
        $this->slideObj = new Slidemodel;
    }

    public function index() {
        $this->data['slideList'] = $this->slideObj->getAllSlides();
        $this->loadAdminLayout($this->data, $this->data['view'] . 'grid');
    }

    public function newSlide() {
        $this->data['subTitle'] = 'Add New Slide';
        $this->loadAdminLayout($this->data, $this->data['view'] . 'new');
    }

    public function editSlide($id) {
        $this->data['subTitle'] = 'Edit Slide';
        $this->data['slideDetail'] = $this->slideObj->getSlideDetail($id);
        $this->loadAdminLayout($this->data, $this->data['view'] . 'new');
    }

    public function postSlide($id = NULL) {
        if ($this->input->post('submit')) {
            if ($this->validateSlide()) {
                $post = $this->input->post();
                $post['id'] = $id;
                $post['slideLink'] = $this->uploadSlideImage($id);
                is_null($id) ? $this->insertNewSlide($post) : $this->updateSlide($post);
            }
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Error in posting data', $this->alertMessages['danger']);
            $this->session->set_flashdata($this->data['flashKey'], $message);
            $redictUrl = is_null($id) ? 'new' : 'edit/' . $id;
            return redirect(base_url('admin/slide/' . $redictUrl));
        }
    }

    private function uploadSlideImage($id = NULL) {
        $config['upload_path'] = $this->uploadPath . '../images/slides/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 1024;
        $result = $this->uploadFile($config, 'slide_img');
        if ($result['upload_status']) {
            return array('slink' => $this->themeUrl . '/images/slides/' . $result['file_data']['file_name'], 'sloc' => $config['upload_path'] . $result['file_data']['file_name']);
        } else {
            $this->session->set_flashdata($this->data['flashKey'], str_replace($this->alertMessages['str_replace'], $result['error_message'], $this->alertMessages['warning']));
            $rediectUrl = is_null($id) ? 'new' : 'edit/' . $id;
            return redirect(base_url('admin/slide/' . $rediectUrl));
        }
    }

    private function insertNewSlide($param) {
        $result = $this->slideObj->insertSlide($param);
        $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'New slide added', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        $redirectUrl = $result['query_status'] ? 'edit/' . $result['id'] : 'new';
        return redirect(base_url('admin/slide/' . $redirectUrl));
    }

    private function updateSlide($param) {
        $oldSlide = $this->slideObj->getSlideDetail($param['id']);
        if (unlink($oldSlide['slide_location'])) {
            $result = $this->slideObj->updateSlide($param);
            $message = $result['query_status'] ? str_replace($this->alertMessages['str_replace'], 'Slide updated', $this->alertMessages['success']) :
                    str_replace($this->alertMessages['str_replace'], $result['message'], $this->alertMessages['warning']);
        } else {
            $message = str_replace($this->alertMessages['str_replace'], 'Unabl to replace old image.', $this->alertMessages['warning']);
        }

        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/slide/edit/' . $param['id']));
    }

    private function validateSlide() {
        return TRUE;
    }

    public function deleteSlide($id) {
        $slide = $this->slideObj->getSlideDetail($id);
        if (!$slide) {
            $message = str_replace($this->alertMessages['str_replace'], 'Rquested resource not found.', $this->alertMessages['warning']);
        } else {
            if (unlink($slide['slide_location'])) {
                $result = $this->slideObj->deleteSlide($id);
                $message = $result ? str_replace($this->alertMessages['str_replace'], 'Slide deleted', $this->alertMessages['success']) :
                        str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['success']);
            } else {
                $message = str_replace($this->alertMessages['str_replace'], 'could not remove file', $this->alertMessages['warning']);
            }
        }

        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/slide'));
    }

    public function toggleStatusSlide($id) {
        $result = $this->slideObj->statusToggleSlide($id);
        $message = $result ? str_replace($this->alertMessages['str_replace'], 'Slide Status updated', $this->alertMessages['success']) :
                str_replace($this->alertMessages['str_replace'], $result, $this->alertMessages['success']);
        $this->session->set_flashdata($this->data['flashKey'], $message);
        return redirect(base_url('admin/slide'));
    }
    
    public function sortSlide() {
        $this->data['slideList'] = $this->slideObj->getAllSlides('active');
        $this->loadAdminLayout($this->data, $this->data['view'].'sort');
    }
    
    public function updateSortSlide() {
        if($this->input->post('submit')){
            if($this->validateSortSlide()){
                foreach($this->input->post() as $key => $value){
                    is_numeric($key) ? $this->slideObj->updateSlidePos($key, $value) : '';
                }
            }
        }
        $this->session->set_flashdata($this->data['flashKey'],  str_replace($this->alertMessages['str_replace'], 'Slides sorting updated', $this->alertMessages['success']));
        return redirect(base_url('admin/slide/sort'));
    }
    
    private function validateSortSlide() {
        return TRUE;
    }

}
