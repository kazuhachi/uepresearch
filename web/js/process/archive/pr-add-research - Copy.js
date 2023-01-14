//global variable
let researchId;
let researchTitle;
let researchAuthors;
let researchKeywords;
let researchStatus;
let researchCampus;
let researchDateStarted;
let researchDateFinished;


$(document).ready(function(){

    $("#add-research-button").on("click", function(){

        targetForm = $(this).closest(".form-validation");
        if (isValidForm(targetForm)){
            let returnValName ;

            const d = new Date()
            let filename  = d.getFullYear();
                filename += ("0" + d.getMonth()).slice(-2) ;
                filename += ("0" + d.getDate()).slice(-2);
                filename += ("0" + d.getHours()).slice(-2);
                filename += ("0" + d.getMinutes()).slice(-2);
                filename += ("0" + d.getSeconds()).slice(-2);


            $.when(uploadFile($(".input-file-abstract"), filename)).done(function(valid){
                
                if (valid){
                    console.log("file-uploaded");
                    console.log(filename);

                    // to fetch to php
                    const title = $(".input-title" , targetForm).val();
                    // const authorIDs = [];
                    //     $("#author-container #author").each(function(){
                    //         authorIDs.push($(this).attr("data-id"));
                    //     })

                    // const keywordsIDs = [];
                    //     $("#keyword-container #keyword").each(function(){
                    //         keywordsIDs.push($(this).attr("data-id"));
                    //     })
                        
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
                        abstractFileName : filename,
                        authorIDs : authors.map(a => a.id),
                        keywordsIDs : keywords.map(a => a.id),
                        status : reseachStatus,
                        campus : campus,
                        dateStarted : dateStarted,
                        dateFinished : dateFinished


                    }, function(data, status){

                        

                        if (status == "success"){
                            console.log(data);

                            // alert("Research successfully added!");
                            // reset FORM 
                            $(".reset-form-button").click();
                            $(".file-name").html("");
                            $(".item-container").html("");

                            // window.location.href = "add-research-preview.html";
                            loadingBarFinished();
                            $(".inner-content").load("add-research-preview.html", function(){

                                //after load
                                //fetch data to review                        
                                $(".inner-content #preview-title").html(title);
                                $(".inner-content #preview-authors").html("");
                                authors.forEach(function(val){
                                    $(".inner-content #preview-authors").append(`<div data-id="${val.id}"class="author">${val.name}</div>`)
                                })

                                $(".inner-content #preview-keywords").html("");
                                keywords.forEach(function(val){
                                    $(".inner-content #preview-keywords").append(`<div data-id="${val.id}"class="keyword">${val.name}</div>`)
                                })

                                $(".inner-content #preview-status").html(reseachStatus);
                                $(".inner-content #preview-date-started").html(dateStarted);
                                $(".inner-content #preview-date-finished").html(dateFinished);
                                $(".inner-content #preview-campus").html(campus);
                                $(".inner-content #preview-abstract").attr("data-file", filename);
                            });
                            

                            
                        }else{
         
                        }
                    })

                }else{
                    console.log("file upload unsuccessful");
                }

            })
            
            

        }else{
            alert("no");
        }
    })
    

    $("#add-quick-keyword-form-button").on("click", function(){
        const keyword = $(this).closest(".form-validation").find(".input-keyword-name").val();
        target = $(this).closest(".form-validation");   
        if (isValidForm(target)){
            if(confirm("Are you sure?")){
                $.post("process/pr-research.php",{
					process : "addKeyword",
					input : keyword
				}, function(data, status){
					
					if (status == "success"){

                        console.log(data);
						const element = `<div class='item' id='keyword' data-id='${data}'><div><span class='name'>${keyword}</span> <i class='fas fa-times remove-item'></i></div></div>`;
						$("#keyword-container").append(element);
					}else{
					}
					
				})
            }
        }
       
    })

  


})