<?php
require_once("SimpleRest.php");
require_once("Coach.php");
		
class CoachRestHandler extends SimpleRest {

	function getAllCoachs() {	

		$coach = new Coach();
		$rawData = $coach->getAllCoach();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result["output"] = $rawData;			
		// if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
		// }
	}
	
	function add() {	
		$coach = new Coach();
		$rawData = $coach->addCoach();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function deleteCoachById() {	
		$coach = new Coach();
		$rawData = $coach->deleteCoach();
		
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function editCoachById() {	
		$coach = new Coach();
		$rawData = $coach->editCoach();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		// if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		// }
	}
	
	public function encodeJson($responseData) 
	{
		$jsonResponse = json_encode($responseData);
		echo($jsonResponse);
		return $jsonResponse;		
	}
}
?>