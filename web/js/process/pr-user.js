$(document).ready(function(){

    $("table").on("click", "#edit-user-pass", function(e){
        e.stopPropagation();
        new PopUp($(this)).show(300);

        const id = $(this).closest("tr").attr("data-id");
        // pop-up-user-edit-password
        $("#pop-up-user-edit-password .pop-container").attr("data-id", id);
    })

    $("#edit-userpassword-button").on("click", function(){
        const target = $(this).closest(".form-validation");
        if (isValidForm(target)){
            if ($(".input-edit-user-password").val() != $(".input-edit-user-confirmpassword").val()){
                $(".input-edit-user-password, .input-edit-user-confirmpassword").css({
                    "border-color": "red"
                }).siblings(".error-msg").show().html("passwords mismatched!");
            }else{
                const id = $(this).closest(".pop-container").attr("data-id");
                const password = $(".input-edit-user-password").val();

                loadingBarLoads();
                $.post("process/pr-user.php",{
                    process : 'change-user-pass',
                    id : id,
                    password : password
                }, function(data, status){
                    if (data != "Error changing password"){

                    }else{
                        alert(data);
                    }
                    loadingBarFinished();    
                })

                
            }
        }
    })

    $("#add-user-button").on("click", function(){
        const target = $(this).closest(".form-validation");
        if (isValidForm(target)){
            if ($(".input-password").val() != $(".input-confirmpassword").val()){
                $(".input-password, .input-confirmpassword").css({
                    "border-color": "red"
                }).siblings(".error-msg").show().html("passwords mismatched!");
            }else{
           
                const name = $(".input-name").val();
                const username = $(".input-username").val();
                const password = $(".input-password").val();
                const role = $(".input-user-role").val();
                $.post("process/pr-user.php",{
                    process : 'add-user',
                    name : name,
                    username : username,
                    password : password,
                    role : role
                }, function(data, status){
                    if (data != "username is taken"){
                        if (data != "error"){
                            refreshTableUser();
                        }
                        else{
                            console.log("errror" + data);
                        }
                    }else{
                        alert(data);
                    }
                })
            }
        }
    })


    $("#edit-user-button").on("click", function(){
        const target = $(this).closest(".form-validation");
        if (isValidForm(target)){
            if ($(".input-edit-user-password").val() != $(".input-edit-user-confirmpassword").val()){
                $(".input-edit-user-password, .input-edit-user-confirmpassword").css({
                    "border-color": "red"
                }).siblings(".error-msg").show().html("passwords mismatched!");
            }else{
                const id = $(this).closest(".pop-container").attr("data-id");
                const name = $(".input-edit-user-name").val();
                const username = $(".input-edit-user-username").val();
                const role = $(".input-edit-user-role").val();

                loadingBarLoads();
                $.post("process/pr-user.php",{
                    process : 'edit-user',
                    id : id,
                    name : name,
                    username : username,
                    role : role
                }, function(data, status){
                    if (data != "username is taken"){
                        if (data != "error"){
                            refreshTableUser();
                            console.log(data + "success");
                        }else{
                            console.log(`Error: ${data}`);
                        }

                        
                    }else{  
                        alert("Update failed! Username is taken!");
                    }
                    loadingBarFinished();
                })
            }

        }
    })


    $("body").on("click",".pop-up-button[data-pop-up-target-id='pop-up-user']", function(){
        const id = $(this).attr("data-id");
        const name = $(this).children().eq(2).html();
        const username = $(this).children().eq(4).html();
        const role = $(this).children().eq(3).html();

        console.log(name)

        $("#pop-up-user .pop-container").attr("data-id", id );
        $(".input-edit-user-name").val(name);
        $(".input-edit-user-username").val(username);
        $(".input-edit-user-role").children().each(function(){
            if ($(this).html() == role){
                $(this).attr("selected", "selected");
                $(this).prop('selected', true);
            }else{
                $(this).removeAttr("selected");
            }
        })
    })
    
    refreshTableUser();




    function refreshTableUser(){
        loadingBarLoads();
        $.post("process/pr-user.php",{
            process : 'get-user',
        }, function(data, status){
            const target = $("#user-tbody");
            target.html('');

            if (data != "no data"){
                try{
                    data = JSON.parse(data);
                    
                    let counter = 1;
                    data.forEach(function(user){
                        console.log(user.ip);
                        let labelMe = '';
                        if (user.name == $(".user-label").html()){
                            labelMe = `<span style="color: white; font-size: 12px; background-color: #e9a934; padding: 0px 4px; border-radius: 3px; margin-left: 5px;">me</span>`;
                        }console.log(`${$(".user-label").html()} === ${user.name}`);

                        target.append(`
                            <tr class="pop-up-button" data-pop-up-target-id="pop-up-user" data-id="${user.id}">
                                <th scope="row">${counter} ${labelMe}</th>
                                <td class="tool-td">
                                    <button class="tool-icon pop-up-button" id="edit-user-pass" tooltip-title="change password" data-pop-up-target-id="pop-up-user-edit-password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </td>
                                <td>${user.name}</td>
                                <td>${user.role}</td>
                                <td>${user.username}</td>
                                <td>${user.ip}</td>
                                <td>${user.device}</td>
                                <td>${user.lastsession}</td>
                            </tr>
                        `);

                        counter++;
                    })

                }catch(err){
                    console.log("ERROR: " + err);
                }
            }else{
                target.html(`<tr><td colspan="7" style="text-align:center">No data</td></tr>`);
            }

            loadingBarFinished();
        })
    }
})