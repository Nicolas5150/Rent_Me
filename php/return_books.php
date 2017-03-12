<?php
session_start();
$count = null;
if (!empty($_POST["count"])) {
  $count = $_POST["count"];
}

// 1 Build Connection
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

// grab the user account info and then extract the title of the book they currently have
$tableName = "T_".$_SESSION['userDetails'][0];
$user = $access->getTable($tableName);
$title = $user["title"];

// User requested to return book
if ($count == 1) {
   $access->incrementBook($title);
   $_SESSION['userDetails'][1] = 0;
   echo json_encode($_SESSION['userDetails'][1]);
   return;
}

// Make sure a book or N/A is in the title slot at the moment
if ($title != null || $title != "N/A") {
  $booksData = $access->selectBook($title);
  echo json_encode($booksData);
}
?>
