<?php
  session_start();
?>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Rent Me - A Book Rental Company</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../index.html" class="brand-logo">Rent Me</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="html/books.php">Books</a></li>
        <li><a href="html/contact.php">Contact</a></li>
        <?php
          // Show logout if logged in currently
          if(isset($_SESSION['userDetails']))
            // This includes the logout and cart nav sections and its restylings.
            echo "<li><a href=\"../php/login.php\">logout</a></li>";
          else
            echo "<li><a href=\"login.php\">Login / Signup</a></li>";
        ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="html/books.php">Books</a></li>
        <li><a href="html/contact.php">Contact</a></li>
        <?php
          // Show logout if logged in currently
          if(isset($_SESSION['userDetails']))
            // This includes the logout and cart nav sections and its restylings.
            echo "<li><a href=\"../php/login.php\">logout</a></li>";
          else
            echo "<li><a href=\"login.php\">Login / Signup</a></li>";
        ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">
    <!-- Filter the data for the ajax call after all generes have been loaded -->
    <div class="input-field col s12">
     <select id="filter_option">
       <option value="" disabled selected>Filter by genere</option>
       <option value="all">All</option>
       <option value="comedy">Comedy</option>
       <option value="educational">Educational</option>
       <option value="horror">Horror</option>
       <option value="romance">Romance</option>
     </select>

     <button type="submit" value="Submit" id="filter-btn"
     class="button waves-effect waves-dark">Filter</button>
   </div>

    <br><br><br><br>
    <div class="row">
      <div id="all_books">

      </div>
    </div>

  <!-- The Modal Pop-Up - More about book -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="book_details">

    </div>
  </div>
</div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/account.js"></script>
  <script src="../js/books.js"></script>

  </body>
</html>