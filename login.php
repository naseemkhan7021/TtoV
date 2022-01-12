<?php 
include "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Create connection
	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT id, name FROM login where email = '".$_POST["email"]."' and password = '".$_POST["password"]."'";
	$result = $conn->query($sql);

	if ($result != null && $result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
		    session_start();
			$_SESSION['login'] = 1;
			$_SESSION['loginid'] = $row["id"];
			$_SESSION['loginname'] = $row["name"];
		}
		header("Location: home.php");
	} else {
		$error = '<p style="font-size:17px; color:red;"><b>Invlid email or password provided.</b></p>';
	}
	$conn->close();
}

include "header.php";

?>

<div class="body_big">
<h2>Login</h2>
	<?php echo $error; ?>
	<div class="input_text">
		<form action="login.php" method="post" id="loginform" style="font: normal 14px Arial, Helvetica, sans-serif; color:#6e6e6e; margin-top:20px;">
			<table cellpadding="5px">
				<tr>
					<td style="text-align:right">Email:</td>
					<td>
						<input id="email" name="email" value="" class="text" placeholder="Enter Email Address" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
					</td>
				</tr>
				<tr>
					<td style="text-align:right">Password:</td>
					<td>
						<input id="password" name="password" value="" placeholder="Enter Password" class="text" type="password" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
					</td>
				</tr>
				<tr valign="center">
					<td style="text-align:right"></td>
					<td>
						<table width="100%">
							<tr>
								<td>
									<!-- <input type="image" name="imageField" id="imageField" src="images/login.gif" style="padding:0px"/> -->
									<input type="submit" class="submitbutton" value="Login" style="padding:0px" />
								</td>
								<td align="right">
									&nbsp;&nbsp;&nbsp;<a href="forget.php">Forget Password? Click here</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<p style="height:400px">&nbsp;</p>
</div>

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
include "footer.php";
?>