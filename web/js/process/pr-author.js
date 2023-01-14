$(document).ready(function(){

    //fetch document load

    refreshRecentAuthorTable("#recentAuthorTableList", 5, "DESC");
    refreshRecentAuthorTable("#authorList", 20, "ASC");    
    

    // redirect to research list to search research for selected author
    

    //add query for author
    $("#add-author-form-button").on("click", function(){
        const firstname = $(".input-firstname").val() ;
        const middlename = $(".input-middlename").val();
        const lastname = $(".input-lastname").val();
        const phonenumber = $(".input-phonenumber").val();
        const email = $(".input-email").val();
        const address = $(".input-address").val();
        const college = $(".input-college").val();
        
        
        target = $(this).closest(".form-validation");
        if (isValidForm(target)){

            if (confirm("Are you sure to add this author?")){
                $.post("process/pr-author.php",{
                    process : 'add',
                    firstName : firstname,
                    middleName : middlename,
                    lastName : lastname,
                    phoneNumber : phonenumber,
                    eMail : email,
                    Address : address,
                    College : college,
                }, function(data, status){
     
                    if (status == "success"){

                        $(this).removeAttr("disabled");
                        $(".reset-form-button").click();
                        

                        setTimeout(function(){
                            refreshRecentAuthorTable("#recentAuthorTableList", 5, "DESC");

                            setTimeout(function(){
                                animateDataChanged($("tbody").children("tr").eq(0).attr("data-id"));
                            },500)
                            

                        },100)
            
                    }else{
     
                    }
                })
            }
        }
    })

    //edit query for author
    $("#edit-author-form-button").on("click", function(){
        loadingBarLoads();

        const id = $("#pop-up-edit-author").attr("data-author-id");
        const firstname = $("#input-edit-firstname").val() ;
        const middlename = $("#input-edit-middlename").val();
        const lastname = $("#input-edit-lastname").val();
        const phonenumber = $("#edit-contact-number").val();
        const email = $("#input-edit-email").val();
        const address = $("#input-edit-address").val();
        const college = $("#input-edit-college").val();

        target = $(this).closest(".form-validation");        
        if (isValidForm(target)){

            if (confirm("Are you sure to edit this author?")){
                $.post("process/pr-author.php",{
                    process : 'edit',
                    id : id,
                    firstName : firstname,
                    middleName : middlename,
                    lastName : lastname,
                    phoneNumber : phonenumber,
                    eMail : email,
                    Address : address,
                    College : college,
                }, function(data, status){
     
                    if (status == "success"){
                        $(".reset-form-button").click();
                        $(".close-pop-up").click();

                        setTimeout(function(){

                            // refreshRecentAuthorTable("#recentAuthorTableList", 5, "DESC");
                            // refreshRecentAuthorTable("#authorList", 20, "ASC"); 

                            //insert / update data from table.
                            const indexRow =   $(`tbody tr[data-id=${id}]`).index() + 1;

                            $(`tbody tr[data-id=${id}]`).html(data);
                            $(`tbody tr[data-id=${id}]`).children().eq(0).html(indexRow);

                            animateDataChanged(id);   

                            // alert("Author has been edited!")
                           
                        },500)
                        
                        $(this).removeAttr("disabled");
            
                    }else{
     
                    }

                    loadingBarFinished();
                })
            }
        }
    })


});

//query refresh author table
function refreshRecentAuthorTable(tbodyTarget, limitTable, order){
    $.post("process/pr-author.php",{
           process : 'refreshRecentAuthorTable',
           limit: limitTable,
           order: order
    }, function(data, status){
        $(tbodyTarget).html(data);
    
    })
}