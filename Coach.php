<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Coach {
	private $coaches = array();

	// url -> coach/list -> List to fetch all record 
	// url -> coach/list?name=John -> List to fetch all record with matched name in urlParam 
	public function getAllCoach(){
		if(isset($_GET['name'])){
			$name = $_GET['name'];
			$query = 'SELECT * FROM dataset WHERE Name LIKE "%' .$name. '%"';
		} else {
			$query = 'SELECT * FROM dataset';
		}
		$dbcontroller = new DBController();
		$this->coaches = $dbcontroller->executeSelectQuery($query);
		return $this->coaches;
	}

	// url -> coach/create -> Insert coach record 
	// body -> name, timezone, dayofweek, availableAt and availableUntil
	public function addCoach(){
		if(isset($_POST['name'])){
			$name = $_POST['name'];
				$timezone = '';
				$dayOfWeek = '';
				$availableAt = '';
				$availableUntil = '';
			if(isset($_POST['timezone'])){
				$timezone = $_POST['timezone'];
			}
			if(isset($_POST['dayOfWeek'])){
				$dayOfWeek = $_POST['dayOfWeek'];
			}	
			if(isset($_POST['availableAt'])){
				$availableAt = $_POST['availableAt'];
			}	
			if(isset($_POST['availableUntil'])){
				$availableUntil = $_POST['availableUntil'];
			}	
			$query = "insert into dataset (name,timezone,dayOfWeek) values ('" . $name ."','". $timezone ."','" . $dayOfWeek ."','". $availableAt ."','". $availableUntil ."')";
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function deleteCoach(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM dataset WHERE id = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function getRecordForUpdate(){
	
			$name = $_POST['name'];
			$dayOfWeek = $_POST['dayOfWeek'];
			
			$getQuery = "SELECT * FROM dataset where Name = '". $name . "' and day_of_week = '". $dayOfWeek ."' ";
			
		$dbcontroller = new DBController();
		$this->coaches= $dbcontroller->executeSelectQuery($getQuery);
		
		
			return $this->coaches;
		
	}

	
	public function editCoach(){
		$recordTobeUpdated = $this->getRecordForUpdate();
		$start_time = $recordTobeUpdated[0]["available_at"];
		$dayOfWeek =  $recordTobeUpdated[0]["day_of_week"];
		$name =  $recordTobeUpdated[0]["Name"];
		$Minutes = 30;
		$To = date("H:i:s.u", strtotime($start_time)+($Minutes*60));
		echo($To);
		
		$query = "UPDATE dataset SET available_at ='". $To ."'where Name = '". $name . "' and day_of_week = '". $dayOfWeek ."' ";
		$dbcontroller = new DBController();
		$result = $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}
	
}
?>