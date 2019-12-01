$(document).ready(function() {

    $.ajax("issue.Users.php", {
        method: "POST", 
        data: {}
    }).done(function(response) {
        $('#users').html(response);
    }).fail(function() {
        alert("Could not display users. createIssue.js");
    });
});