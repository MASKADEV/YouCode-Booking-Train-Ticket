<?php 

require_once __DIR__ . '/../models/managment.php';
session_start();
class ManagmentController
{
	
	public function __construct()
	{
	}
	
	private function refresh() {
		header("Location: http://localhost/Booking-train-ticket/managment");
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
		header("Location: http://localhost/Booking-train-ticket/managment");
	}

	public function cancelTrip() {
		$managment = new Managment();
		$params=explode("/", $_GET['p']);
		unset($params[0]);
		unset($params[1]);
		$managment->canceltrip($params[2]);
		header("Location: http://localhost/Booking-train-ticket/managment");
	}

	public function activeTrip() {
		$managment = new Managment();
		$params=explode("/", $_GET['p']);
		unset($params[0]);
		unset($params[1]);
		$managment->activetrip($params[2]);
		header("Location: http://localhost/Booking-train-ticket/managment");
	}

	public function deleteBooking () {
		$managment = new Managment();
		$params=explode("/", $_GET['p']);
		unset($params[0]);
		unset($params[1]);
		$managment->deletebooking($params[2]);
		header("Location: http://localhost/Booking-train-ticket/managment");
	}

}