<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Loginmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Loginmodel extends Commonmodel{
    public function __construct() {
        parent::__construct();
    }
    
    public function tryUserLogin($param) {
        $query = "SELECT *  FROM tbl_agent WHERE agent_email = :email AND agent_password = SHA1(:pass)";
        $statement = $this->prepQuery($query);
        
        $statement->bindParam(':email', $param['email'], PDO::PARAM_STR);
        $statement->bindParam(':pass', $param['password'], PDO::PARAM_STR);
        
        $statement->execute();

        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }
}
