<?php

namespace Controllers;

use Models\Model_Access;
class Access {
    public function __construct()
    {
        // nanti diisi conctructor dari model
        $this->access = new Model_Access();
    }

    public function index()
    {
        // panggil view login
        require_once 'app/Views/Access/Index.php';
    }

    public function login()
    {
        $params = $_POST;
        $login  = $this->access->login($params);
        
    }

    public function logout()
    {
        $logout = $this->access->logout();
    }

    public function checkAppKey(){
        return $this->access->checkAppKey();
    }


}
