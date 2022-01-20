<?php 
include "include/db/db.php";;
include "include/view/header.php";
?>
<div class="body_big">
<h2>Forget Password</h2>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}

	if (!empty($_POST["email"]) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// Create connection
		// $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT email,fullname,password FROM login where email = '".$_POST["email"]."'";
		$result = $conn->query($sql);

		if ($result != null && $result->num_rows > 0) {

			while($row = $result->fetch_assoc()) {
				$to = $row["email"];
				$subject = "Your password from OnlineTextReader";
				$message = "Hi ". $row["fullname"] . ",\n";
				$message .= "Please find below your password for OnlineTextReader,\n";
				$message .= "Password: ".$row["password"]."\n\n";
				$message .= "Thanks, \n";
				$message .= "OnlineTextReader \n";

				$txt = $message;
				$headers = "From: " . $_POST["email"] . "";	
				mail($to,$subject,$txt,$headers);
			}		
		}

		echo '<p style="font-size:17px; color:green;"><b>You will receive an email with your password, if we find your record matching the provided email address</b></p>
				<br/>
				<a href="login.php" style="font-size:20px">Click here to Login</a>';
		$conn->close();
	}else {
		echo '<p style="font-size:17px; color:red;"><b>Invlid email address provided. Please provide the correct address</b></p><br>
		<a href="forget.php" style="font-size:20px">Click here to go back and enter correct Email Address</a>
		';
	}

}
else {
?>
	<div class="input_text">
		<form action="forget.php" method="post" id="loginform" style="font: normal 14px Arial, Helvetica, sans-serif; color:#6e6e6e; margin-top:20px;">
			<table cellpadding="5px">
				<tr>
					<td style="text-align:right">Email:</td>
					<td>
						<input id="email" name="email" value="" class="text" placeholder="Enter Email Address" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
					</td>
				</tr>
				<tr>
					<td style="text-align:right"></td>
					<td>
						<table width="100%">
							<tr>
								<td>
									<!-- <input type="image" name="imageField" id="imageField" src="images/forget.gif" style="padding:0px"/> -->
									<input type="submit" class="submitbutton" value="Forget" style="padding:0px" />
								</td>
								<td align="right">
									&nbsp;&nbsp;&nbsp;<a href="login.php">Click here to Login</a>
								</td>
							</tr>
						</table>

					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php 
}
?>

<div class="body_small">        
<h2>Advertisement</h2>
	<div style="padding-left:0px;width:340px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!>
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-8073172996546983"
     data-ad-slot="7806837837"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		<br clear="all"><br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!>
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-8073172996546983"
     data-ad-slot="1185589160"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
</div>
<?php
include "include/view/footer.php";
?>