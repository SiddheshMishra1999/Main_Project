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
                    <li class="left-menu-items"><a href="Person_display.php">Person</a></li>
                    <li class="left-menu-items"><a href="Vaccine.php">Vaccines</a></li>
                    <li class="left-menu-items" style="background-color: orange;"><a href="Received_display.php">Vaccinations</a></li>
                    <li  class="left-menu-items" ><a href="Facility.php">Facilities</a></li>
                    <li class="left-menu-items" ><a href="Workers.php">Health Safety Workers</a></li>
                    <li class="left-menu-items"><a href='queries.php'> Search Results </a> </li>

                    <li class="left-menu-items"><a href="Received.php">Vaccinate someone </a></li>
                    <li class="left-menu-items"><a href="Admin.php"> Change Eligible Age Groups</a> </li>
 
                </ul>

                
            </nav>
        </div>
  </div>



<?php

include_once 'server.php';

$query = "SELECT p.person_id, p.first_name, p.last_name, r.dose_num, r.date_received, f.name, r.facility_id, wo.first_name AS Employee_First_Name, wo.last_name AS Employee_Last_Name, w.employee_id, v.type_name, r.vaccine_id
FROM Person p, Person wo, Facility f, Received r, Vaccine v, Worker w
WHERE (p.person_id = r.person_id)
AND (f.facility_id =  r.facility_id)
AND (v.vaccine_id = r.vaccine_id)
AND (w.employee_id = r.employee_id)
AND (w.person_id = wo.person_id)
ORDER BY p.person_id ASC, dose_num ASC";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);
?>
<div class="container">
  <div>
  <label id="Received_table_label" for="Receieved_table"> <h4>List of People who have been vaccinated:<h4> </label>
  <table id='Receieved_table' class='Received_table'>
<thead>
<th>Person ID </th>
<th>First Name</th>
<th>Last Name</th>
<th>Dose Number </th>
<th>Date Vaccinated </th>
<th>Vaccination Location </th>
<th>Location ID</th>
<th>Employee First Name </th>
<th>Employee Last Name </th>
<th>Employee ID </th>
<th>Vaccine type  </th>
<th>Vaccine ID </th>
</thead>
<tbody>
  </div>

<?php


while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['person_id'] . "</td>
    <td>" . $row['first_name'] . "</td>
    <td>" . $row['last_name'] ."</td>
    <td>" . $row['dose_num'] . "</td>
    <td>" . $row['date_received'] ."</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['facility_id'] . "</td>
    <td>" . $row['Employee_First_Name'] ."</td>
    <td>" . $row['Employee_Last_Name'] . "</td>
    <td>" . $row['employee_id'] . "</td>
    <td>" . $row['type_name'] ."</td>
    <td>" . $row['vaccine_id'] . "</td>
    </tr>";  
}


mysqli_close($db); //Make sure to close out the database connection

?>
</tbody>
</table>
</div>
</body>
</html>



