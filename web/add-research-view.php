<?php
	require("../-r-conns/conn.php");
	include_once("process/browser-info.php");
	require("../-r-conns/token.php");
	
	session_start();

?>


<!DOCTYPE html>
<html>

<?php
	if (!checkToken()){
		// echo "<script type='text/javascript'>
		// 		window.location = '/login'
		// 	  </script>";

		
	}
?>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/x.png">
	<title>Welcome - Dashboard</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<link rel="stylesheet" href="css/research-list.css">
	
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/form-validator.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/pop-up.js"></script>

	<script type="text/javascript" src="js/process/pr-add-research.js"></script>
	<script type="text/javascript" src="js/process/pr-get-research.js"></script>
	<script type="text/javascript" src="js/process/pr-college-fund-source.js"></script>
	<script type="text/javascript" src="js/process/pr-research-preview-ini.js"></script>
	<script  type="text/javascript" src="js/process/pr-logout.js"></script>

	<!-- APIs -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->

	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	<sript type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></sript>

	<!-- /APIs -->

	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />

	<!-- my script -->
	<script type="text/javascript" src="js/researchjs.js"></script>
	<script type="text/javascript" src="js/add-research.js"></script>


	<script type="text/javascript" src="js/datepicker.js"></script>
	<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
	<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

 -->
	</head>
<body>
	<div class="loading-bar">
	</div>
	<div class="header">
		<div class="left-header">


<?php
	if (checkToken()){
		echo "<div class='slide-cont'>
				<div class='btn-slide-cont border-rad-1 cus-btn' tooltip-title='Toggles navigation'>
					<i class='fas fa-bars'></i>
				</div>
			</div>";
	}
?>
			
			<div class="web-name-cont">
				<div class="web-name">
					UEP Research Clearing House
				</div>
			</div>
		</div>
		<div class="right-header">			
			<div class="quick-acc-cont " >
				<div class="quick-acc-profile cus-btn border-rad-1 float-right">
<?php
	if (checkToken()){
		echo "<div class='name border-rad-1'>
				<span class='user-ico'>
					<i class='fas fa-user-alt icos'></i>
				</span>
				<span class='user-label'>".
					$_SESSION['userName']
				."</span>
			</div>
			<div class='option border-rad-1' id='profile-option'>
				<div class='item'>
					<i class='fas fa-user-alt'></i>
					My Profile
				</div>
				<div class='item' id='logout-button'>
					<i class='fas fa-sign-out-alt'></i> 
					Log out
				</div>
			</div>
			";
	}else{
		echo "<a href='/login'>
				<div class='name border-rad-1'>
					<span class='user-ico'>
						<i class='fas fa-user-alt icos'></i>
					</span>
					<span class='user-label'>
						Log in
					</span>
				</div>
			</a>
				";
	}
?>

					
				</div>
			</div>
		</div>
	</div>
	<div class="inner-body">
