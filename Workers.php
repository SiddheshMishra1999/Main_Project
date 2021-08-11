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
                    <li class="workers"><a href ="#">Workers</a></li>
                </ul>

            </nav>
        </div>
  </div>

  <h1>Workers</h1>

</body>
</html>

<?php

include_once 'server.php';

$query_1 = "SELECT first_name, last_name, Worker.employee_id, Worker.person_id, Works_at.facility_id, start_date, end_date
FROM Worker, Works_at, Person, Facility
WHERE (Worker.manages_facility_id IS NULL)
AND (Person.person_id = Worker.person_id)
AND (Works_at.facility_id = Facility.facility_id)
AND (Worker.employee_id = Works_at.employee_id)";

$results = mysqli_query($db, $query_1);

echo "<table id = 'employee_table' class = 'employee_table' table border = '1'>

<th> First Name </th>
<th> Last Name </th>
<th> Employee ID </th>
<th> Person ID </th>
<th> Facility ID </th>
<th> Start Date </th>
<th> End Date </th>
";

while($row = mysqli_fetch_array($results)) {

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

echo "</table>";

mysqli_close($db);



?>
