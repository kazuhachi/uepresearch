let clickedPageNumber;
let showAmount;  //limiting query results
let numOfPage;   // max number of page.
let queriedInput; 

$(document).ready(function(){

    showAmount = $("#data-num-item").val();
    let _cntr = 0;

    // if (history.pushState) 
    //     $("#search-reseach-button").click();
    $("#search-reseach-button").on("click", function(){
        
        clickedPageNumber = null;
        
        if (_cntr != 0){
            window.history.replaceState("", "", "/research-list");
            searchResearch();  
        }else{
            const authorId = getQueryVariable("_a");
            if (authorId)
                searchResearch(authorId);  
            else{
                searchResearch();  
            }
        }
        _cntr ++;
    })

    $(".num-nav").on("click", ".num-nav-item", function(){
        if (!$(this).hasClass("selected")){
            let num = parseInt($(this).html());
            clickedPageNumber = num;
            
            searchResearch();

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
        searchResearch();
    })   

})

function searchResearch(_authorId = null){


    let title = $("#title-search-input").val();
    
    let authorIds = [];
    if (_authorId != null)
        authorIds.push(_authorId);
    else{
        $("#author-container").find(".item").each(function(){
            authorIds.push($(this).attr("data-id"));
        })
    }

    let keywordIds = [];
    $("#keyword-container").find(".item").each(function(){
        keywordIds.push($(this).attr("data-id"));
    })

    let status = $(".input-status-search").val();
    let dateStated = $(".input-date-started-search").val();
    let dateFinished = $(".input-date-finished-search").val();
    let campus = $(".input-campus-search").val();
    let isPresented = $(".input-presented-search").val();
    let isFunded = $(".input-funded-search").val();
    let isPatented = $(".input-patented-search").val();

    if (clickedPageNumber == null){
        queriedInput = {
            title : title,
            authorIds : authorIds,
            keywordIds : keywordIds,
            status : status,
            dateStated : dateStated,
            dateFinished : dateFinished,
            campus : campus,
            isPresented : isPresented,
            isFunded : isFunded,
            isPatented : isPatented
        }

    }else{
        title = queriedInput.title,
        authorIds = queriedInput.authorIds,
        keywordIds = queriedInput.keywordIds,
        status = queriedInput.status,
        dateStated = queriedInput.dateStated,
        dateFinished = queriedInput.dateFinished,
        campus = queriedInput.campus,
        isPresented = queriedInput.isPresented,
        isFunded = queriedInput.isFunded,
        isPatented = queriedInput.isPatented
    }

    loadingBarLoads();
    loadingTableLoads($(".research-table-data-container"));

    $.post("process/pr-research.php",{
        process : 'search-research',
        clickedPageNumber : clickedPageNumber,
        showAmount : showAmount,
        title : title,
        authorIds : authorIds,
        keywordIds : keywordIds,
        status : status,
        dateStated : dateStated,
        dateFinished : dateFinished,
        campus : campus,
        isPresented : isPresented,
        isFunded : isFunded,
        isPatented : isPatented

    }, function(data, status){
            let target =   $("#research-table-body");
            target.html('');
            console.log(data + " s");

            if (data != "no data"){

                try{                    
                    data = JSON.parse(data);
                    

                    let counter = 1;

                    let resultLength = data[data.length - 1].numOfAllrows; //
                    $(".total-result-num").html(resultLength);
                    $(".search-info-container").show();

                    let numnav = $(".num-nav");
                    numOfPage = Math.ceil(resultLength / showAmount);
                    
                    data.forEach(function(val){
                        
                        let authorsStr = '';
                        if (val.research.authors != undefined){
                            val.research.authors.forEach(function(author){
                                authorsStr += `<span data-id="${author.authorId}"><span class="name"> ${author.fullname}</span></span><br>`;
                            
                            })
                        }
                                                    
                        if (val.research.basicDetails.dateFinished == null)
                            val.research.basicDetails.dateFinished = "";

                        if (val.research.subDetails[1].presentation > 0)
                            val.research.subDetails[1].presentation = "Yes";
                        else
                        val.research.subDetails[1].presentation = "No";

                        if (val.research.subDetails[2].fund > 0)
                            val.research.subDetails[2].fund = "Yes";
                        else
                            val.research.subDetails[2].fund = "No";

                        if (val.research.subDetails[3].patent > 0)
                            val.research.subDetails[3].patent = "Yes";
                        else
                            val.research.subDetails[3].patent = "No";

                        // $(".")
                            
                        target.append(`<tr class="research-viewable" data-id="${val.research.basicDetails.id}">
                            <th scope="row">${counter}</th>
                            <td>${val.research.basicDetails.title}</td>
                            <td class="author-td">${authorsStr}</td>
                            <td>${val.research.basicDetails.campus}</td>
                            <td>${val.research.basicDetails.status}</td>
                            <td>${formatDateLong(val.research.basicDetails.dateStarted)}</td>
                            <td>${formatDateLong(val.research.basicDetails.dateFinished)}</td>
                            <td> <span class="">${val.research.subDetails[0].journal}</span></td>
                            <td><span ${val.research.subDetails[1].presentation == "Yes" ? `class="td-not-null"` : `class="td-null"`}>${val.research.subDetails[1].presentation}</span></td>
                            <td><span ${val.research.subDetails[2].fund == "Yes" ? `class="td-not-null"` : `class="td-null"`}>${val.research.subDetails[2].fund}</span></td>
                            <td><span ${val.research.subDetails[3].patent == "Yes" ? `class="td-not-null"` : `class="td-null"`}>${val.research.subDetails[3].patent}</span></td>
                        </tr>`);
                        counter++;

                        $(".data-navigator").attr("data-num-all-result",numOfPage);

                        numnav.html(''); 
                        
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
                            
                            $("#research-table-body").find("tr").each(function(){
                                $(this).children().eq(0).html(`${trNumber}`);
                                trNumber++;
                            })
                        }  
                        

                    })

                    

                }catch(err){
                    console.log("no data" + err);
                }

            }else{
                $(".total-result-num").html('0');
                target.html(`<tr> <td colspan="11" style="text-align: center"> No result </td></tr>`);
                $(".search-info-container").show();

                $(".num-nav").html('');
                $(".next-nav").addClass("selected");
            }

        let queriedInput = [];

        if ($("#title-search-input").val().replace(/ /g, '') != ''){
            queriedInput.push({
                input : `title = "${$("#title-search-input").val()}"`
            })
        }

        let targetForm = $(".advance-search-research.form-validation");
        targetForm.find("[class*='input-']").each(function(){
            if ($(this).val().replace(/ /g, '') != ''){
                let name = $(this).attr("name");
                queriedInput.push({
                    input : `${name} = "${$(this).val()}"`
                })
            }
        })
       

        let resultInfoStr = '';
        queriedInput.forEach(function(val){

            resultInfoStr += `[ ${val.input} ]`;
        }) 

        if ($("#author-container .item").length > 0){
            resultInfoStr += `[ authors = `;

            $("#author-container").find(".item").each(function(){
                resultInfoStr += `"${$(".name",this).html()}"     `;
            })
            
            resultInfoStr += `]`;
        }

        
        if ($("#keyword-container .item").length > 0){
            resultInfoStr += `[ keywords = `;

            $("#keyword-container").find(".item").each(function(){
                resultInfoStr += `"${$(".name",this).html()}"     `;
            })
            
            resultInfoStr += `]`;
        }


        $(".search-info-text-val").html(resultInfoStr);

            
        loadingBarFinished();

        setTimeout(function(){
            loadingTableFinished($(".research-table-data-container"));
        }, 200)
        
    })

    
    
}


//https://css-tricks.com/snippets/javascript/get-url-variables/
function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
    }
    return(false);
}