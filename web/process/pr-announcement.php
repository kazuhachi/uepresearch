<?php
    session_start();
    require_once("../../-r-conns/conn.php");
    require("author.php");
    require("privilage.php");

    $conn = checkPrivilageAndConnect();

    if ((isset($_POST['process'])) && ($_POST['process'] == "add-announcement")){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $sqlStr ="INSERT INTO `announcements`(`Title`, `Message`) VALUES ('$title', '$message')";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "add announcements");
    }



    if ((isset($_POST['process'])) && ($_POST['process'] == "edit-announcement")){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $sqlStr ="UPDATE `announcements` SET `Title`= '$title',`Message`= '$message' WHERE AnnouncementId = '$id'";
        $result = mysqli_query($conn,$sqlStr) or  die ("error edit announcements");
    }

    if ((isset($_POST['process'])) && ($_POST['process'] == "delete-announcement")){
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $sqlStr ="DELETE FROM `announcements` WHERE AnnouncementId = '$id'";
        $result = mysqli_query($conn,$sqlStr) or  die ("error deleting announcement");
    }

    if ((isset($_POST['process'])) && ($_POST['process'] == "get-announcement")){
        $announcements = array();

        $sqlStr ="SELECT * FROM `announcements`";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error(). "get announcements");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                array_push($announcements, [
                    "id" => $row[0],
                    "title" => $row[1],
                    "message" => $row[2],
                    "date" => $row[3]
                ]);
            }

            echo json_encode($announcements);
        }else{
            echo "No data";
        }
    }

?>