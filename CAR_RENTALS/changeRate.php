

<?php
    $type = $_POST['type'];
    $newDR = $_POST['newDR'];
    $newWR = $_POST['newWR'];
    
    $conn = new mysqli("localhost", "root", "", "CAR_RENTALS_HUSSAIN");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "got connection </br>";
    
    
    // update specialty with new DEFAULTS
    // ALTER TABLE Persons
    // ALTER City SET DEFAULT 'Sandnes';
    $upDa = "ALTER TABLE " . $type . " ALTER wr SET DEFAULT " . $newWR . " ;";
    $result = $conn->query($upDa);
    if ($result) {
        
    } else {
        echo "Error: " . $upDa . "</br>";
    }
    
    $upDa = "ALTER TABLE " . $type . " ALTER dr SET DEFAULT " . $newDR . " ;";
    $result = $conn->query($upDa);
    if ($result) {
        
    } else {
        echo "Error: " . $upDa . "</br>";
    }
    
    // update each obj of this type
    // UPDATE table_name
    // SET column1 = value1, column2 = value2, ...
    // WHERE condition;
    $upDa = "UPDATE " . $type . " SET wr = " . $newWR . " WHERE Vobj > -1";
    $result = $conn->query($upDa);
    if ($result) {
        echo "Updated weekly rate!</br>";
    } else {
        echo "Error: " . $upDa . "</br>";
    }
    
    $upDa = "UPDATE " . $type . " SET dr = " . $newDR . " WHERE Vobj > -1";
    $result = $conn->query($upDa);
    if ($result) {
        echo "Updated daily rate!</br>";
    } else {
        echo "Error: " . $upDa . "</br>";
    }
    
?>
