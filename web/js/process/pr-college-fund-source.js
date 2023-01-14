$(document).ready(function(){

    refreshCollegeTable();
    refreshFundSourceTable();

    $("#add-college-button").on("click", function(){

        target = $(this).closest(".form-validation");  
        if (isValidForm(target)){

            const name = $(".input-add-college-name").val();

            $.post("process/pr-college-fund-source.php",{
                process : 'add-college',
                collegeName : name

            }, function(data, status){
                $("#collegeList").html(data);
            })

            $(".close-pop-up").click();
        }
    })

    $("#edit-college-button").on("click", function(){
        target = $(this).closest(".form-validation");  
        if (isValidForm(target)){

            const name = $(".input-edit-college-name").val();
            const id = $("#pop-up-edit-college").attr("data-college-id");
           

            $.post("process/pr-college-fund-source.php",{
                id: id,
                process : 'edit-college',
                collegeName : name

            }, function(data, status){

                $(`tbody tr[data-id=${id}]`).html(data);

                animateDataChanged(id);
            })

            $(".close-pop-up").click();
        }
    })


   
    $("#add-fund-source-button").on("click", function(){

        target = $(this).closest(".form-validation");  
        if (isValidForm(target)){

            const name = $(".input-add-fund-source-name").val();

            $.post("process/pr-college-fund-source.php",{
                process : 'add-fund-source',
                fundSourceName : name

            }, function(data, status){

                $("#fundsourceList").html(data);

                
                if ($("#fund-source").length){
                    getFundList();
                    const index = $("#fund-source option:last").prev().index();
                    setTimeout(function(){
                        $("#fund-source").prop("selectedIndex", index + 1);
                    },100);
                    
                }
            })

            $(".close-pop-up", target).click();
        }
    })

    // edit-fund-source-button
    $("#edit-fund-source-button").on("click", function(){
        target = $(this).closest(".form-validation");  
        if (isValidForm(target)){

            const name = $("#input-edit-fund-source-name").val();
            const id = $("#pop-up-edit-fund-source").attr("data-fund-source-id");
           

            $.post("process/pr-college-fund-source.php",{
                id: id,
                process : 'edit-fund-source',
                fundSourceName : name

            }, function(data, status){

                $(`tbody tr[data-id=${id}]`).html(data);
                animateDataChanged(id);

            })

            $(".close-pop-up").click();
        }
    })


    // refresh-college

    function refreshCollegeTable(){
        $.post("process/pr-college-fund-source.php",{
            process : 'refresh-college'

        }, function(data, status){
            $("#collegeList").html(data);
        })
    
    }

    function refreshFundSourceTable(){

        $.post("process/pr-college-fund-source.php",{
            process : 'refresh-fund-source'


        }, function(data, status){
            $("#fundsourceList").html(data);
        })
    
    }

})