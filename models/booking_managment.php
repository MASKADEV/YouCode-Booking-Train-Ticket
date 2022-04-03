<?php

require_once "connection.php";

class BookingManagment {


    public function search_for_trip ($depart_city, $arrive_city) {
        $db = new Connection();
        $result = $db->searchTrip('trip', $depart_city, $arrive_city);
        return $result;
    }

    public function fetchtrip($id)
    {
        $db = new Connection();
        $result = $db-> fetchOnetrip($id);
        return $result;
    }

    public function book($id, $email, $fullname, $phone_number) {
        $db = new Connection();
        $user_id;
        if(isset($_SESSION['id'])){
            $user_id = $_SESSION['id'];
        }else {
            $user_id = 'none';
        }

        $trip_details = $db-> fetchOnetrip($id);
        $db->updatePlaces($id,$trip_details['place_number'], true);
        $date = date("Y-m-d h:i");
        $db->insert('booking', ['email', 'full_name', 'booking_time','phone_number',
        'depart_city', 'arrive_city', 'during_time', 'date', 'depart_time', 'arrive_time',
        'user_id', 'price', 'id_trip'],[$fullname, $email,$date ,$phone_number, $trip_details['depart_city'],
        $trip_details['arrive_city'], $trip_details['during_time'], $trip_details['date'],
        $trip_details['depart_time'], $trip_details['arrive_time'], $user_id, $trip_details['price'], $id]);
    }

    public function allUserBooking ($user_id) {
        $db = new Connection();
        $result = $db->fetchUserTrips($user_id);
        return $result;
    }
    public function deletebooking ($id) {
        $db = new Connection();
        $booking_details = $db->fetchBooking($id);
        $trip_result = $db->fetchOneTrip($booking_details['id_trip']);
        $db->updatePlaces($booking_details['id_trip'], $trip_result['place_number'], false);
        $db->delete('booking', $id);
    }
}

?>