<?php
$genere = null; //$_POST["genere"];

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

// First pass into the site in which all books are loaded for the user to see.
if ($genere == null) {
  $booksData = $access->getAllBooks();

  // Return (by echo) all books and its respected data back to the ajax call.
  echo json_encode($booksData);
  //return $booksData;
}

// Ajax call specified a genere when calling this php (user entered a genere in
// the drop down section, only return the books of this genere.)
else {
  $booksData = $access->getGenere($genere);

  // Return (by echo) all books and its respected data back to the ajax call.
  echo json_encode($booksData);
}

// 4 Close connection
$access->dissconnect();
?>
