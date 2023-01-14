<?php
    session_start();
    require_once("../../-r-conns/conn.php");
    require("author.php");
    require("privilage.php");

    
    $conn = checkPrivilageAndConnect();
    
    //query ADD AUTHOR
    if ((isset($_POST['process'])) && ($_POST['process'] == "add") ){
        $author = new Author();

        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $email = mysqli_real_escape_string($conn, $_POST['eMail']);
        $address = mysqli_real_escape_string($conn, $_POST['Address']);
        $college = mysqli_real_escape_string($conn, $_POST['College']);

        // $author -> setFirstname(mysqli_real_escape_string($conn, $_POST['firstName']));
        // $author -> setMiddlename(mysqli_real_escape_string($conn, $_POST['middleName']));
        // $author -> setLastname(mysqli_real_escape_string($conn, $_POST['lastName']));
        // $author -> setPhoneNum(mysqli_real_escape_string($conn, $_POST['phoneNumber']));
        // $author -> setEmail(mysqli_real_escape_string($conn, $_POST['eMail']));
        // $author -> setAddress(mysqli_real_escape_string($conn, $_POST['Address']));
        // $author -> setCollege(mysqli_real_escape_string($conn, $_POST['College']));

        

        // echo $author -> getFullName();

        // echo $author -> firstName;

        $sqlStr = "INSERT INTO `uep_research`.`authors` (`FName`, `MName`, `LName`,  `ContactNum`, `EmailAdd`, `Address`, `College`) VALUES ('{$firstName}' , '{$middleName}' , '{$lastName}' , '$phoneNum', '$email', '{$address}' , '{$college}')";    

        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error());

        if ((isset($_POST['quickprocess'])) && ($_POST['quickprocess'] == "yes") ){
            $id =  $conn->insert_id;

            $sqlStr = "SELECT AuthorId, CONCAT(FName, ' ', MName, ' ', LName) as Fullname FROM authors  WHERE AuthorId = '$id'";

            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

            if (mysqli_num_rows($result) > 0)
            {
                $counter = 1;
                while ($row = $result -> fetch_row())
                {
                    
                   echo "<div class='item' id='author' data-id='$row[0]'><div><span class='name'>$row[1]</span> <i class='fas fa-times remove-item'></i></div></div>";
                   
                    $counter++;

                }
            }
                
        }   

    }

    //query EDIT AUTHOR
    if ((isset($_POST['process'])) && ($_POST['process'] == "edit") ){
        
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $email = mysqli_real_escape_string($conn, $_POST['eMail']);
        $address = mysqli_real_escape_string($conn, $_POST['Address']);
        $college = mysqli_real_escape_string($conn, $_POST['College']);

        $sqlStr = "UPDATE `uep_research`.`authors` SET `FName`='$firstName', `MName`='$middleName', `LName`='$lastName' , `ContactNum`='$phoneNum', `EmailAdd`='$email', `Address`='$address', `College`='$college' WHERE `AuthorId`= '$id';";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error("error"));
        

        //query return only edited author
        $sqlStr = "SELECT * FROM (uep_research.authors) WHERE `AuthorId` = '$id'";
        $result = mysqli_query($conn,$sqlStr) or  die (mysqli_error("error"));

        if (mysqli_num_rows($result) > 0)
		{
            $counter = 1;
			while ($row = $result -> fetch_row())
			{
                
                
                echo "
                        <th scope='row'>$counter</th>
                        <td class='tool-td'>
                            <button class='tool-icon pop-up-button' id='edit-author' tooltip-title='edit' data-pop-up-target-id='pop-up-edit-author'>
                                <i class='fas fa-edit'></i>
                            </button>
                            <button class='tool-icon' id='show-author-research' tooltip-title='View author's research'>
                                <i class='fas  fa-book icos'></i>
                            </button>
                        </td>
                        <td><span class='firstname'>{$row[1]}</span> <span class='middlename'>$row[2]</span> <span class='lastname'>$row[3]</span></td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                    ";
               

                $counter++;

            }
            
		}

    }
    

    //query REFRESH TABLE
    if ((isset($_POST['process'])) && ($_POST['process'] == "refreshRecentAuthorTable")){

        $limit = mysqli_real_escape_string($conn, $_POST['limit']);
        $orderBy = mysqli_real_escape_string($conn, $_POST['order']);

        $sqlStr = "SELECT * FROM (uep_research.authors) ORDER BY authorID $orderBy LIMIT $limit";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

        if (mysqli_num_rows($result) > 0)
		{
            $counter = 1;
			while ($row = $result -> fetch_row())
			{
                echo "<tr data-id='$row[0]' class='pop-up-button' data-pop-up-target-id='pop-up-edit-author'>
                        <th scope='row'>$counter</th>
                        <td><span class='firstname'>{$row[1]}</span> <span class='middlename'>$row[2]</span> <span class='lastname'>$row[3]</span></td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                    </tr>";
               

                $counter++;

            }
            
		}
    }


    //query SEARCH AUTHOR
    if ((isset($_POST['process'])) && ($_POST['process'] == "search")){

        $authorName = mysqli_real_escape_string($conn, $_POST['authorName']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $college = mysqli_real_escape_string($conn, $_POST['college']);

        $limit = mysqli_real_escape_string($conn, $_POST['showAmount']);


        $authors = (object)[
            "details" => array(),
            "amountRow" => null,
            "sql" => null
        ];


        if ((isset($_POST['clickedPageNumber'])) 
        && (!empty($_POST['clickedPageNumber']))
        && (!is_null($_POST['clickedPageNumber']))
        ){
            $page = mysqli_real_escape_string($conn,($_POST['clickedPageNumber']));
            
            $startRow;
            if($page != 1){
                $startRow = ($page *  ($limit)) - ($limit);
            }else{
                $startRow = 0;
            }
            $limit = $startRow.", ". $limit;

        }

        $sqlStr = "SELECT * FROM (uep_research.authors) WHERE ((CONCAT(`FName`, ' ', `MName`, ' ', `LName`) LIKE '%$authorName%') OR(CONCAT(`MName`, ' ', `LName`, ' ', `FName`) LIKE '%$authorName%') OR(CONCAT(`LName`, ' ', `FName`, ' ', `MName`) LIKE '%$authorName%') OR(CONCAT(`LName`, ' ', `MName`, ' ', `FName`) LIKE '%$authorName%') OR(CONCAT(`FName`, ' ', `LName`, ' ', `MName`) LIKE '%$authorName%')) AND `ContactNum` LIKE '%$phoneNumber%' AND `EmailAdd` LIKE '%$email%' AND `Address` LIKE '%$address%' AND `College` LIKE '%$college%' LIMIT $limit;";

        // echo $sqlStr;

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error(). " query: search authors");

        if (mysqli_num_rows($result) > 0)
		{
			while ($row = $result -> fetch_row())
			{
                array_push($authors -> details, [
                    "id" => $row[0],
                    "firstName" => $row[1],
                    "middleName" => $row[2],
                    "lastName" => $row[3],
                    "contactNumber" => $row[4],
                    "email" => $row[5],
                    "address" => $row[6],
                    "college" => $row[7]
                ]);

                $authors -> sql = $sqlStr;

            }


            $sqlStr = "SELECT COUNT(*) as Counter FROM (uep_research.authors) WHERE ((CONCAT(`FName`, ' ', `MName`, ' ', `LName`) LIKE '%$authorName%') OR(CONCAT(`MName`, ' ', `LName`, ' ', `FName`) LIKE '%$authorName%') OR(CONCAT(`LName`, ' ', `FName`, ' ', `MName`) LIKE '%$authorName%') OR(CONCAT(`LName`, ' ', `MName`, ' ', `FName`) LIKE '%$authorName%') OR(CONCAT(`FName`, ' ', `LName`, ' ', `MName`) LIKE '%$authorName%')) AND `ContactNum` LIKE '%$phoneNumber%' AND `EmailAdd` LIKE '%$email%' AND `Address` LIKE '%$address%' AND `College` LIKE '%$college%'";

            // echo $sqlStr;
            $result2 = mysqli_query($conn, $sqlStr) or die(mysqli_error(). "search author count");


            if (mysqli_num_rows($result2) > 0)
            {
                while ($row2 = $result2 -> fetch_row()){
                    $authors-> amountRow = $row2[0];
                }

                echo json_encode($authors);
            }else{
                echo "no data";
            }
        }else{
            echo "no data";
        }
        
    }

    if ((isset($_POST['process'])) && ($_POST['process'] == "view-author")){
        $authorId = mysqli_real_escape_string($conn, $_POST['authorId']);

        $sqlStr = "SELECT * FROM `authors` WHERE `AuthorId` = '$authorId' LIMIT 1";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
        if (mysqli_num_rows($result) > 0){
			while ($row = $result -> fetch_row()){
                echo json_encode([
                        "id" => $row[0],
                        "fullname" => $row[1]." ".$row[2]." ".$row[3],
                        "contact" => $row[4],
                        "email" => $row[5],
                        "address" => $row[6],
                        "college" => $row[7],
                    ]
                );
            }
        }else{
            echo "no data";
        }

    }
?>