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

                    <li ><a href="Facility.php">Facilities</a></li>
                    <li class="home"><a href ="#"> > Inventory</a></li>
                </ul>

            </nav>
        </div>
  </div>

</body>
</html>

<?php

include_once 'server.php';

$query_1 = "SELECT Inventory.facility_id, Vaccine.type_name AS 'Vaccine Type', Inventory.amount
FROM Inventory, Vaccine
WHERE (Inventory.vaccine_id = 1) AND (Inventory.vaccine_id = Vaccine.vaccine_id)";

$query_2 = "SELECT Inventory.facility_id, Vaccine.type_name AS 'Vaccine Type', Inventory.amount
FROM Inventory, Vaccine
WHERE (Inventory.vaccine_id = 2) AND (Inventory.vaccine_id = Vaccine.vaccine_id)";

$query_3 = "SELECT Inventory.facility_id, Vaccine.type_name AS 'Vaccine Type', Inventory.amount
FROM Inventory, Vaccine
WHERE (Inventory.vaccine_id = 3) AND (Inventory.vaccine_id = Vaccine.vaccine_id)";


$results1 = mysqli_query($db, $query_1);

echo "<table id = 'inventory_table1' class = 'inventory_table1' table border = '1'>

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
";

while($row = mysqli_fetch_array($results1)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results2 = mysqli_query($db, $query_2);

echo "<table id = 'inventory_table2' class = 'inventory_table2' table border = '1'>

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
";

while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results3 = mysqli_query($db, $query_3);

echo "<table id = 'inventory_table3' class = 'inventory_table3' table border = '1'>

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
";

while($row = mysqli_fetch_array($results3)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}



echo "</table>";

mysqli_close($db);



?>
