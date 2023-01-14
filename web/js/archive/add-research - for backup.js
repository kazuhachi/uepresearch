

let waiting;

function showDialogBox(type,message){
	if (type == "error"){

	}else if (type == "notice"){
		
	}

	let dialogbox = $(".sliding-dialog-box");
	let slided = dialogbox.attr("data-slided");
	let timer = $(".sliding-dialog-box .timer");

	function slideDialogDown(){
		$(dialogbox).animate({
			'bottom' : -100
		}, 200, function(){
			$(dialogbox).attr("data-slided", "false");
			$(timer).width("100%");
			timer.stop();
		});

	}

	function slideDialogUp(){
		$(dialogbox).animate({
			'bottom' : 20
		}, 200,function(){
			$(dialogbox).attr("data-slided", "true");
		})
	}

	function startTime(){
		$(timer).animate({
			'width' : '0%'
		},5000,function(){
			$(this).width("100%") 
		})
	}

	function pause() {
		waiting = setTimeout(function(){
			slideDialogDown();
		}, 4000);
	};

	if ($(dialogbox).attr("data-slided") == "false"){

		slideDialogUp();
		startTime()
		pause();
		
	}else{
		
		clearTimeout(waiting);
		slideDialogDown();
		
		slideDialogUp();
		pause();
		$(timer).animate({
			'width' : '0%'
		},5000,function(){
			$(this).width("100%") 
		})
		
	}
	
}



