//loading bar

function loadingBarLoads(){
	$(".loading-bar").css({
		width : '10%',
	});
	setTimeout(function(){
		$(".loading-bar").css({	
			width: '80%',	
			transition: 'all 10s cubic-bezier(0.22, 0.61, 0.36, 1) 0s'
		},300);
	})
	
}
function loadingBarFinished(){

	$(".loading-bar").css({	
		width: '100%',
		transition: '300ms'
	})
	setTimeout (function(){
			$(".loading-bar").width('0%').css({
				transition: 'none'
			});
	},300)
}

//loading div anim

function startAnimimateLoadDiv(element){
	element.addClass("animated-background");
}

function stopAnimimateLoadDiv(element){
	element.removeClass("animated-background");
}

// day/month/year
function formatDate(dateStr){
	
	if (dateStr != null){
		const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		let indeces = [];
		for (i = 0; i < dateStr.length; i++){
			if (dateStr[i] == " "){
				indeces.push(i);
			}
		}
		
		let date = dateStr.substring(indeces[0] + 1, indeces[1] - 1);
		date = ("0" + date).slice(-2);

		let year = dateStr.substring(indeces[1] + 1, dateStr.length+1);

		let month = dateStr.substring(0, indeces[0]);
		month = (months.indexOf(month) + 1);
		month = ("0" + month).slice(-2);

		return `${month}/${date}/${year}`;

		
	}else{
		return '';
	}
}
function formatDateLong(dateStr){
	if (dateStr == null || dateStr == "") return '';

	const options = {  year: 'numeric', month: 'long', day: 'numeric' };
	let date = new Date(dateStr);
	date = date.toLocaleDateString("en-US", options)

	return date;
}

function formatDateTimeLong(dateStr){
	

	let time = dateStr.substring(11, dateStr.length);
	dateStr = dateStr.substring(0, 10);
	
	const options = {  year: 'numeric', month: 'long', day: 'numeric' };
	let date = new Date(dateStr);
	date = date.toLocaleDateString("en-US", options)

	return `${date} ${time}`;
}


function loadingTableLoads(tableContainer){
	$(".table-loader-container",tableContainer).fadeIn(200);
	$(tableContainer).css({
		"filter": "blur(1px)",
		"position": "relative"
	})
}

function loadingTableFinished(tableContainer){
	$(".table-loader-container",tableContainer).fadeOut();

	$(tableContainer).css({
		"filter": ""
	})
}

$(document).ready(function(){	
	
	$(document).on("click",function(){
		$("#profile-option").slideUp(100);
		$(".pop-menu").hide();
	})

	
	$(".pop-author-details").on("click", function(e){
		e.stopPropagation();
	})


	$(".quick-acc-profile .name").on("click", function(e){
		e.stopPropagation();
		$("#profile-option").slideDown(100);
	})
	

	// ini date picker api
	try{
		$('[data-toggle="datepicker"]').datepicker();
	}catch(e){
		console.log("error datepicker");
	}

	

	// nav items silde / effect //////////////////////////////////////////////////
	$(".nav-item").on("click", function(){
		$(this).next().slideToggle(200, function(){
			
		});
		const child = $(this).children('.fa-angle-down');
		if (child.attr("data-rotated") == "false"){
			child.css({
				'transform' : 'rotate(90deg)',
				'transition' : '0.2s'
			})

			child.attr("data-rotated", true)

		}else{
			child.css({
				'transform' : 'rotate(0deg)'
			})
			child.attr("data-rotated", false)
		}

		
	})

	//  navigator-slider 
	$(".btn-slide-cont").on("click", function(){
		const wid = $(".nav-list").width();  //specified width in css
		const nav = $(".nav-list-cont");
		const transition = 300;
		
		if (nav.offset().left == "0"){
			nav.css({
				'margin-left' : -1 * nav.width(),
				'transition' : `margin-left ${transition}ms`,

			})

			setTimeout(function(){
				
			}, transition)
		}
		else if (nav.offset().left <""){
			nav.css({
				'margin-left' : 0,
				'transition' : `margin-left ${transition}ms`
			})
		}	
	})


	// tooltip   message  /  error  /  tip
	$('[data-cus-tooltip]').on("mouseover", function(){
		const tooltipType = $(this).attr("data-tooltip-type");
		if (tooltipType = "Message"){

		}
	})


	//reset all inputs in form
	$(".reset-form-button").on("click", function(){
		resetForm($(this), 0);
	})	



	//pop up click by button
	$("body").on("click",".pop-up-button", function(){
		new PopUp($(this)).show(300);
		console.log("click");
	})

	$(".close-pop-up").on("click", function(){
		new PopUp($(this)).close(300);

		resetForm($(this), 0);
	})



	$("#announcements-container").on("click", ".collapse-header", function(){
		$(this).next().slideToggle(200);
		$("button",this).toggleClass("arrow-rotate-down").css({
			transition : "200ms"
		});
	})


	$(".cancel-form-button").on("click" , function(){
		$(".close-pop-up").click();
	})



	//sort table ///////////////////// sort table

	$(".sortable-th").on("click", function(){
		
		const index = $(this).index();
		let dataArray = [];
		const tbody = $(this).closest("table").find("tbody");
		
		$(this).closest("table").find("tbody tr").each(function(){

			if ($(this).hasClass("sort-name")){
				const str = `${$(this).find(".firstname").html()} ${$(this).find(".middlename").html()} ${$(this).find(".lastname").html()}`;
				
				let data = {
					id: $(this),
					value : str.toLowerCase(),
				}
				dataArray.push(data);
			}
			else{

				const str = $(this).children().eq(index).html();
				
				let data = {
					id: $(this),
					value : str.toLowerCase(),
				}
				dataArray.push(data);
			}
			
		})

		if ($(this).hasClass("sort-asc")){
			
			
			dataArray.sort(function(a, b){
				if ( a.value > b.value ){
					return -1;
				}
				if ( a.value < b.value){
					return 1;
				}
				return 0; 
			})

			$(this).removeClass("sort-asc");
			$(this).addClass("sort-desc");
			
		}else if ($(this).hasClass("sort-desc")){
			
			dataArray.sort(function(a, b){
				if ( a.value < b.value ){
					return -1;
				}
				if ( a.value > b.value){
					return 1;
				}
				return 0; 
			})

			$(this).removeClass("sort-desc");
			$(this).addClass("sort-asc");

		}else{
			$(this).addClass("sort-asc");

			dataArray.sort(function(a, b){
				if ( a.value < b.value ){
					return -1;
				}
				if ( a.value > b.value){
					return 1;
				}
				return 0; 
			})

			
		}

		$(this).siblings().removeClass("sort-asc").removeClass("sort-desc");

		dataArray.forEach(function(item, key){
			item.id.children().eq(0).html(key+1	);
			tbody.append(item.id);
		})

		
	})


	// $("tbody ").on("click"," tr[data-id]", function(e){
	// 	e.stopPropagation();

	// 	$(".pop-menu").fadeIn(200);
	// 	$(".pop-menu").css({
	// 		top: e.pageY -  $("html").scrollTop() + 30,
	// 		left: e.pageX -20 
	// 	})


	// })

	
	
	
})


