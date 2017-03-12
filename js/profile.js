(function($){
  $(document).ajaxStart(function() {
    $("#loading").show();
  });

  $(document).ajaxStop(function() {
    $("#loading").hide();
  });

  allBooks();
  function allBooks() {
    $.ajax({
      type: 'POST',
      url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/return_books.php',
      success: function (data) {
        // Convert the returned data into a JSON type data for which js can manage.
        // When no books are being rented by the user tell them so
        if (data == "[]") {
          document.getElementById("return-btn").style.display = 'none';
          var empty = "<div class=\"center\"><b>You currently have no books being rented<b><div>";
          $('#rented_book').append(empty);
        }

        var mydata = JSON.parse(data);
        // Take each book from the json file and create a new version in DOM
        for (var i = 0; i<Object.keys(mydata).length; i++) {
          var nextBook = "<div class=\"card col s12 m12 l12\">"+
            "<div class=\"card-image waves-effect waves-block waves-light\">"+
              "<img class=\"activator\" src=\""+mydata[i].image+"\">"+
            "</div>"+
            "<div class=\"card-content\">"+
              "<span class=\"card-title activator grey-text text-darken-4\">"+mydata[i].title+"<i class=\"material-icons right\">more_vert</i></span>"+
            "</div>"+
            "<div class=\"card-reveal\">"+
              "<span class=\"card-title grey-text text-darken-4\">Description<i class=\"material-icons right\">close</i></span>"+
              "<p>"+mydata[i].description+"</p>"+
            "</div>"+
          "</div>";

          $('#rented_book').append(nextBook);
        }
      }
    })
  }

  $(document).on("click", "#return-btn", function(){
    event.preventDefault();
    $("#rented_all").empty();

    $.ajax({
      type: 'POST',
      url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/return_books.php',
      data: ({count: 1}),
      success: function (data) {
        var mydata = JSON.parse(data);
        
        // Now present the modal with the data appended from above.
        var modal = document.getElementById('myModal');
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        modal.style.display = "block";
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
      }
    })
  });



})(jQuery);
