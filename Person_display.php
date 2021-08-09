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
                    <li class="person"><a href="Person_display.php">Person</a></li>
                    <li><a href="Vaccine.php">Vaccines</a></li>
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

$query = "SELECT * FROM Person";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);

echo "<table id='person_table' class='person_table' table border='1'>

<th>Person ID </th>
<th>SSN </th>
<th>Passport Number</th>
<th>Medicare </th>
<th>First Name </th>
<th>Last Name </th>
<th>Date of Birth</th>
<th>Telephone </th>
<th>Address </th>
<th>Email </th>
<th>Citizenship </th>
<th>Postal Code </th>

";

while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['person_id'] . "</td>
    <td>" . $row['SSN'] . "</td>
    <td>" . $row['passport_num'] ."</td>
    <td>" . $row['medicare'] . "</td>
    <td>" . $row['first_name'] ."</td>
    <td>" . $row['last_name'] . "</td>
    <td>" . $row['dob'] . "</td>
    <td>" . $row['telephone'] ."</td>
    <td>" . $row['address'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['citizenship'] ."</td>
    <td>" . $row['postal_code'] . "</td>
    </tr>";  
}

echo "</table>"; //Close the table in HTML

mysqli_close($db); //Make sure to close out the database connection

?>
