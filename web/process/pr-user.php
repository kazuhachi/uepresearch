<?php
    session_start();
    require_once("../../-r-conns/conn.php");
    require("author.php");
    require("privilage.php");

    $conn = checkPrivilageAndConnect();
    
    if ((isset($_POST['process'])) && ($_POST['process'] == "add-user")){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sqlStr = "SELECT * FROM `users` WHERE BINARY UserName = '$username'";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "check for username duplication");
        if (mysqli_num_rows($result) <= 0){
            $sqlStr =  "INSERT INTO `users`(`UserType`, `UserName`, `Password`, `Name`) VALUES ('$role', '$username', '$password', '$name')";
            $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "get users and session");
        }else{
            echo "username is taken";
        }
    }

    if ((isset($_POST['process'])) && ($_POST['process'] == "edit-user")){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $role = mysqli_real_escape_string($conn, $_POST['role']);


        $sqlStr = "SELECT * FROM `users` WHERE BINARY UserName = '$username' AND UserId <> '$id'";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "check for username duplication");
        if (mysqli_num_rows($result) <= 0){
            $sqlStr =  "UPDATE `users` SET  name = '$name', UserName = '$username',  UserType = '$role' WHERE `users`.`UserId` = '$id';";
            $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "update users ");
        }else{
            echo "username is taken";
        }
    }

    if ((isset($_POST['process'])) && ($_POST['process'] == "get-user")){
        $users = array();

        $sqlStr = "SELECT u.UserId ,u.Name, u.UserType, u.UserName, us.IPAdress, us.Device, us.SessionActiveTime FROM usersessions us RIGHT JOIN users u ON u.UserId = us.UserId";

        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "get users and session");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                $row[4] = $row[4] == null ? '-' : $row[4];
                $row[5] = $row[5] == null ? '-' : $row[5];
                $row[6] = $row[6] == null ? '-' : $row[6];

                array_push($users,[
                    "id" => $row[0],
                    "name" => $row[1],
                    "role" => $row[2],
                    "username" => $row[3],
                    "ip" => $row[4],
                    "device" => $row[5],
                    "lastsession" => $row[6]
                ]);
            }

            echo json_encode($users);
        }else{
            echo "no data";
        }
    }

    if ((isset($_POST['process'])) && ($_POST['process'] == "change-user-pass")){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sqlStr = "UPDATE `users` SET `Password` = '$password' WHERE `users`.`UserId` = '$id';";
        $result = mysqli_query($conn,$sqlStr) or  die ("Error changing password");
    }

    

?>