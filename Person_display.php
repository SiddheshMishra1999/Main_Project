<html>
<head> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="navbar">
        <div class="container">
        <a class="logo" href="Index.php"><img class="logo" width = "60" height="60" src="Beechtown Pediatric Center.png"> </a>

            <nav>
                <ul >
                    <li class="left-menu-items"><a href="Index.php">Home</a></li>
                    <li class="left-menu-items"  style="background-color: orange;"><a href="Person_display.php">Person</a></li>
                    <li class="left-menu-items"><a href="Vaccine.php">Vaccines</a></li>
                    <li class="left-menu-items"><a href="Received_display.php">Vaccinations</a></li>
                    <li class="left-menu-items" ><a href="Facility.php">Facilities</a></li>
                    <li class="left-menu-items"><a href="Workers.php">Health Safety Workers</a></li>
                    <li class="left-menu-items"><a href='queries.php'> Search Results </a> </li>
                    <li class="left-menu-items"><a href="Person.php">Add a New Person</a></li>
                    <li class="left-menu-items"><a href="DeletePerson.php">Delete a Person </a></li>
                    <li class="left-menu-items"><a href="EditPerson.php">Edit a Person</a></li>

                </ul>

            </nav>


        </div>
  </div>


<?php

include_once 'server.php';

$query = "SELECT * FROM Person GROUP BY Person.person_id, isActive";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);
?>
<div class="container">
  <div>
  <label id="Person_table_label" for="Person_table"> <h4>List of People in the Database:<h4> </label>
  <table id='person_table' class='person_table'>
<thead>
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
<th> Active Status </th>
</thead>
<tbody>
  </div>

<?php


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
    <td> " .$row['isActive'] . " </td>
    </tr>";  
}


mysqli_close($db); //Make sure to close out the database connection

?>
</tbody>
</table>
</div>
</body>
</html>



