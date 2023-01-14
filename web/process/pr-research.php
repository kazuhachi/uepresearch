<?php
    session_start();
    require_once("../../-r-conns/conn.php");
    require("privilage.php");
	include_once("browser-info.php");
	require("../../-r-conns/token.php");

    require("research.php");
    require("author.php");

    $conn = checkPrivilageAndConnect();

    $G_RESEARCH;
    

    if (isset($_POST['process']) && ($_POST['process'] == "getAuthors")){

        
        $input = mysqli_real_escape_string($conn, $_POST['input']);

        $sqlStr = "SELECT `AuthorId`,`FName`, `MName`, `LName` FROM `uep_research`.`authors` WHERE (CONCAT(`FName`, ' ', `MName`, ' ', `LName`) LIKE '%$input%') OR(CONCAT(`MName`, ' ', `LName`, ' ', `FName`) LIKE '%$input%') OR(CONCAT(`LName`, ' ', `FName`, ' ', `MName`) LIKE '%$input%') OR(CONCAT(`LName`, ' ', `MName`, ' ', `FName`) LIKE '%$input%') OR(CONCAT(`FName`, ' ', `LName`, ' ', `MName`) LIKE '%$input%') LIMIT 7";
        
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

        if (mysqli_num_rows($result) > 0)
		{
			while ($row = $result -> fetch_row())
			{
                $name = $row[1].' '.$row[2].' '.$row[3];
                echo "<div class='suggestion-item' data-id='$row[0]'><span class='name'>$name</span></div>";

            }
            
		}
        


    }


    //query Get keywords
    if (isset($_POST['process']) && ($_POST['process'] == "getKeywords")){

        
        $input = mysqli_real_escape_string($conn, $_POST['input']);

        $sqlStr = "SELECT * FROM `uep_research`.`keywords` WHERE Name LIKE '%$input%'";
        
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());

        if (mysqli_num_rows($result) > 0)
		{
			while ($row = $result -> fetch_row())
			{
                echo "<div class='suggestion-item' data-id='$row[0]'><span class='name'>$row[1]</span><span class='counter'></span></div>";

            }
            
		}
    }

    //query Add Keyword
    if (isset($_POST['process']) && ($_POST['process'] == "addKeyword")){
        $input = mysqli_real_escape_string($conn, $_POST['input']);
        
        $sqlStr = "INSERT INTO `uep_research`.`keywords` (`Name`) VALUES ('$input')";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error());
        $id =  $conn->insert_id;
        echo $id;

    }

    //query add research
    if (isset($_POST['process']) && ($_POST['process'] == "add-research")){

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $abstract = mysqli_real_escape_string($conn, $_POST['abstract']);

        $authorIDs = array();
        foreach($_POST['authorIDs'] as $k => $v){
            array_push($authorIDs, mysqli_real_escape_string($conn, $v));
        }

        $keywordsIDs = array();
        if ((isset($_POST['keywordsIDs']))){
            foreach($_POST['keywordsIDs'] as $k => $v){
                array_push($keywordsIDs, mysqli_real_escape_string($conn, $v));
            }
        }

        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $campus = mysqli_real_escape_string($conn, $_POST['campus']);
        $dateStarted = mysqli_real_escape_string($conn, $_POST['dateStarted']);
        $dateFinished = mysqli_real_escape_string($conn, $_POST['dateFinished']);

        // insert into research table
        if ($dateFinished == ''){
            $sqlStr = "INSERT INTO `uep_research`.`research` (`Title`, `Status`, `Campus`, `DateStarted`, `DateCompleted`) VALUES ('$title', '$status', '$campus', STR_TO_DATE('$dateStarted','%m/%d/%Y'), null)";   
        }else{
            $sqlStr = "INSERT INTO `uep_research`.`research` (`Title`,`Status`, `Campus`, `DateStarted`, `DateCompleted`) VALUES ('$title', '$status', '$campus', STR_TO_DATE('$dateStarted','%m/%d/%Y'), STR_TO_DATE('$dateFinished','%m/%d/%Y'))";   
        }

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($con)."line: insert into research table");


        
        $researchId =  $conn->insert_id; // get last inserted table ID research
        setcookie('res_', "$researchId", time()+ 86400); // 1 day
        // $_SESSION['researchID'] = $researchId;
        echo $researchId;
        
        // insert many to many table ResearchAuthor
        foreach($authorIDs as $Id){
            $sqlStr = "INSERT INTO `uep_research`.`researchauthor` (`AuthorId`, `ResearchId`) VALUES ('$Id', '$researchId')";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: insert many to many table ResearchAuthor");
        }

        // insert many to many table Re
        if (!$keywordsIDs == null){
            foreach($keywordsIDs as $Id){
                $sqlStr = "INSERT INTO `uep_research`.`researchkeywords` (`KeywordId`, `ResearchId`) VALUES ('$Id', '$researchId')";
                $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn). "line: insert many to many table Re");
            }
        }

        //insert one to one ResearchAbstract
        $sqlStr = "INSERT INTO `uep_research`.`researchabstract` (`ResearchId`,`Text`) VALUES ('$researchId','$abstract')";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: insert one to one ResearchAbstract");

    }

    //query view abstract
    if (isset($_POST['process']) && ($_POST['process'] == "view-abstract")){

        $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);
        $sqlStr = "SELECT `Text` FROM `uep_research`.`researchabstract`WHERE `ResearchId` = '$researchId';";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: view abstarct");

        if (mysqli_num_rows($result) > 0)
        {
            while ($row = $result -> fetch_row())
            {
                echo $row[0];
            }
        }
    }

    //view/ preview research view-research
    if (isset($_POST['process']) && ($_POST['process'] == "view-research")){        
        if ((isset($_COOKIE['res_'])) && (!($_COOKIE['res_'] == "null"))){

            $id = $_COOKIE['res_'];
            $research; // object 
            $authors = array();
            $abstract = ''; // to be assigned at \get research\

            //get research abstract
            $sqlStr = "SELECT AbstractId, text FROM `researchabstract` WHERE ResearchId = '$id'";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: view research - get research");
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = $result -> fetch_row())
                {
                    $abstract = $row[1];
                }
            }

            //get research
            $sqlStr = "SELECT * FROM research where ResearchId = '$id'";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: view research - get research");

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = $result -> fetch_row())
                {
                    $research =  [
                        "id" => $row[0],
                        "abstract" => $abstract,
                        "title" => $row[1],
                        "campus" => $row[2],
                        "status" => $row[3],
                        "dateStarted" => $row[4],
                        "dateFinished" => $row[5]
                    ];
                }
                
            }
            
            $authors = array(); // of object

            //get authors
            $sqlStr = "SELECT authors.AuthorId ,CONCAT(authors.FName,' ', authors.MName, ' ', authors.LName) AS Fullname FROM authors INNER JOIN researchauthor ON authors.AuthorId = researchauthor.AuthorId where researchauthor.ResearchId = '$id'";
            
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: view research - get authors");

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = $result -> fetch_row())
                {
                    array_push($authors, 
                        [
                            "id" => $row[0],
                            "fullname" => $row[1]
                        ]
                    );
                }
            }
            
            $keywords = array(); // of object

            //get keywords
            $sqlStr = "SELECT keywords.KeywordId, keywords.Name FROM keywords INNER JOIN researchkeywords ON keywords.KeywordId = researchkeywords.KeywordId where researchkeywords.ResearchId = '$id'";
            
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: view research - get keywords");

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = $result -> fetch_row())
                {
                    array_push($keywords, 
                        [
                            "id" => $row[0],
                            "name" => $row[1]
                        ]
                    );
                }
            }
            $returnResearch = [
                "research" => $research,
                "authors" => $authors,
                "keywords" => $keywords
            ];

            echo json_encode($returnResearch);


            
        }
        else{
            echo "error";
        }
    }


    //set research id after to be fetch by reseach-view.html

    if (isset($_POST['process']) && ($_POST['process'] == "set-research")){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        setcookie('res_', "$id", time()+ 86400); // 1 day

    }

    // get research
    if (isset($_POST['process']) && ($_POST['process'] == "get-research-recent")){
        
        $limit = mysqli_real_escape_string($conn, $_POST['limit']);
        $returnResearch = array();
        

        //get research SELECT * FROM (uep_research.authors) ORDER BY authorID $orderBy LIMIT $limit
        $sqlStr = "SELECT * FROM research ORDER BY ResearchId DESC LIMIT $limit";
        // echo $sqlStr;
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: view research - get research");

        if (mysqli_num_rows($result) > 0)
        {
            while ($row = $result -> fetch_row())
            {
                $id  = $row[0];   
                $research; // object 
                // $abstract;
                $authors = array();
                $keywords = array();
                $details; // object

                //get authors
                $sqlStr = "SELECT authors.AuthorId ,CONCAT(authors.FName,' ', authors.MName, ' ', authors.LName) AS Fullname FROM authors INNER JOIN researchauthor ON authors.AuthorId = researchauthor.AuthorId where researchauthor.ResearchId = '$id'";        
                $result_2 = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: get research - get authors");
                if (mysqli_num_rows($result_2) > 0)
                {
                    while ($row_2 = $result_2 -> fetch_row())
                    {
                        array_push($authors, 
                            [
                                "authorId" => $row_2[0],
                                "fullname" => $row_2[1]
                            ]
                        );
                    }
                }

                //get keywords
                $sqlStr = "SELECT keywords.KeywordId, keywords.Name FROM keywords INNER JOIN researchkeywords ON keywords.KeywordId = researchkeywords.KeywordId where researchkeywords.ResearchId = '$id'";
                $result_3 = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: view research - get keywords");
                if (mysqli_num_rows($result_3) > 0)
                {
                    while ($row_3 = $result_3 -> fetch_row())
                    {
                        array_push($keywords, 
                            [
                                "keywordId" => $row_3[0],
                                "name" => $row_3[1]
                            ]
                        );
                    }
                }

                $subDetailsCounters = getResearchSubDetails($id, $conn);

                $details =  [
                    "id" => $row[0],
                    // "abstract" => $abstract,
                    "title" => $row[1],
                    "campus" => $row[2],
                    "status" => $row[3],
                    "dateStarted" => $row[4],
                    "dataFinished" => $row[5]
                ];

                
                $research = [
                    "details" => $details,
                    "authors" => $authors,
                    "keywords" => $keywords,
                    "subDetailsCounter" => $subDetailsCounters
                ];

                array_push($returnResearch, $research);
            }
            
        }

        echo json_encode($returnResearch);
    }


    //update research
    if (isset($_POST['process']) && ($_POST['process'] == "update-research")){

        $researchId = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $abstract = mysqli_real_escape_string($conn, $_POST['abstract']);

        $authorIDs = array();
        foreach($_POST['authorIDs'] as $k => $v){
            array_push($authorIDs, mysqli_real_escape_string($conn, $v));
        }

        $keywordsIDs = array();
        if ((isset($_POST['keywordsIDs']))){
            foreach($_POST['keywordsIDs'] as $k => $v){
                array_push($keywordsIDs, mysqli_real_escape_string($conn, $v));
            }
        }

        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $campus = mysqli_real_escape_string($conn, $_POST['campus']);
        $dateStarted = mysqli_real_escape_string($conn, $_POST['dateStarted']);
        $dateFinished = mysqli_real_escape_string($conn, $_POST['dateFinished']);
        

        // insert into research table
        if ($dateFinished == ''){
            // $sqlStr = "INSERT INTO `uep_research`.`research` (`Title`, `Status`, `Campus`, `DateStarted`, `DateCompleted`) VALUES ('$title', '$status', '$campus', STR_TO_DATE('$dateStarted','%m/%d/%Y'), null)";   

            $sqlStr = "UPDATE `research` SET `Title` = '$title', `Status` = '$status', `Campus` = '$campus', `DateStarted` = STR_TO_DATE('$dateStarted','%m/%d/%Y'), `DateCompleted` = null WHERE `research`.`ResearchId` = $researchId;";
            
        }else{
            // $sqlStr = "INSERT INTO `uep_research`.`research` (`Title`,`Status`, `Campus`, `DateStarted`, `DateCompleted`) VALUES ('$title', '$status', '$campus', STR_TO_DATE('$dateStarted','%m/%d/%Y'), STR_TO_DATE('$dateFinished','%m/%d/%Y'))";   
            
            $sqlStr = "UPDATE `research` SET `Title` = '$title', `Status` = '$status', `Campus` = '$campus', `DateStarted` = STR_TO_DATE('$dateStarted','%m/%d/%Y'), `DateCompleted` = STR_TO_DATE('$dateFinished','%m/%d/%Y') WHERE `research`.`ResearchId` = $researchId;";
            
        }
        

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: update research table");

        // delete researchAuthor row  which this research`s authors has. 
        $sqlStr = "DELETE FROM `researchauthor` WHERE `researchauthor`.`ResearchId` = $researchId";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: delete researchauthor row table");

        
        // insert many to many table ResearchAuthor
        foreach($authorIDs as $Id){
            $sqlStr = "INSERT INTO `uep_research`.`researchauthor` (`AuthorId`, `ResearchId`) VALUES ('$Id', '$researchId')";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: insert many to many table ResearchAuthor");
        }

        // // delete researchKeywords row  which this research`s keyword has. 
        $sqlStr = "DELETE FROM `researchkeywords` WHERE `researchkeywords`.`ResearchId` = $researchId";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: delete researchKeywords row table");

        // insert many to many table Re
        if (!$keywordsIDs == null){
            foreach($keywordsIDs as $Id){
                $sqlStr = "INSERT INTO `uep_research`.`researchkeywords` (`KeywordId`, `ResearchId`) VALUES ('$Id', '$researchId')";
                $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn). "line: insert many to many table Re");
            }
        }

        //insert one to one ResearchAbstract
        $sqlStr = "UPDATE `researchabstract` SET `Text` = '$abstract' WHERE `ResearchId` = '$researchId'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: insert one to one ResearchAbstract");
    }
        

    //query add journal
    if (isset($_POST['process']) && ($_POST['process'] == "add-journal")){

        $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);
        $bookTitle = mysqli_real_escape_string($conn, $_POST['bookTitle']);
        $volumeIssueNumber = mysqli_real_escape_string($conn, $_POST['volumeIssueNumber']);

        $numberPages = array();
        foreach($_POST['numberPages'] as $k => $v){
            array_push($numberPages, mysqli_real_escape_string($conn, $v));
        }

        $numberPagesStr = implode(", ",$numberPages);
    

        $datePublished = mysqli_real_escape_string($conn, $_POST['datePublished']);
        $publicationType = mysqli_real_escape_string($conn, $_POST['publicationType']);

        $sqlStr = "INSERT INTO `researchjournal` (`ResearchId`, `Title`, `VolumeIssueNo`, `NoOfPages`, `DatePublished`, `PublicationType`) VALUES ('$researchId', '$bookTitle', '$volumeIssueNumber', '$numberPagesStr', STR_TO_DATE('$datePublished','%m/%d/%Y'), '$publicationType');";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: add journal data");


    }

    //query edit journal
    if (isset($_POST['process']) && ($_POST['process'] == "edit-journal")){
        // $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $bookTitle = mysqli_real_escape_string($conn, $_POST['bookTitle']);
        $volumeIssueNumber = mysqli_real_escape_string($conn, $_POST['volumeIssueNumber']);

        $numberPages = array();
        foreach($_POST['numberPages'] as $k => $v){
            array_push($numberPages, mysqli_real_escape_string($conn, $v));
        }

        $numberPagesStr = implode(", ",$numberPages);

        $datePublished = mysqli_real_escape_string($conn, $_POST['datePublished']);
        $publicationType = mysqli_real_escape_string($conn, $_POST['publicationType']);

        $sqlStr = "UPDATE `researchjournal` SET `Title` = '$bookTitle', `VolumeIssueNo` = '$volumeIssueNumber', `NoOfPages` = '$numberPagesStr', `DatePublished` = STR_TO_DATE('$datePublished','%m/%d/%Y'), `PublicationType` = '$publicationType' WHERE `researchjournal`.`ResearchJournalId` = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: edit journal data");

    }

    //query refresh table of journals
    if (isset($_POST['process']) && ($_POST['process'] == "get-journal")){        
        if ((isset($_COOKIE['res_'])) && (!($_COOKIE['res_'] == "null"))){
            $id = $_COOKIE['res_'];

            // $dataTargetProp = "";
            // i

            $sqlStr = "SELECT * FROM `researchjournal` WHERE ResearchId = '$id'";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: get journal data");

            if (mysqli_num_rows($result) > 0)
            {
                $counter = 1;   
                while ($row = $result -> fetch_row())
                {
                    echo "<tr data-id='$row[0]' ".

                        (checkToken() ? "class='pop-up-button' data-pop-up-target-id='pop-up-journal'" : "")

                        ."><th scope='col'>$counter</th><td scope='col'>$row[2]</td><td scope='col'>$row[3]</td><td scope='col'>$row[4]</td><td scope='col'>".formatDateLong($row[5])."</td><td scope='col'>$row[6]</td></tr>";

                    $counter++;
                }
            }else{
                echo "no data";
            }
        }
    }


    //query add presentation
    if (isset($_POST['process']) && ($_POST['process'] == "add-presentation")){

        $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);
        $conferenceTitle = mysqli_real_escape_string($conn, $_POST['conferenceTitle']);
        $conferenceVenue = mysqli_real_escape_string($conn, $_POST['conferenceVenue']);
        $datePresented = mysqli_real_escape_string($conn, $_POST['datePresented']);
        $conferenceType = mysqli_real_escape_string($conn, $_POST['conferenceType']);
        $organizer = mysqli_real_escape_string($conn, $_POST['organizer']);

        $sqlStr = "INSERT INTO `researchpresentation` (`ResearchId`, `DatePresented`, `ConferenceTitle`, `ConferenceVenue`, `ConferenceType`, `Organzier`) VALUES ('$researchId', STR_TO_DATE('$datePresented','%m/%d/%Y'), '$conferenceTitle', '$conferenceVenue', '$conferenceType', '$organizer');";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: add presentation data");

    }

     //query edit presentation
    if (isset($_POST['process']) && ($_POST['process'] == "edit-presentation")){
        // $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $conferenceTitle = mysqli_real_escape_string($conn, $_POST['conferenceTitle']);
        $conferenceVenue = mysqli_real_escape_string($conn, $_POST['conferenceVenue']);
        $datePresented = mysqli_real_escape_string($conn, $_POST['datePresented']);
        $conferenceType = mysqli_real_escape_string($conn, $_POST['conferenceType']);
        $organizer = mysqli_real_escape_string($conn, $_POST['organizer']);


        $sqlStr = "UPDATE `researchpresentation` SET `ConferenceTitle` = '$conferenceTitle', `ConferenceVenue` = '$conferenceVenue', `DatePresented` = STR_TO_DATE('$datePresented','%m/%d/%Y'), `ConferenceType` = '$conferenceType', `Organzier` = '$organizer' WHERE `researchpresentation`.`PresentationId` = '$id';";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: presentation pr data");

    }

     //query get all presentation
    if (isset($_POST['process']) && ($_POST['process'] == "get-presentation")){        
        if ((isset($_COOKIE['res_'])) && (!($_COOKIE['res_'] == "null"))){
            $id = $_COOKIE['res_'];

            $sqlStr = "SELECT * FROM `researchpresentation` WHERE ResearchId = '$id'";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: get presentation data");

            if (mysqli_num_rows($result) > 0)
            {
                $counter = 1;   
                while ($row = $result -> fetch_row())
                {
                    echo "<tr data-id='$row[0]'". 

                        (checkToken() ? " class='pop-up-button' data-pop-up-target-id='pop-up-presentation'" : "")

                        ."><th scope='col'>$counter</th><td scope='col'>$row[2]</td><td scope='col'>$row[3]</td><td scope='col'>".formatDateLong($row[4]). "</td><td scope='col'>$row[5]</td><td scope='col'>$row[6]</td></tr>";

                    $counter++;
                }
            }else{
                echo "no data";
            }
        }
    }

    //query get add fund
    if (isset($_POST['process']) && ($_POST['process'] == "add-fund")){

        $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);
        $fundId = mysqli_real_escape_string($conn, $_POST['fundId']);
        $fundDateFrom = mysqli_real_escape_string($conn, $_POST['fundDateFrom']);
        $fundDateTo = mysqli_real_escape_string($conn, $_POST['fundDateTo']);
        $Amount = mysqli_real_escape_string($conn, $_POST['Amount']);
        $isExternal = mysqli_real_escape_string($conn, $_POST['isExternal']);

        $sqlStr = "INSERT INTO `researchfunding` ( `ResearchId`, `FundingId`, `DateFrom`, `DateTo`, `Amount`, `isExternal`) VALUES ('$researchId', '$fundId', STR_TO_DATE('$fundDateFrom','%m/%d/%Y'), STR_TO_DATE('$fundDateTo','%m/%d/%Y'), '$Amount', '$isExternal');;";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: add fund data");

    }

     //query get all fund
     if (isset($_POST['process']) && ($_POST['process'] == "get-fund")){        
        if ((isset($_COOKIE['res_'])) && (!($_COOKIE['res_'] == "null"))){
            $id = $_COOKIE['res_'];

            $sqlStr = "SELECT ResearchFunndingId, Agency, DateFrom, DateTo, Amount, isExternal FROM `researchfunding` INNER JOIN funding ON researchfunding.FundingId = funding.FundingId where researchfunding.ResearchId =  '$id'";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: get fund data");

            if (mysqli_num_rows($result) > 0)
            {
                $counter = 1;   
                while ($row = $result -> fetch_row())
                {
                    $money = number_format(floatval($row[4]), 2, '.', ',');

                    echo "<tr data-id='$row[0]'".

                    (checkToken() ? " class='pop-up-button' data-pop-up-target-id='pop-up-fund-source'" : "")

                     ."><th scope='col'>$counter</th><td scope='col'>$row[1]</td><td scope='col'>". formatDateLong($row[2])."</td><td scope='col'>". formatDateLong($row[3])."</td><td scope='col' data-val='$row[4]'>₱ $money</td></td><td scope='col'>$row[5]</td></tr>";

                    $counter++;
                }
            }else{
                echo "no data";
            }
        }
    }

     //query edit fund
     if (isset($_POST['process']) && ($_POST['process'] == "edit-fund")){
        // $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $fundId = mysqli_real_escape_string($conn, $_POST['fundId']);
        $fundDateFrom = mysqli_real_escape_string($conn, $_POST['fundDateFrom']);
        $fundDateTo = mysqli_real_escape_string($conn, $_POST['fundDateTo']);
        $Amount = mysqli_real_escape_string($conn, $_POST['Amount']);
        $isExternal = mysqli_real_escape_string($conn, $_POST['isExternal']);



        $sqlStr = "UPDATE `researchfunding` SET `FundingId` = '$fundId', `DateFrom` = STR_TO_DATE('$fundDateFrom','%m/%d/%Y'), `DateTo` = STR_TO_DATE('$fundDateTo','%m/%d/%Y'), `Amount` = '$Amount', `isExternal` = '$isExternal' WHERE `researchfunding`.`ResearchFunndingId` = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: edit fund ata");

    }

    //query get list fund
    if (isset($_POST['process']) && ($_POST['process'] == "get-list-fund")){

        $sqlStr = "SELECT FundingId, Agency FROM `funding`";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: get list funds data");
        if (mysqli_num_rows($result) > 0){

            while ($row = $result -> fetch_row()){
                echo "<option data-id='$row[0]'>$row[1]</option>";
            }

            echo "<option  data-pop-up-target-id='pop-up-add-fund-source'>-- add new fund source here. --</option>";
        }else{
            
        }

    }

    //query add patent
    if (isset($_POST['process']) && ($_POST['process'] == "add-patent")){

        $researchId = mysqli_real_escape_string($conn, $_POST['researchId']);
        $patentNumber = mysqli_real_escape_string($conn, $_POST['patentNumber']);
        $datePatented = mysqli_real_escape_string($conn, $_POST['datePatented']);
        $utilization = mysqli_real_escape_string($conn, $_POST['utilization']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);

        $sqlStr = "INSERT INTO `researchpatents` (`ResearchId`, `PatentIdNo`, `DatePatented`, `UtilizationOfInvention`, `Remarks`) VALUES ( '$researchId', '$patentNumber', STR_TO_DATE('$datePatented','%m/%d/%Y'), '$utilization', '$remark');";

        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: add patent data");

    }

    //query edit patent
    if (isset($_POST['process']) && ($_POST['process'] == "edit-patent")){

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $patentNumber = mysqli_real_escape_string($conn, $_POST['patentNumber']);
        $datePatented = mysqli_real_escape_string($conn, $_POST['datePatented']);
        $utilization = mysqli_real_escape_string($conn, $_POST['utilization']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);



        $sqlStr = "UPDATE `researchpatents` SET `PatentIdNo` = '$patentNumber', `DatePatented` = STR_TO_DATE('$datePatented','%m/%d/%Y'), `UtilizationOfInvention` = '$utilization', `Remarks` = '$remark' WHERE `researchpatents`.`PatentId` = '$id';";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: edit patent");

    }

    //query get list patent
    if (isset($_POST['process']) && ($_POST['process'] == "get-patent")){        
        if ((isset($_COOKIE['res_'])) && (!($_COOKIE['res_'] == "null"))){
            $id = $_COOKIE['res_'];

            $sqlStr = "SELECT * FROM `researchpatents` WHERE ResearchId = '$id'";
            $result = mysqli_query($conn, $sqlStr) or die(mysqli_error($conn)."line: get patent data");

            if (mysqli_num_rows($result) > 0)
            {
                $counter = 1;   
                while ($row = $result -> fetch_row())
                {
                    

                    echo "<tr data-id='$row[0]' ".

                        (checkToken() ? "class='pop-up-button' data-pop-up-target-id='pop-up-patent'" : "")

                        ."><th scope='col'>$counter</th><td scope='col'>$row[2]</td><td scope='col'>". formatDateLong($row[3])."</td><td scope='col'>$row[4]</td></td><td scope='col'>$row[5]</td></tr>";

                    $counter++;
                }
            }else{
                echo "no data";
            }
        }
    }
    



    
    if (isset($_POST['process']) && ($_POST['process'] == "get-researchSubDetailsNum")){
        if ((isset($_COOKIE['res_'])) && (!($_COOKIE['res_'] == "null"))){
            $id = $_COOKIE['res_'];

            echo json_encode(getResearchSubDetails($id, $conn));
        }
    }


    if (isset($_POST['process']) && ($_POST['process'] == "search-research")){        

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $campus = mysqli_real_escape_string($conn, $_POST['campus']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $dateStarted = mysqli_real_escape_string($conn, $_POST['dateStated']);
        $dateFinished = mysqli_real_escape_string($conn, $_POST['dateFinished']);

        $authors = array();
        $keywords = array();
        $limit = mysqli_real_escape_string($conn, $_POST['showAmount']);

        if (isset($_POST['authorIds'])){
            foreach ($_POST['authorIds'] as $id){
                array_push($authors, mysqli_real_escape_string($conn, $id));
            }
        }
        
        if (isset($_POST['keywordIds'])){
            foreach ($_POST['keywordIds'] as $id){
                array_push($keywords, mysqli_real_escape_string($conn, $id));
            }
        }
        

        $isPresented = mysqli_real_escape_string($conn, $_POST['isPresented']);
        $isFunded = mysqli_real_escape_string($conn, $_POST['isFunded']);
        $isPatented = mysqli_real_escape_string($conn, $_POST['isPatented']);

        // $G_RESEARCH =  $_SESSION['researchQueryInput'];

        // if ((isset($_POST['clickedPageNumber'])) 
        // && (!empty($_POST['clickedPageNumber']))
        // && (!is_null($_POST['clickedPageNumber']))
        // ){
        //     // $G_RESEARCH =  $_SESSION['researchQueryInput'];

        //     $title        =  $_SESSION['title'];
        //     $status       =  $_SESSION['status'];
        //     $campus       =  $_SESSION['campus'];
        //     $dateStarted  =  $_SESSION['dateStarted'];
        //     $dateFinished =  $_SESSION['dateFinished'];
        //     $authors      =  $_SESSION['authorIds'];
        //     $keywords     =  $_SESSION['keywordIds'];
        //     $isPresented  =  $_SESSION['isPresented'];
        //     $isFunded     = $_SESSION['isFunded'];
        //     $isPatented   = $_SESSION['isPatented'];

        //     // $_SESSION['title'] = null;
        //     // $_SESSION['status'] = null;
        //     // $_SESSION['campus'] = null;
        //     // $_SESSION['dateStarted'] = null;
        //     // $_SESSION['dateFinished'] = null;
        //     // $_SESSION['authorIds'] = array();
        //     // $_SESSION['keywordIds'] = array();
        //     // $_SESSION['isPresented'] = null;
        //     // $_SESSION['isFunded'] = null;
        //     // $_SESSION['isPatented'] = null;

        //     $page = mysqli_real_escape_string($conn,($_POST['clickedPageNumber']));
            
        //     $startRow;
        //     if($page != 1){
        //         $startRow = ($page *  ($limit)) - ($limit);
        //     }else{
        //         $startRow = 0;
        //     }
        //     $limit = $startRow.", ". $limit;
            
            
        // }else{


        //     $_SESSION['title']        =  $title;
        //     $_SESSION['status']       = $status ;
        //     $_SESSION['campus']       = $campus;
        //     $_SESSION['dateStarted']  =  $dateStarted;
        //     $_SESSION['dateFinished'] = $dateFinished;
        //     $_SESSION['authorIds']    = $authors;
        //     $_SESSION['keywordIds']   = $keywords;
        //     $_SESSION['isPresented']  = $isPresented;
        //     $_SESSION['isFunded']     = $isFunded;
        //     $_SESSION['isPatented']   = $isPatented;

        // }
            
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



        $research = array();
        $researchBasicDetails = array();
        $researchSubDetetails = array();

        

        $sqlStr = '';
        $sqlSelect = "SELECT r.* FROM research r ";
        $sqlSelectCount = "SELECT COUNT(DISTINCT r.ResearchId) as Counter FROM research r ";

        
        

        if ((isset($authors) && (count($authors) > 0))){
            $implodedAuthors = implode("','",$authors);
            $havingCount = count($authors) - 1;

            $sqlStr .= "INNER JOIN (SELECT ra.researchId FROM researchauthor ra WHERE ra.AuthorId in ('$implodedAuthors') GROUP BY ra.ResearchId HAVING COUNT(*) > $havingCount ) sub_ra ON r.ResearchId = sub_ra.researchId ";
        }

        if ((isset($keywords) && (count($keywords) > 0))){
            $implodedKeywords = implode("','",$keywords);
            $havingCount = count($keywords) - 1;

            $sqlStr = "INNER JOIN (	SELECT rk.researchId FROM researchkeywords rk WHERE rk.KeywordId in ('$implodedKeywords') GROUP BY rk.researchId HAVING COUNT(*) > $havingCount ) sub_rk ON r.ResearchId = sub_rk.researchId ";

        }


        if ((isset($isPresented)) && (!empty($isPresented)) && ($isPresented != "No"))
            $sqlStr .= "INNER JOIN researchpresentation rpre ON rpre.ResearchId = r.ResearchId ";

        if ((isset($isFunded)) && (!empty($isFunded)) && ($isFunded != "No"))
            $sqlStr .= "INNER JOIN researchfunding rf ON rf.ResearchId = r.ResearchId ";
        
        if ((isset($isPatented)) && (!empty($isPatented)) && ($isPatented != "No"))
            $sqlStr .= "INNER JOIN researchpatents rpat ON rpat.ResearchId = r.ResearchId ";


        
            $sqlStr .= "WHERE ";

        if ((isset($title)) 
            || (isset($campus))
            || (isset($status))
            || (isset($dateStarted))
            || (isset($dateFinished))){

            

            if (!empty($title))
                $sqlStr .= "MATCH(r.title) AGAINST('$title' IN BOOLEAN MODE) AND ";
            
            if (!empty($campus)) 
                $sqlStr .= "r.Campus = '$campus'  AND ";

            if (!empty($status)) 
                $sqlStr .= "r.Status = '$status' AND ";
            
            if (!empty($dateStarted))
                $sqlStr .= "DATE(r.DateStarted) = STR_TO_DATE('$dateStarted','%m/%d/%Y') AND ";
            
            if (!empty($dateFinished))
                $sqlStr .= "DATE(r.DateCompleted) = STR_TO_DATE('$dateFinished','%m/%d/%Y') AND ";
                
            $endSqlStr = "1 = 1  GROUP BY r.researchId LIMIT  $limit";
                
        }else{
            $endSqlStr = "1 = 1";
        }

        

        $sqlConcatenated = $sqlSelect . $sqlStr. $endSqlStr;
        // echo $sqlConcatenated;
        $result = mysqli_query($conn, $sqlConcatenated) or die(mysqli_error($conn)."line: search query REsearch");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                
                $researchBasicDetails = [
                        "id" => $row[0],
                        "title" => $row[1],
                        "campus" => $row[2],
                        "status" => $row[3],
                        "dateStarted" => $row[4],
                        "dateFinished" => $row[5]
                ];

                
                
                array_push($research,
                    [
                        "research" => [
                            "basicDetails" => $researchBasicDetails,
                            "authors" => getAuthor($row[0], $conn),
                            "subDetails" => getResearchSubDetails($row[0], $conn),
                            "sql" => $sqlConcatenated ."-----". $_POST['clickedPageNumber']
                        ]
                    ]
                
                );  

            }

            $endSqlStr = "1 = 1";
            $sqlConcatenated = $sqlSelectCount . $sqlStr . $endSqlStr;
            // $sqlConcatenated = str_replace("GROUP BY r.researchId", "", $sqlConcatenated);
            // echo $sqlConcatenated;

            $result2 = mysqli_query($conn, $sqlConcatenated) or die(mysqli_error($conn)."line: count num rows search query REsearch");

            if (mysqli_num_rows($result2) > 0){
                while ($row2 = $result2 -> fetch_row()){
                    array_push($research,
                        ["numOfAllrows" => $row2[0] ]
                    );
                }
            }else{
                echo "no data";
            }

            echo json_encode($research);
        }else{
            echo "no data";
        }

        

    }
   

    function getAuthor($researchId, $conn){
        $authors = array();

        $sqlStr = "SELECT authors.AuthorId ,CONCAT(authors.FName,' ', authors.MName, ' ', authors.LName) AS Fullname FROM authors INNER JOIN researchauthor ON authors.AuthorId = researchauthor.AuthorId where researchauthor.ResearchId = '$researchId'";        

        $result_2 = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: get research - get authors : function");
        if (mysqli_num_rows($result_2) > 0)
        {
            while ($row_2 = $result_2 -> fetch_row())
            {
                array_push($authors, 
                    [
                        "authorId" => $row_2[0],
                        "fullname" => $row_2[1]
                    ]
                );
            }

            return $authors;
        }
        
    }

    function getResearchSubDetails($researchId,$conn){
        $id = $researchId;
        $subDetailsCounter = array();

        $sqlStr = "SELECT COUNT(*) journalCount FROM researchjournal WHERE `ResearchId` = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: count journal keywords");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                array_push($subDetailsCounter,
                    [
                        "journal" => $row[0]
                    ]
                );
            }
        }

        $sqlStr = "SELECT COUNT(*) presentationCount FROM researchpresentation WHERE ResearchId = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: count journal keywords");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                array_push($subDetailsCounter, 
                    [
                        "presentation" => $row[0]
                    ]
                    );
            }
        }

        $sqlStr = "SELECT COUNT(*) fundSource FROM researchfunding WHERE ResearchId = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: count journal keywords");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                array_push($subDetailsCounter, 
                    [
                        "fund" => $row[0]
                    ]
                    );
            }
        }

        $sqlStr = "SELECT COUNT(*) patentCount FROM researchpatents WHERE ResearchId = '$id'";
        $result = mysqli_query($conn, $sqlStr) or die(mysqli_error()."line: count journal keywords");
        if (mysqli_num_rows($result) > 0){
            while ($row = $result -> fetch_row()){
                array_push($subDetailsCounter, 
                    [
                        "patent" => $row[0]
                    ]
                    );
            }
        }

        return $subDetailsCounter;
    }




    function formatDateLong($dateStr){
        $date= date_create($dateStr);
        $date = date_format($date,"F d, Y");
        
        return $date;
    }

    // echo formatDateLong("2020-04-15");
?>