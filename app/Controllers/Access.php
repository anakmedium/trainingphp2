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
        $result  = $this->access->login($params);

        if($result->code == 0) {
            require_once 'app/Views/Task/Index.php';
        } else {
            require_once 'app/Views/Access/Index.php';
        }
        
    }

    public function logout()
    {
        $this->access->logout();
        require_once 'app/Views/Access/Index.php';
    }

    public function checkAppKey(){
        return $this->access->checkAppKey();
    }


}
