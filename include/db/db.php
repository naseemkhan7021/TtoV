<?php
$conn = mysqli_connect(getenv("DB_SERVER"),"root", getenv("DB_PASS"), getenv("DB_NAME"));
// $conn = mysqli_connect(getenv("DB_SERVER"),"zjbvmhxobesanr", getenv("DB_PASS"), getenv("DB_NAME"),5432);
// $conn = mysqli_connect("ec2-3-222-49-168.compute-1.amazonaws.com","zjbvmhxobesanr","4d5a5602d6405aa0a736268c4e63f4806717de77372baa939b64a50d8692a8da","dbdhsta0rh2f9b","5432");
// $conn = mysqli_connect(getenv("DB_SERVER"), getenv("DB_USER"), '', getenv("DB_NAME"));
if (mysqli_connect_errno()) {
     die ("Connection Fail" . mysqli_connect_error());
}
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
