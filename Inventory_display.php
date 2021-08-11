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

FROM Inventory, Vaccine


echo "<table id = 'inventory_table1' class = 'inventory_table1' table border = '1'>

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
";


    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

echo "</table>";

mysqli_close($db);



?>
