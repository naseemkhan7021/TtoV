<?php
// include "include/db/db.php";
session_start();
include "include/view/header.php";
$audiofileName = $_SESSION['audiofileName'] ?? "not";
$text = "";
?>
<html>

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>


<body>
	<div id="player">
		<div style="width:204px; height:24px; margin:10px;">

		</div></BR>
		<div>

		</div>
	</div>
	</BR>
	<div id="loader" class="loader">
		<div style="width:24px; height:24px; margin:auto;">
			<img src="images/loader.gif" />
			<div class='response'></div>
		</div><BR>
		<div>
			PLEASE WAIT...<BR>Your file is being processed. Please wait until process is complete.<BR>.
		</div>
	</div>

	<br>


	<div id="player"></div>

	<br>

	<form action="save.php" method="post">
		<!-- <input type="textbox" id="txt" name="text"/> -->

		<textarea style="resize: none;" id="txt" name="text" rows="4" cols="50">At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.</textarea>



		<input type="button" class="submitbutton-out" name="conver" value="Convert to Speech" onclick="getAudio()" />
		<?php
		// echo $audiofileName ?? '';
		if (isset($_SESSION["login"]) && $_SESSION["login"] == 1) {
		?>
			<!-- <input type="submit" class="submitbutton" value="Save To My List" style="padding:0px" /> -->

		<?php
		} else {
		?>
			<br />
			<br />
			<a href="login.php">Click here to Login</a> or <a href="signup.php">Sign up now</a> to save your text and audio for future use</a>
		<?php
		}
		?>

		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

		<script>
			async function getAudio() {
				var txt = jQuery('#txt').val()
				jQuery.ajax({
					url: 'get.php',
					type: 'post',
					data: 'txt=' + txt,
					success: function(result) {
						jQuery('#player').html(result);
					}
				});
			}
			// $('a#filepath').onclick().download($_SESSION["audiofileName"]);
		</script>