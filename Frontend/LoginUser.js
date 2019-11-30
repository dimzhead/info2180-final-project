$(document).ready(function () {
    

    $('#submit').on('click', function(e){
        e.preventDefault();

let email= $("#email").val();
let password= $("#password").val();

        $.ajax("Backend/loginUser.php", {
            method: "POST",
            data: {
                email:email,
                password:password

            }        
        }).done(function(response){
            if (response==false){
                $('#result').html("<h2> ERROR </h2>" + "<br>" + "The email address or password is incorrect"); 
            }
        
        }).fail(function() {
            alert("An error occured.");
        });
    });
    
});