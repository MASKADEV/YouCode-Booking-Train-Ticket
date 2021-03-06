<?php 

class Connection
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database="booking_train";
	private $conn;

	public function __construct()
	{
		try {
			  $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
			} catch(PDOException $e) 
			{
			  echo "Connection failed: " . $e->getMessage();
			}
	}

	public function insert($table,$tableCln,$tableVal)
	{
		$names="";
		$values="";
		$vrls="";
		for ($i=0; $i <count($tableCln) ; $i++) 
		{ 
			if ($i>0) 
			{
				$vrls=",";
			}
			$names.=$vrls."`".$tableCln[$i]."`";
			$values.=$vrls."'".$tableVal[$i]."'";
		}
		$str="INSERT INTO `$table`(".$names.") VALUES (".$values.")";
		$query=$this->conn->prepare($str);
		$query->execute();
	}

	public function selectAll($table)
	{
		$query=$this->conn->prepare("SELECT * FROM `$table`");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updatePlaces($id, $place_number,$operation) {
		if($operation) 
		{
			$place_number = $place_number - 1;
			$sql = "UPDATE `trip` SET `place_number`=$place_number WHERE `id` = $id";
			$query=$this->conn->prepare($sql);
			$query->execute();
		}else {
			$place_number = $place_number + 1;
			$sql = "UPDATE `trip` SET `place_number`=$place_number WHERE `id` = $id";
			$query=$this->conn->prepare($sql);
			$query->execute();
		}
	}

	public function selectOne($table, $email, $password)
	{
		$str = "SELECT * FROM `$table` WHERE email=? AND password=?";
		$query=$this->conn->prepare($str);
		$query->execute(
			[$email,$password]
		);
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function delete($table,$id)
	{
		$query=$this->conn->prepare("DELETE FROM `$table` WHERE id=$id");
		$query->execute();
	}

	public function fetchTrip() {
		$query=$this->conn->prepare("SELECT * FROM `trip`");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function fetchBooking($id) {
		$query=$this->conn->prepare("SELECT * FROM `booking` WHERE `id` = $id");
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function searchTrip($table, $depart_city, $arrive_city)
	{
		$str = "SELECT * FROM `$table` WHERE depart_city=? AND arrive_city=?";
		$query=$this->conn->prepare($str);
		$query->execute(
			[$depart_city,$arrive_city]
		);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function fetchOneTrip($id) {
		$query=$this->conn->prepare("SELECT * FROM `trip` WHERE id=$id");
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchUserTrips($id) {
		$query=$this->conn->prepare("SELECT * FROM `booking` WHERE user_id=$id");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function cancelTrip($table, $id){
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
		$query = $this->conn->prepare("UPDATE $table
		SET available = '0'
		WHERE `id`= $id");
		$query->execute();
		$query = $this->conn->prepare("
			DELETE FROM `booking` WHERE `id_trip` = $id
		");
		$query->execute();
	}
	public function activeTrip($table, $id){
		$query = $this->conn->prepare("UPDATE $table
		SET available = '1'
		WHERE `id`= $id");
		$query->execute();
	}
}
