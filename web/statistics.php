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
	<link rel="icon" href="assets/x.png">
	<title>Statistic report</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/statistics.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
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
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/researchjs.js"></script>
	<script type="text/javascript" src="js/add-research.js"></script>

	<script type="text/javascript" src="js/datepicker.js"></script>
	<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
	<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script> -->

	<!-- <script type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.2/Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css"/>

	<script type="text/javascript" src="js/statistic-report.js"></script>

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
					Statistic report
				</div>
				
				<div class="dir">
					<!-- Research > Add research -->
				</div>

			</div>
			<div class="sub-inner-content">
				<div class="additional-details">
					
					<div class="textarea-query" data-query="">
						<div class="queued-query">
							
						</div>
						<input type="text" id="input-query">
					</div>
					
					<div class="dropdown-suggestions">
						<div class="dropdown-item-c" data-num="1">
							Number of all researches
						</div>
						<div class="dropdown-item-c" data-num="2">
							by year 2018
						</div>
						<div class="dropdown-item-c" data-num="3">
							from College of Science
						</div>
					</div>
					<!-- <select>
						<option>Number of researches</option>
						<option>Number of new researches</option>
						<option>Number of on going researches</option>
						<option>Number of finished researches</option>
						<option>Number of author</option>
					</select>
					<select>
						<option>by this week</option>
						<option>by this month</option>
						<option>by this year</option>
						<option>by last year</option>
						<option>by [year]:</option>
						<option>from [date] to [date]:</option>
					</select>
					<select>
						<option>from all colleges	</option>
						<option>from college of science</option>
						<option>from college of nursing</option>
						<option>from college of veterenary medicine</option>
						<option>from college of law</option>
						<option>from college of education</option>
						<option>from college of business administration</option>
						<option>from college of arts and literature</option>
						<option>from college of engineering</option>
						<option>from college of agriculture</option>
					</select>
					<select>
						<option>in UEP main</option>
						<option>in UEP Lao-ang</option>
					</select> -->
				</div>
			</div>
			<div class="sub-inner-content">
				<div class="additional-details">
					<div class="canvas-container">
						<div class="canvas-item">
							<canvas id="myChart" width="100" height="20"></canvas>
						</div>
					</div>
					
				</div>
			</div>
			
		
			

			
		</div>
	</div>

	<!-- <div class="footer">
		<div class="">
			©2017-2020 University of Eastern Philippines
		</div>
	</div> -->

	<!-- this should be renamed dialog box -->
	
	<!-- <div class="pop-up-quick-add-keyword">
		<div class="pop-container col-md-4 col-sm-6">
			<div class="pop-up-header">
				Quick add keyword
			</div>
			<div class="pop-up-body">
				<label for="quick-add-keyword">Can add one/more at the same time.</label>
				<input type="text" name="quick-add-keyword" id="quick-add-keyword">
				<div class="-quick-keyword-container">
					<div class="quick-keyword">
						<span>Agriculture<i class="fas fa-times remove-keyword"></i></span>
						<input type="hidden" name="keyword"  value="Web">
					</div>
					<div class="keyword">
						<span>Education<i class="fas fa-times remove-keyword"></i></span>
						<input type="hidden" name="keyword" value="Education">
					</div>
				</div>
				<span class="info"></span>
			</div>
			<div class="pop-up-footer">
				<input type="button" name="add-keyword-button" value="submit">
			</div>
		</div> -->
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