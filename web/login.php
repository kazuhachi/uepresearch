<?php
    require("../-r-conns/conn.php");
    include_once("process/browser-info.php");
    require("../-r-conns/token.php");

    session_start();
    if (checkToken())
        header("Location: /dashboard");
?>



<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/x.png">
	<title>Log in</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/add-entry.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/tooltip.js"></script>
    <script type="text/javascript" src="js/process/pr-login.js"></script>
    <script type="text/javascript" src="js/form-validator.js"></script>



	<!-- APIs -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	<sript type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></sript>

    
</head>
<body>
    <div class="login-main-content">
            <div class="card-login-container form-validation">
                <div class="header-login">
                    <img src="/assets/w.png">
                </div>
                <div class="login-inputContainer">
                    <div class="inputs-container " style="margin-bottom: 10px">
                        <label><i class="fas fa-user-alt icos"></i>Username</label>
                        <input type="text" class="input-username" id="login-username-input">
                    </div>
                    <div class="inputs-container">
                        <label><i class="fas fa-key"></i></i>Password</label>
                        <input type="password" class="input-password" id="login-password-input">
                    </div>
                    <div class="show-password-container">
                        <i class="fas fa-eye"></i><span>Show password</span>
                        <!-- <i class="fas fa-eye-slash"></i> -->
                    </div>

                    <input type="button" id="login-button"value="Log in">

                    <div class="prev-link">
                        <a href="/search-research.php">Go back</a>
                    </div>
                </div>
            </div>
    </div>
    <div class="slide-container">
        <div class="message">
            Error! Username or password is incorrect.
        </div>
    </div>
    

</body>
</html>