<?php
// I need to find a way to put this into an autoloader or a general class
class StoreManager extends User {
    protected $accessLevel = 2;
    
    public function addManager ($_fname,$_lname,$_email,$_password) {
        $result = parent::addNewUser($_fname,$_lname,$_email,$_password,$this->accessLevel);
        return $result;
    }

}
