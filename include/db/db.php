<?php
// $conn = mysqli_connect(getenv("DB_SERVER"),"root", getenv("DB_PASS"), getenv("DB_NAME"));
$conn = mysqli_connect(getenv("DB_SERVER"),"zjbvmhxobesanr", getenv("DB_PASS"), getenv("DB_NAME"),5432);
// $conn = mysqli_connect(getenv("DB_SERVER"), getenv("DB_USER"), '', getenv("DB_NAME"));
if (mysqli_connect_errno()) {
     die ("Connection Fail" . mysqli_connect_error());
}
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
