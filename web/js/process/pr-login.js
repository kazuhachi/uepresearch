
$(document).ready(function(){

    $("#login-username-input, #login-password-input").on("keypress", function(e){
        if (e.which == "13"){
            $("#login-button").click();
        }
    })


    $("#login-button").on("click", function(){
        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
           
            let username = $("#login-username-input").val();
            let password = $("#login-password-input").val();

            $.post("process/pr-login.php",{
                process  : 'login',
                username : username,
                password : password
            }, function(data, status){
                console.log(data);

                if (data == "sucess log in"){
                    showMessage("sucess", `<i class="fas fa-check-circle"></i> Log in sucessfully!`);

                    setTimeout(function(){
                        window.location.href = '/dashboard';
                    },400)
                }
                else
                    showMessage("error", `<i class="fas fa-exclamation-triangle"> </i> Error! Username or password is incorrect!`);
            });
            
        }else{
            showMessage("error", `<i class="fas fa-exclamation-triangle"> </i> Please fill all fields!`);
        }
    })


    $(".show-password-container").on("click", function(){
        let icon = $(this).find("i");
        if (icon.attr('class') == "fas fa-eye"){
            icon.attr("class", "fas fa-eye-slash");
            $("#login-password-input").attr("type", "text");
        }else{
            icon.attr("class", "fas fa-eye");
            $("#login-password-input").attr("type", "password");
        }
    })



    function showMessage(type, message){
        if (type == undefined) return;

        let bgColor;

        if (type == "sucess"){
            bgColor = "#73e890"
        }

        if (type == "error"){
            bgColor = "#fa8a81";
        }

        $(".slide-container").css({
            "background-color" : bgColor,
            top: 5,
            transition : "top 300ms"
        }).find(".message").html(message);

        setTimeout(function(){
            $(".slide-container").css({
                top : '-100'
            })
        }, 3000)
    }
})


