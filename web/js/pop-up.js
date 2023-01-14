document.addEventListener("DOMContentLoaded",function(){
});

class PopUp{

	constructor(button){
		this.button = button; 		
	}


	show(speed){

		// console.log(this.button.html());
		let target = $(this.button).attr("data-pop-up-target-id");
		this.target= target;

		// console.log(target);

		

		$("[id ='"+ target +"']").fadeIn(speed).css({
			display : 'block'
		});
		
		$("body").css({
			'overflow': 'hidden'
		})

	}

	close(speed){
		let target = $(this.button).closest(".pop-up-container");
		$(target).fadeOut(speed);

		$("body").css({
			'overflow': ''
		})
	}

	getPopUpID(){
		return this.target;
	}

	

	

}


class dialogBox{
	constructor(reply){
		this.reply = reply;
	}

	show(speed){
		$("#pop-up-dialog").fadeIn(speed).css({
			display : 'flex'
		});

			
		$(".confirm-dialog-button").on("click", function(){
			return "confirm";
		})
		

		// function waitClick(callback){
		// 	$(".confirm-dialog-button").on("click", function(){
		// 		callback();
		// 	})
		// }

		// waitClick(function(){
		// 	alert("yes");
		// })
		
	}

	
}


