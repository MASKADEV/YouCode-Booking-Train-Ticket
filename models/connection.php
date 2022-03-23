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
			//   echo 'connection is Done!';
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
		$query = $this->conn->prepare("UPDATE table_name
		SET available = 'false'
		WHERE condition;");
		$query->execute();
	}
}
