<html>
<head> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="navbar">
        <div class="container">
            <a class="logo" href="Index.php">Comp 353 </a>

            <nav>
                <ul class="main-nav"> 
                    <li><a href="Facility.php">Facility</a></li>
                    <li class="home"><a href ="#"> > Shipments</a></li>
                </ul>
                
            </nav>
        </div>
  </div>

</body>
</html>


<?php

include_once 'server.php';

$query = "SELECT shipment_num, Facility.name, Vaccine.type_name, date_of_reception, amount 
FROM Reception, Facility, Vaccine 
WHERE Facility.facility_id = Reception.facility_id AND Vaccine.vaccine_id = Reception.vaccine_id
ORDER BY Reception.facility_id, Reception.shipment_num ";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);

echo "<table id='transfer_table' class='transfer_table' table border='1'>

<th>Shipment Number </th>
<th> Facility Name </th>
<th>Vaccine Name </th>
<th>Date of Reception </th>
<th>Amount of Vaccines </th>

";

while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['shipment_num'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['type_name'] ."</td>
    <td>" . $row['date_of_reception'] . "</td>
    <td>" . $row['amount'] ."</td>


    </tr>";  
}

echo "</table>"; //Close the table in HTML

mysqli_close($db); //Make sure to close out the database connection

?>
