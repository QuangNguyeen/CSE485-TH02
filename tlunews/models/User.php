<?php
class User{
    private $id;
    private $userName;
    private $password;
    private $role;  // 0 is user ; 1 is admin
    public function __construct($id, $userName, $password, $role){
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
        $this->role = $role;
    }
    public function getId(){
        return $this->id;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
}