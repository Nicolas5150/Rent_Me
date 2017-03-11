<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Message Chat</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/jquery-ui.min.css" type="text/css" rel="stylesheet"/>
  <link href="css/materialize.css" type="text/css" rel="stylesheet"/>
  <link href="css/style.css" type="text/css" rel="stylesheet"/>
</head>

<body>
  <nav class="" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.html" class="brand-logo">Message Chat</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.html">Home</a></li>
        <li><a href="html/event.html">Try</a></li>
        <li><a href="html/contact.html">Contact</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="html/event.html">Try</a></li>
        <li><a href="html/contact.html">Contact</a></li>
      </ul>
      <a href="" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">
    <span class="center">
    <button type="submit" value="Submit" id="new-chat-btn"
    class="button waves-effect waves-dark">New Chat</button>
    </span>

    <?php
    // get the number of current chats you have
    // also check this db every 30 seconds for new messages or new chats

    

    ?>
    <div class="col s12 m7">
     <div class="card horizontal">
       <div class="card-image">
         <img src="http://lorempixel.com/100/190/nature/6">
       </div>
       <div class="card-stacked">
         <div class="card-content">
           <h6 class="header">Other users name - chat</h6>
           <p>Last line of text said</p>
         </div>
         <div class="card-action">
           <a href="#">full chartoom - timestamp </a>
         </div>
       </div>
     </div>
   </div>

   <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
        <img src="http://lorempixel.com/100/190/nature/6">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h6 class="header">Other users name - chat</h6>
          <p>Last line of text said</p>
        </div>
        <div class="card-action">
          <a href="#">full chartoom - timestamp</a>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/navbar.js"></script>
  <script src="js/account.js"></script>
  </body>
</html>
