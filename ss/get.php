
<?php
$host = "localhost";
$userdb = "u0311662_amzdb";
$pass = "20092524Poom@";
$datab = "u0311662_amzdb";
 $conn = new mysqli($host, $userdb, $pass, $datab);
$conn -> set_charset("utf8");



$token = $_GET["token"];

$showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
while ($row = $showtoken->fetch_array()) {
  $id = $row["qrkey"];
}


echo $id;


?>