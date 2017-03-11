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

// Check if user is in database before entering the registraion
$user = $access->getUser($email);
if ($email == $user["email"]){
  $returnArray["status"] = "400";
  $returnArray["message"] = "Username taken";
}

else
{
  // 3 Insert user info into database
  $result = $access->registerUser($email ,$password);

  if($result)
  {
      // Get user from access.php function
      $user = $access->getUser($email);

      // Start a new session bassed off the users new account.
      $_SESSION['userDetails'] = array();
      $_SESSION['userDetails'][] = $user["username"];

      // Return 200 as a successful account creation.
      $returnArray["status"] = "200";
      $returnArray["message"] = "Account created";
  }

  else {
      $returnArray["status"] = "400";
      $returnArray["message"] = "Data not passing register user function";
  }
}
  // 4 Close connection
  $access->dissconnect();
  echo $returnArray["status"];
?>
