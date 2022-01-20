<?php 
include "include/db/db.php";;
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');



if(!isset($_SESSION)) { 
  session_start(); 
} 

if(isset($_SESSION["loginid"]) && $_SERVER['REQUEST_METHOD'] == 'GET') {
	$userid = $_SESSION["loginid"];
	$usp_id = $_GET['id'];


	// Create connection
	// $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	
	$sql = "DELETE FROM savedtexttospeech WHERE userid = $userid AND id = $usp_id ";
	
	
	if ($conn->query($sql) === TRUE) {
		header("Location: home.php");
	} else {
		echo '<p style="font-size:17px; color:red;"><b>Sorry, unexpected error occurred. Please report it to the administrator.</b></p>';
	}	
	$conn->close();	
}

?>