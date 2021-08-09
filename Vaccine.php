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
                    <li ><a href="Person_display.php">Person</a></li>
                    <li class="vaccine"><a href="Vaccine.php">Vaccines</a></li>
                    <li><a href="Facility.php">Facilities</a></li>
                    <li><a href ="Workers.php">Workers</a></li>
                </ul>
                
            </nav>
        </div>
  </div>

</body>
</html>
<?php

include_once 'server.php';

$query = "SELECT Vaccine.vaccine_id, type_name, description, status, date_of_sus, date_of_approval 
FROM Vaccine, Vaccination_records 
WHERE (Vaccine.vaccine_id = Vaccination_records.Vaccine_id);";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);

echo "<table id='vaccine_table' class='vaccine_table' table border='1'>

<th>Vaccine ID </th>
<th>Type Name </th>
<th>Description</th>
<th>Status </th>
<th>Date of Suspension  </th>
<th>Date of Approval  </th>
";

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

echo "</table>"; //Close the table in HTML

mysqli_close($db); //Make sure to close out the database connection

?>
