<?php
class UserId{

    private $username;
    private $password;

    public function setPassword($password)
    {
        $this->password= $password;
    }

    
    public function getPassword()
    {
        return $this->password;
    }

    public function setusername($username)
    {
        $this->username= $username;
    }

    
    public function getuserName()
    {
        return $this->username;
    }

    public function isConnected()
    {
       
        return !empty($_SESSION['isConnected']);
    }
}