<?php
	if (checkToken()){
	echo "
		<div class='nav-list-cont' data-visible='yes'>
			<div class='logo-container'>
				<img src='assets/x.png'>
			</div>
			<div class='nav-list'>
				<div class='nav-group'>
					<div class='nav-item-separator'>
						Main
					</div>
					<div class='nav-item-cont'>
						<a href='dashboard.html'>
							<div class='nav-item' id='research-nav'>
								<i class='fas fa-th icos'></i> 
								<div class='nav-name'>Dashboard</div>
							</div>
						</a>
					</div>
					
					<div class='nav-item-cont'>
						<a href='statistics.html'>
							<div class='nav-item' id='research-nav'>
								<i class='fas fa-chart-bar icos'></i>
								<div class='nav-name'>Statistics</div>
							</div>
						</a>
					</div>
				</div>
				<div class='nav-group'>
					<div class='nav-item-separator'>
						Researches
					</div>
					<div class='nav-item-cont'>
						<div class='nav-item selected' id='research-nav'>
							<i class='fas  fa-book icos'></i> 
							<div class='nav-name'>Research</div>
							<i class='fas fa-angle-right'	data-rotated='false'></i>
						</div>
						<div class='sub-nav'>
							<a href='research-list.html'>
								<div class='sub-nav-item selected'>Research List</div>
							</a>
							<a href='add-research.html'>
								<div class='sub-nav-item'>Add Research</div>
							</a>
						</div>

					</div>
					<div class='nav-item-cont'>
						<div class='nav-item' id='author-nav'>
							<i class='fas fa-user-alt icos'></i>
							<div class='nav-name'>Author</div>
							<i class='fas fa-angle-right'	data-rotated='false'></i>
						</div>
						<div class='sub-nav'>
							<a href='author-list.html'>
								<div class='sub-nav-item'>Author List</div>
							</a>
							<a href='award-list.html'>
								<div class='sub-nav-item'>Award</div>
							</a>
							<a href='add-author.html'>
								<div class='sub-nav-item'>Add Author</div>
							</a>
						</div>
					</div>
					<div class='nav-item-cont'>
						<a href='college.html'>
							<div class='nav-item' id='college-nav'>
								<i class='fas fa-school icos'></i>
								<div class='nav-name'>College</div>
							</div>
						</a>
					</div>
					<div class='nav-item-cont'>
						<a href='fund-source.html'>
							<div class='nav-item' id='fund-nav'>
								<i class='fas fa-wallet icos'></i>
								<div class='nav-name'>Fund Source</div>
							</div>
						</a>
					</div>
				</div>
				<div class='nav-group'>
					<div class='nav-item-separator'>
						Management
					</div>
					<div class='nav-item-cont'>
						<a href='users.html'>
							<div class='nav-item' id='research-nav'>
								<i class='fas fa-users icos'></i>
								<div class='nav-name'>Users</div>
							</div>
						</a>
						<a href='announcement.html'>
							<div class='nav-item' id='research-nav'>
								<i class='fas fa-bullhorn icos'></i>
								<div class='nav-name'>Announcement</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		";
	}
?>
		<div class="inner-content">
			<!-- <div class="header-content">
				<div class="header-tag">
					Recent added research
				</div>
				<div class="header-tag-separator">
					
				</div>
				<div class="dir" >
					Research > Add research
				</div>
			</div> -->


			<div class="sub-inner-content" id="research-prev">
				<div class="additional-details">
					<div class="research">
						<div class="header-tag">
							Research
							<div style="display: inline-block; float: right">
<?php
	if (checkToken()){
		echo"					<button class='additional-details-add-button pop-up-button' data-pop-up-target-id='pop-up-edit-research' 
								id='edit-research' tooltip-title='Edit this research'><i class='fas fa-edit'></i> Edit</button>";
}
?>
								<button class="additional-details-add-button" id="print-research" tooltip-title="print research"><i class="fas fa-print"></i> Print</button>
							</div>
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
									<label class="item-label">Abstract</label>
									<div class="item-detail">
										
										<div class="view-abstract pop-up-button" data-pop-up-target-id="pop-up-abstract" data-id="" 	id="preview-abstract" tooltip-title="click to view abstract">
											click here to view
										</div>
									</div>
								</div><div class="col-sm-3 item-detail-container">
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
			<div class="row m-0 p-0		">
				<div class="sub-inner-content col-lg-12 col-md-12 col-sm-12"  >
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
										<thead>
											<tr>
												<th scope="col">
<?php
	if (checkToken()){
		echo"									<button class='additional-details-add-button pop-up-button' id='add-journal-btn' 
												data-pop-up-target-id='pop-up-journal' tooltip-title='Add new journal'><i class='fa fa-plus' aria-hidden='true'></i></button>";
	}
?>
												</th>
												<th scope="col">Book title</th>
												<th scope="col">Volume issue no.</th>
												<th scope="col">Page number</th>
												<th scope="col">Date published</th>
												<th scope="col">Publication type</th>
											</tr>
										</thead>
										<tbody id="journal-tbody">
											<!-- <tr>
												<th scope="row">1</th>
												<td>Journey to the center of the earth</td>
												<td>ISUE #28827710-32</td>
												<td>[1-9], [100-101], [102, 105]</td>
												<td>01/31/2001</td>
												<td>International</td>
											</tr> -->
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
								<!-- <div class="no-data">
									No Data
								</div> -->
								<div class="table-container table-responsive-xl px-3">
									<table class="table table-bordered thead-colored table-hover table-md ">
										<thead>
											<tr>
												<th scope="col">
