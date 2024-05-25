<?php
class Volunteer {
    private $username;
    private $vname;
    private $vdate;

    public function __construct($username, $vname, $vdate) {
        $this->username = $username;
        $this->vname = $vname;
        $this->vdate = $vdate;
    }

    // Getters
    public function getUsername() {
        return $this->username;
    }

    public function getVname() {
        return $this->vname;
    }

    public function getVdate() {
        return $this->vdate;
    }

    // Setters
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setVname($vname) {
        $this->vname = $vname;
    }

    public function setVdate($vdate) {
        $this->vdate = $vdate;
    }

}
?>