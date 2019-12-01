$(document).ready(function(){

    $.ajax("dashboard.php", 
    {
        method: "POST",
        data: {}

    }).done(function(response) {
        $('#result').html(response);
    }).fail(function(){
        alert("An error occurred in dashboard.js");
    });
});