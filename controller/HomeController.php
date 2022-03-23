<?php 
	session_start();
class HomeController
{
	public function __construct()
	{

	}

	public function index()
	{
		require_once __DIR__."/../views/index.php";
	}
}
