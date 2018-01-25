<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends Basecontroller {

    private $data;
    private $comObj;

    function __construct() {
        parent::__construct();
        $this->load->model(array('Commonmodel'));

        $this->comObj = new Commonmodel;
        $this->data['leadCount'] = array('cWeek' => '', 'pWeek' => '', 'cMonth' => '', 'pMonth' => '', 'cYear' => '', 'pYear' => '');
        $this->data['confirmedLeadCount'] = array('cWeek' => '', 'pWeek' => '', 'cMonth' => '', 'pMonth' => '', 'cYear' => '', 'pYear' => '');
    }

    public function index() {
//        $this->editImage();
//        echo '<pre>';
        $this->exectiveSummaryLeadCount();
        $this->exectiveSummaryConfirmedLeadCount();
        $this->processExectiveSummaryLeads();
        $this->getTopPerformers();
        $this->getYeartoDateProductLeads();
        $this->loadAdminLayout($this->data, 'admin/dashboard/content');
    }

    private function editImage() {
        $imgObj = new ImgWrite();
        $image_filepath = $this->themeUrl . '/images/cert_sample.png';
        $imageSavePath = APPPATH.'/../public/images/';
        $imageSaveName = 'cert'. date('Ymd').'-'. random_string('alnum', 8).'.jpg';
        $imgObj->signCertificate("Notingham Shire", $image_filepath, $this->themeUrl, $imageSavePath, $imageSaveName);
        exit;

    }

    private function getTopPerformers() {
        $result = $this->comObj->getTopPerformer();
        if (!$result) {
            $this->data['topPerformers'] = FALSE;
        } else {
            $this->data['topPerformers'] = array(
                'year_to_date_leads' => array_pop($result)['lead_count'],
                'year_to_date_performers' => $result
            );
        }
        return;
    }

    private function getYeartoDateProductLeads() {
        $result = $this->comObj->getProductleadGeneratedforYear();
        if (!$result) {
            $this->data['productLeads'] = FALSE;
        } else {
            $this->data['productLeads'] = array(
                'total_product_leads' => array_pop($result)['lead_count'],
                'product_lead_count' => $result,
            );
            $this->data['productLeads']['pie_chart_values'] = $this->prepProductPicChartData();
        }
        return;
    }

    private function setValuesProdPicChartData() {
        foreach ($this->data['productLeads']['product_lead_count'] as $ppKey => $ppVal) {
            $this->data['productLeads']['product_lead_count'][$ppKey]['colorCode1'] = $this->randomColor();
            $this->data['productLeads']['product_lead_count'][$ppKey]['percent'] = number_format($ppVal['lead_count'] / $this->data['productLeads']['total_product_leads'] * 100, 0);
        }
    }

    private function prepProductPicChartData() {

        $this->setValuesProdPicChartData();
        $percent = array();
        $label = array();
        $colorCodes1 = array();
        foreach ($this->data['productLeads']['product_lead_count'] as $key => $val) {
            array_push($percent, (int) $val['percent']);
            array_push($label, substr($val['product_title'], 0, 10));
            array_push($colorCodes1, '#' . $val['colorCode1']);
        }
        return array(
            'labels' => json_encode($label),
            'percent' => json_encode($percent),
            'colorCodes1' => json_encode($colorCodes1),
        );
    }

    private function exectiveSummaryLeadCount() {
        foreach ($this->data['leadCount'] as $key => $val) {
            $this->data['leadCount'][$key] = array('count' => (int) $this->comObj->getLeadCountForInterval($key));
        }
        return;
    }

    private function exectiveSummaryConfirmedLeadCount() {
        foreach ($this->data['confirmedLeadCount'] as $key => $val) {
            $this->data['confirmedLeadCount'][$key] = array('count' => (int) $this->comObj->getLeadCountForInterval($key, 'approved'));
        }
        return;
    }

    private function processExectiveSummaryLeads() {
        $leadCount = $this->data['leadCount'];
        foreach ($leadCount as $key => $lVal) {
            if (!in_array($key, array('cYear', 'cMonth', 'cWeek'))) {
                $this->data['leadCount'][$key]['compPercent'] = $this->data['leadCount'][$key]['count'] > 0 ? floor(($this->data['leadCount'][str_replace('p', 'c', $key)]['count'] - $this->data['leadCount'][$key]['count']) / $this->data['leadCount'][$key]['count'] * 100) : 0;
            }
        }
        $confirmedLeadCount = $this->data['confirmedLeadCount'];
        foreach ($confirmedLeadCount as $ckey => $clVal) {
            if (!in_array($ckey, array('cYear', 'cMonth', 'cWeek'))) {
                $this->data['confirmedLeadCount'][$ckey]['compPercent'] = $this->data['confirmedLeadCount'][$ckey]['count'] > 0 ? floor(($this->data['confirmedLeadCount'][str_replace('p', 'c', $ckey)]['count'] - $this->data['confirmedLeadCount'][$ckey]['count']) / $this->data['confirmedLeadCount'][$ckey]['count'] * 100) : 0;
            }
        }
        return;
    }

}
