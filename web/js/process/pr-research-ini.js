
$(document).ready(function(){
    $(window).on("scroll", function(){
		$(".pop-menu").hide();
	})

    $(".research-table-data").on("click", ".author-td", function(e){
        e.stopPropagation();
    })

    $(".research-table-data").on("click", ".author-td .name", function(e){
        let authorId = $(this).closest("[data-id]").attr("data-id");
        let target = $(".pop-author-details");

        target.css({
            left: e.pageX - 20,
            top: e.pageY - $("html").scrollTop() + 30
        })

        let loadTime = setTimeout(function(){
            $(".spin-load", target).show();
        }, 300);

        $.post("process/pr-author.php",{
            process : 'view-author',
            authorId : authorId
            
        }, function(data, status){
            if (data != "no data"){
                data = JSON.parse(data);

                $(".name",target).html(data.fullname);
                $(".contact",target).html(data.contact);
                $(".email",target).html(data.email);
                $(".detail",target).html(data.address);
                $(".college",target).html(data.college);

                clearTimeout(loadTime);
                $(".spin-load", target).hide();
                target.fadeIn(200);
            }else{
                alert("something went wrong! Please contact Admin.");
            }
        });

    })

    $(".research-table-data").on("click", ".research-viewable", function(e){
        loadingBarLoads();

        // if (e.target == $(".name", this)) return;

        const id = $(this).attr("data-id");

        $.post("process/pr-research.php",{
            process : 'set-research',
            id : id
    
        }, function(data, _status){

            loadingBarFinished();
            if (_status == "success"){

                var win = window.open("/add-research-view.html", '_blank');
                win.focus();

            }
            
        })
    })
})


function getResearchData(NumOfRows){

    loadingBarLoads(); 
    $.post("process/pr-research.php",{
        process : 'get-research-recent',
        limit : NumOfRows,
    }, function(data, _status){
        // console.log(data);
        try {
            // console.log(data);
            
            data = JSON.parse(data);
            let counter = 1;
            data.forEach(function(research){

                let conCatAuthors = '';
                if (research.authors != undefined){
                    research.authors.forEach(function(author){
                        conCatAuthors += `<span data-id="${author.authorId}"><span class="name">${author.fullname}</span></span><br>`;
                    
                    })
                }
                

                if (research.details.dataFinished == null){
                    research.details.dataFinished = '';
                }

                if (research.subDetailsCounter[1].presentation > 0)
                    research.subDetailsCounter[1].presentation = "Yes";
                else
                    research.subDetailsCounter[1].presentation = "No";
                if (research.subDetailsCounter[2].fund > 0)
                    research.subDetailsCounter[2].fund = "Yes";
                else
                    research.subDetailsCounter[2].fund = "No";
                if (research.subDetailsCounter[3].patent > 0)
                    research.subDetailsCounter[3].patent = "Yes";
                else
                    research.subDetailsCounter[3].patent = "No";

                const elem = `<tr class="research-viewable" data-id="${research.details.id}">
                                <th scope="row">${counter}</th>
                                <td>${research.details.title}ouse</td>
                                <td class="author-td">${conCatAuthors}</td>
                                <td>${research.details.campus}</td>
                                <td>${research.details.status}</td>
                                <td>${research.details.dateStarted}</td>
                                <td>${research.details.dataFinished}</td>
                                <td >${research.subDetailsCounter[0].journal}</td>
                                

                                <td><span ${research.subDetailsCounter[1].presentation == "Yes" ? `class="td-not-null"` : `class="td-null"`}>${research.subDetailsCounter[1].presentation}</span></td>
                                <td><span ${research.subDetailsCounter[2].fund == "Yes" ? `class="td-not-null"` : `class="td-null"`}>${research.subDetailsCounter[2].fund}</span></td>
                                <td><span ${research.subDetailsCounter[3].patent == "Yes" ? `class="td-not-null"` : `class="td-null"`}>${research.subDetailsCounter[3].patent}</span></td>
                            </tr>`;

                $("#research-table-body").append(elem);
                counter++;
            })

            loadingBarFinished();

        }
        catch(err) {
            alert("Opps! something went wrong! Please contact admin!" + err);
        }
    })
}