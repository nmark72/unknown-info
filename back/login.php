<?php
header('X-Content-Type-Options: nosniff');
session_start();

if (isset($_POST['submit'])) {
  // Get the user input
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  if ($user == "admin" && $pass == "1234") {
    $_SESSION['username'] = $user;

    $previous_page = $_SERVER['HTTP_REFERER'];

    if ($previous_page == "http://localhost:90/unknown-info/front/input.html") {
      header("Location: $previous_page");
    } else {
      header("Location: http://localhost:90/unknown-info/front/input.html");
    }
  } else {
    // Redirect the user to the login page
    header("Location: http://localhost:90/unknown-info/front/login.html");
  }
}
?>
