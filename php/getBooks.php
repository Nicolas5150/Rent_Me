<?php
// see if either value was passed in via ajax call.

if (!empty($_POST["genere"])) {
  $genere = htmlspecialchars($_POST["genere"]);
}

$title = null;
if (!empty($_POST["title"])) {
  $title = $_POST["title"];
}

$count = null;
if (!empty($_POST["count"])) {
  $count = $_POST["count"];
}

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

// Decrement the counter for the current book at hand.
if ($title != null && $count != null) {
  $booksData = $access->decrementBook($title);

  // Return (by echo) all books and its respected data back to the ajax call.
  echo json_encode($booksData);

  $access->dissconnect();

  return;
}

// Only if the user is pulling up the modal with the specific book
if ($title != null) {
  $booksData = $access->selectBook($title);

  // Return (by echo) all books and its respected data back to the ajax call.
  echo json_encode($booksData);

  $access->dissconnect();

  return;
}

// First pass into the site in which all books are loaded for the user to see.
if ($genere == "none") {
  $booksData = $access->getAllBooks();

  // Return (by echo) all books and its respected data back to the ajax call.
  echo json_encode($booksData);

  $access->dissconnect();
  return;
}

// Ajax call specified a genere when calling this php (user entered a genere in
// the drop down section, only return the books of this genere.)
else {
  $booksData = $access->getGenere($genere);

  // Return (by echo) all books and its respected data back to the ajax call.
  echo json_encode($booksData);

  $access->dissconnect();
  return;
}
?>
