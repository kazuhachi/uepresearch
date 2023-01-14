$(document).ready(function(){
	$('.research-table-list tr').mousedown(function(event) {
    switch (event.which) {
        case 3:
        	if ($(this).attr("data-rable") != "no"){
        		$(".pop-menu").css({
	            	'display' : 'block',
	            	'top' : event.pageY,
	            	'left' : event.pageX 
	            })	
        	} 
            
            break;
        default:
            //
	    }
	});


	$(".checkflag").on("click" , function(){
		if ($(this).next().attr("data-toggle") == "unchecked")
		{
			$(this).next().attr("data-toggle", "checked");
 			$(this).css({
				"color" : "#749fb3",
			})
		}else{
			$(this).next().attr("data-toggle", "unchecked");
 			$(this).css({
				"color" : "white",
			})
			$(this).next().next().val("");		
		}
		
	})

	$(".checkboxed input").on("focusout", function(){
		var text  = $(this).val().replace(/^\s+/, '').replace(/\s+$/, '');
		if (text != ''){
			if ($(this).prev().attr("data-toggle") == "unchecked"){
				$(this).prev().attr("data-toggle", "checked");
				$(this).prev().prev().css({
					"color" : "#749fb3",
				})
			}
		}
	})



	$(".item-container").on("click", ".remove-item", function(){
		$(this).parent().parent().remove();
		console.log('');
	})


	$(".advance-search-button").on("click", function(){

		resetForm($(".input-date-started-search"),0);
		$(".advance-search-research").slideToggle(200);
		

		if ($(".advance-search-research").attr("data-collapsed") == "no"){	
			$(".toggle-arrow-advance").css({
				'transform' : 'rotate(180deg)',
				'transition' : "0.2s"
			}, 200);
			$(".advance-search-research").attr("data-collapsed", "yes");
		}else{
			$(".toggle-arrow-advance").css({
				'transform' : 'rotate(0deg)',
			}, 200);
			$(".advance-search-research").attr("data-collapsed", "no");
			
		}
	})

	$(".research-search-button #reset-search-button").on("click", function(){
		resetForm($(".input-date-started-search"),0);

		$("#title-search-input").val('');
	})

	$(".keyword-editor-input").on("click", function(e){
			if(e.target !== e.currentTarget) return;
		
			$(this).append($("input",this));
			$("input",this).focus();
	})


	let emptyVal = false;

	$("#input-keyword-search").on("keydown",function(e){
		$(this).removeAttr("placeholder");
		const _this = $(this);

		setTimeout(function(){

			if ((e.keyCode == 8)){ 
				if (_this.val().length < 1){
					if (emptyVal){
						_this.prev().click();
					}

					emptyVal  = true;				
				}else{
					emptyVal = false;
				}
			}else{
				emptyVal = false;	
			}

			const textInput = _this.val();
			const hiddenTextHolder = $("#hidden-text-holder");

			hiddenTextHolder.html(textInput);

			const dynamicWidth  = hiddenTextHolder.width();
			const parent = $(this).closest(".keyword-editor-input");

			$(_this).width((dynamicWidth)+ 20);

			if ((e.keyCode == 32) 
				&& ((textInput.replace(/ /g, '')).length > 0)){
					
				$(_this).before(`<span class="item"><span class="keyword">${textInput}</span><i class="fas fa-times"></i></span>`);
				$(_this).val('');

				$(_this).width(19);

				emptyVal = true;

				$(_this).parent().children(":last").after(_this);
				$(_this).focus();
					
			}
		},100)
		
	}).on("focusout", function(){
		const _this = $(this);
		setTimeout(function(){
			const keywordsQueued = $(_this).closest(".keyword-editor-input").find(".item");
			if (keywordsQueued.length < 1){
				$(_this).attr("placeholder", "Keyword..").width(150);
			}
		},100);
	})

	$(".keyword-editor-input").on("click", ".item", function(){

		// const content = $(".keyword", this).html();
		const inputElement = $(".keyword-editor-input input");
		// const itemPosition = $(this).index();
		// // parentElement = $("#input-keyword-search");
		// console.log(content);
		// inputElement.width($(this).width());
		// inputElement.val(content);
		// $(this).after(inputElement);
		
		inputElement.focus();

		$(this).remove();
		
	})



	$(".research-viewable").on("click", ".name", function(e){
	})
	

});
