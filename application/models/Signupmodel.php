<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signupmodel
 *
 * @author Syed Tausif Ali Shah
 */
class Signupmodel extends Commonmodel{
    public function __construct() {
        parent::__construct();
    }
    
    public function verifyAgentInvite($inviteKey) {
        $query = "SELECT * FROM tbl_agent_invite WHERE invite_activation_key = MD5(:inviteKey)";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':inviteKey', $inviteKey, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0 ? $statement->fetch(PDO::FETCH_ASSOC) : FALSE;
    }
    
    public function delInvite($email) {
        $query = "DELETE FROM tbl_agent_invite WHERE invite_email = :email";
        $statement = $this->prepQuery($query);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        return $statement->execute();
        
    }
}
