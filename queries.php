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
                    <li><a href="Index.php">Home</a></li>
                    <li ><a href="Person_display.php">Person</a></li>
                    <li><a href="Vaccine.php">Vaccines</a></li>
                    <li> <a href ="facility.php">Facilities</a></li>
                    <li><a href="Workers.php">Health Safety Workers</a></li>
                    <li><a href="queries.php"><a href ='#'> Queries </a> <li>
                </ul>

            </nav>
        </div>
  </div>

<?php

include_once 'server.php';

$query_12 = "SELECT P.first_name, P.last_name, P.dob, P.email, P.telephone, city, date_received, vaccine_id, IF(COUNT(I.infection_date)> 0 , 'YES', 'NO') AS infected, I.num AS Number_of_infection
FROM Person P
LEFT JOIN Infected AS I on P.person_id =I.person_id
INNER JOIN Postal_code AS PC on P.postal_code = PC.postal_code
INNER JOIN Received AS R on P.person_id = R.person_id
WHERE (R.dose_num = 1)
AND P.telephone NOT IN (SELECT telephone FROM Received, Person WHERE Person.person_id = Received.person_id AND dose_num = 2) 
AND 60 <= FLOOR(DATEDIFF(CURRENT_DATE,P.dob)/365.25)
GROUP BY P.person_id";

$query_13 = "SELECT a.person_id, P.first_name, P.last_name, P.dob, P.email, P.telephone, PC.city,
IF(COUNT(I.infection_date) > 0, 'YES', 'NO') AS infected ,a.date_received, c.type_name, d.type_name
from Person P
LEFT JOIN Infected AS I on P.person_id = I.person_id
INNER JOIN Received AS a ON P.person_id = a.person_id
INNER JOIN Received AS b ON a.person_id = b.person_id
INNER JOIN Postal_code AS PC ON P.postal_code = PC.postal_code
INNER JOIN Vaccine AS c ON a.vaccine_id = c.vaccine_id
INNER JOIN Vaccine AS d ON b.vaccine_id = d.vaccine_id
where a.dose_num = 1
and a.dose_num <> b.dose_num
and a.vaccine_id <> b.vaccine_id
AND (PC.city = 'Montreal')";

$query_14 = "SELECT P.first_name, P.last_name, P.dob ,P.email, P.telephone, PC.city, P.person_id
FROM Received R, Postal_code PC, Infected I, Infected II, Person P
WHERE P.person_id = R.person_id
AND P.person_id = I.person_id
AND P.postal_code = PC.postal_code
AND I.person_id = II.person_id
AND I.variant_type <> II.variant_type
AND R.dose_num IS NOT NULL
AND R.person_id = I.person_id
GROUP BY P.person_id";

$query_15 = "SELECT province, amount, Vaccine.type_name
FROM Inventory, Facility, Facility_type, Postal_code, Vaccine
WHERE (Facility.postal_code = Postal_code.postal_code)
AND (Inventory.vaccine_id = Vaccine.vaccine_id)
AND (Inventory.facility_id = Facility.facility_id)
AND (Facility.type_name = Facility_type.name)
GROUP BY type_name,province
ORDER BY Province ASC, amount DESC";

$query_16 = "SELECT province,Vaccine.type_name, COUNT(DISTINCT Received.person_id) AS 'Total Number of vaccination'
FROM Received, Postal_code, Person, Vaccine , Facility
WHERE date_received between '2021-01-01' AND '2021-07-22'
AND (Received.vaccine_id = Vaccine.vaccine_id)
AND Received.facility_id = Facility.facility_id
AND Facility.postal_code = Postal_code.postal_code
GROUP BY Postal_code.province, Vaccine.type_name";

$query_17 = "SELECT city, COUNT(dose_num)
FROM Received, Postal_code, Person
WHERE date_received <= '2021-07-22'
AND date_received >= '2021-01-01'
AND Received.person_id = Person.person_id
AND Person.postal_code = Postal_code.postal_code
AND Postal_code.province = 'Quebec'
GROUP BY city";

