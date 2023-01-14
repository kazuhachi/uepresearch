$(document).ready(function(){
    $("#logout-button").on("click", function(){
        $.post("process/pr-login.php",{
            process  : 'logout'
        }, function(data, status){
            window.location = "/login";
        })
    });
})
