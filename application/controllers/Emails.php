<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Emails
 *
 * @author Syed Tausif Ali Shah
 */
class Emails extends Basecontroller{

    public function __construct() {
        parent::__construct();
    }

    public function sendSignupEmail($param) {
        return TRUE;
        $email = array(
            'to' => $param['email'],
            'subject' => 'Welcome to Site',
            'message' => 'Welcome to site your info here <br> email : '.$param[''].' <br> password : '.$param['password']
        );

        return $this->sendEmail($email);
    }

}
