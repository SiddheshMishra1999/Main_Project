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
                    <li><a href="Facility.php">Facility</a></li>
                    <li class="home"><a href ="#"> > Transfers</a></li>
                    <li style="Float=Right"><a href ="Transfer.php">  Create a new Transfer</a></li>

                </ul>
                
            </nav>
        </div>
  </div>

<?php

include_once 'server.php';

$query = "SELECT transfer_num, Fi.name AS Name_sender, Fi.Facility_id AS ID_sender, Vaccine.type_name, 
Vaccine.vaccine_id, send_date, reception_date, count_send, Ft.name AS Name_receiver,
Ft.facility_id AS ID_receiver, message 
FROM Transfer,Facility Fi, Vaccine, Facility Ft
WHERE Ft.facility_id = Transfer.facility_to AND Vaccine.vaccine_id = Transfer.vaccine_id
AND  Fi.facility_id = Transfer.facility_id";
$results = mysqli_query($db, $query);
// $user = mysqli_fetch_assoc($results);
?>
<div class="container">
  <div>
  <label id="transfer_table_label" for="transfer_table"> <h4>List of all Transfers between Facilities:<h4> </label>
  <table id='transfer_table' class='transfer_table'>
<thead>
<th>Transfer Number </th>
<th> Facility (Sender) </th>
<th> Facility ID (Sender) </th>
<th>Vaccine Name </th>
<th>Vaccine ID </th>
<th>Date of Transfer Sent</th>
<th>Date of Transfer Reception </th>
<th>Amount of Vaccines Sent  </th>
<th>Facility (Receiver)</th>
<th> Facility ID (Receiver) </th>
<th>Status of Tranfer </th>
</thead>
<tbody>
  </div>
<?php

while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
    echo "<tr>
    <td>" . $row['transfer_num'] . "</td>
    <td>" . $row['Name_sender'] . "</td>
    <td>" . $row['ID_sender'] . "</td>
    <td>" . $row['type_name'] ."</td>
    <td>" . $row['vaccine_id'] ."</td>
    <td>" . $row['send_date'] . "</td>
    <td>" . $row['reception_date'] ."</td>
    <td>" . $row['count_send'] . "</td>
    <td>" . $row['Name_receiver'] . "</td>
    <td>" . $row['ID_receiver'] . "</td>
    <td>" . $row['message'] ."</td>

    </tr>";  
}


mysqli_close($db); //Make sure to close out the database connection

?>
</tbody>
</table>
</div>
</body>
</html>

