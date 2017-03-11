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
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Rent Me</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="php/books.php">Books</a></li>
        <li><a href="php/contact.php">Contact</a></li>
        <?php
          // Show logout if logged in currently
          if(isset($_SESSION['userDetails']))
            // This includes the logout and cart nav sections and its restylings.
            echo "<li><a href=\"php/login.php\">logout</a></li>";
          else
            echo "<li><a href=\"php/login_signup.php\">Login / Signup</a></li>";
        ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="php/books.php">Books</a></li>
        <li><a href="html/contact.php">Contact</a></li>
        <?php
          // Show logout if logged in currently
          if(isset($_SESSION['userDetails']))
            // This includes the logout and cart nav sections and its restylings.
            echo "<li><a href=\"../php/login.php\">logout</a></li>";
          else
            echo "<li><a href=\"php/login_signup.php\">Login / Signup</a></li>";
        ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
      </div>
    </div>
    <div class="parallax"><img src="img/book_cover.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <h1 class="header center #212121 black-text darken-4">Rent Me</h1>
      <div class="row center">
        <h5 class="header col s12 light">A free service to rent books!</h5>
      </div>

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m6 l6">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">forward_5</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">Rent up to 5 books at one time and return them to allow for more rentals.</p>
          </div>
        </div>

        <div class="col s12 m6 l6">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Genere Based</h5>

            <p class="light">Categorized by genre for ease of finding the right books for your reading.</p>
          </div>
        </div>
      </div>
    </div>

    <br><br>

    <div class="section">
      <div class="row">
        <div class="col s12">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">power_settings_new</i></h2>
            <h5 class="center">What to do?</h5>

            <p class="light">Create an account, add your information, and start renting books right away!
              Ship the book back whenever you are ready to rent new books.
              Just make sure to keep them in the same shape you found them</p>
          </div>
        </div>
    </div>
    <div class="row center">
      <a href="html/login.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
    </div>
    <br><br>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
