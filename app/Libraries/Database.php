<?php
namespace Libraries;
use PDO;
class Database
{
    private static $instence = NULL;

    public function __construct()
    {
        // diisi constructor
    }

    public function __clone()
    {
        // diisi clone
    }

    public static function getInstance()
    {
        if(!isset(self::$instence)) {
            $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instence = new PDO('mysql:host=localhost;dbname=task', 'root','',$pdo_option);
            return self::$instence;
        }
    }
}
