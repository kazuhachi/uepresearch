<?php
    // session_start();

    function checkPrivilageAndConnect(){

        $connection = new Connection;
        $connection -> crede_au();
        $conn = $connection -> connect();

        $token = null;
        if ((isset($_SESSION['token'])) && (!is_null($_SESSION['token']))){
            $token = $_SESSION['token'];

            $sqlStr = "SELECT u.UserType FROM users u INNER JOIN usersessions us ON u.UserId = us.UserId WHERE us.Token = '$token'";
                $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error());
                if (mysqli_num_rows($result) > 0){
                    while ($row = $result -> fetch_row()){

                        $_SESSION['role'] = $row[0];

                        $conn = $connection -> connectByRole($row[0]);
                        return $conn;
                        
                    }
                }
        }else{
            $connection -> crede_v();
            $conn = $connection -> connect();
            return $conn;
        }

        
    }

    
?>