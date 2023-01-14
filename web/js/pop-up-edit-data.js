$(document).ready(function(){
    //dynamic element // pop up click by <tr> table
	$(".inner-content").on("click", ".pop-up-button", function(){
		let popUp = new PopUp($(this)).show(300);
		const target = $(this).attr("data-pop-up-target-id");
		

		if (target == "pop-up-edit-author"){
			let _this = $(this).closest("tr");
			const authorId = _this.attr("data-id");
			const fname = _this.find(".firstname").html();
			const mname = _this.find(".middlename").html();
			const lname = _this.find(".lastname").html();
			const pnumber = _this.children().eq(3).html();
			const email = _this.children().eq(4).html();
			const address = _this.children().eq(5).html();
			const college = _this.children().eq(6).html();

			$(`[id=${target}]`).attr("data-author-id" , authorId );

			$(`[id=${target}] #input-edit-firstname`).val(fname);
			$(`[id=${target}] #input-edit-middlename`).val(mname);
			$(`[id=${target}] #input-edit-lastname`).val(lname);
			$(`[id=${target}] #edit-contact-number`).val(pnumber);
			$(`[id=${target}] #input-edit-email`).val(email);
			$(`[id=${target}] #input-edit-address`).val(address);

			$(`[id=${target}] #input-edit-college`).children().each(function(){
				if ($(this).html() == college){
					$(this).attr("selected", "selected");
				}else{
					$(this).removeAttr("selected");
				}
			})
		}

		if (target == "pop-up-edit-college"){
			const collegeId = $(this).attr("data-id");
			const collgeName = $(this).children().eq(1).html();

			$(`[id=${target}]`).attr("data-college-id" , collegeId);

			$(`[id=${target}] #input-edit-college-name`).val(collgeName);


		}

		if (target == "pop-up-edit-fund-source"){

			
			const fundingId = $(this).attr("data-id");
			const fundName = $(this).children().eq(1).html();
			
			$(`[id=${target}]`).attr("data-fund-source-id" , fundingId);

			$(`[id=${target}] #input-edit-fund-source-name`).val(fundName)
		}


		
	})
})


//search query for author
$("#submit-search-button").on("click", function(){
	loadingBarLoads();

	target = $(this).closest(".form-validation");
	
	const authorName =  $(".input-search-author-name").val();
	const phoneNumber = $(".input-search-phone-number").val();
	const email = $(".input-search-email").val();
	const address = $(".input-search-adress").val();
	const college = $(".input-search-college").val();

	$.post("process/pr-author.php",{
		process : 'search',
		authorName : authorName,
		phoneNumber : phoneNumber,
		email : email,
		address : address,
		college : college,
	}, function(data, status){

		if (status == "success"){

			$("#authorList").html(data);
			$(this).removeAttr("disabled");
			$(".reset-form-button").click();
			


		}else{

		}
		loadingBarFinished();
	})
})


//animate row when changed data from table
function animateDataChanged(id){
	setTimeout(function(){
		$(`tbody tr[data-id=${id}]`).css({
			'background-color': "#ffd8a4",
			'transition' : '1s'
		});

	},100)

	setTimeout(function(){
		$(`tbody tr[data-id=${id}]`).css({
			'background-color': 'transparent',  
			'transition' : '1s'
		})
	},5000)

	setTimeout(function(){
		$(`tbody tr[data-id=${id}]`).css({
			'background-color': '',  
			'transition' : ''
		})
	},6000)
	
}
    