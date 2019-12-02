window.onload = function(){
    var xhr = new this.XMLHttpRequest();
    var container = document.getElementById('container')
    xhr.open('Get','dashboard.php',true);
    xhr.onload = function(){
        if(this.status == 200){
            // container.innerHTML = this.response;
            console.log(this.response)
        }
    }
    xhr.send()
}