let queriedInput;
let clickedPageNumber;
let showAmount;
let numOfPage;


$(document).ready(function(){
    
    showAmount = $("#data-num-item").val();

    $("#submit-search-button").on("click", function(){
        clickedPageNumber = null;
        searchAuthor();
    })  

    $(".num-nav").on("click", ".num-nav-item", function(){
        if (!$(this).hasClass("selected")){
            let num = parseInt($(this).html());
            clickedPageNumber = num;
            searchAuthor();

            $(".num-nav").find(".num-nav-item").each(function(){
                if ($(this).html() != num){
                    $(this).removeClass("selected");
                }else{
                    $(this).addClass("selected");
                }
            })
            
        }
    })

    $(".prev-nav").on("click", function(){
        $(".num-nav").find(".num-nav-item.selected").prev().click();
    })

    $(".next-nav").on("click", function(){
        $(".num-nav").find(".num-nav-item.selected").next().click();
    })

    $(".data-num-item").on("change", function(){
        showAmount = $(this).val();
        clickedPageNumber = 1;
        searchAuthor();
    })   

    $("table").on("click", "#show-author-research", function(){
        let authorId = $(this).closest("tr").attr("data-id");

        window.location = `/research-list?_a=${parseInt(authorId)}`;
    }); 

})

function searchAuthor(){

    loadingBarLoads();

    target = $(this).closest(".form-validation");
    
    let authorName =  $(".input-search-author-name").val();
    let phoneNumber = $(".input-search-phone-number").val();
    let email = $(".input-search-email").val();
    let address = $(".input-search-adress").val();
    let college = $(".input-search-college").val();

    if (clickedPageNumber == null){
        queriedInput = {
            authorName  : authorName,
            phoneNumber : phoneNumber,
            email       : email,
            address     : address,
            college     : college
        }
    }else{
        authorName  = queriedInput.authorName;
        phoneNumber = queriedInput.phoneNumber;
        email       = queriedInput.email;
        address     = queriedInput.address;
        college     = queriedInput.college;
    }

    console.log(authorName)

    console.log(queriedInput);
    console.log(clickedPageNumber);
    
    console.log(showAmount);
    console.log(authorName);
    console.log(phoneNumber);
    console.log(email);
    console.log(address);
    console.log(college);


    $.post("process/pr-author.php",{
        process : 'search',
        clickedPageNumber: clickedPageNumber,
        showAmount: showAmount,
        authorName : authorName,
        phoneNumber : phoneNumber,
        email : email,
        address : address,
        college : college,
    }, function(data, status){

        if (status == "success"){
            console.log(data);
            if (data != "no data"){
                try {
                    data = JSON.parse(data);

                    console.log(data);

                    let counter = 1;

                    //class='pop-up-button'  data-pop-up-target-id='pop-up-edit-author'


                    $("#authorList").html('');
                    data.details.forEach(function(detail){
                        $("#authorList").append(`<tr data-id='${detail.id}'>
                            <th scope='row'>${counter}</th>
                            <td class="tool-td">
                                <button class="tool-icon pop-up-button" id="edit-author" tooltip-title="edit" data-pop-up-target-id='pop-up-edit-author'>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="tool-icon" id="show-author-research" tooltip-title="View author's research">
                                    <i class="fas  fa-book icos"></i>
                                </button>
                            </td>
                            <td><span class='firstname'>${detail.firstName}</span> <span class='middlename'>${detail.middleName}</span> <span class='lastname'>${detail.lastName}</span></td>
                            <td>${detail.contactNumber}</td>
                            <td>${detail.email}</td>
                            <td>${detail.address}</td>
                            <td>${detail.college}</td>
                        </tr>`);

                        counter++;
                    });
                    let numnav = $(".num-nav");

                    numOfPage = Math.ceil(data.amountRow/ showAmount);



                    let numPageToShow = numOfPage;
                    let cntr = 1;

                    
                    if (numOfPage > 10)
                        numPageToShow = 10;

                    if ((clickedPageNumber == 1) || (clickedPageNumber == null)){
                        $(".prev-nav").addClass("selected");
                    }else{
                        $(".prev-nav").removeClass("selected");
                    }

                    if ((clickedPageNumber == numOfPage)){
                        $(".next-nav").addClass("selected");
                    }else{
                        $(".next-nav").removeClass("selected");
                    }

                    if (clickedPageNumber != null){
                        {
                            
                            if (clickedPageNumber + 4 > 10) {
                                if (clickedPageNumber + 4 <= numOfPage){
                                    cntr = clickedPageNumber - 5;
                                    
                                }else{
                                    x = numOfPage - 4 - clickedPageNumber;
                                    cntr = clickedPageNumber - 5 + x;
                                }
                                numPageToShow = cntr + 9
                            }
                        }
                    }

                    numnav.html('');

                    for(i = cntr; i <= numPageToShow; i++){
                        let pageNum = clickedPageNumber;
                        if (clickedPageNumber == null)
                            pageNum = 1;


                        if (i == pageNum)
                            numnav.append(`<div class="num-nav-item selected"> ${i} </div>`);
                        else
                            numnav.append(`<div class="num-nav-item"> ${i} </div>`)

                    }

                    if (clickedPageNumber != null){
                        // set number of each row
                        let trNumber;

                        if (clickedPageNumber != 1)
                            trNumber = (clickedPageNumber *  (showAmount)) - (showAmount - 1);
                        else
                            trNumber = 1;
                        
                        $("#authorList").find("tr").each(function(){
                            $(this).children().eq(0).html(`${trNumber}`);
                            trNumber++;
                        })
                    }  




                    $(this).removeAttr("disabled");

                }catch(err){

                    console.log(`ERROR PARSING: ${err} \n data: ${data}` );
                }

            }else{
                $("#authorList").html('').append(`
                    <tr><td colspan="6" style="text-align:center">No result</td></tr>`);

                $(".num-nav").html('');
                $(".next-nav").addClass("selected");
            }


            
        }else{

        }

        loadingBarFinished();
    })
    
}