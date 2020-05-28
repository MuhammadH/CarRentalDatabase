

<?php
    $type = $_POST['Type'];
    $startDate = $_POST['StartDate'];
    $dow = $_POST['DoW'];
    $cid = $_POST['ID'];
    
    $conn = new mysqli("localhost", "root", "", "CAR_RENTALS_HUSSAIN");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "got connection </br>";
    
    // find an open vehicle
    // SELECT V.Vid, V.model, V.year FROM VEHICLE V, VAN VA WHERE V.Vid = VA.Vobj
    $ask = "SELECT V.Vid, V.model, V.year, VA.wr, VA.dr FROM VEHICLE V, " . $type . " VA WHERE V.Vid = VA.Vobj";
    
    $result = $conn->query($ask);
    if ($result) {
        echo "asked server for cars! </br>";
    } else {
        echo "Error: " . $ask . "</br>";
        die();
    }
    
    
    $curID = 0;
    $curModel = 'NA';
    $curYear = 0;
    $curWR = 0;
    $curDR = 0;
    while($row = $result->fetch_assoc()) {
        $useThis = TRUE;
        
        $curID = $row["Vid"];
        $curModel = $row["model"];
        $curYear = $row["year"];
        
        $curWR = $row["wr"];
        $curDR = $row["dr"];
        
        $ask2 = "SELECT * FROM RENTAL R WHERE R.Veh = " . $curID;
        $result2 = $conn->query($ask2);
        
        if ($result2) {
            while($row2 = $result2->fetch_assoc()) {
                $useThis = FALSE;
            }
        } else {
            echo "asjdfmrekjhekjhrg</br>";
        }
        
        if($useThis == TRUE) {
            break;
        }
    }
    
    
    
    echo "reserving: :</br>Car ID:";
    echo $curID;
    echo "</br>";
    echo $curModel;
    echo "</br>";
    echo $curYear;
    echo "</br>";
    
    
    // INSERT INTO RENTAL VALUES(NULL, '2020-06-24' , NULL, NULL, 3, 5)
    $q = "INSERT INTO RENTAL VALUES(NULL, '";
    $q .= $startDate;
    $q .= "' , NULL, NULL, ";
    $q .= $cid;
    $q .= ", ";
    $q .= $curID;
    $q .= ");";
    
    
    if ($conn->query($q) == TRUE) {
        echo "Made an entry! </br>";
    } else {
        echo "Error: " . $q . "</br>";
        die();
    }
    
    $newID = $conn->insert_id;
    
    $finalRate = 0;
    
    if($dow == "DAILY") {
        $finalRate = $curDR;
    } else {
        $finalRate = $curWR;
    }
    
    $q2 = "INSERT INTO " . $dow . " VALUES(" . $newID . ", NULL, " . $finalRate  . ");";
    
    if ($conn->query($q2) == TRUE) {
        echo "Yay! </br>";
    } else {
        echo "Error: " . $q2 . "</br>";
        die();
    }
    
?>