$(document).ready(function(){

	let pageNumber;

	$("#page-number").on("keyup keypress", function(e){

		if ($(this).val().replace(/\s/g, '').length == 0 ){
			$(this).css({
				"border-color" : "red",
				"outline-color" : "red"
			})

		}else{
			$(this).attr("style", '');

			let str = $(this).val();
				str = str.replace(/ /g, '');
			let occr = (str.match(/-/g) || []).length;
			let dashIndex = str.indexOf('-');
			let firstPage = parseInt(str.substring(0 , dashIndex));
			let lastPage = parseInt(str.substring(dashIndex + 1 , str.length));


			if ((lastPage >= firstPage) && (occr == 1) && (dashIndex > 0 ) && $.isNumeric(firstPage)  &&  ($.isNumeric(lastPage))) {
						
				$(".add-page").removeAttr("disabled");

				pageNumber = firstPage + "-" + lastPage;

				if (e.which == 13){
					$(".add-page").click();
				}
			}
			else{
				$(".add-page").attr("disabled", '');	
			}
			
		}
	})

	// specifically for PREV.html
	$(".add-page").on("click", function(){

		if (pageNumber != null){

			let attr = $(this).attr('disabled');

			if ( attr == undefined && attr !== false) {

				let pageList = $("<div/>",{
					'class' : 'item',
					'id' : 'page'
				})

				let div = $("<div/>");
				let icon = $("<i/>", {
					'class' : 'fas fa-times remove-item',
				})

				let hiddinInput = $("<input/>",{
					'type' : 'hidden',
					'name' : 'page-ite',
					'value' : pageNumber
				}) 

				div.append(pageNumber).append(icon);
				pageList.append(div).append(hiddinInput);
				$(this).closest(".item-container").append(pageList);
			}

			$(".add-page").attr("disabled", '');
			$(".book-journal").val('');
			pageNumber = null;
		}
	})


	$(".page-list-container").on("click", ".remove-page-item", function(){
		$(this).parent().parent().remove();
	})

	// reable Date finished input if Status <select> is finished
	$(".input-status").on("change",function(){
		if ($(this).val() == "Finished") {
			$(".input-date-finished").removeAttr("disabled")
		}else{
			$(".input-date-finished").attr("disabled", "");
			$(".input-date-finished").val('');
			removeerrormessage($(".input-date-finished"));
		}
	})


	
	// trigger to click hidden INPUT type FILE
	$(".insert-abstract-btn").on("click", function(){
		$(".input-file-abstract").click();
	})

	// display FILE INFO selected
	$(".input-file-abstract").on("change", function(){
		
		
		let fullPath = $(".input-file-abstract").val();
		
		if (fullPath) {
			let startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
			let filename = fullPath.substring(startIndex);
			if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
				filename = filename.substring(1);
			}
			$(".file-info .file-name").html(filename).append(`<br> (${(($(this))[0].files[0].size /1024).toFixed(2)}  KB)`);
			
		}
	})

	

	$(".dropdown-input").on("focus", function(){

		const target = `#${$(this).attr("data-target-dropdown")}`;
		let process;
		
		// select author-dropdown
		if (target == "#author-dropdown"){
			process = "getAuthors";
		}
		else if (target == "#keyword-dropdown"){
			process = "getKeywords";
		}
		$(target).show();
		let to;
		
		$(this).on("input", function(){
			
			let input = $(this).val();

			clearTimeout(to);
			to = setTimeout(function(){

				input = input.replace(new RegExp(" ", "g"), '%');
				
				$.post("process/pr-research.php",{
					process : process,
					input : input
				}, function(data, status){
					
					if (status == "success"){
						console.log(data);
						$(`${target} .suggestions`).html(data);
					}else{
					}
					
				})

			}, 300);
			
		})
		
	}).on("focusout", function(){
		if (!onHoverDropD){
			const target = `#${$(this).attr("data-target-dropdown")}`;
			$(target).hide();
		}
	})

	// var to flag hide Dropdown
	let onHoverDropD = false;

	$(".dropdown-suggestion").on("mouseover" , function(){
			onHoverDropD = true;

		}).on("click", "#add-suggestion-option", function(){
			$(this).closest(".dropdown-suggestion").hide();
		}).on("mouseout", function(){
			onHoverDropD = false;

		}).on("click", ".suggestion-item" ,function(){
			
			$(this).closest(".dropdown-suggestion").hide();
			const id = $(this).attr("data-id");
			const name = $(this).find(".name").html();

			const dropdownId = $(this).closest(".dropdown-suggestion").attr("target-container");

			console.log(dropdownId);
			let authorSelected = false;
			let kind ;
			if (dropdownId == "author-container"){
				kind = "author";
				$(`#${dropdownId}`).find("#author .name").each(function(){
					console.log($(this).html());
					if ($(this).html() == name){
						alert("Name is already selected!");
						authorSelected = true;
						return false;
					}	
				});
			}
			if (dropdownId == "keyword-container"){
				kind = "keyword"
				$(`#${dropdownId}`).find("#keyword .name").each(function(){
					console.log($(this).html());
					if ($(this).html() == name){
						alert("Name is already selected!");
						authorSelected = true;
						return false;
					}	
				});
			}

			if (!authorSelected){
				$(`#${dropdownId}`).append(`<div class="item" id="${kind}" data-id="${id}"><div><span class="name">${name}</span> <i class="fas fa-times remove-item"></i></div></div>`);
			}
			
		
		})

	
	//===========================================================

	// should i move this to pr-author?

	$("#edit-quick-author-form-button").on("click", function(){
        const firstname = $("#input-edit-firstname").val() ;
        const middlename = $("#input-edit-middlename").val();
        const lastname = $("#input-edit-lastname").val();
        const phonenumber = $("#edit-contact-number").val();
        const email = $("#input-edit-email").val();
        const address = $("#input-edit-address").val();
        const college = $("#input-edit-college").val();
        
        
        target = $(this).closest(".form-validation");
        if (isValidForm(target)){

            if (confirm("Are you sure to add this author?")){
                $.post("process/pr-author.php",{
					process : 'add',
					quickprocess: 'yes',
                    firstName : firstname,
                    middleName : middlename,
                    lastName : lastname,
                    phoneNumber : phonenumber,
                    eMail : email,
                    Address : address,
                    College : college,
                }, function(data, status){
     
                    if (status == "success"){
						
						const target = $("#author-container");

						$(target).append(data);
                       
            
                    }else{
     
                    }
                })
            }
        }
    })
});
