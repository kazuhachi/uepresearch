$(document).ready(function(){

    if ($("#announcement-tdboy").length > 0)
        getAnnouncements();

    if ($("#announcements-container").length > 0)
        getAnnouncementsforDashboard();
    

    $("#announcement-tdboy").on("click", "#edit-announcement" , function(){
        const tr = $(this).closest("tr");
        const id = tr.attr("data-id");
        const title = tr.children().eq(2).html();
        let message = tr.children().eq(3).html();

            message = message.replace(/<br>/g, '\n');

        // console.log(`${id}${title}${message}`);

        $(".input-edit-subject").closest(".form-validation").attr("data-id", id);
        $(".input-edit-subject").val(title);
        $(".input-edit-message").val(message);

    })

    $("#announcement-tdboy").on("click", "#delete-announcement" , function(){
        const answer = confirm("Are you sure to delete this announcement?");

        const id = $(this).closest("tr").attr("data-id");
        console.log(id);
        if (answer){
            loadingBarLoads();
            $.post("process/pr-announcement.php",{
                process : 'delete-announcement',
                id : id
            }, function(data, status){
                if (data != "error deleting announcement"){
                    getAnnouncements();
                    alert("announcement successfully deleted");
                }else{
                    alert("deleting announcement failed!");
                }
            })

            loadingBarFinished();
        }
    })

    $("#edit-announcement-button").on("click", function(){
        const target = $(this).closest(".form-validation");
        if (isValidForm(target)){
            
            const id = $(this).closest(".form-validation").attr("data-id");
            const title =  $(".input-edit-subject").val();
            const message = $(".input-edit-message").val();

            loadingBarLoads();
            $.post("process/pr-announcement.php",{
                process : 'edit-announcement',
                id : id,
                title : title,
                message : message
            }, function(data, status){
                console.log(data);

                if (data != "error edit announcements"){
                    getAnnouncements();
                }else{
                    alert("something went wrong editing announcement!");
                }
            })

            $(".close-pop-up").click();
            loadingBarFinished();
        }
    })


    $("#add-announcent-button").on("click", function(){
        const target = $(this).closest(".form-validation");
        if (isValidForm(target)){
            let title = $(".input-announcement-title").val();
                title = title.replace(/\n/g, '<br/>');
            const message = $(".input-announcement-message").val();

            loadingBarLoads();
            $.post("process/pr-announcement.php",{
                process : 'add-announcement',
                title : title,
                message : message
            }, function(data, status){
                if (data != "error adding announcement"){
                    getAnnouncements();
                    $(".reset-form-button").click();
                }else{
                    alert("something went wrong adding announcement!");
                }
            })

            loadingBarFinished();
        }
    })


    function getAnnouncements(){
        loadingBarLoads();
        $.post("process/pr-announcement.php",{
            process : 'get-announcement'
        }, function(data, status){
            const target = $("#announcement-tdboy");
    
            if (data != "No data"){
                try{
                    data = JSON.parse(data);
                    target.html('');
                    let counter = 1;
                    data.forEach(function(announcement){
                        target.append(`
                        <tr data-id="${announcement.id}">
                            <th scope="row">${counter}</th>
                            <td class="tool-td">
                                <button class="tool-icon pop-up-button" id="edit-announcement" tooltip-title="edit" data-pop-up-target-id="pop-up-announcement">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="tool-icon" id="delete-announcement" tooltip-title="Delete announcement">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            <td>${announcement.title}</td>
                            <td>${announcement.message}</td>
                            <td>${formatDateTimeLong(announcement.date)}</td>
                        </tr>
                        `)
                        counter++;
                    })
                }catch(err){
                    console.log(`ERROR: ${err}  -- ${data}`);
                }
            }else{
                alert(data);
            }
            loadingBarFinished();    
        })
    }

    function getAnnouncementsforDashboard(){
        loadingBarLoads();
        $.post("process/pr-announcement.php",{
            process : 'get-announcement'
        }, function(data, status){
            const target = $("#announcements-container");
    
            if (data != "No data"){
                try{
                    data = JSON.parse(data);
                    target.html('');
                    let counter = 1;
                    data.forEach(function(announcement){
                        target.append(`
                            <div class="collapsable-item">
                                <div class="collapse-header">
                                        
                                    <div class="collapser-head">
                                        <button class="${(counter <= 2) ? 'arrow-rotate-down' :''}"><i class="fas fa-angle-right"></i></button>
                                        ${announcement.title}
                                    </div>
                                </div>
                                <div class="collapse-body" style="${(counter > 2) ? 'display: none' :''}">
                                    <span >Date: ${formatDateTimeLong(announcement.date)}</span><br><br>
                                    ${announcement.message}
                                </div>
							</div>
                        `)
                        counter++;
                    })
                }catch(err){
                    console.log(`ERROR: ${err}  -- ${data}`);
                }
            }else{
                alert(data);
            }
            loadingBarFinished();    
        })
    }



})