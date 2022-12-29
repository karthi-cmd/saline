<?php
error_reporting(E_ALL);
include_once '../../includes/Database.php';
include_once '../../includes/Records.php';

$database = new Database();
$db = $database->getConnection();

$record = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$record->username = $_POST["username"];
    $record->location = $_POST["location"];
    $record->phone = $_POST["phone"];
	$record->pressure = $_POST["pressure"];
	$record->firstname = $_POST["firstname"];
	$record->addRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->id = $_POST["deviceid"];
	$record->username = $_POST["username"];
    $record->location = $_POST["location"];
    $record->phone = $_POST["phone"];
	$record->pressure = $_POST["pressure"];
	$record->firstname = $_POST["firstname"];
	$record->updateRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}
?>