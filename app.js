$(document).ready(function () {


    $('#submit').on('click', function (e) {
        //e.href = "newUser.html";



        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax("loginUser.php", {
            method: "POST",
            data: {
                email: email,
                password: password

            }
        }).done(function (response) {

            if (response == false) {
                $('#result').html("<h2> ERROR </h2>" + "<br>" + "The email address or password is incorrect");
            } else {
                $(location).attr('href',"issuesAll.html");
            }

        }).fail(function () {
            alert("An error occured.");

        });
    });


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
            alert("successfully sent to the database to be added")
        }).fail(function () {
            // alert("An error occured.");
        });
    });


    let srchall = $('#all');


    srchall.on('click', function (e) {
        e.preventDefault();


        $.ajax("createUser.php", {
            method: "POST",
            data: {
                filter_by: "ALL"


            }
        }).done(function (response) {
            alert("successfully sort by all")
        }).fail(function () {
            alert("An error occured.");
        });
    });

    let srchopen = $('#open');


    srchopen.on('click', function (e) {
        e.preventDefault();


        $.ajax("createUser.php", {
            method: "POST",
            data: {
                filter_by: "OPEN"


            }
        }).done(function (response) {
            alert("successfully sort by open")
        }).fail(function () {
            alert("An error occured.");
        });
    });

    let srchtick = $('#tickets');


    srchtick.on('click', function (e) {
        e.preventDefault();


        $.ajax("createUser.php", {
            method: "POST",
            data: {
                filter_by: "MY TICKETS"
            }
        }).done(function (response) {
            alert("successfully sort by tickets")
        }).fail(function () {
            alert("An error occured.");
        });
    });




    let createissue = $('#submit_createissue');


    createissue.on('click', function (e) {
        e.preventDefault();
        let title = $("#issue-title").val();
        let description = $("#issue-description").val();
        let assign = $("#assignto").val();
        let priority = $("#priority").val();
        let type = $("#type").val();

        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        //var dateTime = date + ' ' + time;

        $.ajax("createIssue.php", {
            method: "POST",
            data: {
                title: title,
                description: description,
                assign: assign,
                type: type,
                priority: priority
                //createdate: dateTime,
                //updatedate: dateTime

            }
        }).done(function (response) {
            alert("successfully sent to the database to be added")
        }).fail(function () {
            alert("An error occured.");
        });
    });



    let srchtickclosed = $('#tickets_closed');


    srchtickclosed.on('click', function (e) {
        e.preventDefault();


        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date + ' ' + time;
        $.ajax("createUser.php", {
            method: "POST",
            data: {
                updatedate: dateTime
            }
        }).done(function (response) {
            alert("successfully closed the ticket");
            $('#result').html("<li> <ul> Updated time: " + dateTime + " </ul> </li>");
        }).fail(function () {
            alert("An error occured.");
        });
    });





    let srchtickprogress = $('#tickets_progress');


    srchtickprogress.on('click', function (e) {
        e.preventDefault();


        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date + ' ' + time;
        $.ajax("createUser.php", {
            method: "POST",
            data: {
                updatedate: dateTime
            }
        }).done(function (response) {
            alert("successfull: ticket in progress");
            $('#result').html("<li> <ul> Updated time: " + dateTime + " </ul> </li>");
        }).fail(function () {
            alert("An error occured.");
        });
    });

    let logout = $('#logout');
    logout.on('click', function(e) {
        e.preventDefault();

        $.ajax("logout.php", 
        {
            method: "POST",
            data: {}
        }).done(function () {
            alert("Successfully logged out");
        }).fail(function() {
            alert("An error occured.");
        });
    });



});