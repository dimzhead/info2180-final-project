



$(document).ready(function () {
    let srchBtn = $('#submit_createuser');


    srchBtn.on('click', function (e) {
        e.preventDefault();
        let fname = $("#firstname").val();
        let lname = $("#lastname").val();
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax("createUser.php", {
            method: "POST",
            data: {
                firstname: fname,
                lastname: lname,
                email: email,
                password: password

            }
        }).done(function (response) {
            console.log(response);
            //alert("successfully sent to the database to be added")
        }).fail(function () {
            alert("An error occured.");
        });
    });

});