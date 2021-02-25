<?php
namespace model;

class Gebruiker{
    private $id;
    private $username;
    private $password;
    private $role;


    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

}