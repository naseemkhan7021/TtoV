<?php
$conn = mysqli_connect("localhost", "root", "", "prioaren_convert");
if (mysqli_connect_errno()) {
     die ("Connection Fail" . mysqli_connect_error());
}
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
