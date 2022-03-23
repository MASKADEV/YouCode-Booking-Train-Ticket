<?php 


require_once __DIR__ . '/../models/authentication.php';


class SignupController
{
	
	public function __construct()
	{
	}

	public function index()
	{
		session_start();
		if(!empty($_SESSION['id']))
		{
			header('location: http://172.16.139.9/home');
		}else {
			require_once __DIR__."/../views/signup.php";
		}

	}
	public function signup_function() {
		session_start();
		if(!empty($_SESSION['id']))
		{
			header('location: http://172.16.139.9/home');
		}else {
			$email = $_POST['email'];
			$full_name = $_POST['full_name'];
			$password = $_POST['password'];
			$auth = new Authentication();
			$auth->signup($full_name, $email, $password);
			header("Location: http://172.16.139.9");
		}

	}
}