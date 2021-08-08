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
                    <li class="workers"><a href ="Workers.php">Workers</a></li>
                </ul>
                
            </nav>
        </div>
  </div>

  <h1>Hello?  This is the vaccine page</h1>
 
</body>
</html>

<?php

include_once 'server.php';

$query = "SELECT first_name, last_name, Worker.employee_id, Worker.person_id, facility_id, start_date, end_date
FROM Worker, Works_at, Person
WHERE (Worker.manages_facility_id IS NULL) AND (Person.person_id = Worker.person_id)";

$results = mysqli_query($db, $query);

echo "<table id = 'employee_table' class = 'employee_table' table border = '1'>

<th> first name </th>
<th> last name </th>
<th> employee id </th>
<th> person id </th> 
<th> facility id </th>
<th> start date </th>
<th> end date </th>
";

