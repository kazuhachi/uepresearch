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
		echo "<script type='text/javascript'>
				window.location = '/login'
			  </script>";		
	}
?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Research list</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/research-list.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/process/pr-research-ini.js"></script>
	<script type="text/javascript" src="js/add-research.js"></script>
	<script type="text/javascript" src="js/form-validator.js"></script>
	<script  type="text/javascript" src="js/process/pr-get-research.js"></script>
	<script  type="text/javascript" src="js/process/pr-logout.js"></script>



	<!-- APIs -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	<!-- /APIs -->

	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />

	<!-- my script -->
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/researchjs.js"></script>


	<script type="text/javascript" src="js/datepicker.js"></script>


	<!-- Initiate -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("#search-reseach-button").click();	
		})
   </script>


</head>
<body>
	<div class="loading-bar">
	</div>
	<div class="header">
		<div class="left-header">
			<div class="slide-cont">
				<div class="btn-slide-cont border-rad-1 cus-btn" tooltip-title="Toggles navigation">
					<i class="fas fa-bars"></i>
				</div>
			</div>
			<div class="web-name-cont">
				<div class="web-name">
					UEP Research Clearing House
				</div>
			</div>
		</div>
		<div class="right-header">			
			<div class="quick-acc-cont " >
				<div class="quick-acc-profile cus-btn border-rad-1 float-right">
					<div class="name border-rad-1">
						<span class="user-ico">
							<i class="fas fa-user-alt icos"></i>
						</span>
						<span class="user-label">
<?php
							echo $_SESSION['userName'];
