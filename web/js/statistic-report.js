$(document).ready(function(){
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ['2012','2013','2014','2015','2016','2017',],
	        datasets: [{
	            label: 'number of researches made from 2012 - 2017',
	            type: 'line',
	            data: [40,45,48,57, 55, 70],
	            fill: 'false',
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255, 99, 132, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    callback: function(value, index, values){
	                    	return '' + value;		
	                    }
	                }
	            }]
	        }
	    }
	});


	$("#input-query").on("focus", function(){
		const dropdown = $(".dropdown-suggestions");
		const targetPosY = $(".textarea-query").offset().bottom + 15;
		const targetPosX = $(this).offset().left;

		console.log(`${targetPosX} ,  ${targetPosY}`);
		dropdown.css({
			top: targetPosY,
			left: targetPosX,
			display: 'block'
		})
	})




	$(".textarea-query").on("click", function(){
		$("#input-query").focus();	
	})

	console.log($(".textarea-query").offset().bottom);	



	let backslashtimes = 0;
	let recenDel = false;
	let recenLength = 0;
	let imedDel = false;

	$("#input-query").on("keyup", function(e){

		const key = e.keyCode || e.charCode;
		const length = $(this).val().length;
		console.log(length + " " +recenLength);

		$(".dropdown-item-c").show();

		if( key == 8 || key == 46 ){
			if ((length == 0) && (recenLength == 1)){
				imedDel = false;
			}else if ((length == 0)&& (recenLength == 0)){
				imedDel = true;
			}

			if(($(this).val() == "") && ( imedDel)){
				$(".queued-query div:last-child").remove();
				backslashtimes = 0;
				imedDel = true;
			}else{
				recenDel = false;	
			}

			$(".dropdown-item-c").hide();
		}

		recenLength = length;
	})	

	$(".dropdown-item-c").on("click", function(){
		const datanum = $(this).attr("data-num");
		
		$(this).parent().hide();
		const html = $(this).html();
		$(".queued-query").append(`<div class="queued-item">${html}</div>`);

		$(".textarea-query").attr("data-query", "1");

	})
})