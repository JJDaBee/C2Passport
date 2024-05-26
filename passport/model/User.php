<?php

// class User {
    
//     private $username;
//     private $passwordHash;
//     private $role;


//     function __construct($username, $passwordHash, $role) {
//         $this->username = $username;
//         $this->passwordHash = $passwordHash;
//         $this->role = $role;
//     }

//     public function getUsername(){
//         return $this->username;
//     }

//     public function getPasswordHash(){
//         return $this->passwordHash;
//     }

//     public function setPasswordHash($hashed){
//         $this->passwordHash = $hashed;
//     }

//     public function getRole(){
//         return $this->role;
//     }

   
// }

class User {
    private $username;      
    private $fname;
    private $lname;
    private $phoneno;       
    private $address;       
    private $aoi;
    private $passwordhash;  
    private $role;

    public function __construct($username,$fname,$lname,$phoneno,$address,$aoi,$passwordhash,$role)
    {
            $this->username = $username;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->phoneno = $phoneno;
            $this->address = $address;
            $this->aoi = $aoi;
            $this->passwordhash = $passwordhash;
            $this->role = $role;
    }

    public function getUsername()
    {
            return $this->username;
    }

    public function setUsername($username)
    {
            $this->username = $username;
    }

    public function getFname()
    {
            return $this->fname;
    }

    public function setFname($fname)
    {
            $this->fname = $fname;
    }

    public function getLname()
    {
            return $this->lname;
    }

    public function setLname($lname)
    {
            $this->lname = $lname;
    }

    public function getPhoneno()
    {
            return $this->phoneno;
    }

    public function setPhoneno($phoneno)
    {
            $this->phoneno = $phoneno;
    }

    public function getAddress()
    {
            return $this->address;
    }

    public function setAddress($address)
    {
            $this->address = $address;
    }

    public function getAoi()
    {
            return $this->aoi;
    }

    public function setAoi($aoi)
    {
            $this->aoi = $aoi;
    }

    public function getPasswordHash()
    {
            return $this->passwordhash;
    }

    public function setPasswordHash($passwordHash)
    {
            $this->passwordhash = $passwordHash;
    }

    public function getRole()
    {
            return $this->role;
    }

    public function setRole($role) 
    {
            $this->role = $role;
    }
}

?>