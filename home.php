<?php 
include "db.php";
include "header.php";
?>

<link href="css/w3.css" rel="stylesheet" type="text/css" />

<h2>Saved Text to Speech Records</h2>
<center>
<a href="index.php">Click here to convert Text to Speech</a>
</center>
<br/>
<table class="w3-table-all w3-card-4">
	<tr style="text-align:left">
		<th style="width:5%">Sr.</th>
		<th style="width:80%">Input Text</th>
		<th style="width:10%;text-align:center">Audio</th>
		<th style="width:5%;"></th>
	</tr>

<?php 
if(isset($_SESSION["login"])) {
	
	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT id, text,filename FROM savedtexttospeech where userid = ".$_SESSION["loginid"]."";
	$result = $conn->query($sql);
	
	if ($result != null && $result->num_rows > 0) {
		$counter = 1;		
		while($row = $result->fetch_assoc()) {		
			$full = $row["text"];
			$filename = $row["filename"] ;
			// $small = "";
			// if (strlen($full) > 50){
			// 	$small = substr($row["text"], 0, 60) . " ... <a href='detail.php'>more</a>";
			// }
			// else {
			// 	$small = $full;
			// }
			// $player="<audio controls='controls' <source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>
			// // <td><audio controls="controls" <source src="data:audio/mpeg;base64,base64_encode("../'.$filename.'") "</audio></td>
			echo '<tr>
					<td style="width:5%">'.$counter++.'</td>
					<td style="width:80%">'.$full.'</td>
					
					<td style="width:10%;text-align:center"><a href="'.$row["filename"].'" download>Download</a></td>
					<td style="width:5%;text-align:center"><a href="remove.php?id='.$row["id"].'" onclick="return confirm(\'Are you sure you want to delete\')">Delete</a></td>
				  </tr>';			
		}		
	} else {

		echo '<tr>
				<td style="width:100%" colspan="4">No saved item found</td>					
			</tr>';	

	}
	$conn->close();
} else {
	header("Location: logout.php");
}

?>
</table>
<br/><br/>
Right-click the Download link.<br>Select "Save target as" or "Save link as."

<div class="clr"></div>
</div>
<br/><br/><br/><br/><br/>
<?php 
include "footer.php"; ?>