?>
						</span>
					</div>
					<div class="option border-rad-1" id="profile-option">
						<div class="item">
							<i class="fas fa-user-alt"></i>
							My Profile
						</div>
						<div class="item" id="logout-button">
							<i class="fas fa-sign-out-alt"></i> 
							Log out
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="inner-body">
		<div class="nav-list-cont" data-visible="yes">
			<div class="logo-container">
				<img src="assets/x.png">
			</div>
			<div class="nav-list">
				<div class="nav-group">
					<div class="nav-item-separator">
						Main
					</div>
					<div class="nav-item-cont">
						<a href="dashboard.html">
							<div class="nav-item" id="research-nav">
								<i class="fas fa-th icos"></i> 
								<div class="nav-name">Dashboard</div>
							</div>
						</a>
					</div>
					
					<div class="nav-item-cont">
						<a href="statistics.html">
							<div class="nav-item" id="research-nav">
								<i class="fas fa-chart-bar icos"></i>
								<div class="nav-name">Statistics</div>
							</div>
						</a>
					</div>
				</div>
				<div class="nav-group">
					<div class="nav-item-separator">
						Researches
					</div>
					<div class="nav-item-cont">
						<div class="nav-item selected" id="research-nav">
							<i class="fas  fa-book icos"></i> 
							<div class="nav-name">Research</div>
							<i class="fas fa-angle-right"	data-rotated="false"></i>
						</div>
						<div class="sub-nav">
							<a href="research-list.html">
								<div class="sub-nav-item selected">Research List</div>
							</a>
							<a href="add-research.html">
								<div class="sub-nav-item">Add Research</div>
							</a>
						</div>

					</div>
					<div class="nav-item-cont">
						<div class="nav-item" id="author-nav">
							<i class="fas fa-user-alt icos"></i>
							<div class="nav-name">Author</div>
							<i class="fas fa-angle-right"	data-rotated="false"></i>
						</div>
						<div class="sub-nav">
							<a href="author-list.html">
								<div class="sub-nav-item">Author List</div>
							</a>
							 
							<a href="add-author.html">
								<div class="sub-nav-item">Add Author</div>
							</a>
						</div>
					</div>
					<div class="nav-item-cont">
						<a href="college.html">
							<div class="nav-item" id="college-nav">
								<i class="fas fa-school icos"></i>
								<div class="nav-name">College</div>
							</div>
						</a>
					</div>
					<div class="nav-item-cont">
						<a href="fund-source.html">
							<div class="nav-item" id="fund-nav">
								<i class="fas fa-wallet icos"></i>
								<div class="nav-name">Fund Source</div>
							</div>
						</a>
					</div>
				</div>
				<div class="nav-group">
					<div class="nav-item-separator">
						Management
					</div>
					<div class="nav-item-cont">
						<a href="users.html">
							<div class="nav-item" id="research-nav">
								<i class="fas fa-users icos"></i>
								<div class="nav-name">Users</div>
							</div>
						</a>
						<a href="announcement.html">
							<div class="nav-item" id="research-nav">
								<i class="fas fa-bullhorn icos"></i>
								<div class="nav-name">Announcement</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="inner-content">
			<div class="header-content">
				<div class="header-tag">
					Research List
				</div>
				<div class="dir">
					Research > Research List
				</div>

			</div>
			<div class="sub-inner-content">
				<!-- <div>Title</div> -->
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12 p-0">
						<div class="controls">
							<input type="text" id="title-search-input" placeholder="Title..">
							<span><i class="fa fa-search" aria-hidden="true"></i></span>

						</div>
						
					</div>
					<div class="advance-search-research form-validation" data-collapsed="no">
						<div class="row px-4">
							<!-- <div class="col-sm-6 col-md-6 col-lg-6 px-1">
								<div class="keyword-editor-input"></label>
									<input type="text" id="input-keyword-search" placeholder="Keyword.."> 
								</div>
								<span id="hidden-text-holder"></span>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 px-1">
								<div class="controls">
									<label>Author</label>
									<input type="text">
								</div>
							</div>
							 -->

							 <div class="col-12 px-0">
								 <div class="row px-3">
									<div class="col-md-6 px-1">
									
										<label for="title">Author</label> <span class="error-msg"></span>
										<input type="text" class="inputs dropdown-input"  id="input-author" data-target-dropdown="author-dropdown" placeholder="Search" autocomplete="off">

										<div class="dropdown-suggestion" id="author-dropdown" target-container="author-container">
											<div class="suggestions">
												
											</div>
										</div>

										<div class="item-container" id="author-container">

										</div>
									</div>

									<div class="col-md-6 px-1">

										<label for="title">Keyword</label> <span class="error-msg"></span>
										<input type="text" class="inputs dropdown-input" id="input-keyword"  data-target-dropdown="keyword-dropdown" placeholder="Search" autocomplete="off">
										<div class="dropdown-suggestion" id="keyword-dropdown" target-container="keyword-container">
											<div class="suggestions">
											</div>
										</div>


										<div class="item-container" id="keyword-container" data-validation="optional">
											<!-- <div class="item" id="keyword">
												<div><span class="keyword-name">Web</span><i class="fas fa-times remove-item"></i></div>
												<input type="hidden" name="keyword"  value="Web">
											</div>
											<div class="item" id="keyword">
													<div><span class="keyword-name">Education</span><i class="fas fa-times remove-item"></i></div>
													<input type="hidden" name="keyword" value="Education">
											</div> -->
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Status</label>
									<select class="input-status-search" name="Status">
										<option></option>
										<option>New</option>
										<option>On going</option>
										<option>Finished</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Date started</label>
									<input type="text" class="input-date-started-search"   name="Date started" data-toggle="datepicker" autocomplete="off">
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Date finished</label>
									<input type="text" class="input-date-finished-search"   name="Date finished" data-toggle="datepicker" autocomplete="off">
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Campus</label>
									<select class="input-campus-search"  name="Campus">
										<option></option>
										<option>UEP</option>
										<option>Lao-ang</option>
									</select>
								</div>
							</div>
							
							
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Presented</label>
									<select class="input-presented-search"  name="Is presented" >
										<option></option>
										<option>Yes</option>
										<option>No</option>
									</select>
								</div>
							</div>	
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Funded</label>
									<select class="input-funded-search"  name="Is funded">
										<option></option>
										<option>Yes</option>
										<option>No</option>
									</select>
								</div>
							</div>	
							<div class="col-sm-6 col-md-6 col-lg-4 px-1">
								<div class="controls">
									<label>Patented</label>
									<select class="input-patented-search"  name="Is patented">
										<option></option>
										<option>Yes</option>
										<option>No</option>
									</select>
								</div>
							</div>	
							
						</div>
					</div>
				</div>
				<div class="row p-0 research-search-button">
					<button class="submit-search-button" id="search-reseach-button">Search</button>
					<button id="reset-search-button" class="submit-search-button reset-form-button">Reset</button>
					<button class="advance-search-button">Advance search <i class="fas fa-angle-down toggle-arrow-advance"></i></button>
				</div>
			</div>
			<div class="sub-inner-content">
				<div class="search-info-container">
					<div class="search-info row">
						<div class="search-info-text col-12 col-sm-8 col-md-8 col-lg-8">
							<i class="fas fa-info-circle"></i> Showing result : <span class="search-info-text-val"></span>
						</div>
						<div class="total-result col-12 col-sm-4 col-md-4 col-lg-4">Total results :
							<span class="total-result-num">
								144
							</span>
						</div>
						
					</div>
				</div>
				<div class="table-nav-top">
					<div class="data-num">
						<label for="data-num-item">Show</label>
						<select id="data-num-item" class="data-num-item border-rad-1">
							<option>5</option>
							<option>10</option>
							<option>20</option>
							<option>50</option>
						</select>
						<label for="data-num-item">items</label>
					</div>

					<div class="data-navigator" data-num-all-result=''>
						<!-- <div class="start-nav" tooltip-title="Go to first page"> 
							<i class="fas fa-angle-double-left"></i>
							
						</div> -->
						<div class="prev-nav" tooltip-title="Go to previous page">
							<!-- <i class="fas fa-angle-double-left"></i> -->
							Prev
						</div>
						<div class="num-nav" >
							<div class="num-nav-item selected">
								1
							</div>
							<div class="num-nav-item">
								2
							</div>
							<div class="num-nav-item">
								3
							</div>
							<div class="num-nav-item">
								4
							</div>
							<div class="num-nav-item">
								5
							</div>
						</div>
						<div class="next-nav" tooltip-title="Go to next page">
							<!-- <i class="fas fa-angle-double-right"></i> -->
								Next
							</div>
						<!-- <div class="last-nav" tooltip-title="Go to last page">
							<i class="fas fa-angle-double-right"></i>
							
						</div> -->
					</div>
				
				</div>
				<div class="table-container table-responsive-xl research-table-data-container" >
					<div class="table-loader-container">
						
					</div>
					<table class="table table-bordered table-hover research-table-data">
						<thead>
					    <tr data-rable="no">
						    <th scope="col"></th>
						    <th scope="col" class="sortable-th">Title</th>
						    <th scope="col" class="sortable-th sort-name">Authors</th>
						    <th scope="col" class="sortable-th">Campus</th>
						    <th scope="col" class="sortable-th">Status		</th>
						    <th scope="col" class="sortable-th">Date completed</th>
							<th scope="col" class="sortable-th">Date finished</th>
							<th scope="col" class="sortable-th">Journals</th>
							<th scope="col" class="sortable-th">Presented</th>
							<th scope="col" class="sortable-th">Funded</th>
						    <th scope="col" class="sortable-th">Patented</th>
					    </tr>
					  </thead>
					  <tbody id="research-table-body">
						  
					  </tbody>
					</table>
				</div>
			
				<div class="table-nav-bottom resae">
					<div class="data-navigator" data-num-all-result=''>
						<!-- <div class="start-nav" tooltip-title="Go to first page"> 
							<i class="fas fa-angle-double-left"></i>
							
						</div> -->
						<div class="prev-nav" tooltip-title="Go to previous page">
							<!-- <i class="fas fa-angle-double-left"></i> -->
							Prev
						</div>
						<div class="num-nav" >
							<div class="num-nav-item selected">
								1
							</div>
							<div class="num-nav-item">
								2
							</div>
							<div class="num-nav-item">
								3
							</div>
							<div class="num-nav-item">
								4
							</div>
							<div class="num-nav-item">
								5
							</div>
						</div>
						<div class="next-nav" tooltip-title="Go to next page">
							<!-- <i class="fas fa-angle-double-right"></i> -->
								Next
							</div>
						<!-- <div class="last-nav" tooltip-title="Go to last page">
							<i class="fas fa-angle-double-right"></i>
							
						</div> -->
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	<!-- <div class="tooltip-cus tooltip-error">
		Field cannot be empty.
	</div> -->
	<!-- <div class="pop-menu" oncontextmenu="return false">
		<div class="pop-item">
			<i class="fas fa-edit"></i>
			<div class="item-name">modify</div>
		</div>
		<div class="pop-item">
			<i class="fas fa-eye"></i>
			<div class="item-name">Show Abstract</div>
		</div>
	</div> -->

	<div class="pop-author-details pop-menu" oncontextmenu="return false">
	
		<div class="item-detail">
			<label>Name </label>
			<span class="name">Luca Catto</span>
		</div>
		<div class="item-detail">
			<label>Contact </label>
			<span class="contact">09774778272</span>
		</div>
		<div class="item-detail">
			<label>E-mail </label>
			<span class="email">luca@gmail.com</span>
		</div>
		<div class="item-detail">
			<label>Address </label>
			<span class="address">Makati City</span>
		</div>
		<div class="item-detail">
			<label>College </label>
			<span class="college">College of Science</span>
		</div>
		
		<div class="spin-load">
			<span class="spin-logo">
				<i class="fas fa-circle-notch fa-spin"></i>
			</span>
		</div>
	</div>
	<!-- <div class="pop-research-menu pop-menu" oncontextmenu="return false">
		<div class="pop-item">
			<i class="fas fa-edit"></i>
			<div class="item-name">Authors</div>
		</div>
		<div class="pop-item">
			<i class="fas fa-eye"></i>
			<div class="item-name">Show full details</div>
		</div>
	</div> -->
</body>

</html>