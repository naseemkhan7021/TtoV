<?php
session_start();
// include "include/db/db.php";; # not use
$finalAudio = "";
$text = "";

  
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	ini_set('max_execution_time', 3000);


	set_time_limit(0);
	$txt=$_POST['txt'];
	$txt=htmlspecialchars($txt);
	$txt=rawurlencode($txt);
	$text = str_replace("'","&apos;",$_POST["txt"]);
	$text = str_replace('"','&quot;',$text);	
	$text = addslashes($text);	
	$html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');
	$audiofileName = "audio/"   . time() . ".mp3";
	$player="<audio controls='controls' <source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio> <br> <a href='$audiofileName' download id='audiofile'>download</a>";
	echo $player;
	$_SESSION['audiofileName'] = $audiofileName;
	file_put_contents($audiofileName,$html);
	
	// $player="<audio controls='controls'><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
	// $finalAudio= file_put_contents($audiofileName ,($html));
	// // ($finalAudio);
	// $userid = "-1";
	// 	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	// 	if ($conn->connect_error) {
	// 		die("Connection failed: " . $conn->connect_error);
	// 	}
	// 	$sql = "INSERT INTO savedtexttospeech (userid, text, filename) VALUES ('".$userid."', '".$text."', '".$audiofileName."')";
		
	// 	if ($conn->query($sql) === TRUE) {} 
	// 	$conn->close();	
	}



?>