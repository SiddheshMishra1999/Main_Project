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
                    <li style="Float=Right"><a href ="Reception.php">  Create a new Shipment</a></li>

                </ul>
                
            </nav>
        </div>
  </div>



<?php

include_once 'server.php';

$query = "SELECT shipment_num, Facility.name, Facility.facility_id, Vaccine.type_name, Vaccine.vaccine_id, date_of_reception, amount 
FROM Reception, Facility, Vaccine 
WHERE Facility.facility_id = Reception.facility_id AND Vaccine.vaccine_id = Reception.vaccine_id
ORDER BY Reception.facility_id, Reception.shipment_num ";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);
?>
<div class="container">
  <div>
  <label id="reception_table_label" for="reception_table"> <h4>List of all shipments:<h4> </label>
  <table id='reception_table' class='reception_table'>
<thead>
<th>Shipment Number </th>
<th> Facility Name </th>
<th> Facility ID (Sender) </th>
<th>Vaccine Name </th>
<th>Vaccine ID </th>
<th>Date of Reception </th>
<th>Amount of Vaccines Received  </th>
</thead>
<tbody>
  </div>
<?php


while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['shipment_num'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['facility_id'] . "</td>
    <td>" . $row['type_name'] ."</td>
    <td>" . $row['vaccine_id'] . "</td>
    <td>" . $row['date_of_reception'] . "</td>
    <td>" . $row['amount'] ."</td>




    </tr>";  
}

mysqli_close($db); //Make sure to close out the database connection

?>
</tbody>
</table>
</div>
</body>
</html>
