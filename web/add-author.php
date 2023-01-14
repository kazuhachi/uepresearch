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
	<title>Add author - UEP Research Clearing House</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/form-validator.js"></script>
	<script type="text/javascript" src="js/pop-up.js"></script>
	<script type="text/javascript" src="js/process/pr-author.js"></script>
	<script type="text/javascript" src="js/pop-up-edit-data.js"></script>
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
				<div class="form-validation">
						<div class="form-row">
							<div class="form-group col-md-4 col-sm-12">
								<label for="title">First name</label> <span class="error-msg"></span>
								<input type="text"  class="input-firstname inputs" name="firtsname" >								
							</div>

							<div class="form-group col-md-4 col-sm-12">
								<label for="title">Middle name</label> <span class="error-msg"></span>
								<input type="text" class="input-middlename inputs" name="middlename" data-validation="optional" >								
							</div>

							<div class="form-group col-md-4 col-sm-12">
								<label for="title">Last name</label> <span class="error-msg"></span>
								<input type="text" class="input-lastname inputs" name="lastname" >								
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6 col-sm-12">
								<label for="title">Contact number</label> <span class="error-msg"></span>
								<input type="text" class="input-phonenumber inputs" name="phonenumber" data-validation="optional">								
							</div>
							<div class="form-group col-md-6 col-sm-12">
								<label for="title">E-mail addres</label> <span class="error-msg"></span>
								<input type="text" class="input-email inputs" name="email" data-validation="optional">								
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6 col-sm-12">
								<label for="title">Address</label> <span class="error-msg"></span>
								<input type="text" class="input-address inputs" name="address" data-validation="optional">								
							</div>
							<div class="form-group col-md-6 col-sm-12">
								<label for="title">College</label> <span class="error-msg"></span>
								<select class="input-college inputs" name="college">
									<option>College of science</option>
									<option>College of nursing</option>
									<option>College of veterenary medicine</option>
									<option>College of law</option>
									<option>College of education</option>
									<option>College of business administration</option>
									<option>College of arts and literature</option>
									<option>College of engineering</option>
									<option>College of agriculture</option>
								</select>		
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col submit-buttons">
								<button id="add-author-form-button" class="confirm-form-button">Confirm</button>
								<button class="reset-form-button">Cancel</button>
							</div>
						</div>
				</div>

			</div>
			<div class="sub-inner-content">
				<div class="table-nav-top">
					<div class="data-num">
						<label for="data-num-item">Recent added authors</label>
					</div>
				</div>
				<div class="table-container table-responsive-xl">
					<table class="table table-bordered table-hover table- mx-1">
						<thead>
					    <tr data-rable="no">
						    <th scope="col"></th>
						    <th scope="col" class="sortable-th sort-name">Name</th>
						    <th scope="col" class="sortable-th">Contact number</th>
						    <th scope="col" class="sortable-th">E-mail address</th>
						    <th scope="col" class="sortable-th">Address</th>
						    <th scope="col" class="sortable-th">College</th>
					    </tr>
					  </thead>
					  <tbody id="recentAuthorTableList">
					    <!-- <tr>
						    <th scope="row">1</th>
						    <td>Mark Vincent Vega Gonzaga</td>
						    <td>0910 018 9922</td>
						    <td>mark@gmail.com</td>
						    <td>Allen, Northern Samar</td>
						    <td>College of Science</td>
					    </tr>
					    <tr>
						    <th scope="row">2</th>
						    <td>Dimple Regulacion Balleta</td>
						    <td>0981 123 3431</td>
						    <td>dimple@gmail.com</td>
						    <td>Catarman, Northern Samar</td>
						    <td>College of Science</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td>Kevyn Bogtong</td>
						    <td>0934 341 6522</td>
						    <td>kevyn@gmail.com</td>
						    <td>Allen, Northern Samar</td>
						    <td>College of Science</td>
					    </tr>
					    <tr>
						    <th scope="row">4</th>
						    <td>Jonathan Alegre</td>
						    <td>0972 653 2341</td>
						    <td>jonathan@gmail.com</td>
						    <td>Allen, Northern Samar</td>
						    <td>College of Science</td>
					    </tr> -->
					    
					  </tbody>
					</table>
				</div>
			</div>
			
			
		</div>
	</div>

	<!-- this should be renamed dialog box -->

	<!-- <div class="sliding-dialogbox">
		<div class="dialog-reply">
			<div class="message">
				
			</div>
			<div class="reply-buttons">
				<button class="confirm-dialog">Confirm</button>
				<button class="cancel-dialog">Cancel</button>
			</div>
		</div>
	</div>
	 -->

	<div class="pop-up-container" id="pop-up-edit-author" data-author-id="">
		<div class="pop-container form-validation col-md-6 col-sm-8  col-lg-4 p-0" >
			<div class="pop-up-header">	
				Edit author
				<span class="close-pop-up" tooltip-title="Close">
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
				<input id="edit-author-form-button" class="confirm-form-button" type="button" name="Confirm" value="Update">
				<input class="cancel-form-button" type="button" name="" value="Reset">
			</div>
		</div>
	</div>



	<div class="pop-up-container"  id="pop-up-dialog">
		<div class="pop-container form-validation col-md-4 col-sm-7  col-lg-3 p-0 mx-4" >
			<div class="pop-up-body">
				<div class="message">Are you sure?
				</div>
			</div>	
			<div class="pop-up-footer">	
				<input class="confirm-dialog-button" type="button" name="confirm" value="Confirm">
				<input class="cancel-dialog-button" type="button" name="cancel" value="Cancel">
			</div>
		</div>
	 </div>
	 <!-- $("#pop-up-dialog").css({display: 'flex'}) -->

	<div class="sliding-dialog-box" data-slided="false" >
		<div class="icon">
			<i class="fas fa-check"></i>
		</div>
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