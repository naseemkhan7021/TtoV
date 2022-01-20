<?php 
include "include/db/db.php";;
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

if(isset($_SESSION["loginid"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	$userid = $_SESSION["loginid"];
	$text = $_POST["text"];
	$text = str_replace("'","&apos;",$text);
	$text = str_replace('"','&quot;',$text);	
	$text = addslashes($text);
	$filename = $_SESSION['audiofileName'] ?? '';

	// Create connection
	// $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO savedtexttospeech (userid, text, filename) VALUES ('".$userid."', '".$text."', '".$filename."')";
	
	if ($conn->query($sql) === TRUE) {
		header("Location: home.php");
	} else {
		echo '<p style="font-size:17px; color:red;"><b>Sorry, unexpected error occurred. Please report it to the administrator.</b></p>';
	}	
	$conn->close();	
}

?>