$query_18 = "SELECT f.facility_id, f.name, f.address, f.type_name, f.telephone,
(SELECT COUNT(employee_id)
FROM Works_at
WHERE facility_id = f.facility_id
AND end_date IS NULL
GROUP BY f.facility_id) AS 'Total workers',
(SELECT COUNT(shipment_num) FROM Reception
WHERE facility_id = f.facility_id) AS 'Total shipments',
(SELECT SUM(amount) FROM Reception
WHERE facility_id = f.facility_id) AS 'Total Doses received',
(SELECT COUNT(transfer_num) FROM Transfer
WHERE facility_id = f.facility_id) AS 'Total amount of transfers',
(SELECT SUM(count_send) FROM Transfer
WHERE facility_id = f.facility_id
AND message ='Transfer completed') AS 'Total Doses transfered',
(SELECT SUM(count_send) FROM Transfer
WHERE facility_to = f.facility_id
AND message ='Transfer completed') AS 'Total Doses received from transfer',
inv.amount, inv.vaccine_id,
(SELECT COUNT(DISTINCT person_id) FROM Received
WHERE facility_id = f.facility_id) AS 'Total people vaccinated',
(SELECT COUNT(dose_num) FROM Received
WHERE facility_id = f.facility_id) AS 'Total doses received by people'
FROM Facility f
INNER JOIN Works_at AS wa ON f.facility_id = wa.facility_id
INNER JOIN Reception AS re ON f.facility_id = re.facility_id
INNER JOIN Postal_code AS pc ON f.postal_code = pc.postal_code
INNER JOIN Inventory AS inv ON f.facility_id = inv.facility_id
INNER JOIN Vaccine AS vac ON inv.vaccine_id = vac.vaccine_id
WHERE pc.city = 'Montreal'
AND wa.end_date IS NULL
GROUP BY f.facility_id, vaccine_id";

$query_19 = "SELECT Facility.facility_id, Worker.employee_id, Person.SSN, Person.first_name, Person.last_name, Person.dob, Person.medicare, Person.telephone, Person.address, city, province, Person.postal_code, citizenship, email, end_date
FROM Person, Worker, Postal_code, Works_at, Facility
WHERE (Person.person_id = Worker.person_id)
AND (Person.postal_code = Postal_code.postal_code)
AND (Worker.employee_id = Works_at.employee_id)
AND (Facility.facility_id = Works_at.facility_id)
AND (Facility.facility_id = 1)
ORDER BY Worker.employee_id";

$query_20 = "SELECT Worker.employee_id, Person.first_name, Person.last_name, Person.dob, Person.telephone, Postal_code.city, Person.email, Facility.facility_id
FROM Person
LEFT JOIN Received on Person.person_id= Received.person_id
INNER JOIN Worker  on Received.employee_id = Worker.employee_id
INNER JOIN Works_at on Worker.employee_id = Works_at.employee_id  
INNER JOIN Postal_code on Person.postal_code = Postal_code.postal_code
INNER join Facility on Received.facility_id = Facility.facility_id
GROUP BY Worker.employee_id
HAVING COUNT(Received.dose_num)<=1
ORDER BY Worker.employee_id ASC";


$results12 = mysqli_query($db, $query_2);
?>
<div class="container">
<div>
<label id="Pfizer_inventory_label" for="inventory_table1"> <h4>Inventory of vaccine type Pfizer:<h4> </label>
<table id = 'inventory_table1' class = 'inventory_table1' >

<th> First Name </th>
<th> Last Name </th>
<th> Date of Birth </th>
<th> Email Address </th>
<th> Telephone </th>
<th> City </th>
<th> Date of Vaccine Reception </th>
<th> Administered Vaccine ID </th>
<th> Infection History </th>
<th> Number of Infections </th>
</div>

<?php

while($row = mysqli_fetch_array($results1)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Madorna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results14 = mysqli_query($db, $query_3);
?>
</table>
</div>
<div class="container">
 <div>
 <label id="Astra_inventory_label" for="inventory_table3"> <h4>Inventory of vaccine type Astra Zeneca:<h4> </label>
 <table id = 'inventory_table3' class = 'inventory_table3'>
<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>

 </div>
<?php
 

while($row = mysqli_fetch_array($results3)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Madorna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Madorna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Madorna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Madorna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_2);
?>

</table>
</div>
<div class="container">
  <div>
  <label id="Madorna_inventory_label" for="inventory_table2"> <h4>Inventory of vaccine type Madorna:<h4> </label>
  <table id = 'inventory_table2' class = 'inventory_table2' >

<th> Facility ID </th>
<th> Vaccine Type </th>
<th> Amount </th>
  </div>
  <?php


while($row = mysqli_fetch_array($results2)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['Vaccine Type'] . "</td>
    <td> " . $row['amount'] . "</td>
    </tr>";
}


mysqli_close($db);
?>


</table>  
</div>
</div>

</body>
</html>