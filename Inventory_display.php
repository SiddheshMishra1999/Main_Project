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

$query_1 = "SELECT Inventory.facility_id, Vaccine.type_name, Inventory.amount
FROM Inventory, Vaccine
WHERE (Vaccine.vaccine_id = Inventory.vaccine_id)";

$results = mysqli_query($db, $query_1);

echo "<table id = 'inventory_table' class = 'inventory_table' table border = '1'>

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
";

while($row = mysqli_fetch_array($results)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['type_name'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

echo "</table>";

mysqli_close($db);



?>
