<?php 
session_start();
require_once __DIR__ . '/../models/booking_managment.php';

class BookingController
{

	public function __construct()
	{

	}
	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
			$fetch_booking = new BookingManagment();
			$result = $fetch_booking->allUserBooking($_SESSION['id']);
			require_once __DIR__."/../views/booking.php";
		}else {
			require_once __DIR__."/../views/booking.php";
		}
		
	}

	public function search()
	{
		if($_POST['depart_city'] != $_POST['arrive_city']) {
			$depart_ciity = $_POST['depart_city'];
			$arrive_ciity = $_POST['arrive_city'];
			$search = new BookingManagment();
			$result = $search->search_for_trip($depart_ciity, $arrive_ciity);
			require_once __DIR__ . "/../views/sub_pages/search.php";
		} else {
			header('location: http://172.16.139.9/Booking_Train/booking');
		}
	}
	public function booknow() {
			if (isset($_POST['full_name'])){
				$search = new BookingManagment();
				$result = $search->book($_POST['trip_id'], $_POST['email'], $_POST['full_name'], $_POST['phone_number']);
				header('location: http://172.16.139.9/Booking_Train/booking');
			}else {
				header('location: http://172.16.139.9/Booking_Train/booking');
			}
	}

	public function deleteBooking () {
		$booking = new BookingManagment();
		$params=explode("/", $_GET['p']);
		unset($params[0]);
		unset($params[1]);
		$booking->deletebooking($params[2]);
		header("Location: http://172.16.139.9/Booking_Train/booking");
	}
}