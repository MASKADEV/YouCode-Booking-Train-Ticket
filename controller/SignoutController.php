<?php 

class SignoutController
{
	
	public function __construct()
	{
	}

	public function index()
	{
		session_start();
        session_unset();
        session_destroy();
        require_once __DIR__."/../views/index.php";
    }

}