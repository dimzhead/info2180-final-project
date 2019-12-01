$(document).ready(function(){
    $.get('dashboard.php',{all:'all'},function(data){
        $('#result').html(data);
    })
});