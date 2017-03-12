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
            header("Location: http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/profile.php");
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
            header("Location: http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/profile.php");
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

  <br><br><br><br><br><br>
  <div class="container" id="login_signup">
    <span class="center">
    <span>
    <button type="submit" value="Submit" id="login-form-btn"
    class="button waves-effect waves-dark">Login</button>
    </span>

    <span>
    <button type="submit" value="Submit" id="signup-form-btn"
    class="button waves-effect waves-dark">Sign Up</button>
    </span>
    </span>

    <!-- Login  -->
     <form class="col s12 form" id="login_form" action="#" method="post">
       <div class="row">
         <div class="input-field col s12">
           <i class="material-icons prefix">account_circle</i>
           <input id="login_email" type="text" class="validate" name="email">
           <label for="icon_prefix">Username</label>
         </div>
         <div class="input-field col s12">
           <i class="material-icons prefix">vpn_key</i>
           <input id="login_password" type="password" class="validate" name="password">
           <label for="icon_telephone">Password</label>
         </div>
       </div>
       <button type="submit" value="Submit" id="login-btn"
       class="button waves-effect waves-dark">Login</button>
     </form>


    <!-- Signup  -->
    <form class="col s12 form" id="signup_form" action="register.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="signup_email" type="text" class="validate" name="email">
          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">vpn_key</i>
          <input id="signup_password" type="password" class="validate" name="password">
          <label for="icon_telephone">Password</label>
        </div>
      </div>
      <button type="submit" value="Submit" id="signup-btn"
      class="button waves-effect waves-dark">Sign Up</button>
    </form>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/account.js"></script>
  </body>
</html>
