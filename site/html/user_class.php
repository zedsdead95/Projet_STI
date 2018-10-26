<?php

class User {

    public $username;
    public $password;
    public $role;
    public $id;
    public $isActive;

    public function __construct($username,$id,$password,$role,$isActive){
        $this->$username =$username;
        $this.$role =$role;
        $this.$id = $id;
        this.$isActive = $isActive ;

    }

    public function getID(){
        return $id;
    }

    public function isActive(){
        return $this.isActive;
    }
}

?>