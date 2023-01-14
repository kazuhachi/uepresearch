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
	<meta name="description" content="University of Eastern Philippines Research Clearing House">
	<meta name="keywords" content="uep, Research, university of eastern philippines, uepresearch.com">
	<link rel="icon" href="assets/x.png">
	<title>Add research - UEP Research Clearing House</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<link rel="stylesheet" href="css/research-list.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/form-validator.js"></script>
	<script type="text/javascript" src="js/process/pr-add-research.js"></script>
	<script type="text/javascript" src="js/process/pr-upload-file.js"></script>
	<script type="text/javascript" src="js/pop-up.js"></script>
	<script type="text/javascript" src="js/pop-up-edit-data.js"></script>
	<script type="text/javascript" src="js/process/pr-research-ini.js"></script>
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

	 <!-- Initiate -->
	<script type="text/javascript">
	 	$(document).ready(function(){
			getResearchData(5);
		 })
	</script>

	
</head>
<body>
	<div class="loading-bar">
	</div>
	<div class="header">
		<div class="left-header">
			<div class="slide-cont">
				<div class="btn-slide-cont border-rad-1 cus-btn">
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
					Add research
				</div>
				<div class="header-tag-separator">
					
				</div>
				<div class="dir">
					Research > Add research
				</div>

			</div>

			<div class="sub-inner-content" id="research-add">
				<div class="form-validation">
						<div class="form-row">
							<div class="form-row col-12">
								<div class="form-group col-md-6 ">
									<label for="title">Title</label> <span class="error-msg"></span>
									<textarea name="title" class="input-title inputs" data-error-msg="" id="title"></textarea>
								</div>


								<div class=" form-group col-md-6 ">
									<!-- <label for="abstract">Abstract</label> <span class="error-msg"></span>
									<input type="file" class="input-file-abstract inputs" accept=".txt, .docx, .doc"  id="fileToUpload" nam="file-upload">
							
									<div class="abstract-input cont row m-0 p-0">
										<div class="insert-abstract col-6">
											<div class="insert-abstract-btn" >
												<div>
													<i class="fa fa-upload" aria-hidden="true"></i>
												</div>
												<div>
													Upload document <br>
													[ .docx  | .txt ]
												</div>
											</div>
										</div>
										<div class="file-info col-6">
											<div class="file-name">
											</div>
											<textarea name="title" class="input-abstract inputs" data-error-msg="" id="abstract"></textarea>
										</div>
									</div> -->
									<label for="title">Abstract</label> <span class="error-msg"></span>
									<textarea name="abstract" class="input-abstract inputs" data-error-msg="" id="abstract"></textarea>
								</div>
								
							</div>

							<div class="form-row col-12">
								<div class="form-group col-md-6">
								
									<label for="title">Author</label> <span class="error-msg"></span>
									<input type="text" class="inputs dropdown-input"  id="input-author" data-target-dropdown="author-dropdown" placeholder="Search" autocomplete="off">
								
									<!-- <datalist id="author-dropdown-list" class="dropdown-suggestion">
										
									</datalist> -->
									<div class="dropdown-suggestion" id="author-dropdown" target-container="author-container">
										<div class="suggestions">
											
										</div>
										<div id="add-suggestion-option" tabindex="0" class="pop-up-button" data-pop-up-target-id="pop-up-quick-add-author">
											<i class="far fa-plus-square"></i>Click here to add new author.
										</div>
									</div>

									<div class="item-container" id="author-container">
										<!-- <div class="item" id="author">
											<div><span class="name"> Mark Vincent Gonzaga</span> <i class="fas fa-times remove-item"></i></div>
										</div>
										<div class="item" id="author">
											<div><span class="name"></span>Dimple Ballete</span> <i class="fas fa-times remove-item"></i></div>
											<input type="hidden"  name="author" value="Dimple Ballete">
										</div>
										<div class="item" id="author">
											<div><span class="name"></span>Kevyn Bogtong</span><i class="fas fa-times remove-item"></i></div>
											<input type="hidden"  name="author" value="Kevyn Bogtong">
										</div>
										<div class="item" id="author">
											<div><span class="name"></span>Jonathan Alegre</span><i class="fas fa-times remove-item"></i></div>
											<input type="hidden"  name="author" value="Jonathan Alegre">
										</div> -->
									</div>
								</div>

								<div class="form-group col-md-6">

									<label for="title">Keyword</label> <span class="error-msg"></span>
									<input type="text" class="inputs dropdown-input" id="input-keyword"  data-target-dropdown="keyword-dropdown" placeholder="Search" autocomplete="off">
									<div class="dropdown-suggestion" id="keyword-dropdown" target-container="keyword-container">
										<div class="suggestions">
											<!-- <div class="suggestion-item" data-id=""><span class="name">Web</span><span class="counter">(192)</span></div>
											<div class="suggestion-item" data-id=""><span class="name">Agriculture</span><span class="counter">(104)</span></div> -->
										</div>
										<div id="add-suggestion-option" class="pop-up-button" data-pop-up-target-id="pop-up-quick-add-keyword">
											<i class="far fa-plus-square"></i>Click here to add new keyword.
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
								<input type="text" name="date started" class="input-date-finished inputs toggle-disable" data-toggle="datepicker" autocomplete="off" disabled="disabled" readonly="readonly">
							</div>
						</div>


						<div class="form-row">
							<div class="form-group col submit-buttons">
								<button id="add-research-button" class="confirm-form-button" onclick="return false">Confirm</button>
								<button class="reset-form-button" onclick="return false">Cancel</button> 
							</div>
						</div>
				</div>

			</div>
			<div class="sub-inner-content">
				<div class="table-nav-top">
					<div class="data-num">
						<label for="data-num-item">Recent added researches</label>
					</div>

					<!-- <div class="search-container">

						<div class="search-box border-rad-1">
							<input type="text" class="search-research" placeholder="title..">
							<i class="fas fa-search"></i>
						</div>
						<div class="adv-search-container border-rad-1">
							Advance search
							<i class="fas fa-ellipsis-v"></i>
						</div>

					</div> -->
				</div>
				<div class="table-container table-responsive-xl">
					<table class="table table-bordered table-hover research-table-data">
						<thead>
					    <tr data-rable="no">
						    <th scope="col"></th>
						    <th scope="col">Title</th>
						    <th scope="col">Authors</th>
						    <th scope="col">Campus</th>
						    <th scope="col">Status</th>
						    <th scope="col">Date completed</th>
							<th scope="col">Date finished</th>
							<th scope="col">Joun</th>
							<th scope="col">Presented</th>
							<th scope="col">Funded</th>
						    <th scope="col">Patented</th>
					    </tr>
					  </thead>
					  <tbody id="research-table-body">
					    <!-- <tr class="research-viewable" data-id="00000000044">
						    <th scope="row">1</th>
						    <td>Web-based Research Clearing House</td>
						    <td>Mark , Dimple, Kevyn, Jonathan</td>
						    <td>UEP</td>
						    <td>New</td>
						    <td>Feb 10, 2018</td>
							<td>-</td>
							<td>Yes</td>
						    <td>Yes</td>
						    <td>No</td>
					    </tr>
					    <tr>
						    <th scope="row">2</th>
						    <td>Jacob</td>
						    <td>Thornton</td>
						    <td>UEP</td>
						    <td>Finished</td>
						    <td>Jul 10, 2018</td>
						    <td>Jan 10, 2018</td>
							<td>No</td>
							<td>No</td>
						    <td>No</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td colspan="2">Larry the Bird</td>
						    <td>Lao-ang</td>
						    <td>On going</td>
						    <td>Feb 10, 2018</td>
							<td>-</td>
							<td>No</td>
						    <td>Yes</td>
						    <td>Yes</td>
					    </tr> -->
					  </tbody>
					</table>
				</div>
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

	<div class="pop-up-container" id="pop-up-abstract" data-author-id="">
		<div class="pop-container form-validation col-md-8 col-sm-8  col-lg-8 p-0" >
			<div class="pop-up-header">	
				Abstract
				<span class="close-pop-up">
					<i class="fas fa-times"></i>
				</span>
			</div>

			<div class="pop-up-body" id="abstract-body">

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
						<span>Agriculture<i class="fas fa-times remove-item"></i></span>
						<input type="hidden" name="keyword"  value="Web">
					</div>
					<div class="keyword">
						<span>Education<i class="fas fa-times remove-item"></i></span>
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
	<!-- <div class="pop-menu" oncontextmenu="return false">
		<div class="pop-item">
			<i class="fas fa-edit"></i>
			<div class="item-name">modify</div>
		</div>
		<div class="pop-item">
			<i class="fas fa-eye"></i>
			<div class="item-name">Show Abstract</div>
		</div>
	</div>
 -->

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
</body>

</html>