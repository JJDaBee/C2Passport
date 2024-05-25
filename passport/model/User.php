<?php

class User {
    private $username;
    private $passwordHash;
    private $role;


    function __construct($username, $passwordHash, $role) {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->role = $role;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function setPasswordHash($hashed){
        $this->passwordHash = $hashed;
    }

    public function getRole(){
        return $this->role;
    }

   
}
