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
                    <li><a href="Index.php">Home</a></li>
                    <li ><a href="Person_display.php">Person</a></li>
                    <li><a href="Vaccine.php">Vaccines</a></li>
                    <li class="facility"><a href="#">Facilities</a></li>
                    <li><a href="Workers.php">Health Safety Workers</a></li>
                </ul>

                <ul class="side-nav" style="Float=Right">
                    <li><a href="FacilityPage.php">Add a New Facilitly </li>
                    <li><a href="DeleteFacility.php">Delete a Facility </li>
                    <li><a href="EditFacility.php">Edit a Facility </li>
                </ul>

                <ul class="side-side-nav" >
                    <li style="Float=Right"><a href="Transfer_display.php">Transfers </li>
                    <li style="Float=Right"><a href="Reception_display.php">Shipments </li>
                    <li style="Float=Right"><a href="Inventory_display.php">Inventory  </li>
                </ul>

            </nav>
        </div>
  </div>

<?php

include_once 'server.php';

$query_1 = "SELECT *
FROM Facility
GROUP BY Facility.facility_id, Facility.isactive";

$results = mysqli_query($db, $query_1);
?>
<div class="container">
<div>
<label id="facility_table_label" for="facility_table"> <h4>List of all Vaccination Facilities:<h4> </label>
<table id = 'facility_table' class = 'facility_table' >
<thead>
<th> Facility ID </th>
<th> Facility Type </th>
<th> Faciliy Name </th>
<th>  Address </th>
<th> Webaddress </th>
<th> Telephone </th>
<th> Postal Code </th>
<th> Active Status </th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['type_name'] . "</td>
    <td> " . $row['name'] . "</td>
    <td> " . $row['address'] ."</td>
    <td> " .$row['webaddress'] ."</td>
    <td> " .$row['telephone'] ."</td>
    <td> " .$row['postal_code'] . "</td>
    <td> " .$row['isactive'] . " </td>
    </tr>";
}

echo "</table>";

mysqli_close($db);



?>
</tbody>
</table>
</div>
</body>
</html>