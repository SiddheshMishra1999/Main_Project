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

                    <li ><a href="Facility.php">Facilities</a></li>
                    <li class="home"><a href ="#"> > Inventory</a></li>
                </ul>

            </nav>
        </div>
  </div>

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
?>
<div class="container">
<div>
<label id="Pfizer_inventory_label" for="inventory_table1"> <h4>Inventory of vaccine type Pfizer:<h4> </label>
<table id = 'inventory_table1' class = 'inventory_table1' >
<thead>
<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results1)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results2 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Moderna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >
<thead>
<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
</thead>
<tbody>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results3 = mysqli_query($db, $query_3);
?>
</tbody>
</table>
</div>
<div class="container">
 <div>
 <label id="Astra_inventory_label" for="inventory_table3"> <h4>Inventory of vaccine type Astra Zeneca:<h4> </label>
 <table id = 'inventory_table3' class = 'inventory_table3'>
    <thead>
<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
</thead>
<tbody>
 </div>
<?php
 

while($row = mysqli_fetch_array($results3)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}
mysqli_close($db);
?>

</tbody>
</table>  
</div>
</body>
</html>