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

header("Content-Type: application/json");

$ID = $_GET['id'];

$sql = "SELECT * FROM personaldata WHERE ID = '$ID'";
$result = $conn->query($sql);

$data = new stdClass();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $data->ID = $row['ID'];
  $data->Place = $row['Place'];
  $data->Age = $row['Age'];
  $data->Description = $row['Description'];
}

echo json_encode($data);

$conn->close();
?>
