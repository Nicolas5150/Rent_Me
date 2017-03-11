(function($){
// Trying to grab data from the json
// https://openenergymonitor.org/forum-archive/node/107.html
// http://stackoverflow.com/questions/19706046/how-to-read-an-external-local-json-file-in-javascript
$.ajax({
  type: 'POST',
  url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/getBooks.php',
  data: ({genere: 'none'}),
  success: function (data) {
    // Convert the returned data into a JSON type data for which js can manage.
    //alert(data);
    var mydata = JSON.parse(data);
    // alert(data);
    // alert(Object.keys(mydata).length);
    //alert(mydata[0].image);
    // Take each book from the json file and create a new version in DOM
    for (var i = 0; i<Object.keys(mydata).length; i++) {
      var nextBook = "<div class=\"card col s12 m6 l4\">"+
        "<div class=\"card-image waves-effect waves-block waves-light\">"+
          "<img class=\"activator\" src=\""+mydata[i].image+"\">"+
        "</div>"+
        "<div class=\"card-content\">"+
          "<span class=\"card-title activator grey-text text-darken-4\">"+mydata[i].title+"<i class=\"material-icons right\">more_vert</i></span>"+
          "<a href=\"#\" class=\"books\" id=\""+mydata[i].title+"\">This is a link</a>"+
        "</div>"+
        "<div class=\"card-reveal\">"+
          "<span class=\"card-title grey-text text-darken-4\">Description<i class=\"material-icons right\">close</i></span>"+
          "<p>"+mydata[i].description+"</p>"+
        "</div>"+
      "</div>";

      $('#all_books').append(nextBook);
    }
  }
})

//  Submit new user
$( "#filter-btn" ).click(function() {
  event.preventDefault();

  $("#all_books").empty();

  // Check to see if any filter option was picked if so call ajax to select only it.
  var filter_option = document.getElementById('filter_option').value;
  if (filter_option) {
    $.ajax({
      type: 'POST',
      url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/getBooks.php',
      data: ({genere: filter_option}),
      success: function (data) {
        // Convert the returned data into a JSON type data for which js can manage.
        var mydata = JSON.parse(data);
        // alert(data);
        // alert(Object.keys(mydata).length);
        // alert(mydata[0].image);
        // Take each book from the json file and create a new version in DOM
        for (var i = 0; i<Object.keys(mydata).length; i++) {
          var nextBook = "<div class=\"card col s12 m6 l4\">"+
            "<div class=\"card-image waves-effect waves-block waves-light\">"+
              "<img class=\"activator\" src=\""+mydata[i].image+"\">"+
            "</div>"+
            "<div class=\"card-content\">"+
              "<span class=\"card-title activator grey-text text-darken-4\">"+mydata[i].title+"<i class=\"material-icons right\">more_vert</i></span>"+
              "<a href=\"#\" class=\"books\" id=\""+mydata[i].title+"\">This is a link</a>"+
            "</div>"+
            "<div class=\"card-reveal\">"+
              "<span class=\"card-title grey-text text-darken-4\">Description<i class=\"material-icons right\">close</i></span>"+
              "<p>"+mydata[i].description+"</p>"+
            "</div>"+
          "</div>";

          $('#all_books').append(nextBook);
        }
      }
    })
  }
});

// Get the anchor tag that was clicked
$('.books').click(function(){
  event.preventDefault();
   var id = this.id;
   // Pass to the modal the id of the anchor tag, which will go fetch up to date
   // data about this book with an ajax call
   modalEvent(id);
});

// Modal will be shown to have user see all about the book at hand
// and rent if avilable.
function modalEvent(id) {
  // Grab the data for the modal.
  $.ajax({
    type: 'POST',
    url: 'http://sulley.cah.ucf.edu/~ni927795/Rent_Me/php/getBooks.php',
    data: ({title: id}),
    success: function (data) {
      alert(data);
      // Convert the returned data into a JSON type data for which js can manage.
      var mydata = JSON.parse(data);
      // alert(data);
      // alert(Object.keys(mydata).length);
      // alert(mydata[0].image);
      // Take each book from the json file and create a new version in DOM
      for (var i = 0; i<Object.keys(mydata).length; i++) {
        var nextBook = "<div class=\"card col s12 m6 l4\">"+
          "<div class=\"card-image waves-effect waves-block waves-light\">"+
            "<img class=\"activator\" src=\""+mydata[i].image+"\">"+
          "</div>"+
          "<div class=\"card-content\">"+
            "<span class=\"card-title activator grey-text text-darken-4\">"+mydata[i].title+"<i class=\"material-icons right\">more_vert</i></span>"+
            "<a href=\"#\" class=\"books\" id=\""+mydata[i].title+"\">This is a link</a>"+
          "</div>"+
          "<div class=\"card-reveal\">"+
            "<span class=\"card-title grey-text text-darken-4\">Description<i class=\"material-icons right\">close</i></span>"+
            "<p>"+mydata[i].description+"</p>"+
          "</div>"+
        "</div>";

        $('#book_details').append(nextBook);
      }
    }
  })

  // Get the modal
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


})(jQuery);
