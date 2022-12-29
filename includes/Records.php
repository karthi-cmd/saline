<?php
error_reporting(E_ALL);
class Records {	
   
	private $recordsTable = 'users';
	public $id;
    public $username;
    public $phone;
    public $dpm;
	public $firstname;
	public $location;
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listRecords(){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(deviceid LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR username LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR location LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR phone LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR dpm LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY deviceid ASC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $record['deviceid'];
			$rows[] = ucfirst($record['username']);
			$rows[] = $record['location'];		
			$rows[] = $record['phone'];	
			$rows[] = $record['dpm'];
			$rows[] = $record['firstname']." ".$record['lastname'];					
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}
	
	public function getRecord(){
		if($this->id) {
			$sqlQuery = "
				SELECT * FROM ".$this->recordsTable." 
				WHERE deviceid = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	public function updateRecord(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("UPDATE ".$this->recordsTable." SET username= ?, location = ?, phone = ?, dpm = ?, firstname = ? WHERE deviceid = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->username = htmlspecialchars(strip_tags($this->username));
			$this->location = htmlspecialchars(strip_tags($this->location));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->dpm = htmlspecialchars(strip_tags($this->dpm));
			$this->firstname = htmlspecialchars(strip_tags($this->firstname));
			
			
			$stmt->bind_param("ssssss", $this->username, $this->location, $this->phone, $this->dpm, $this->firstname, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->username) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`username`, `location`, `phone`, `dpm`, `firstname`)
			VALUES(?,?,?,?,?)");
		
			$this->username = htmlspecialchars(strip_tags($this->username));
			$this->location = htmlspecialchars(strip_tags($this->location));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->dpm = htmlspecialchars(strip_tags($this->dpm));
			$this->firstname = htmlspecialchars(strip_tags($this->firstname));
			
			
			$stmt->bind_param("ssiis", $this->username, $this->location, $this->phone, $this->dpm, $this->firstname);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE deviceid = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
?>