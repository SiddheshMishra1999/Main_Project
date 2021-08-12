<html>
<head> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="navbar">
        <div class="container">
        <a class="logo" href="Index.php"><img class="logo" width = "60" height="60" src="Beechtown Pediatric Center.png"> </a>

            <nav>
                <ul class="main-nav"> 
                    <li><a href="Index.php">Home</a></li>
                    <li ><a href="Person_display.php">Person</a></li>
                    <li class="vaccine"><a href="#">Vaccines</a></li>
                    <li><a href="Received_display.php">Vaccinations</a></li>
                    <li><a href="Facility.php">Facilities</a></li>
                    <li><a href="Workers.php">Health Safety Workers</a></li>
                    <li><a href='queries.php'> Search Results </a> </li>
                    
                </ul>
                
            </nav>
        </div>
  </div>


<?php

include_once 'server.php';

$query = "SELECT Vaccine.vaccine_id, type_name, description, status, date_of_sus, date_of_approval 
FROM Vaccine, Vaccination_records 
WHERE (Vaccine.vaccine_id = Vaccination_records.Vaccine_id);";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);
?>
<div class="container">
  <div>
  <label id="reception_table_label" for="reception_table"> <h4>List of all shipments:<h4> </label>
  <table id='reception_table' class='reception_table'>
<thead>
<th>Vaccine ID </th>
<th>Type Name </th>
<th>Description</th>
<th>Status </th>
<th>Date of Suspension  </th>
<th>Date of Approval  </th>
</thead>
<tbody>
  </div>
<?php



while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['vaccine_id'] . "</td>
    <td>" . $row['type_name'] . "</td>
    <td>" . $row['description'] ."</td>
    <td>" . $row['status'] . "</td>
    <td>" . $row['date_of_sus'] ."</td>
    <td>" . $row['date_of_approval'] . "</td>
    </tr>";  
}


mysqli_close($db); //Make sure to close out the database connection

?>
</tbody>
</table>
</div>
</body>
</html>
