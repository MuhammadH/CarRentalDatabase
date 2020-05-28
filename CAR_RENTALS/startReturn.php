

<?php
    $Rid = $_POST['ID'];
    $dow = $_POST['DoW'];
    $pureRet = $_POST['ReturnDate'];
    $returnDate = strtotime($_POST['ReturnDate']);
    
    $conn = new mysqli("localhost", "root", "", "CAR_RENTALS_HUSSAIN");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "got connection </br>";
    
    
    // get the start date for this rental
    $ask = "SELECT StartDate FROM RENTAL R WHERE R.Rid = " . $Rid;
    
    $result = $conn->query($ask);
    if ($result) {
        echo "found the entry </br>";
    } else {
        echo "Error: " . $ask . "</br>";
        die();
    }
    
    $startDate = date_create("1900-01-01");
    while($row = $result->fetch_assoc()) {
        
         $startDate = strtotime($row["StartDate"]);
        
    }
    
    $totalTime = $returnDate - $startDate;
    
    
    $rate = 0;
    if ($dow == "DAILY") {
        $totalTime = ceil($totalTime / 86400);
        echo "total time rented: " . $totalTime . " days" . "</br>";
        
        // UPDATE table_name
        // SET column1 = value1, column2 = value2, ...
        // WHERE condition;
        
        // update daily
        $upDa = "UPDATE DAILY SET NoOfDays = " . $totalTime . " WHERE Robj = " . $Rid . ";";
        $res = $conn->query($upDa);
        if($res) {
            echo "updated entry" . "</br>";
        } else {
            echo "Error: " . $upDa . "</br>";
            die();
        }
        
        // get total amount due
        $getRateStr = "SELECT setRate FROM DAILY WHERE Robj = " . $Rid . ";";
        $getRate = $conn->query($getRateStr);
        if($getRate) {
            while($row = $getRate->fetch_assoc()) {
                 $rate = $row["setRate"];
            }
        }
        
    } else {
        $totalTime = ceil($totalTime / 604800);
        echo "total time rented: " . $totalTime . " weeks " . "</br>";
        
        // update weekly
        $upDa = "UPDATE WEEKLY SET NoOfWeeks = " . $totalTime . " WHERE Robj = " . $Rid . ";";
        $res = $conn->query($upDa);
        if($res) {
            echo "updated entry" . "</br>";
        } else {
            echo "Error: " . $upDa . "</br>";
            die();
        }
        
        // get total amount due
        $getRateStr = "SELECT setRate FROM WEEKLY WHERE Robj = " . $Rid . ";";
        $getRate = $conn->query($getRateStr);
        if($getRate) {
            while($row = $getRate->fetch_assoc()) {
                 $rate = $row["setRate"];
            }
        }
    }
    
    // get total amount due
    $totalDue = $rate * $totalTime;
    // print amount due to screen
    echo "total amount due: $" . $totalDue . "</br>";
    
    // update RENTAL with end date and amount due
    $upDa = "UPDATE RENTAL SET AmtDue = " . $totalDue . " WHERE Rid = " . $Rid . ";";
    $result = $conn->query($upDa);
    if ($result) {
        
    } else {
        echo "Error: " . $upDa . "</br>";
    }
    
    $upDa = "UPDATE RENTAL SET RetDate = '" . $pureRet . "' WHERE Rid = " . $Rid . ";";
    $result = $conn->query($upDa);
    if ($result) {
        
    } else {
        echo "Error: " . $upDa . "</br>";
    }
    
?>
