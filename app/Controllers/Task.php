<?php

namespace Controllers;

use Models\Model_Access;
class Task {
    public function __construct()
    {
        // nanti diisi conctructor dari model
        $this->access = new Model_Access();
    }

    public function index()
    {
        // panggil view login
        require_once 'app/Views/Task/Index.php';
    }

    


}
