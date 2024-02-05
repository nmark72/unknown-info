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

header("Content-Type: text/plain");

session_start();

if (isset($_SESSION['username'])) {
  $json = file_get_contents("php://input");

  $data = json_decode($json);

  $ID = $data->ID;
  $Place = $data->Place;
  $Age = $data->Age;
  $Description = $data->Description;

  if ($ID) {
    $sql = "UPDATE personaldata SET Place = '$Place', Age = '$Age', Description = '$Description' WHERE ID = '$ID'";
    if ($conn->query($sql) === TRUE) {
      echo "Data updated successfully";
    } else {
      echo "Error: " . $sql . "\n" . $conn->error;
    }
  } else {
    $sql = "INSERT INTO personaldata (Place, Age, Description) VALUES ('$Place', '$Age', '$Description')";
    if ($conn->query($sql) === TRUE) {
      echo "Data inserted successfully";
    } else {
      echo "Error: " . $sql . "\n" . $conn->error;
    }
  }
} else {
  echo "You are not logged in";
}

$conn->close();
?>