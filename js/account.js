(function($){

  // Remove signup form show login form
  $( "#login-form-btn" ).click(function() {
    // Reveal the hidden signup after button click
    document.getElementById("login_form").style.display = "block";
    document.getElementById("signup_form").style.display = "none";
  });

  // Remove login form show signup form
  $( "#signup-form-btn" ).click(function() {
    // Reveal the hidden signup after button click
    document.getElementById("login_form").style.display = "none";
    document.getElementById("signup_form").style.display = "block";
  });

  //  Submit new user
  $( "#signup-btn" ).click(function() {
    event.preventDefault();

    // Check if the text entered has any ilegal characters.
    checkUserName();
    function checkUserName() {
      var username = document.getElementById("signup_email").value;
      ///unacceptable chars
      var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/);
      if (pattern.test(username)) {
          alert("Please only use standard alphanumerics.");
          return false;
      }

      if (document.getElementById("signup_password").value.length < 5) {
        alert("Password must be 5 characters long.")
        return false;
      }

      // Data passed the checks add name to the database if possible
      else {
        $.ajax({
          type: 'POST',
          url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/register.php',
          data: $('#signup_form').serialize(),
          success: function (data) {
            // Alert that email has been used before.
            if (data == "200") {
              alert("passed check table");
            }

            // Error occured and or email is taken.
            else {
              alert("did not pass check table");
            }
          }
        })
        return true; //good user input
      }
    }
  });

  //  Check login data
  $( "#login-btn" ).click(function() {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/login.php',
      data: $('#login_form').serialize(),
      success: function (data) {
        // Alert that email has been used before.
        if (data == "200") {
          alert("passed login");
        }

        // Error occured and or email is taken.
        else {
          alert("did not pass login");
        }
      }
    })
  });

})(jQuery);
