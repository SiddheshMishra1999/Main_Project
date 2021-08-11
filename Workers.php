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
                    <li><a href="Vaccine.php">Vaccines</a></li>
                    <li><a href="Facility.php">Facilities</a></li>
                    <li class="workers"><a href ="#">Health Safety Worker</a></li>
                </ul>

            </nav>
        </div>
  </div>



<?php

include_once 'server.php';

$query_1 = "SELECT first_name, last_name, Worker.employee_id, Worker.person_id, Works_at.facility_id, start_date, end_date
FROM Worker, Works_at, Person, Facility
WHERE (Worker.manages_facility_id IS NULL)
AND (Person.person_id = Worker.person_id)
AND (Works_at.facility_id = Facility.facility_id)
AND (Worker.employee_id = Works_at.employee_id)
GROUP BY start_date
ORDER BY end_date ASC , start_date ASC";


$query_2 = "SELECT first_name, last_name, Worker.employee_id, Worker.person_id, Worker.manages_facility_id, start_date, end_date
FROM Worker, Works_at, Person, Facility
WHERE (Worker.manages_facility_id IS NOT NULL)
AND (Person.person_id = Worker.person_id)
AND (Works_at.facility_id = Facility.facility_id)
AND (Worker.employee_id = Works_at.employee_id)
GROUP BY start_date
ORDER BY end_date ASC, start_date ASC";


$results1 = mysqli_query($db, $query_1);
$results2 = mysqli_query($db, $query_2);

?>
<div class="container">
  <div>
  <label id="emp_table_label" for="emplaoyee_table"> <h4>List of all Workers:<h4> </label>
  <table id = 'employee_table' class = 'employee_table'>
<thead>
<th> First Name </th>
<th> Last Name </th>
<th> Employee ID </th>
<th> Person ID </th>
<th> Facility ID </th>
<th> Start Date </th>
<th> End Date </th>
</thead>
<tbody>
  </div>

<?php


while($row = mysqli_fetch_array($results1)) {

    echo "<tr>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['employee_id'] . "</td>
    <td> " . $row['person_id'] ."</td>
    <td> " .$row['facility_id'] ."</td>
    <td> " .$row['start_date'] ."</td>
    <td> " .$row['end_date'] . "</td>
    </tr>";
}
?>
</tbody>
</table>
</div>
<div class="container">
  <div>
  <label id="emp_table_label" for="emplaoyee_table2"> <h4>List of all Managers:<h4> </label>
  <table id = 'employee_table2' class = 'employee_table2'>
  <thead>
 <th> First Name </th>
<th> Last Name </th>
<th> Employee ID </th>
<th> Person ID </th>
<th> Managed Facility ID </th>
<th> Start Date </th>
<th> End Date </th>
</thead>
<tbody>
  </div>

  <?php

while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['employee_id'] . "</td>
    <td> " . $row['person_id'] ."</td>
    <td> " .$row['manages_facility_id'] ."</td>
    <td> " .$row['start_date'] ."</td>
    <td> " .$row['end_date'] . "</td>
    </tr>";
}


mysqli_close($db);



?>
</tbody>
</table>
</div>
</body>
</html>
