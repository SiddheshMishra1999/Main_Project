<html>
<head> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="navbar">
        <div class="container">
            <a class="logo" href="#">Comp 353 </a>

            <nav>
                <ul class="main-nav"> 
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="Person_display.php">Person</a></li>
                    <li><a href="Vaccine.php">Vaccines</a></li>
                    <li class="facility"><a href="Facility.php">Facilities</a></li>
                    <li><a href ="Workers.php">Workers</a></li>
                </ul>

                <ul class="side-nav" style="Float=Right">
                    <li><a href="Person.php">Add a New Person </li>
                    <li><a href="DeletePerson.php">Delete a Person </li>
                    <li><a href="EditPerson.php">Edit a Person </li>
                </ul>
                
            </nav>
        </div>
  </div>

</body>
</html>


<?php

include_once 'server.php';

$query = "SELECT transfer_num, Facility.name, Vaccine.type_name, send_date, reception_date, count_send, facility_to, message FROM Transfer,Facility, Vaccine WHERE Facility.facility_id = Transfer.facility_id AND Vaccine.vaccine_id = Transfer.vaccine_id ";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);

echo "<table id='transfer_table' class='transfer_table' table border='1'>

<th>Transfer Number </th>
<th> Facility (Sender) </th>
<th>Vaccine Name </th>
<th>Date of Transfer Sent</th>
<th>Date of Transfer Reception </th>
<th>Amount of Vaccines Sent  </th>
<th>Facility (Receiver)</th>
<th>Status of Tranfer </th>

";

while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['transfer_num'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['type_name'] ."</td>
    <td>" . $row['send_date'] . "</td>
    <td>" . $row['reception_date'] ."</td>
    <td>" . $row['count_send'] . "</td>
    <td>" . $row['facility_to'] . "</td>
    <td>" . $row['message'] ."</td>

    </tr>";  
}

echo "</table>"; //Close the table in HTML

mysqli_close($db); //Make sure to close out the database connection

?>
