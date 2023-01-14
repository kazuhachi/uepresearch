<?php
    session_start();
    require_once("../../-r-conns/conn.php");
    require("privilage.php");

    
    $conn = checkPrivilageAndConnect();


    // query ADD COLLEGE
    if ((isset($_POST['process'])) && ($_POST['process'] == "add-college")){

        $collegeName = mysqli_real_escape_string($conn, $_POST['collegeName']);

        $sqlStr = "INSERT INTO `uep_research`.`colleges` (`CollegeName`) VALUES ('{$collegeName}')";  
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error());

        $sqlStr = "SELECT * FROM (uep_research.colleges) ORDER BY CollegesId ASC LIMIT 1000";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

        refreshCollegeList($result);

    }

    //query EDIT COLLEGE    
    if ((isset($_POST['process'])) && ($_POST['process'] == "edit-college")){

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $collegeName = mysqli_real_escape_string($conn, $_POST['collegeName']);

        $sqlStr = "UPDATE `uep_research`.`colleges` SET `CollegeName`='$collegeName' WHERE `CollegesId`= '$id';";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
  

        $sqlStr = "SELECT * FROM (uep_research.colleges) WHERE `CollegesId` = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

        if (mysqli_num_rows($result) > 0)
		{
            $counter = 1;
			while ($row = $result -> fetch_row())
			{
                echo "
                        <th scope='row'>$counter</th>
                        <td>$row[1]</td>
                    ";
                $counter++;

            }
            
		}
        

    }
    
    //query ADD FUND SOURCE
    if ((isset($_POST['process'])) && ($_POST['process'] == "add-fund-source")){

        $fundSourceName = mysqli_real_escape_string($conn, $_POST['fundSourceName']);

        $sqlStr = "INSERT INTO `uep_research`.`funding` (`Agency`) VALUES ('$fundSourceName')";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
  

        $sqlStr = "SELECT * FROM (uep_research.funding) ORDER BY FundingId ASC LIMIT 1000";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
        
        refreshFundSourceList($result);

    }

    //query EDIT COLLEGE    
    if ((isset($_POST['process'])) && ($_POST['process'] == "edit-fund-source")){

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $fundSourceName = mysqli_real_escape_string($conn, $_POST['fundSourceName']);

        $sqlStr = "UPDATE `uep_research`.`funding` SET `Agency`='$fundSourceName' WHERE `FundingId`= '$id';";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
  

        $sqlStr = "SELECT * FROM (uep_research.funding) WHERE `FundingId` = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

        if (mysqli_num_rows($result) > 0)
		{
            $counter = 1;
			while ($row = $result -> fetch_row())
			{
                echo "
                        <th scope='row'>$counter</th>
                        <td>$row[1]</td>
                    ";
                $counter++;

            }
        }
            
    }


    //query REFRESH COLLEGE
    if ((isset($_POST['process'])) && ($_POST['process'] == "refresh-college")){

        $sqlStr = "SELECT * FROM (uep_research.colleges) ORDER BY CollegesId ASC LIMIT 1000";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
        refreshCollegeList($result);

    }

    //query REFRESH FUND SOURCE
    if ((isset($_POST['process'])) && ($_POST['process'] == "refresh-fund-source")){

        $sqlStr = "SELECT * FROM (uep_research.funding) ORDER BY FundingId ASC LIMIT 1000";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
        refreshFundSourceList($result);

    }


    // refresh-college

    function refreshCollegeList($result){        
        if (mysqli_num_rows($result) > 0)
		{
            $counter = 1;
			while ($row = $result -> fetch_row())
			{
                echo "<tr data-id='$row[0]' class='pop-up-button' data-pop-up-target-id='pop-up-edit-college'>
                        <th scope='row'>$counter</th>
                        <td>$row[1]</td>
                    </tr>";
                $counter++;

            }
            
		}
    }

    function refreshFundSourceList($result){        
        if (mysqli_num_rows($result) > 0)
		{
            $counter = 1;
			while ($row = $result -> fetch_row())
			{
                echo "<tr data-id='$row[0]' class='pop-up-button' data-pop-up-target-id='pop-up-edit-fund-source'>
                        <th scope='row'>$counter</th>
                        <td>$row[1]</td>
                    </tr>";
                $counter++;

            }
            
		}
    }

?>