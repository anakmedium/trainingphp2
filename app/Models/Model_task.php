<?php
namespace Models;
use Libraries\Database;
use Controllers\Result;

class Model_task
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    public function save($params){
        $result = new Result;
        if(isset($params['id']) && !empty($params['id'])){

            # load dulu
            $dataCurrent =  $this->load($params['id']);

            $update = $this->dbh->prepare("UPDATE task SET title=:title,description=:description,status=:status WHERE id=:id");
            $update->execute(
                [
                    "title" => $params['title'],
                    "description" => $params['description'],
                    "status" => $params['status'],
                    "id" => $dataCurrent['id']

                ]
            );

            $result->info = "Data updated";
            $result->code = 0;

            return json_encode($result);
        }else {
            $rs = $this->dbh->prepare("INSERT INTO task (title,description,created_at,status) VALUES (?,?,?,?)");
            $rs->execute(
                [
                    $params['title'],
                    $params['description'],
                    $params['created_at'],
                    $params['status'],

                ]
            );

            $id = $this->dbh->lastInsertId();
            if($id) {
                $result->info = 'data saved';
                $result->data = $id;
            } else {
                $result->info = 'data saved failed';
                $result->code = 1;
            }

            return json_encode($result);
        }


    

    }

    function load($id)
    {

        $rs = $this->dbh->prepare("SELECT * FROM task WHERE id=?");
        $rs->execute([$id]);

        return $rs->fetch();// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
    }

    function list()
    {
        $rs = $this->dbh->query("SELECT * FROM task");
        

       return $rs->fetchAll();
    }

}