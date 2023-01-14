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
	<link rel="stylesheet" href="css/add-entry.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
	<script  type="text/javascript" src="js/form-validator.js"></script>
	<script  type="text/javascript" src="js/process/pr-logout.js"></script>
	<script  type="text/javascript" src="js/process/pr-announcement.js"></script>
	<script type="text/javascript" src="js/pop-up.js"></script>



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
	<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

 -->
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
					Add author
				</div>
				<div class="header-tag-separator">
					
				</div>
				<div class="dir">
					Author > Add author
				</div>

			</div>

			<div class="sub-inner-content">
				<div class="add-form-research">
					<form class="add-research-form form-validation" > 
						<div class="form-row">
							<div class="form-group col-md-12 col-sm-12">
								<label for="title">Title</label> <span class="error-msg"></span>
								<input type="text" class="input-announcement-title inputs" >								
							</div>
							<div class="form-group col-md-12 col-sm-12">
								<label for="title">Message</label> <span class="error-msg"></span>
								<textarea class="input-announcement-message inputs"></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col submit-buttons">
								<button class="add-research-button" id="add-announcent-button" onclick="return false">Confirm</button>
								<button class="reset-form-button" onclick="return false">Cancel</button> <!-- <span>or</span> <button></button> -->
							</div>
						</div>
					</form>
				</div>

			</div>
			<div class="sub-inner-content">
				<div class="table-nav-top">
					<div class="data-num">
						<label for="data-num-item">Announcements</label>
					</div>
				</div>
				<div class="table-container table-responsive-xl">
					<table class="table table-hover table- mx-1">
						<thead>
					    <tr data-rable="no" class="right-clickable">
                            <th scope="col"></th>
							<th scope="col" class="" style="text-align:center"><i class="fas fa-cogs"></i></th>
						    <th scope="col">Title</th>
						    <th scope="col">Message</th>
							<th scope="col">Datetime</th>
					    </tr>
					  </thead>
					  <tbody id="announcement-tdboy">
					    <tr class="right-clickable">
                            <th scope="row">1</th>
                            <td>1/24/2018</td>
                            <td>This website under goes dry run.</td>
                            <td>Click me</td>
					    </tr>
					    <tr class="right-clickable">
                            <th scope="row">2</th>
                            <td>1/23/2018</td>
                            <td>User manual</td>
                            <td>Click me</td>
					    </tr>
					    
					  </tbody>
					</table>
				</div>
			</div>
			
			
		</div>
	</div>

	<!-- this should be renamed dialog box -->
	<div class="pop-up-container" id="pop-up-announcement">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-5 p-0" >
			<div class="pop-up-header">	
				Edit annoucement
				<span class="close-pop-up" tooltip-title="Close">
					<i class="fas fa-times"></i>
				</span>
			</div>
			<div class="pop-up-body">
				<span>
					<label for="subject">
						Subject
					</label>
					<span class="error-msg"></span>
					<input type="text" class="input-edit-subject">
				</span>
				<label for="subject">
					Message
				</label>
				<span>
					<span class="error-msg"></span>
					<textarea class="input-edit-message"> </textarea>
				</span>
			</div>
			<div class="pop-up-footer">
				<input class="confirm-form-button" id="edit-announcement-button" type="button" name="Confirm" value="Confirm">
				<input class="reset-form-button" type="button" name="" value="Reset">
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