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
                    <li class="facility"><a href="Facility.php">Facilities</a></li>
                    <li><a href ="Workers.php">Workers</a></li>
                </ul>
                
            </nav>
        </div>
  </div>

</body>
</html>

<?php

include_once 'server.php';

$query_1 = "SELECT * FROM Facility";

$results = mysqli_query($db, $query_1);


<th> Facility ID </th>
<th> Facility Type </th>
<th> Faciliy Name </th>
<th>  Address </th> 
<th> Webadress </th>
<th> Telephone </th>
<th> Postal Code </th>
";

while($row = mysqli_fetch_array($results)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['type_name'] . "</td>
    <td> " . $row['name'] . "</td>
    <td> " . $row['address'] ."</td>
    <td> " .$row['webaddress'] ."</td>
    <td> " .$row['telephone'] ."</td>
    <td> " .$row['postal_code'] . "</td>
    </tr>"; 
}

echo "</table>";

mysqli_close($db);



?>
