<?php

    function checkToken($role = null){
        if ((isset($_SESSION['token'])) && (!is_null($_SESSION['token']))){
            $token = $_SESSION['token'];
            $ipAdress = getIPAddess();
    
            $connection = new Connection;
            $connection -> crede_au();
            $conn = $connection -> connect();
    
            $sqlStr = "SELECT us.Token, us.IPAdress, u.UserType FROM usersessions us INNER JOIN users u ON u.UserId = us.UserId WHERE Token = '$token' LIMIT 1";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error(). " query: select usersession by Token");
            if (mysqli_num_rows($result) > 0){
                while ($row = $result -> fetch_row()){
                    if ($row[1] == $ipAdress){
                        if ($role != null){
                            if ($role == $row[2])
                                return true;
                            else
                                return false;
                        }else{
                            return true;
                        }
                    }else{
                        $sqlStr = "DELETE FROM `usersessions` WHERE Token = '$token'";
                        return false;
                    }
                }
            }else
                return false;
    
        }
    }
?>