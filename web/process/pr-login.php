<?php
    require("../../-r-conns/conn.php");
    include_once("browser-info.php");
    session_start();
    
    if ((isset($_POST['process'])) && ($_POST['process'] == "login") ){

        $connection = new Connection;
        $connection -> crede_au();
        $conn = $connection -> connect();

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);       

        $sqlStr = "SELECT *  FROM `users` WHERE  BINARY UserName = '$username' LIMIT 1";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error(). " query: select users");

        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                 if (password_verify($password, $row[3])) {
                    // setCredentials Cookie
                    // $cookieUserPass = $row[2]."|".$row[3];
                    // setcookie("_cred",  $cookieUserPass, time() + (86400 * 7), "/"); // 86400 = 1 day  setcookie("user", "", time() - 3600); DEL


                    $randHash = md5(rand());
                    $ipAddress = getIPAddess();
                    $device = $_SERVER['HTTP_USER_AGENT'];
                    
                    

                    $sqlStr = "SELECT * FROM `usersessions` WHERE UserId = '$row[0]' LIMIT 1";
                    $result2 = mysqli_query($conn, $sqlStr) or die(mysqli_error(). " query: select usersession");

                    if (mysqli_num_rows($result2) > 0){
                        $sqlStr = "UPDATE `usersessions` SET `IPAdress`= '$ipAddress',`Device`= '$device',`Token`= '$randHash' WHERE UserId = '$row[0]'";   
                        mysqli_query($conn, $sqlStr) or die(mysqli_error(). " query: update new usersession");

                    }else{
                        $sqlStr = "INSERT INTO `usersessions`(`UserId`,`IPAdress`, `Device`, `Token`) VALUES ($row[0],'$ipAddress', '$device', '$randHash')";
                        mysqli_query($conn, $sqlStr) or die(mysqli_error(). " query: insert new usersession");
                    }
                    $_SESSION['userName'] = $row[4];
                    $_SESSION['token'] = $randHash;
                    
                    echo "sucess log in";
                 }else{
                     echo "Wrong credentials";
                 }
            }
        }else{
            echo "wrong credentials";
        }
            
    }


    if ((isset($_POST['process'])) && ($_POST['process'] == "logout")){
        session_destroy();
        header("Location: /login");
    }



    
?>
