<?php

    session_start();
    require("../../-r-conns/conn.php");


    if (isset($_POST['process']) && ($_POST['process'] == "getIndex")){
        $lastIndex;


        $sqlStr = "INSERT INTO `researchfile` (`FileName`, `ResearchId`) VALUES (NULL, NULL);";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error());
        
        $lastIndex = mysqli_insert_id($conn);
    }

?>