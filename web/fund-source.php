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
	<title>Welcome - Dashboard</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/research-list.css">
	<script type="text/javascript" src="js/pop-up.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/form-validator.js"></script>
	<script type="text/javascript" src="js/process/pr-college-fund-source.js"></script>
	<script type="text/javascript" src="js/pop-up-edit-data.js"></script>
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
					Fund source
				</div>
				<div class="dir">

				</div>

			</div>
			<div class="sub-inner-content">
				<!-- <div>Title</div> -->
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12 p-0">
						<div class="controls">
							<!-- <label>Title</label> -->
							<input type="text" placeholder="">
							<span><i class="fa fa-search" aria-hidden="true"></i></span>
						</div>
					</div>
					
				</div>
				<div class="row p-0 research-search-button">
					<button class="submit-search-button">Search</button>
					<!-- <button class="advance-search-button">Advance search <i class="fas fa-angle-down toggle-arrow-advance"></i></button> -->
				</div>
			</div>
			<div class="sub-inner-content">
				<div class="table-nav-top">
					<div class="data-num">
						<label for="data-num-item">Fund sources</label>
					</div>
					<button class="additional-details-add-button pop-up-button" id="	utton" data-pop-up-target-id="pop-up-fund-source"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
				</div>
				<div class="table-container table-responsive-xl">
					<table class="table table-hover table- mx-1">
						<thead>
					    <tr data-rable="no">
						    <th scope="col"></th>
						    <th scope="col">Fund sources</th>
					    </tr>
					  </thead>
					  <tbody id="fundsourceList">
					    
					    
					  </tbody>
					</table>
				</div>
			</div>
			</div>
			
		</div>
	</div>

	<div class="pop-up-container" id="pop-up-fund-source">
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


	<div class="pop-up-container" id="pop-up-edit-fund-source">
		<div class="pop-container col-md-6 col-sm-8  col-lg-5 p-0" >
			<div class="form-validation">
				<div class="pop-up-header">	
					Edit fund source <span class="icon-guide"><i class="far fa-edit"></i></span>
					<span class="close-pop-up" tooltip-title="Close">
						<i class="fas fa-times"></i>
					</span>
				</div>
				<div class="pop-up-body">
						<label for="title">Fund source name</label> <span class="error-msg"></span>
						<input type="text" id="input-edit-fund-source-name" class="input-edit-fund-source-name" name="fund-source-name">
				</div>
				<div class="pop-up-footer">
					<input type="button" id="edit-fund-source-button" class="confirm-form-button" name="Update" value="Update">
					<input type="button" class="reset-form-button" name="" value="Cancel">
				</div>
			</div>
		</div>
	</div>


	<!-- <div class="tooltip-cus tooltip-error">
		Field cannot be empty.
	</div> -->
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

