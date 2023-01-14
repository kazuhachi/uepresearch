<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/x.png">
	<title>Welcome - Dashboard</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<link rel="stylesheet" href="css/research-list.css">
	
	
	<script type="text/javascript" src="js/jquery.js"></script>

	<script type="text/javascript" src="js/process/pr-research-preview-ini.js"></script>

	<!-- APIs -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->

	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->

	<!-- <sript type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></sript> -->

	<!-- /APIs -->


	<!-- my script -->
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/researchjs.js"></script>
	<script type="text/javascript" src="js/add-research.js"></script>
	<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
	<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

	
 -->
	 <!-- overrides styles -->
	 <script>
		 $(document).ready(function(){
			
		 })
	</script>
 	<style>	
		html, body{
			width: 1000px;
			margin: 0 auto;
		}
		 *{
			 color: #4f4f4f;
		 }
		 .inner-body{
			 margin: 0;
		 }

		 .item-detail-container{
			 background-color: transparent;
		 }
	 </style>
	</head>
<body>
	
	<div class="banner container">
		<div class="row justify-content-center">
			<div style="display: inline-block; text-align: right;" class="col-2">
				<img src = "assets/x.png" style="width: 100px;">
			</div>
			<div class="col-5" style="text-align: center; font-weight: bold;">
				
				<div style="display: inline-block;">
					<br>
					<span>Republic of the Philippines</span><br>
					<span>University of Eastern Philippines</span><br>
					<span>University Town, Catarman, Northern Samar</span>
				</div>
			</div>
			<div style="display: inline-block; text-align: left;" class="col-2">
				<img src = "assets/y.png" style="width: 100px;">
			</div>
		</div>
	</div>
	
	<div class="inner-body">
		
		
		<div class="inner-content">

			<div class="sub-inner-content" id="research-prev" style="border-bottom: none">
				<div class="additional-details">
					<div class="research">
						<div class="header-tag">
							
						</div>
						<div class="research-details-container" data-research-id="" id="research-preview-container"> 
							<div class="row p-0 m-0">
								<div class="col-md-6 item-detail-container">
									<label class="item-label">Title</label>
									<div class="item-detail" id="preview-title">
										
									</div>
								</div>
								<div class="col-md-6 item-detail-container">
									<label class="item-label">Authors</label>
									<div class="item-detail" id="preview-authors">
									</div>
								</div>
							</div>
							<div class="row p-0 m-0">
								
								<div class="col-sm-3 item-detail-container">
									<label class="item-label">Status</label>
									<div class="item-detail">
										<div class="" id="preview-status">
											
										</div>
									</div>
								</div>
								<div class="col-sm-3 item-detail-container">
									<label class="item-label">Date started</label>
									<div class="item-detail" >
										<div class="" id="preview-date-started">
											
										</div>
									</div>
								</div>
								<div class="col-sm-3 item-detail-container">
									<label class="item-label">Date finished</label>
									<div class="item-detail">
										<div class="" id="preview-date-finished">
											
										</div>
									</div>
								</div>
								<div class="col-sm-3 item-detail-container">
									<label class="item-label">Campus</label>
									<div class="item-detail">
										<div class="" id="preview-campus">
											
										</div>
									</div>
								</div>
								<div class="col-sm-3 item-detail-container">
									<label class="item-label">Keywords</label>
									<div class="item-detail" id="preview-keywords">
										
									</div>
								</div>
								
								<div class="col-sm-3 item-detail-container">
									<div class="item-detail">
										<div class="counter" id="journal-counter" data-scroll-to="journal">
											<span class="counter-label">Journals</span>
											<span class="counter-num">(3)</span>
										</div>
										<div class="counter"  id="presentation-counter" data-scroll-to="presentation">
											<span class="counter-label">Presentations</span>
											<span class="counter-num">(2)</span>
										</div>
										<div class="counter"  id="fund-source-counter" data-scroll-to="fundSource">
											<span class="counter-label">Fund sources</span>
											<span class="counter-num">(2)</span>
										</div>
										<div class="counter"  id="patent-counter" data-scroll-to="patent">
											<span class="counter-label">Patent</span>
											<span class="counter-num">(0)</span>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="sub-inner-content col-lg-12 col-md-12  col-sm-12" style="padding-bottom: 75px;">
				<div class="additional-details">
					<div class="presentation">
						<div class="header-tag" style="text-align: center;">
							Abstract
						</div>
						<div id="abstract-body" style="padding: 0px 20px;">

						</div>
					</div>
				</div>
			</div>
			<div class="row m-0 p-0		">
				<div class="sub-inner-content col-lg-12 col-md-12 col-sm-12">
					<div class="additional-details">
						<div class="journal">
							<div class="header-tag">
								Journals
							</div>
							<div class="list">
								<!-- <div class="no-data">
									No Data
								</div> -->
								<div class="table-container table-responsive-xl px-3">
									<table class="table table-bordered thead-colored table-hover table-md ">
											<tr>
												<th scope="col">
												
												</th>
												<th scope="col">Book title</th>
												<th scope="col">Volume issue no.</th>
												<th scope="col">Page number</th>
												<th scope="col">Date published</th>
												<th scope="col">Publication type</th>
											</tr>
										<tbody id="journal-tbody">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="sub-inner-content col-lg-12 col-md-12  col-sm-12">
					<div class="additional-details">
						<div class="presentation">
							<div class="header-tag">
								Presentation
								
							</div>
							<div class="list">
								<div class="table-container table-responsive-xl px-3">
									<table class="table table-bordered thead-colored table-hover table-md ">
										
											<tr>
												<th scope="col">
													
												</th>
												<th scope="col">Conference title</th>
												<th scope="col">Conference venue</th>
												<th scope="col">Date presented</th>
												<th scope="col">Conference type</th>
												<th scope="col">Organizer</th>
											</tr>
										
										<tbody id="presentation-tbody">
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="sub-inner-content col-lg-12 col-md-12  col-sm-12"  >
					<div class="additional-details">
						<div class="fundSource">
							<div class="header-tag">
								Fund Source
								
							</div>
							<div class="list">
								<!-- <div class="no-data">
									No Data
								</div> -->
								<div class="table-container table-responsive-xl px-3">
									<table class="table table-bordered thead-colored table-hover table-md ">
										
											<tr>
												<th scope="col">
													
												</th>
												<th scope="col">Fund source</th>
												<th scope="col">Date from</th>
												<th scope="col">Date to</th>
												<th scope="col">Amount</th>
												<th scope="col">Is external</th>
											</tr>
										
										<tbody id="fund-tbody">
											<tr>
												<!-- <th scope="row">1</th>
												<td>Self-funded</td>
												<td>03/15/2012</td>
												<td>05/15/2012</td>
												<td>Php. 10,000</td>
												<td>Yes</td> -->
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="sub-inner-content col-lg-12 col-md-12  col-sm-12">
					<div class="additional-details">
						<div class="patent">
							<div class="header-tag">
								Patent
								
							</div>
							<div class="list">
								<!-- <div class="no-data">
									No Data
								</div> -->
								<div class="table-container table-responsive-xl px-3">
									<table class="table table-bordered thead-colored table-hover table-md ">
										
											<tr>
												<th scope="col">
													
												</th>
												<th scope="col">Patent Number</th>
												<th scope="col">Date patented</th>
												<th scope="col">Utilization of invention</th>
												<th scope="col">Remark</th>
											</tr>
										
										<tbody id="patent-tbody">
											<tr>
												<!-- <th scope="row">1</th>
												<td>#1938-338-2213</td>
												<td>07/28/2017</td>
												<td>Service</td>
												<td>none</td> -->
											</tr>
										</tbody>
									</table>
								</div>
							</div>						
									
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
	<!-- <center>- - -  End - - - </center> -->
	
</body>

</html>