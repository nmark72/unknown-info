<?php
header('X-Content-Type-Options: nosniff');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unknowninfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM PersonalData";
$result = $conn->query($sql);

header("Content-Type: application/json");

$data = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);

$conn->close();
?>
