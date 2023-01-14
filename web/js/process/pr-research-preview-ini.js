$(document).ready(function(){

    loadingBarLoads();
    
    setTimeout(function(){ // if data retrieves more than 700ms
        $(".item-detail").each(function(){
            startAnimimateLoadDiv($(this)); 
        })
    });
    viewResearch();
    refreshResearchSubDetailNum();
    refreshJournalTable();
    refreshPresentationTable();
    refreshFundTable()
    getFundList();
    refreshPatentTable();
    

    loadingBarFinished();
   
})

function viewResearch(){
    $.post("process/pr-research.php",{
        process : 'view-research',

    }, function(data, _status){

        try {

            // console.log(data);
            data = JSON.parse((data));

            const id = data.research.id;
            const title = data.research.title;
            let abstract = data.research.abstract;
            const campus = data.research.campus;
            const status = data.research.status;

            // console.l
            let dateStarted = formatDateLong(data.research.dateStarted);
            let  dateFinished = formatDateLong(data.research.dateFinished);
            if (dateFinished == null) dateFinished = '';

            let authors = data.authors;
            let keywords = data.keywords;

            abstract = abstract.replace(/'<br>'/g,'<br><br>');

            $(".inner-content #research-preview-container").attr("data-research-id", id)
            $(".inner-content #preview-title").html(title);
            $("#abstract-body").html(abstract);
            $(".inner-content #preview-authors").html("");
            authors.forEach(function(val){
                $(".inner-content #preview-authors").append(`<div data-id="${val.id}"class="author">${val.fullname}</div>`)
            })

            $(".inner-content #preview-keywords").html("");
            keywords.forEach(function(val){
                $(".inner-content #preview-keywords").append(`<div data-id="${val.id}"class="keyword">${val.name}</div>`)
            })

            $(".inner-content #preview-status").html(status);
            $(".inner-content #preview-date-started").html(dateStarted);
            $(".inner-content #preview-date-finished").html(dateFinished);
            $(".inner-content #preview-campus").html(campus);

        }
        catch(err) {
           alert("Opps! something went wrong! Please contact admin!");
        }

        loadingBarFinished();

        setTimeout(function(){
            $(".item-detail").each(function(){
                
                    stopAnimimateLoadDiv($(this));                 
            })
        },1000)
    })
}

function refreshJournalTable(){

    $.post("process/pr-research.php",{
        process : 'get-journal',
    }, function(data, status){

        if (data != "no data"){

            $("#journal-tbody").html(data);

        }else{
            $("#journal-tbody").html(`<tr><td colspan="6" style="text-align: center">No data</td></tr>`);
        }
        
    })
}

function refreshPresentationTable(){
    $.post("process/pr-research.php",{
        process : 'get-presentation',
    }, function(data, status){

        if (data != "no data"){

            $("#presentation-tbody").html(data);

        }else{
            $("#presentation-tbody").html(`<tr><td colspan="6" style="text-align: center">No data</td></tr>`);
        }
        
    })
}

function refreshFundTable(){
    $.post("process/pr-research.php",{
        process : 'get-fund',
    }, function(data, status){

        if (data != "no data"){

            $("#fund-tbody").html(data);

        }else{
            $("#fund-tbody").html(`<tr><td colspan="6" style="text-align: center">No data</td></tr>`);
        }
        
    })
}

function getFundList(){
    $.post("process/pr-research.php",{
        process : 'get-list-fund',
    }, function(data, status){
        console.log(data);
        $("#fund-source").html(data);
    })
}

function refreshPatentTable(){
    $.post("process/pr-research.php",{
        process : 'get-patent',
    }, function(data, status){

        if (data != "no data"){

            $("#patent-tbody").html(data);
        }else{
            $("#patent-tbody").html(`<tr><td colspan="6" style="text-align: center">No data</td></tr>`);
        }
        
    })
}


function refreshResearchSubDetailNum(){
    $.post("process/pr-research.php",{
        process : 'get-researchSubDetailsNum',
    }, function(data, status){
        data = JSON.parse(data);
        console.log(data[0].journal)

        $("#journal-counter .counter-num").html(`(${data[0].journal})`);
        $("#presentation-counter .counter-num").html(`(${data[1].presentation})`);
        $("#fund-source-counter .counter-num").html(`(${data[2].fund})`);
        $("#patent-counter .counter-num").html(`(${data[3].patent})`);
    })
}




