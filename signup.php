<?php 
include "include/db/db.php";;
include "include/view/header.php";
?>
<div class="body_big">
<h2>Signup</h2>

<?php 

$name = "";
$email = "";
$password = "";
$repassword = "";
$issuccess = false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];

	// Create connection
	// $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO login (name, email, password) VALUES ('".$name."', '".$email."', '".$password."')";
	
	if ($conn->query($sql) === TRUE) {
		echo '<p style="font-size:17px; color:green;"><b>User registered successfully. <a href="login.php">Click here to login</a>!</b></p>';
		$issuccess = true;
	} else {
		echo '<p style="font-size:17px; color:red;"><b>Sorry, unable to register user now. Please try again later!</b></p>';
	}	
	$conn->close();		
}
if ($issuccess == true) {
?>

<p style="height:460px">&nbsp;</p>
<div class="clr"></div>
</div>

<?php
}
else {
?>


<script type="text/javascript">

function validate() {
	var error = document.getElementById("error");
	
	var pass = document.getElementById("password");
	var repass = document.getElementById("repassword");

	var email = document.getElementById("email");

	if (pass.value.length < 5) {
		error.innerHTML = '<p style="font-size:17px; color:red;"><b>Password lenght should be at least 5.</b></p>';
		return false;
	}
	
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) == false)
	{
		error.innerHTML = '<p style="font-size:17px; color:red;"><b>Invalid email address. Please provide a correct one.</b></p>';
		return false;
	}
	else if (pass.value != repass.value) {
		error.innerHTML = '<p style="font-size:17px; color:red;"><b>Password not same. Please reenter password.</b></p>';
		return false;
	}
	else {
		error.innerHTML = '';
		return true;
	}
	return true;	
}

</script>

	<div id="error" name="error"></div>
	<div class="input_text">
		<form action="signup.php" method="post" id="signupform" style="font: normal 14px Arial, Helvetica, sans-serif; color:#6e6e6e; margin-top:20px;">
		<table cellpadding="5px">
			<tr>
				<td style="text-align:right">Name:</td>
				<td>
					<input id="name" name="name" value="<?php echo $name ?>" class="text" placeholder="Enter Your Name" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
				</td>
			</tr>
			<tr>
				<td style="text-align:right">Email:</td>
				<td>
					<input id="email" name="email" value="<?php echo $email ?>" class="text" placeholder="Enter Your Email Address" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
				</td>
			</tr>
			<tr>
				<td style="text-align:right">Password:</td>
				<td>
					<input id="password" name="password" value="<?php echo $password ?>" placeholder="Enter Password" class="text" type="password" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
				</td>
			</tr>
			<tr>
				<td style="text-align:right">Re Enter Password:</td>
				<td>
					<input id="repassword" name="repassword" value="<?php echo $repassword ?>" placeholder="Re Enter Password" class="text" type="password" style="width:436px; height:27px; border:1px solid #c5c5c5;"/>
				</td>
			</tr>
			<tr>
				<td style="text-align:right"></td>
				<td>
					<!-- <input style="padding:0px" type="image" onclick="return validate()" name="imageField" id="imageField" src="images/signup.gif" /> -->
					<input type="submit" class="submitbutton" value="Signup" style="padding:0px" onclick="return validate()"/>
				</td>
			</tr>
		</table>
		</form>
	</div>
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
}
include "include/view/footer.php";
?>