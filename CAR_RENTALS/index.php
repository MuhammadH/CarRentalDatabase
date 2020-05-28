
<html>
<body>


<?php
    $new_string = "hi!</br></br>(The full database is on the bottom)</br></br>";
    echo $new_string;
?>

<?php
    $new_string = "Enter a new customer:</br>";
    echo $new_string;
?>


    <div>
        <form action="newCustomer.php" method="POST">
            <p>
                <label>First Initial:</label>
                <input type="text" name="Finitial">
            </p>
            <p>
                <label>Last Name:</label>
                <input type="text" name="Lname">
            </p>
            <p>
                <label>Phone (like xxx-xxx-xxxx):</label>
                <input type="text" name="Phone">
            </p>
            <p>
                <input type="submit" id="btn" value="Submit">
            </p>
        </form>
    </div>

<?php
    $new_string = "Enter a new car:</br>";
    echo $new_string;
?>

    <div>
        <form action="newVeh.php" method="POST">
            <p>
                <label>Model:</label>
                <input type="text" name="Model">
            </p>
            <p>
                <label>Year:</label>
                <input type="text" name="Year">
            </p>
            <p>
                <label>Type of car (COMPACT, SUV, etc):</label>
                <input type="text" name="Type">
            </p>
            <p>
                <input type="submit" id="btn2" value="Submit">
            </p>
        </form>
    </div>

<?php
    $new_string = "Start new rental:</br>";
    echo $new_string;
?>

    <div>
        <form action="startNewRent.php" method="POST">
            <p>
                <label>Type of car you want (COMPACT, SUV, etc):</label>
                <input type="text" name="Type">
            </p>
            <p>
                <label>When do you want this rental to start? (YYYY-MM-DD):</label>
                <input type="text" name="StartDate">
            </p>
            <p>
                <label>DAILY or WEEKLY?</label>
                <input type="text" name="DoW">
            </p>
            <p>
                <label>Customer ID: (can get list of ids using a query)</label>
                <input type="text" name="ID">
            </p>
            <p>
                <input type="submit" id="btn3" value="Submit">
            </p>
        </form>
    </div>



<?php
    $new_string = "Start return:</br>";
    echo $new_string;
?>

    <div>
        <form action="startReturn.php" method="POST">
            <p>
                <label>Rental ID: (can get list of ids using a query)</label>
                <input type="text" name="ID">
            </p>
            <p>
                <label>Was it DAILY or WEEKLY?</label>
                <input type="text" name="DoW">
            </p>
            <p>
                <label>Return date (YYYY-MM-DD):</label>
                <input type="text" name="ReturnDate">
            </p>
            <p>
                <input type="submit" id="btn3" value="Submit">
            </p>
        </form>
    </div>


<?php
    $new_string = "Change rate:</br>";
    echo $new_string;
?>

    <div>
        <form action="changeRate.php" method="POST">
            <p>
                <label>Type to change (COMPACT, SUV, etc)</label>
                <input type="text" name="type">
            </p>
            <p>
                <label>New daily rate:</label>
                <input type="text" name="newDR">
            </p>
            <p>
                <label>New weekly rate:</label>
                <input type="text" name="newWR">
            </p>
            <p>
                <input type="submit" id="btn3" value="Submit">
            </p>
        </form>
    </div>

<?php
    $conn = new mysqli("localhost", "root", "", "CAR_RENTALS_HUSSAIN");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "got connection </br>";
    
    $ask = "SELECT * FROM CUSTOMER;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["Cid"] . " " . "Name: " . $row["Finitial"] . " " . $row["Lname"] . " " . "</br>";
    }
    
    $ask = "SELECT V.Vid as VID, V.Model, V.Year, VA.dr as DailyRate, VA.wr as WeeklyRate FROM VEHICLE V, VAN VA WHERE VA.Vobj = V.Vid;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["VID"] . " " . "Year: " . $row["Year"] . " Model: " . $row["Model"] . " " . "Type: VAN" . "</br>";
    }
    
    $ask = "SELECT V.Vid as VID, V.Model, V.Year, VA.dr as DailyRate, VA.wr as WeeklyRate FROM VEHICLE V, COMPACT VA WHERE VA.Vobj = V.Vid;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["VID"] . " " . "Year: " . $row["Year"] . " Model: " . $row["Model"] . " " . "Type: COMPACT" . "</br>";
    }
    
    $ask = "SELECT V.Vid as VID, V.Model, V.Year, VA.dr as DailyRate, VA.wr as WeeklyRate FROM VEHICLE V, MEDIUM VA WHERE VA.Vobj = V.Vid;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["VID"] . " " . "Year: " . $row["Year"] . " Model: " . $row["Model"] . " " . "Type: MEDIUM" . "</br>";
    }
    
    $ask = "SELECT V.Vid as VID, V.Model, V.Year, VA.dr as DailyRate, VA.wr as WeeklyRate FROM VEHICLE V, LARGE VA WHERE VA.Vobj = V.Vid;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["VID"] . " " . "Year: " . $row["Year"] . " Model: " . $row["Model"] . " " . "Type: LARGE" . "</br>";
    }
    
    $ask = "SELECT V.Vid as VID, V.Model, V.Year, VA.dr as DailyRate, VA.wr as WeeklyRate FROM VEHICLE V, SUV VA WHERE VA.Vobj = V.Vid;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["VID"] . " " . "Year: " . $row["Year"] . " Model: " . $row["Model"] . " " . "Type: SUV" . "</br>";
    }
    
    $ask = "SELECT V.Vid as VID, V.Model, V.Year, VA.dr as DailyRate, VA.wr as WeeklyRate FROM VEHICLE V, TRUCK VA WHERE VA.Vobj = V.Vid;";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "ID:" . $row["VID"] . " " . "Year: " . $row["Year"] . " Model: " . $row["Model"] . " " . "Type: TRUCK" . "</br>";
    }
    
    $ask = "SELECT R.Rid as RID, R.StartDate, R.RetDate, R.AmtDue, R.Cus AS CUSTOMERID, R.Veh AS CARID FROM RENTAL R, DAILY D WHERE R.Rid = D.Robj";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "RID:" . $row["RID"] . " " . " Start: " . $row["StartDate"] . " Return Date: " . $row["RetDate"] . " Amount Due: " . $row["AmtDue"] . " CustomerID: " . $row["CUSTOMERID"] . " CAR ID: " . $row["CARID"] . " Type: DAILY" . "</br>";
    }
    
    $ask = "SELECT R.Rid as RID, R.StartDate, R.RetDate, R.AmtDue, R.Cus AS CUSTOMERID, R.Veh AS CARID FROM RENTAL R, WEEKLY D WHERE R.Rid = D.Robj";
    $result = $conn->query($ask);
    while($row = $result->fetch_assoc()) {
        echo "RID:" . $row["RID"] . " " . " Start: " . $row["StartDate"] . " Return Date: " . $row["RetDate"] . " Amount Due: " . $row["AmtDue"] . " CustomerID: " . $row["CUSTOMERID"] . " CAR ID: " . $row["CARID"] . " Type: WEEKLY" . "</br>";
    }
    
?>

</body>

