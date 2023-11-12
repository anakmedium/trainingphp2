<?php
namespace Models;
use Libraries\Database;
use PDO;

class Model_Access
{
    const APPKEY = 'lucuanduluan';
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function login($params) {
        $username = $params['username'];
        $password = hash('sha256', $params['password']);
        
        $rs = $this->dbh->prepare("SELECT * FROM users WHERE username=:condition1");
        $rs->bindParam(':condition1', $username, PDO::PARAM_STR);
        $rs->execute();

        // fetch result
        $isUsers = $rs->fetch();

        if ($isUsers && $password === $isUsers['password']) {
            // Password is correct, do something with the user data
            session_start();
            $_SESSION['user_id'] = $isUsers['id'];
            $_SESSION['username'] = $isUsers['username'];

            $this->setLoginCookie($isUsers['username']);
            return $isUsers;
        }

        return false;
        
    }

    function logout() {
        $this->clearLoginCookie();
        $this->clearLoginSession();
    }

    function setLoginCookie($username) {
        $cookie_name = 'appkey';
        $cookie_value = hash('sha256', self::APPKEY.'-'.$username);
    
        // Set the cookie to expire in 1 hour (adjust as needed)
        setcookie($cookie_name, $cookie_value, time() + 3600, "/");
    }

    function clearLoginCookie() {
        $cookie_name = 'appkey';
    
        // Set the cookie to expire in the past to delete it
        setcookie($cookie_name, '', time() - 3600, "/");
    }

    function clearLoginSession() {
        session_destroy();
    }

    function checkAppKey(){
        session_start();
        $result = hash('sha256', self::APPKEY.'-'.$_SESSION['username']);

        return $result;
    }

}