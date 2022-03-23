<?php 

require_once "connection.php";

class Managment {
    private $table = 'trip';
    public function __construct() {
    }

    public function addtrip ($date, $depart_time, $arrive_time, $during_time, $depart_city, $arrive_city, $price, $place_number) {
        $db = new Connection();
        $db->insert($this->table, ['date', 'depart_time', 'arrive_time', 'during_time', 'depart_city', 'arrive_city', 'price', 'place_number', 'available'], [$date, $depart_time, $arrive_time, $during_time, $depart_city, $arrive_city, $price, $place_number, '0']);
    }

    public function canceltrip ($id) {
        $db = new Connection();
        $db->cancelTrip($this->table, $id);
    }

    public function fetchAllTrip() {
        $db = new Connection();
        $result = $db->selectAll('booking');
        return $result;
    }
    
    public function deletebooking ($id) {
        $ctn = new Connection();
        $ctn->delete('trip', $id);
    }
}

?>