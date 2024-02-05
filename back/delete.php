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
  $ID = $_GET['id'];

  $sql = "DELETE FROM personaldata WHERE ID = '$ID'";
  if ($conn->query($sql) === TRUE) {
    echo "Data deleted successfully";
  } else {
    echo "Error: " . $sql . "\n" . $conn->error;
  }
} else {
  echo "You are not logged in";
}
$conn->close();
?>
