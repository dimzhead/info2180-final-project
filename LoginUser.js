window.onload = function(){
    var submit = document.getElementById('submit')

    submit.addEventListener('click',function(e){
        e.preventDefault();
        var email = document.getElementById('email').value
        var password = document.getElementById('password').value;
        var user = {}
        user.email=email
        user.password=password
        var xhr = new XMLHttpRequest();
        // JSON.stringify(user)
        
        xhr.open('GET',"/backend/test.php",true)

        xhr.onload = function(){
        if(this.status == 200){
            console.log(this.response)
        }else{
            console.log(this.status)
        }
            
        }
        xhr.send(JSON.stringify(user));
    })
}