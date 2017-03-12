<?php
session_start();
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);

// Secure password using sha1 encryption function
$password = sha1($password);

// 2 Build Connection
// Build connection in secure way
$file = parse_ini_file("db.ini");

// Store vars from file
$host = trim($file["dbHost"]);
$user = trim($file["dbUser"]);
$pass = trim($file["dbPass"]);
$name = trim($file["dbName"]);

require("Secure/access.php");
$access = new access($host, $user, $pass, $name);
$access->connect();

// Check if user is in database then compare email and password values.
$user = $access->getUser($email);
if($email == $user["username"] && $password == $user["password"]) {
  $returnArray["status"] = "200";
  $returnArray["message"] = "match";

  // Start a new session bassed off the users new account.
  $_SESSION['userDetails'] = array();
  $_SESSION['userDetails'][] = $user["username"];
  $_SESSION['userDetails'][] = $user["bookcount"];
}

else {
  $returnArray["status"] = "400";
  $returnArray["message"] = "incorrect";
}

echo $returnArray["status"];
?>
