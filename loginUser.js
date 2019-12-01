$(document).ready(function () {


    $('#submit').on('click', function (e) {
        e.preventDefault();

        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax("loginUser.php", {
            method: "POST",
            data: {
                email: email,
                password: password

            }
        }).done(function (response) {
            //$('#result').html(response);
            //$(document).html(response);
            console.log(response);
            if(response === 'ok') {
                window.location = response;
            }
            //window.location = response;
            if (response == false) {
                $('#result').html("<h2> ERROR </h2>" + "<br>" + "The email address or password is incorrect");
            }

        }).fail(function () {
            alert("An error occured. loginUser.js");
        });
    });

});