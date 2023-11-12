<?php 
namespace Controllers;

use Controllers\Result;
use Models\Model_task;

class Api {
    
    

    public function save(){

        $return = new Result();

        if (!$this->isPost()) {
            $return->info = "Method not allowed";
            $return->code = 200;
            print json_encode($return);
        }

        $params = json_decode($_POST['data']);

        if(isset($params->id) && !empty($params->id)) {
            $data['id'] = $params->id;
        }

        $data['title'] = $params->title;
        $data['description'] = $params->description;
        $data['status'] = $params->status ?? 1;
        $data['created_at'] = date("Y-m-d H:i:s");
        
        $task = new Model_task();
        $return = $task->save($data);
        

        echo $return;


    }

    public function isPost(){
        $result = ($_SERVER["REQUEST_METHOD"] == 'POST') ? true : false;

        return $result;
    }

}