

<?php
    $model = $_POST['Model'];
    $year = $_POST['Year'];
    $type = $_POST['Type'];
    
    echo "you entered:</br>";
    echo $model;
    echo "</br>";
    echo $year;
    echo "</br>";
    
    $conn = new mysqli("localhost", "root", "", "CAR_RENTALS_HUSSAIN");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "got connection </br>";
    

    
    $q = "INSERT INTO VEHICLE VALUES(NULL, ";
    $q .= $year;
    $q .= " , '";
    $q .= $model;
    $q .= "');";
    
    
    if ($conn->query($q) == TRUE) {
        echo "Made an entry! </br>";
    } else {
        echo "Error: " . $q . "</br>";
        die();
    }
    
    $id = $conn->insert_id;
    
    $q2 = "INSERT INTO ";
    $q2 .= $type;
    $q2 .= " VALUES(";
    $q2 .= $id;
    $q2 .= ", ";
    $q2 .= "DEFAULT";
    $q2 .= ", ";
    $q2 .= "DEFAULT";
    $q2 .= ");";
    
    if ($conn->query($q2) == TRUE) {
        echo "Yay! </br>";
    } else {
        echo "Error: " . $q . "</br>";
        die();
    }
?>

