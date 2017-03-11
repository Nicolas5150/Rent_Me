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
    alert(data);
    alert(Object.keys(mydata).length);
    //alert(mydata[0].image);
    // Take each book from the json file and create a new version in DOM
    for (var i = 0; i<Object.keys(mydata).length; i++) {
      var nextBook = "<div class=\"card col s12 m6 l4\">"+
        "<div class=\"card-image waves-effect waves-block waves-light\">"+
          "<img class=\"activator\" src=\""+mydata[i].image+"\">"+
        "</div>"+
        "<div class=\"card-content\">"+
          "<span class=\"card-title activator grey-text text-darken-4\">"+mydata[i].title+"<i class=\"material-icons right\">more_vert</i></span>"+
          "<p><a href=\"#\" onclick=\"modal("+mydata[i].title+");\">This is a link</a></p>"+
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
        alert(data);
        alert(Object.keys(mydata).length);
        alert(mydata[0].image);
        // Take each book from the json file and create a new version in DOM
        for (var i = 0; i<Object.keys(mydata).length; i++) {
          var nextBook = "<div class=\"card col s12 m6 l4\">"+
            "<div class=\"card-image waves-effect waves-block waves-light\">"+
              "<img class=\"activator\" src=\""+mydata[i].image+"\">"+
            "</div>"+
            "<div class=\"card-content\">"+
              "<span class=\"card-title activator grey-text text-darken-4\">"+mydata[i].title+"<i class=\"material-icons right\">more_vert</i></span>"+
              "<p><a href=\"#\" onclick=\"modal("+mydata[i].title+");\">This is a link</a></p>"+
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

function modal(title) {
  event.preventDefault();
  alert("pop up here");
}

})(jQuery);
