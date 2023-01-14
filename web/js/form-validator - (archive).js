
// show error message
function throwerrormessage(selector, message){
	selector.css({
		'border-color' : 'red'
	})

	//select prev siblings 'message error'
	selector.prev();
	selector.prev().html(message);
}

// remove error message
function removeerrormessage(selector){

	//select prev siblings 'message error'
	selector.prev().empty();
	selector.attr('style', ''); //remove inline style 
}



$(document).ready(function(){


	function validate(targetForm){

		// confirm button click /
		$(".confirm-form-button").on("click", function(){
			
			let approvedInput = true;
			$(this).closest(".form-validation").find("[class*='input-']").each(function(){

				if ($(this).attr("data-validation") != "optional"){

					// select the first class of an element. *"input-" should always first in html
					
					// Valide if all required inputs are not empty 
					if (($(this).attr("class").split(' ')[0] != "input-collect")){
						if (($(this).val().replace(/\s/g, '').length == 0 ) && !($(this).attr("disabled") == "disabled")){
							
							throwerrormessage($(this), "Can't be empty")
							approvedInput = false;

						}else{
							removeerrormessage($(this));
						}
					}

					// Validate Date format
					if ($(this).attr("class").split(' ')[0] == "input-date-started"){
						//  later...
					}
				}

			})

			$(".item-container").each(function(){
				const type = $(this).attr("id").substring(0, $(this).attr("id").indexOf("-"));

				if (($(this).children().length  < 1) && ($(this).attr("data-validation") != "optional")){
					throwerrormessage($(this).prev(), "Please select atleast one "+ type +".");
				}else{
					removeerrormessage($(this));
				}
			})


			if (approvedInput){

			}else{
				showDialogBox("error", "Some fields require an actions.");
			}

		})
	}

	$(".form-validation [class*='input-']").on("inputs", function(){
		removeerrormessage($(this));
	})
})