<?php
	if (checkToken()){
		echo"	
													<button class='additional-details-add-button pop-up-button' id='add-presentation' data-pop-up-target-id='pop-up-presentation' tooltip-title='Add new presentation'><i class='fa fa-plus' aria-hidden='true'></i></button>";
	}
?>
												</th>
												<th scope="col">Conference title</th>
												<th scope="col">Conference venue</th>
												<th scope="col">Date presented</th>
												<th scope="col">Conference type</th>
												<th scope="col">Organizer</th>
											</tr>
										</thead>
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
										<thead>
											<tr>
												<th scope="col">
<?php
	if (checkToken()){
		echo"	
													<button class='additional-details-add-button pop-up-button' id='add-fund-source' data-pop-up-target-id='pop-up-fund-source' tooltip-title='Add new fund'><i class='fa fa-plus' aria-hidden='true'></i></button>";
	}
?>
												</th>
												<th scope="col">Fund source</th>
												<th scope="col">Date from</th>
												<th scope="col">Date to</th>
												<th scope="col">Amount</th>
												<th scope="col">Is external</th>
											</tr>
										</thead>
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
										<thead>
											<tr>
												<th scope="col">
<?php
	if (checkToken()){
		echo"	
													<button class='additional-details-add-button pop-up-button' id='add-patent' data-pop-up-target-id='pop-up-patent' tooltip-title='Add new patent'><i class='fa fa-plus' aria-hidden='true'></i></button>";
	}
