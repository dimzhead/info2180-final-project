window.onload = function(){
    var submit = document.getElementById("submit_createuser");

    submit.addEventListener('click',function(e){
        e.preventDefault();
        var fname = document.getElementById('firstname').value
        var lname = document.getElementById('lastname').value
        var email = document.getElementById('email').value
        var password = document.getElementById('password').value
        var user = {}

        user.firstname = fname;
        user.lastname = lname;
        user.email = email;
        user.password = password;

        var xhr = new XMLHttpRequest();
        xhr.open('POST','newUser.php',true)
        xhr.onload = function(){
            if(this.status == 200){
                console.log(this.response)
            }
        }
        xhr.send(JSON.stringify(user)); 

    })
}