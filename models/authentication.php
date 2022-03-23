<?php 

require_once "connection.php";

class Authentication {
    private $table = 'users';

    public function __construct() {
    }

    public function signup($fullname, $email, $password) {
        $ctn = new Connection();
        $ctn->insert($this->table, ['role', 'full_name', 'email', 'password'], ['0', $fullname, $email, $password]);
    }
    public function signin($email, $password) {
        $ctn = new Connection();
        $maska =$ctn->selectOne($this->table, $email, $password);
        session_start();
        if(!empty($maska)){
            $_SESSION["id"] = $maska['id'];
            $_SESSION["email"] = $maska['email'];
            $_SESSION["full_name"] = $maska['full_name'];
            $_SESSION["role"] = $maska['role'];
            header('location: http://172.16.139.9/home');
            exit();
        }
            if(isset($_SESSION['id']))
            {
                header('location: http://172.16.139.9/home');
            }else {
                header('location: http://172.16.139.9/signin');
            }
		    
    }
}