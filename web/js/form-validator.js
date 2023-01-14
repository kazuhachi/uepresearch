
// show error message
function throwerrormessage(selector, message){
	selector.css({
		'border-color' : 'red'
	})

	//select prev siblings 'message error'
	selector.prev();
	selector.siblings(".error-msg").html(message);
}

// remove error message
function removeerrormessage(selector){

	//select prev siblings 'message error'
	selector.siblings(".error-msg").empty();
	selector.attr('style', ''); //remove inline style 
}


function isValidForm(targetForm){

	// confirm button click /
		let approvedInput = true;
		targetForm.find("[class*='input-']").each(function(){


			if ($(this).attr("data-validation") != "optional"){

				// select the first class of an element. *"input-" should always first in html
				
				// Valide if all required inputs are not empty 
				if (($(this).attr("class").split(' ')[0] != "input-collect")){

					if (($(this).val().replace(/\s/g, '').length == 0 ) 
					&& !($(this).attr("disabled") == "disabled")){
						
						

						throwerrormessage($(this), "Can't be empty");
						approvedInput = false;

					}else{

						removeerrormessage($(this));

						// validate INPUT DATES
						if (($(this).attr("class").includes("input-date")) 
						&&	(!($(this).attr("disabled") == "disabled"))){

							if (!isValidDate($(this).val())){

								throwerrormessage($(this), "Invalid input!");
								approvedInput = false;
							}
						}

						
					}
				}
			}else{
				
			}

		})

		targetForm.find(".item-container").each(function(){
			const type = $(this).attr("id").substring(0, $(this).attr("id").indexOf("-"));
			if (($(this).children('.item').length  < 1) 
			&& ($(this).attr("data-validation") != "optional")){

				if (type == "page"){
					throwerrormessage($(this).prev(), "Please append atleast one "+ type +".");
				}else{
					throwerrormessage($(this).prev().prev(), "Please select atleast one "+ type +".");	
				}
			
				
				approvedInput = false;
				
			}else{

				if (type == "page"){
					removeerrormessage($(this).prev());
				}else{
					removeerrormessage($(this).prev().prev());
				}
				
			}
		})

		if (approvedInput){
			return true;
			// showDialogBox()
		}else{
			// showDialogBox("error", "Some fields require an actions.");
			return false;
		}
}

$(document).ready(function(){

	$(".form-validation [class*='input-']").on("inputs", function(){
		removeerrormessage($(this));
	})
})


// author - Elian Ebbing -
// https://stackoverflow.com/questions/6177975/how-to-validate-date-with-format-mm-dd-yyyy-in-javascript

function isValidDate(dateString)
{

	// First check for the pattern
	if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
	return false;

	// Parse the date parts to integers
	var parts = dateString.split("/");
	var day = parseInt(parts[1], 10);
	var month = parseInt(parts[0], 10);
	var year = parseInt(parts[2], 10);

	// Check the ranges of month and year
	if(year < 1000 || year > 3000 || month == 0 || month > 12)
		return false;

	var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

	// Adjust for leap years
	if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
		monthLength[1] = 29;

	// Check the range of the day

	return day > 0 && day <= monthLength[month - 1];
	
};

function resetForm (elemTarget, delay){
	setTimeout(function(){
		let target = elemTarget.closest(".form-validation");
		target.find("[class*='input-']").each(function(){
			
			$(this).prop('selectedIndex',0);
			$(this).children("option").removeAttr("selected")
	
			if (!($(target).attr("id") == "reset-search-button"))
			{
				removeerrormessage($(this));
			}

			if ($(this).hasClass("toggle-disable")){
				$(this).attr("disabled", "disabled");
			}

			$(this).val('');
		})
		target.find(".item-container").each(function(){
			$(".item", this).remove();
		})
		
	}, delay)
	

	
}