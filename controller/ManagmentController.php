<?php 

require_once __DIR__ . '/../models/managment.php';
session_start();
class ManagmentController
{
	
	public function __construct()
	{
	}
	
	public function index()
	{
		$managment = new Managment();
		$booking_result = $managment->fetchAllTrip();
		require_once __DIR__."/../views/managment.php";
	}

	public function addTrip() {
		$managment = new Managment();
		$managment->addtrip($_POST['date'],$_POST['depart_time'], $_POST['arrive_time'], '00:00', $_POST['depart_city'], $_POST['arrive_city'], $_POST['price'], $_POST['place_number']);
		header("Location: http://172.16.139.9/managment");
	}

	public function cancelTrip() {
		$managment = new Managment();
		$params=explode("/", $_GET['p']);
		unset($params[0]);
		unset($params[1]);
		$managment->canceltrip($params[2]);
		header("Location: http://172.16.139.9/managment");
	}

	public function deleteBooking () {
		$managment = new Managment();
		$params=explode("/", $_GET['p']);
		unset($params[0]);
		unset($params[1]);
		$managment->deletebooking($params[2]);
		header("Location: http://172.16.139.9/managment");
	}

}