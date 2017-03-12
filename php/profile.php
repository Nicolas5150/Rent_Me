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
      <a id="logo-container" href="../index.php" class="brand-logo">Rent Me</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="books.php">Books</a></li>
        <?php
          // Show logout if logged in currently
          if(isset($_SESSION['userDetails'])) {
            echo "<li><a href=\"profile.php\">Profile</a></li>";
            echo "<li><a href=\"logout.php\">Logout</a></li>";
          }
          else
            echo "<li><a href=\"login_signup.php\">Login / Signup</a></li>";
        ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="books.php">Books</a></li>
        <?php
          // Show logout if logged in currently
          if(isset($_SESSION['userDetails'])) {
            echo "<li><a href=\"profile.php\">Profile</a></li>";
            echo "<li><a href=\"logout.php\">Logout</a></li>";
          }
          else
            echo "<li><a href=\"login_signup.php\">Login / Signup</a></li>";
        ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">
    <br><br>
    <div style="text-align:center;"><img id="loading" src="../img/ajax-loader.gif" alt="" /></div>

    <div class="row center">
      <div id="users_data">
        <span>Username: </span>
        <?php echo $_SESSION['userDetails'][0]; ?>
      </div>
    </div>

    <br>
    <div class="row" id="rented_all">
      <div id="rented_book">

      </div>
      <button type="submit" value="Submit" id="return-btn"
      class="button waves-effect waves-dark">Return</button>
    </div>
  </div>

  <!-- The Modal Pop-Up - More about book -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div id="book_details">
        <p>You have successfully returned your book. Your account may now rent another book.</p>
      </div>
    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/profile.js"></script>

  </body>
</html>
