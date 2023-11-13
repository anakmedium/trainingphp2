<?php namespace Controllers;
    use Models\Model_task;
    class Task
    {
       
        function index()
        {
        //     $task = new Model_task();
        //    $data = $task->list();

    
        //     echo json_encode($data);
          
            // if(!isset($_GET['i']))
            // {
            //     //jika tidak ada parameter id yang dikirim, maka akan menampilkan semua data yang ada
            //     $rs = $task->loadlist();
                require_once('app/Views/Task/Index.php');
            // }
            // else
            // {
            //     //ada parameter id yang dikirim, tampilkan detail dari salah satu data yang dipilih
            //     $rs = $this->mhs->lihatDataDetail($_GET['i']);
            //     require_once('app/Views/mhsDetail.php');
            // }
        }

        
    }