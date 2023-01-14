//global variable
// let researchId;
// let researchTitle;
// let researchAuthors;
// let researchKeywords;
// let researchStatus;
// let researchCampus;
// let researchDateStarted;
// let researchDateFinished;



// function


$(document).ready(function(){

    $("#add-research-button").on("click", function(){

        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
            
            const title = $(".input-title" , targetForm).val();
            let abstract = $(".input-abstract", targetForm).val();       
                abstract = abstract.replace(/\n/g, '<br />');     

            const reseachStatus = $(".input-status").val();
            const campus = $(".input-campus").val();
            const dateStarted = $(".input-date-started").val();
            const dateFinished = $(".input-date-finished").val();

            //to fetch only html
            const authors = [];
                $("#author-container #author").each(function(){
                    authors.push({
                        id : $(this).attr("data-id"),
                        name : $(".name", this).html()
                    });
                })
                console.log(authors);
            
            const keywords = [];
            $("#keyword-container #keyword").each(function(){
                keywords.push({
                    id : $(this).attr("data-id"),
                    name : $(".name", this).html()
                });
            })

            console.log(authors.map(a => a.name));

            loadingBarLoads();

            $.post("process/pr-research.php",{
                process : 'add-research',
                title : title,
                abstract: abstract,
                authorIDs : authors.map(a => a.id),
                keywordsIDs : keywords.map(a => a.id),
                status : reseachStatus,
                campus : campus,
                dateStarted : dateStarted,
                dateFinished : dateFinished


            }, function(data, status){

                if (status == "success"){
                    console.log(data);

                    
                    $(".reset-form-button").click();
                    $(".file-name").html("");
                    $(".item-container").html("");

                    window.location = "/add-research-view.html";
                    loadingBarFinished();
                    
                }else{

                }
            })

        }else{
            alert("Error! Please fill up required fields!");
        }
    })
    
    $("#add-quick-keyword-form-button").on("click", function(){
        loadingBarLoads();

        const keyword = $(this).closest(".form-validation").find(".input-keyword-name").val();
        target = $(this).closest(".form-validation");   
        if (isValidForm(target)){
            if(confirm("Are you sure?")){
                $.post("process/pr-research.php",{
					process : "addKeyword",
					input : keyword
				}, function(data, status){
					
					if (status == "success"){

						const element = `<div class='item' id='keyword' data-id='${data}'><div><span class='name'>${keyword}</span> <i class='fas fa-times remove-item'></i></div></div>`;
                        $("#keyword-container").append(element);
                        
                        loadingBarFinished();

                        target.find(".close-pop-up").click();
					}else{
                        alert("Opps! Something went wrong. Request denied!");
					}
					
				})
            }
        }
       
    })


    $("#edit-research").on("click", function(){
        const title = $("#preview-title").html();
        let abstract = $("#pop-up-abstract #abstract-body").html().replace(/<br>/g,'\n' );
        let authors = [];
        $("#preview-authors").find(".author").each(function(){
            authors.push({
                "id" : $(this).attr("data-id"),
                "name" : $(this).html()
            })
        })

        let keywords = [];
        $("#preview-keywords").find(".keyword").each(function(){
            keywords.push({
                "id" : $(this).attr("data-id"),
                "name" : $(this).html()
            })
        })

        //
        const status  = $("#preview-status").html();
        const dateStarted = formatDate($("#preview-date-started").html());
        const dateFinished = formatDate($("#preview-date-finished").html());
        const campus = $("#preview-campus").html();

        const target = $("#pop-up-edit-research");
        $(".input-title", target).val(title);
        $(".input-abstract", target).val(abstract);
        
        $("#author-container").html("");
        authors.forEach(function(author){
            $("#author-container").append(`<div class="item" id="author" data-id="${author.id}"><div><span class="name">${author.name}</span> <i class="fas fa-times remove-item"></i></div></div>`);
        })

        $("#keyword-container").html("");
        keywords.forEach(function(keyword){
            $("#keyword-container").append(`<div class="item" id="keyword" data-id="${keyword.id}"><div><span class="name">${keyword.name}</span> <i class="fas fa-times remove-item"></i></div></div>`)
        })

        $(".input-status", target).children("option").each(function(){
            if ($(this).html() == status){ 
                $(this).parent().prop("selectedIndex", $(this).index());    
            }else{
                $(this).removeAttr("selected");
            }
        })

        $(".input-campus", target).children("option").each(function(){
            
            if ($(this).html() == campus){
                $(this).parent().prop("selectedIndex", $(this).index());
            }else{
                $(this).removeAttr("selected");
            }
        })

        $(".input-date-started", target).val(dateStarted);

        if (status == "Finished"){
            $(".input-date-finished", target).val(dateFinished).removeAttr("disabled");
        }else{
            $(".input-date-finished", target).attr("disabled", "disabled");
        }

    })

    $("#cancel-form-button").on("click", function(){
        $(".close-pop-up").click();
    })

    
    // updates research
    $("#update-research-button").on("click", function(){
        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
            
            const id = $("#research-preview-container").attr("data-research-id");
            const title = $(".input-title" , targetForm).val();
            let abstract = $(".input-abstract", targetForm).val();       
                abstract = abstract.replace(/\n/g, '<br />');     

            const reseachStatus = $(".input-status").val();
            const campus = $(".input-campus").val();
            const dateStarted = $(".input-date-started").val();
            const dateFinished = $(".input-date-finished").val();

            //to fetch only html
            const authors = [];
                $("#author-container #author").each(function(){
                    authors.push({
                        id : $(this).attr("data-id"),
                        name : $(".name", this).html()
                    });
                })
            
            const keywords = [];
            $("#keyword-container #keyword").each(function(){
                keywords.push({
                    id : $(this).attr("data-id"),
                    name : $(".name", this).html()
                });
            })


            loadingBarLoads();

            $.post("process/pr-research.php",{
                process : 'update-research',
                id : id,
                title : title,
                abstract: abstract,
                authorIDs : authors.map(a => a.id),
                keywordsIDs : keywords.map(a => a.id),
                status : reseachStatus,
                campus : campus,
                dateStarted : dateStarted,
                dateFinished : dateFinished


            }, function(data, status){

                if (status == "success"){
                    console.log(data);

                    
                    $(".reset-form-button").click();
                    $(".file-name").html("");
                    $(".item-container").html("");

                    window.location = "/add-research-view.html";    
                    loadingBarFinished();
                    
                }else{

                }
            })

        }else{
            alert("Error! Please fill up required fields correctly!")
        }
    })

    //                                        //
    // JOURNAL | PRESENTATION | FUND | PATENT //
    //                                        //
    

    $("#journal-button").on("click", function(){
        targetForm = $(this).closest(".form-validation");

        if (isValidForm(targetForm)){
            operationType = $(this).closest(".form-validation").find(".header-text").html();

            const researchId = $("#research-preview-container").attr("data-research-id");
            const bookTitle = $(".input-book-title").val();
            const volumeIssueNumber = $(".input-volume-issue").val();

            let numberPages = [];
            $("#page-container").find(".item").each(function(){
                numberPages.push($(".page-number", $(this)).html());
            })

            const datePublished = $(".input-date-published").val();
            const publicationType = $(".input-publication-type").val();

            if (operationType == "Add journal"){

                loadingBarLoads();

                $.post("process/pr-research.php",{
                    process : 'add-journal',
                    researchId : researchId,
                    bookTitle : bookTitle,
                    volumeIssueNumber : volumeIssueNumber,
                    numberPages : numberPages,
                    datePublished : datePublished,
                    publicationType : publicationType
                    
                }, function(data, status){
                    if (status == "success"){

                        targetForm.find(".close-pop-up").click();
    
                        refreshJournalTable();
                        
                        loadingBarFinished();
                    }
                    
                })
                // loadingBarFinished();

            }else{
                loadingBarLoads();
                
                const id = targetForm.attr("data-id");
                console.log(id);
                $.post("process/pr-research.php",{
                    process : 'edit-journal',
                    id : id,
                    bookTitle : bookTitle,
                    volumeIssueNumber : volumeIssueNumber,
                    numberPages : numberPages,
                    datePublished : datePublished,
                    publicationType : publicationType

                    

                }, function(data, status){
                    console.log(data);
                    
                    targetForm.find(".close-pop-up").click();

                    refreshJournalTable();
                    
                    loadingBarFinished();
                })
            }
            

            // console.log(`${bookTitle} ==  ${volumeIssueNumber} ==${numberPages} ==${datePublished} ==${publicationType}`)
            
            
        }
    })

    $("#presentation-button").on("click", function(){

        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
            let operationType = targetForm.find(".header-text").html();
            
            const researchId = $("#research-preview-container").attr("data-research-id");
            const conferenceTitle = $(".input-conference-title", targetForm).val();
            const conferenceVenue = $(".input-conference-venue", targetForm).val();
            const datePresented = $(".input-date-presented", targetForm).val();
            const conferenceType = $(".input-conference-type", targetForm).val();
            const organizer = $(".input-organizer", targetForm).val();


            if (operationType == "Add presentation"){   
                
                // console.log(`${conferenceTitle} -- ${conferenceVenue} -- ${datePresented} -- ${conferenceType} -- ${organizer}`);
                $.post("process/pr-research.php",{
                    process : 'add-presentation',
                    researchId : researchId,
                    conferenceTitle : conferenceTitle,
                    conferenceVenue : conferenceVenue,
                    datePresented : datePresented,
                    conferenceType : conferenceType,
                    organizer : organizer,
    
                }, function(data, status){

                    if (status == "success"){

                        targetForm.find(".close-pop-up").click();
    
                        refreshPresentationTable();
                        
                        loadingBarFinished();
                    }
                })

            }else{
                loadingBarLoads();
                
                const id = targetForm.attr("data-id");

                $.post("process/pr-research.php",{
                    process : 'edit-presentation',
                    id : id,
                    conferenceTitle : conferenceTitle,
                    conferenceVenue : conferenceVenue,
                    datePresented : datePresented,
                    conferenceType : conferenceType,
                    organizer : organizer,

                    

                }, function(data, status){
                    
                    targetForm.find(".close-pop-up").click();
                    refreshPresentationTable();
                    
                    loadingBarFinished();
                })
            }
        }   
    })
    

    $("#fund-source-button").on("click", function(){

        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
            let operationType = targetForm.find(".header-text").html();
            
            const researchId = $("#research-preview-container").attr("data-research-id");
            const fundId = $("#fund-source option:selected").attr("data-id");
            const fundDateFrom = $(".input-date-from", targetForm).val();
            const fundDateTo = $(".input-date-to", targetForm).val();
            const Amount = $(".input-fund-amount", targetForm).val();
            const isExternal = $(".input-is-external", targetForm).val();


            if (operationType == "Add fund source"){   
                
                $.post("process/pr-research.php",{
                    process : 'add-fund',
                    researchId : researchId,
                    fundId : fundId,
                    fundDateFrom : fundDateFrom,
                    fundDateTo : fundDateTo,
                    Amount : Amount,
                    isExternal : isExternal
    
                }, function(data, status){

                    if (status == "success"){
                        console.log(data);
                        targetForm.find(".close-pop-up").click();
    
                        refreshFundTable();
                        
                        loadingBarFinished();
                    }
                })

            }else{
                loadingBarLoads();
                
                const id = targetForm.attr("data-id");

                $.post("process/pr-research.php",{
                    process : 'edit-fund',
                    id : id,
                    fundId : fundId,
                    fundDateFrom : fundDateFrom,
                    fundDateTo : fundDateTo,
                    Amount : Amount,
                    isExternal : isExternal

                }, function(data, status){
                    
                    targetForm.find(".close-pop-up").click();
                    
                    refreshFundTable();
                    
                    loadingBarFinished();
                })
            }
        }   
    })

    $("#patent-button").on("click", function(){

        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
            let operationType = targetForm.find(".header-text").html();
            
            const researchId = $("#research-preview-container").attr("data-research-id");
            const patentNumber = $(".input-patent-id-number", targetForm).val();
            const datePatented = $(".input-date-issue", targetForm).val();
            const utilization = $(".input-utilization", targetForm).val();
            const remark = $(".input-remark", targetForm).val();

            


            if (operationType == "Add patent"){   
                
                $.post("process/pr-research.php",{
                    process : 'add-patent',
                    researchId : researchId,
                    patentNumber : patentNumber,
                    datePatented : datePatented,
                    utilization : utilization,
                    remark : remark 
    
                }, function(data, status){

                    if (status == "success"){
                        console.log(data);
                        targetForm.find(".close-pop-up").click();
    
                        refreshPatentTable();
                        
                        loadingBarFinished();
                    }
                })

            }else{
                loadingBarLoads();
                
                const id = targetForm.attr("data-id");

                $.post("process/pr-research.php",{
                    process : 'edit-patent',
                    id : id,
                    patentNumber : patentNumber,
                    datePatented : datePatented,
                    utilization : utilization,
                    remark : remark 

                }, function(data, status){

                    console.log(data);
                    
                    targetForm.find(".close-pop-up").click();
                    
                    refreshPatentTable();
                    
                    loadingBarFinished();
                })
            }
        }   
    })


    // print research
    $("#print-research").on("click", function(){
        window.open(
            '/print_res',
            '_blank' // <- This is what makes it open in a new window.
          )
    })

    $(".expand-btn").on("click", function(){
        const mainContainer = $(this).closest(".expandable-container");
        const abstractContainer = $(this).closest(".abstract-container");

        $(this).hide();

        mainContainer.css({
            position: 'fixed',
            top: 0,
            left: 0,
            right : 0,
            bottom : 0,
            'background-color': '#59688145',
            transition: '400ms',
            'z-index': 9999,
            'overflow-y' : 'scroll'
        })

        abstractContainer.css({
            'background-color': 'white',
            padding : '20px',
            'border-radius' : '3px',
            margin: '20px auto',
        }).addClass("col-md-9 col-sm-10 col-11").find(".close-expandable").show()
        
        abstractContainer.find("textarea").css({
            height : '400px'
        });


    })

    $(".additional-details-add-button").on("click", function(){
        const mainContainer = $(this).closest(".expandable-container");
        const abstractContainer = $(this).closest(".abstract-container");

        mainContainer.removeAttr("style").find("*").removeAttr("style");
        abstractContainer.removeClass("col-md-9 col-sm-10 col-11");
    })

})


