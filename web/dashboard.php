<?php
	require("../-r-conns/conn.php");
	include_once("process/browser-info.php");
	require("../-r-conns/token.php");
	include_once("process/privilage.php");
	session_start();
	checkPrivilageAndConnect();
	

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
	<link rel="icon" href="assets/x.png">
	<title>Welcome - Dashboard</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
	<script  type="text/javascript" src="js/process/pr-logout.js"></script>
	<script  type="text/javascript" src="js/process/pr-announcement.js"></script>
	


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
	<script type="text/javascript" src="js/main.js"></script>


	<script>
		$(document).ready(function(){
			// getAnnouncementsforDashboard();
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
<?php 

	if((isset($_SESSION['role']) && ($_SESSION['role'] == "Administrator"))){
		echo    "<div class='nav-group'>
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
				</div>";
	}
?>				
				
			</div>
		</div>
		<div class="inner-content">
			<div class="header-content">
				<div class="header-tag">
					Dashboard
				</div>
				<div class="header-tag-separator">
					
				</div>
				<div class="dir">
					<!-- Research > Add research -->
				</div>

			</div>
			<div class="sub-inner-content" >
				<div class="additional-details">
					<div class="greetings">
						Welcome back, 
<?php
	if (checkToken()){
						echo "<span id='name'>".$_SESSION['userName']."</span>";
	}
?>
					</div>
					
				</div>
			</div>
			<div class="row p-0 m-0">
				<div class="sub-inner-content col-sm-12 col-md-12" >
					<div class="additional-details">
						<div class="header-tag">
							Announcement
						</div>
						<div class="collapsable-div" id="announcements-container">
							<div class="collapsable-item">
								<div class="collapse-header">
									<div class="collapser">
										<button><i class="fas fa-angle-right"></i></button>
									</div>
									<div class="collapser-head">
										This website under goes dry run.
									</div>
								</div>
								<div class="collapse-body">
									<span >Date: 2019-7-21</span><br><br>
									This website may run for some error or display unneccessary information. We need your feedback to improve user experience.
									This website may run for some error or display unneccessary information. We need your feedback to improve user experience.
									This website may run for some error or display unneccessary information. We need your feedback to improve user experience.
									<div class="collapse-signature">
										From: I.T. management
									</div>
								</div>
								
							</div>
							<div class="collapsable-item">
								<div class="collapse-header">
									<div class="collapser">
										<button><i class="fas fa-angle-right"></i></button>
									</div>
									<div class="collapser-head">
										User manual
									</div>
								</div>
								<div class="collapse-body">
									Please click this  
									<span class="link">
										<a href="http://uep-research.com/user-manual-0.0.1">
											link
										</a>
									</span>
									to redirect to website user manual.
									Please click this  
									<span class="link">
										<a href="http://uep-research.com/user-manual-0.0.1">
											link
										</a>
									</span>
									to redirect to website user manual.
									Please click this  
									<span class="link">
										<a href="http://uep-research.com/user-manual-0.0.1">
											link
										</a>
									</span>
									to redirect to website user manual.
									Please click this  
									<span class="link">
										<a href="http://uep-research.com/user-manual-0.0.1">
											link
										</a>
									</span>
									to redirect to website user manual.

									<div class="collapse-signature">
										From: I.T. management
									</div>
								</div>
								
							</div>
						</div>

					</div>
				</div>
			</div>
			
			<div class="row p-0 m-0">
				<div class="sub-inner-content col-sm-12 col-md-6" style="border-right: 1px solid #ccc" >
					<div class="additional-details">
						<div class="header-tag">
							Activity history
						</div>
						<!-- <div class="list-info">
							<div class="">
								<span class="date-time">7:24 3/31/2016</span>
							</div>
							<div class="">
								<span class="action">Add research</span>
							</div>
							<div class="info">
								<span class="info">UEP web-based re...</span>
							</div>
						</div> -->
						<table class="dashboard-table table  table-sm table-hover table-">
							<thead>
								<tr data-rable="no">
									<th scope="col"></th>
									<th scope="col">Time date</th>
									<th scope="col">Action</th>
									<th scope="col">Detail</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>4:23 3/12/2017</td>
									<td>Add research</td>
									<td>UEP web-based re..</td>
								</tr>
								<tr>
									<td></td>
									<td>7:24 3/31/2016</td>
									<td>Update research</td>
									<td>Automated door for ...</td>
								</tr>
								<tr>
									<td></td>
									<td>8:56 7/05/2015</td>
									<td>Add Author</td>
									<td>Jonathan Alegre</td>
								</tr>
								<tr>
									<td></td>
									<td>7:24 3/31/2016</td>
									<td>Add presentation</td>
									<td>for UEP web-based</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="sub-inner-content col-sm-12 col-md-6">
					<div class="additional-details ">
						<div class="header-tag">
							Log history
						</div>
						<table class="dashboard-table table  table-sm table-hover table-  ">
							<thead>
								<tr data-rable="no">
									<td></td>
									<th scope="col">Time date</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>4:23 3/12/2017</td>
									<td>Log in</td>
								</tr>
								<tr>
									<td></td>
									<td>7:24 3/31/2016</td>
									<td>Log out</td>
								</tr>
								<tr>
									<td></td>
									<td>8:56 7/05/2015</td>
									<td>Log in</td>
								</tr>
								<tr>
									<td></td>
									<td>7:24 3/31/2016</td>
									<td>Log out</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- <div class="row p-0 m-0">
				
				<div class="sub-inner-content col-sm-12 col-md-6">
					<div class="additional-details ">
						<div class="header-tag">
							Reminder
						</div>
						<div class="item">
							
						</div>
					</div>
				</div>
			</div>
			 -->

			
		</div>
	</div>

	<!-- <div class="footer">
		<div class="">
			©2017-2020 University of Eastern Philippines
		</div>
	</div> -->

	<!-- this should be renamed dialog box -->


	<div class="sliding-dialog-box" data-slided="false">
		
		<div class="message">
			Opps. some field required some actions.
		</div>
		<div class="timer" data-time="2000">
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
</body>

</html>