?>
												</th>
												<th scope="col">Patent Number</th>
												<th scope="col">Date patented</th>
												<th scope="col">Utilization of invention</th>
												<th scope="col">Remark</th>
											</tr>
										</thead>
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

	<!-- this should be renamed dialog box -->
	<div class="pop-up-container">
    	<div class="pop-container col-md-5 col-sm-8" >
      		<div class="pop-up-header">	
				<span class="pop-up-type">Alert</span>
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				
			</div>
			<div class="pop-up-footer">
				
			</div>
		</div>	
	</div>

	<div class="sliding-dialog-box" data-slided="false">
		
		<div class="message">
			Opps. some field required some actions.
		</div>
		<div class="timer" data-time="2000">
		</div>
	</div>

	</div>

	<div class="pop-up-container" id="pop-up-journal">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-5 p-0 " data-id="" >
			<div class="pop-up-header">	
				<span class="header-text">
					Journal
				</span>
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">	
				<label for="book">
					Book Title
				</label>
				 <span class="error-msg"></span>
				<textarea type="text" id="book" class="input-book-title" name="book-title"></textarea>

				<label for="volume-issue">
					Volume issue number
				</label>
				 <span class="error-msg"></span>
				<input type="text" id="volume-issue"  class="input-volume-issue" name="book-title">

				<label for="page-number">
					Page number
				</label>

				 <span class="error-msg"></span>
				<input type="text" id="page-number" class="input-collect" name="book-title"	placeholder="ex. 99-102">
				<div class="item-container" id="page-container">
					<button class="add-page" disabled>add</button>
					<!-- <div class="item" id="page">
						<div>1-4<i class="fas fa-times remove-item"></i></div>
					</div> -->
				</div>

				<label for="date-published">
					Date published
				</label>
				 <span class="error-msg"></span>
				<input type="text" id="date-published" class="input-date-published" name="date-published" data-toggle="datepicker" autocomplete="off"/>

				<label for="publication-type">
					Publication type
				</label>
				 <span class="error-msg"></span>
				<select type="text" id="date-published" class="input-publication-type" name="publication-type">
					<option>National</option>
					<option>International</option>
				</select>
			
			</div>
			<div class="pop-up-footer">
				<input class="confirm-form-button" id="journal-button" type="button" name="Confirm" value="Confirm">
				<input class="reset-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>
	<div class="pop-up-container" id="pop-up-presentation">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-5 p-0 " >
			<div class="pop-up-header">	
				<span class="header-text">
					Presentation
				</span>
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<label for="Conference-title">
					Conference title
				</label>
				<span class="error-msg"></span>
				<input type="text" id="conference-title" class="input-conference-title" name="conference-title">

				<label for="volume-issue">
					Conference venue
				</label>
				<span class="error-msg"></span>
				<input type="text" id="conference-venue" class="input-conference-venue" name="conference-venue">

				<label for="page-number">
					Date presented
				</label>
				<span class="error-msg"></span>
				<input type="text" id="date-presented" class="input-date-presented" name="date-presented"	data-toggle="datepicker" autocomplete="off">

				<label for="conference-type">
					Conference type
				</label>
				<span class="error-msg"></span>
				<select type="text" id="conference-type" class="input-conference-type" name="conference-type">
					<option>Regional</option>
					<option>National</option>
					<option>International</option>
				</select>

				<label for="organizer">
					Organizer
				</label>
				<span class="error-msg"></span>
				<input type="text" id="organizer" class="input-organizer" name="organizer">
			
			</div>
			<div class="pop-up-footer">
				<input class="confirm-form-button" id="presentation-button" type="button" name="Confirm" value="Confirm">
				<input class="reset-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>
	<div class="pop-up-container"  id="pop-up-fund-source">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-5 p-0 " >
			<div class="pop-up-header">	
				<span class="header-text">
					Fund source
				</span>
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<label for="fund-source">
					Fund-source
				</label>
				<span class="error-msg"></span>
				<!-- <input type="text" id="fund-source" class="input-fund-source" name="fund-source"> -->
				<select type="text" id="fund-source" class="input-fund-source" name="fund-source">
					<option>Self-funded</option>
					<option>CHED</option>
					<option>LGU</option>
					<option>add new fund source..</option>
				</select>

				<label for="date-from">
					Date from
				</label>
				<span class="error-msg"></span>
				<input type="text" id="date-from" class="input-date-from" name="date-from"	data-toggle="datepicker" autocomplete="off">

				<label for="page-number">
					Date to
				</label>
				<span class="error-msg"></span>
				<input type="text" id="date-to" class="input-date-to" name="date-to" data-toggle="datepicker" autocomplete="off">
				<label for="fund-amount">
					Amount
				</label>
				<span class="error-msg"></span>
				<input type="text" id="fund-amount" class="input-fund-amount" name="organizer">
				<label for="is-external">
					Is external
				</label>
				<span class="error-msg"></span>
				<select type="text" id="is-external" class="input-is-external" name="is-external">
					<option>Yes</option>
					<option>No</option>
				</select>

			
			</div>
			<div class="pop-up-footer">
				<input class="confirm-form-button" id="fund-source-button" type="button" name="Confirm" value="Confirm">
				<input class="reset-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>
	<div class="pop-up-container" id="pop-up-patent">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-5 p-0 " >
			<div class="pop-up-header">	
				<span class="header-text">
					Patent
				</span>
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<label for="patent-id-number">
					Patent I.D. number
				</label>
				<span class="error-msg"></span>
				<input type="text" id="patent-id-number"  class="input-patent-id-number" name="patent-id-number">

				<label for="date-issue">
					Date patented
				</label>
				<span class="error-msg"></span>
				<input type="text" id="date-issue" name="date-issue"  class="input-date-issue" data-toggle="datepicker" autocomplete="off"/>

				<label for="utilization">
					Utilization of invention
				</label>
				<span class="error-msg"></span>
				<select type="text" id="utilization"  class="input-utilization" name="utilization" >
					<option>Development</option>
					<option>Service</option>
					<option>End-product</option>
				</select>
				<label for="remark">
					Remark
				</label>
				<span class="error-msg"></span>
				<textarea type="text" id="remark" class="input-remark" name="remark" data-validation="optional"></textarea>
			
			</div>
			<div class="pop-up-footer">
				<input class="confirm-form-button" id="patent-button" type="button" name="Confirm" value="Confirm">
				<input class="reset-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>
	


	<div class="pop-up-container"  id="pop-up-edit-research">
		<div class="pop-container form-validation col-md-10 col-sm-10  col-lg-7 p-0" >
			<div class="pop-up-header">	
				Edit research
				<span class="close-pop-up" id="close-edit-research" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<div class="form-row">
					<div class="form-row col-12">
						<div class="form-group col-md-6 ">
							<label for="title">Title</label> <span class="error-msg"></span>
							<textarea name="title" class="input-title inputs" data-error-msg="" id="title"></textarea>
						</div>


						<div class=" form-group col-md-6 ">
							<div class="expandable-container">
								<div class="abstract-container" style="background-color: white;">
									<label for="title">Abstract</label> <span class="error-msg">
									</span>
									<span class="close-expandable">
										<button class="additional-details-add-button"  tooltip-title="Close">
											Done
										</button>
									</span>
									<textarea name="abstract" class="input-abstract inputs" data-error-msg="" id="abstract"></textarea>
									<span class="expand-btn">
										<button class="additional-details-add-button expand-btn"  tooltip-title="expand">
											<i class="fas fa-expand"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
						
					</div>

					<div class="form-row col-12">
						<div class="form-group col-md-6">
						
							<label for="title">Author</label> <span class="error-msg"></span>
							<input type="text" class="inputs dropdown-input"  id="input-author" data-target-dropdown="author-dropdown" placeholder="Search" autocomplete="off">
						
							

							<div class="dropdown-suggestion" id="author-dropdown" target-container="author-container">
								<div class="suggestions">
									
								</div>
								<div id="add-suggestion-option" class="pop-up-button" data-pop-up-target-id="pop-up-quick-add-author">
									<i class="far fa-plus-square"></i>Click here to add new author.
								</div>
							</div>

							<div class="item-container" id="author-container">
								
							</div>
						</div>

						<div class="form-group col-md-6">

							<label for="title">Keyword</label> <span class="error-msg"></span>
							<input type="text" class="inputs dropdown-input" id="input-keyword"  data-target-dropdown="keyword-dropdown" placeholder="Search" autocomplete="off">
							<div class="dropdown-suggestion" id="keyword-dropdown" target-container="keyword-container">
								<div class="suggestions">
									
								</div>
								<div id="add-suggestion-option" class="pop-up-button" data-pop-up-target-id="pop-up-quick-add-keyword">
									<i class="far fa-plus-square"></i>Click here to add new keyword.
								</div>
							</div>


							<div class="item-container" id="keyword-container" data-validation="optional">
								
							</div>
						</div>
					</div>

					
				</div>

				<div class="form-row">
					<div class="form-group col-ms-3 col-md-6">
						<label for="title">Status</label> <span class="error-msg"></span>
						<select  name="status" class="input-status inputs">	
							<option>New</option>
							<option>On going</option>
							<option>Finished</option>
						</select>
					</div>
					<div class="form-group col-ms-3 col-md-6">
						<label for="title">Campus</label> <span class="error-msg"></span>
						<select  name="status" class="input-campus inputs">
							<option>UEP</option>
							<option>Lao-ang</option>
							<option>Add new campus...</option>
						</select>
					</div>		
					<div class="form-group col-ms-3 col-md-6">
						<label for="title">Date Started</label> <span class="error-msg"></span>
						<input type="text" name="date started" class="input-date-started inputs" data-toggle="datepicker" autocomplete="off" readonly="readonly">
					</div>	
					<div class="form-group col-ms-3 col-md-6">
						<label for="title">Date finished</label> <span class="error-msg"></span>
						<input type="text" name="date started" class="input-date-finished inputs" data-toggle="datepicker" autocomplete="off" disabled="disabled" readonly="readonly">
					</div>
				</div>


			</div>
			<div class="pop-up-footer">
				<input class="confirm-dialog-button" id="update-research-button" type="button" name="Confirm" value="Confirm">
				<input class="reset-form-button" id="cancel-form-button" type="button" name="" value="Cancel">
			</div>

		</div>
	</div>
	<div class="pop-up-container" id="pop-up-abstract" data-author-id="">
		<div class="pop-container form-validation col-md-8 col-sm-8  col-lg-8 p-0" >
			<div class="pop-up-header">	
				Abstract
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>

			<div class="pop-up-body" id="abstract-body">

			</div>
		</div>
	</div>

	<div class="pop-menu" oncontextmenu="return false">
		<div class="pop-item">
			<i class="fas fa-edit"></i>
			<div class="item-name">modify</div>
		</div>
		<div class="pop-item">
			<i class="fas fa-eye"></i>
			<div class="item-name">Show Abstract</div>
		</div>
	</div>

	<div class="pop-up-container" id="pop-up-add-fund-source">
		<div class="pop-container col-md-6 col-sm-8  col-lg-5 p-0" >
			<div class="form-validation">
				<div class="pop-up-header">	
					Add fund source <span class="icon-guide"><i class="far fa-plus-square"></i></span>
					<span class="close-pop-up" tooltip-title="Close">
						<i class="fas fa-times"></i>
					</span>
				</div>
				<div class="pop-up-body">
						<label for="title">Fund source name</label> <span class="error-msg"></span>
						<input type="text" class="input-add-fund-source-name" name="fund-source-name">
				</div>
				<div class="pop-up-footer">
					<input type="button" id="add-fund-source-button" class="confirm-form-button" name="Confirm" value="Confirm">
					<input type="button" class="reset-form-button" name="" value="Cancel">
				</div>
			</div>
		</div>
	</div>

	<div class="pop-up-container" id="pop-up-quick-add-author" data-author-id="">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-4 p-0" >
			<div class="pop-up-header">	
				Quick add author
				<span class="close-pop-up">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<label for="input-edit-firstname">
					Firstname
				</label>
				<span class="error-msg"></span>
				<input type="text" id="input-edit-firstname"  class="input-input-edit-firstname" name="input-edit-firstname">
				
				<label for="input-edit-middlename">
					Middlename
				</label>
				<span class="error-msg"></span>
				<input type="text" id="input-edit-middlename"  class="input-input-edit-middlename" name="input-edit-middlename" data-validation="optional">

				<label for="input-edit-lastname">
					Lastname
				</label>
				<span class="error-msg"></span>
				<input type="text" id="input-edit-lastname"  class="input-input-edit-lastname" name="input-edit-lastname">

				<label for="edit-contact-number">
					Contact number
				</label>
				<span class="error-msg"></span>
				<input type="text" id="edit-contact-number" name="edit-contact-number"  class="input-edit-contact-number" data-validation="optional">

				<label for="input-edit-email">
					E-mail
				</label>
				<span class="error-msg"></span>
				<input type="text" id="input-edit-email" name="input-edit-email"  class="input-input-edit-email" data-validation="optional">

				<label for="input-edit-address">
					Address
				</label>
				<span class="error-msg"></span>
				<input type="text" id="input-edit-address" name="input-edit-address"  class="input-input-edit-address" data-validation="optional">

				<label for="edit-input-college">
					College
				</label>
				<span class="error-msg"></span>
				<select type="text" id="input-edit-college"  class="input-edit-input-college" name="edit-input-college" data-validation="optional">
					<option class="College-of-science">College of science</option>
					<option class="College-of-nursing">College of nursing</option>
					<option class="College-of-veterenary-medicine">College of veterenary medicine</option>
					<option class="College-of-law">College of law</option>
					<option class="College-of-education">College of education</option>
					<option class="College-of-business-administration">College of business administration</option>
					<option class="College-of-arts-and-literature">College of arts and literature</option>
					<option class="College-of-engineering">College of engineering</option>
					<option class="College-of-agriculture">College of agriculture</option>
				</select>
			</div>
			<div class="pop-up-footer">
				<input id="edit-quick-author-form-button" class="confirm-form-button" type="button" name="Confirm" value="Add">
				<input class="cancel-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>

	<div class="pop-up-container" id="pop-up-quick-add-keyword" data-author-id="">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-4 p-0" >
			<div class="pop-up-header">	
				Add new keyword
				<span class="close-pop-up">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<label for="keyword-name">
					Keyword
				</label>
				<span class="error-msg"></span>
				<input type="text" id="input-keyword-name"  class="input-keyword-name" name="input-keyword-name">

			</div>
			<div class="pop-up-footer">
				<input id="add-quick-keyword-form-button" class="confirm-form-button" type="button" name="Confirm" value="Add">
				<input class="cancel-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>
</body>

</html>