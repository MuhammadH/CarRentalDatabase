

<?php
    $finit = $_POST['Finitial'];
    $lname = $_POST['Lname'];
    $Phone = $_POST['Phone'];
    
    echo "you entered:</br>";
    echo $finit;
    echo "</br>";
    echo $lname;
    echo "</br>";
    echo $Phone;
    echo "</br>";
    
    $conn = new mysqli("localhost", "root", "", "CAR_RENTALS_HUSSAIN");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "got connection </br>";
    

    
    $q = "INSERT INTO CUSTOMER VALUES(NULL, '";
    $q .= $finit;
    $q .= "' , '";
    $q .= $lname;
    $q .= "','";
    $q .= $Phone;
    $q .= "');";
    
    
    if ($conn->query($q) == TRUE) {
        echo "Made an entry! </br>";
    } else {
        echo "Error: " . $q . "</br>";
    }
?>

