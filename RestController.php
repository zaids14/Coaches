<?php
require_once("CoachRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/
	switch($page_key){

		case "list":
			// to handle REST Url /coach/list/
			$coachRestHandler = new CoachRestHandler();
			$result = $coachRestHandler->getAllCoachs();
			break;
	
		case "create":
			// to handle REST Url /coach/create/
			$coachRestHandler = new CoachRestHandler();
			$coachRestHandler->add();
		break;
		
		case "delete":
			// to handle REST Url /coach/delete/<row_id>
			$coachRestHandler = new CoachRestHandler();
			$result = $coachRestHandler->deleteCoachById();
		break;
		
		case "update":
			// to handle REST Url /coach/update/<row_id>
			$coachRestHandler = new CoachRestHandler();
			$coachRestHandler->editCoachById();
		break;
}
?>
