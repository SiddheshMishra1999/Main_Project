<html>
<head>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="navbar">
        <div class="container">
        <a class="logo" href="Index.php"><img class="logo" width = "60" height="60" src="Beechtown Pediatric Center.png"> </a>

            <nav>
                <ul >
                    <li class="left-menu-items"><a href="Index.php">Home</a></li>
                    <li class="left-menu-items" ><a href="Person_display.php">Person</a></li>
                    <li class="left-menu-items"><a href="Vaccine.php">Vaccines</a></li>
                    <li class="left-menu-items"><a href="Received_display.php">Vaccinations</a></li>
                    <li  class="left-menu-items" ><a href="Facility.php">Facilities</a></li>
                    <li class="left-menu-items" ><a href="Workers.php">Health Safety Workers</a></li>
                    <li class="left-menu-items"  style="background-color: orange;"><a href='queries.php'> Search Results </a> </li>




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
IF(COUNT(I.infection_date) > 0, 'YES', 'NO') AS infected ,a.date_received, c.type_name AS dose_1, d.type_name AS dose_num_2
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
AND (PC.city = 'Montreal')
GROUP BY P.person_id";

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

$query_16 = "SELECT province,Vaccine.type_name, COUNT(DISTINCT Received.person_id)
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
GROUP BY f.facility_id, vaccine_id;";

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


$results12 = mysqli_query($db, $query_12);
?>
<div class="container">
    <div>
    <label id="Query12_label" for="table12"> <h4>Details of all the people who got vaccinated only one dose and are of group ages 1 to 3 <h4> </label>
    <table id = 'table12' class = 'table12' >
    <thead>

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
</thead>
</div>

<?php

while($row = mysqli_fetch_array($results12)) {

    echo "<tr>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['dob'] . "</td>
    <td> " . $row['email'] . "</td>
    <td> " . $row['telephone'] . "</td>
    <td> " . $row['city'] . "</td>
    <td> " . $row['date_received'] . "</td>
    <td> " . $row['vaccine_id'] . "</td>
    <td> " . $row['infected'] . "</td>
    <td> " . $row['Number_of_infection'] . "</td>
    </tr>";
}

$results13 = mysqli_query($db, $query_13);
?>
</table>
<div class="container">
    <div>
    <label id="Query13_label" for="table13"> <h4>Details of all the people who live in the city of Montréal and who got vaccinated at least two  doses of different types of vaccines<h4> </label>
    <table id = 'table13' class = 'table13' >
    <thead>

<th> Person ID </th>
<th> First Name </th>
<th> Last Name </th>
<th> Date of Person </th>
<th> Email </th>
<th> Telephone </th>
<th> City </th>
<th> Infected </th>
<th> Date received </th>
<th> Vaccine Type </th>
<th> Vaccine Type </th>
</thead>
</div>

<?php

while($row = mysqli_fetch_array($results13)) {

    echo "<tr>
    <td> " . $row['person_id'] . "</td>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['dob'] . "</td>
    <td> " . $row['email'] . "</td>
    <td> " . $row['telephone'] . "</td>
    <td> " . $row['city'] . "</td>
    <td> " . $row['infected'] . "</td>
    <td> " . $row['date_received'] . "</td>
    <td> " . $row['dose_1'] . "</td>
    <td> " . $row['dose_num_2'] . "</td>
    </tr>";
}

$results14 = mysqli_query($db, $query_14);


?>
</table>
<div class="container">
    <div>
    <label id="Queries14_label" for="table14"> <h4>Details of all the people who got vaccinated and have been infected with at least two different variants of Covid-19<h4> </label>
    <table id = 'table14' class = 'table14' >
    <thead>

<th> First Name </th>
<th> Last Name </th>
<th> Date of Birth </th>
<th> Email </th>
<th> Telephone </th>
<th> City </th>
<th> Person ID </th>
</thead>
</div>

<?php

while($row = mysqli_fetch_array($results14)) {

    echo "<tr>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['dob'] . "</td>
    <td> " . $row['email'] . "</td>
    <td> " . $row['telephone'] . "</td>
    <td> " . $row['city'] . "</td>
    <td> " . $row['person_id'] . "</td>
    </tr>";
}

$results15 = mysqli_query($db, $query_15);
?>
</table>

<div class="container">
    <div>
    <label id="Query15_label" for="table15"> <h4>Report of the inventory of vaccines in each province. <h4> </label>
    <table id = 'table15' class = 'table15' >
    <thead>

<th> Province </th>
<th> Amount of vaccines </th>
<th> Vaccine Type </th>
</thead>
</div>

<?php

while($row = mysqli_fetch_array($results15)) {

    echo "<tr>
    <td> " . $row['province'] . "</td>
    <td> " . $row['amount'] . "</td>
    <td> " . $row['type_name'] . "</td>
    </tr>";
}

$results16 = mysqli_query($db, $query_16);
?>
</table>

<div class="container">
    <div>
    <label id="Query16_label" for="table16"> <h4> Report of the population’s vaccination by province between January 1st 2021 and July 22nd 2021 <h4> </label>
    <table id = 'table16' class = 'table16' >
    <thead>
<th> Province </th>
<th> Vaccine Type </th>
<th> Total Number of Vacicnation </th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results16)) {

    echo "<tr>
    <td> " . $row['province'] . "</td>
    <td> " . $row['type_name'] . "</td>
    <td> " . $row['COUNT(DISTINCT Received.person_id)'] . "</td>
    </tr>";
}

$results17 = mysqli_query($db, $query_17);
?>
</tbody>
</table>
</table>

<div class="container">
    <div>
    <label id="Query17_label" for="table17" style="color:black;"> <h4> Report by city in Québec the total number of vaccines received in each city between January 1st 2021 and July 22nd 2021 <h4> </label>
    <table id = 'table17' class = 'table17'>
    <thead>
<th> City </th>
<th> Total Number of Doses Administered </th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results17)) {

    echo "<tr>
    <td> " . $row['city'] . "</td>
    <td> " . $row['COUNT(dose_num)'] . "</td>
    </tr>";
}

$results18 = mysqli_query($db, $query_18)
?>
</tbody>
</table>

<div class="container">
    <div>
    <label id="Query18_label" for="table18" style="color:black;"> <h4> Detailed report of all the facilities in the city of Montréal <h4> </label>
    <table id = 'table18' class = 'table18'>
    <thead>
<th> Facility ID </th>
<th> Name </th>
<th> Adress </th>
<th> Facility Type </th>
<th> Telephone </th>
<th> Total Workers </th>
<th> Total Number of Vaccine Shipments Received </th>
<th> Total Amount of Vaccine Doses Received </th>
<th> Total Number of Vaccines Transfered   </th>
<th> Total Amount of Vaccine Doses Transfered </th>
<th> Total Amount of Vaccine Doses Received from Transfer </th>
<th> Total Vaccine Dose Number in Inventory </th>
<th> Vaccine Type </th>
<th> Total People Vaccinated at Facility</th>
<th> Total Number of Vaccine Doses Administered to People </th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results18)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['name'] . "</td>
    <td> " . $row['address'] . "</td>
    <td> " . $row['type_name'] . "</td>
    <td> " . $row['telephone'] . "</td>
    <td> " . $row['Total workers'] . "</td>
    <td> " . $row['Total shipments'] . "</td>
    <td> " . $row['Total Doses received'] . "</td>
    <td> " . $row['Total amount of transfers'] . "</td>
    <td> " . $row['Total Doses transfered'] . "</td>
    <td> " . $row['Total Doses received from transfer'] . "</td>
    <td> " . $row['amount'] . "</td>
    <td> " . $row['vaccine_id'] . "</td>
    <td> " . $row['Total people vaccinated'] . "</td>
    <td> " . $row['Total doses received by people'] . "</td>
    </tr>";
}

$results19 = mysqli_query($db, $query_19)
?>
</tbody>
</table>

<div class="container">
    <div>
    <label id="Query19_label" for="table19" style="color:white;"> <h4>  List of all public health workers in a specific facility <h4> </label>
    <table id = 'table19' class = 'table19'>
    <thead>
<th> Facility ID </th>
<th> Employee ID </th>
<th> SSN </th>
<th> First Name </th>
<th> Last Name </th>
<th> Date of Birth </th>
<th> Medicare </th>
<th> Telephone </th>
<th> Address </th>
<th> City</th>
<th> Province </th>
<th> Postal Code </th>
<th> Citizenship </th>
<th> Email</th>
<th> End Date</th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results19)) {

    echo "<tr>
    <td> " . $row['facility_id'] . "</td>
    <td> " . $row['employee_id'] . "</td>
    <td> " . $row['SSN'] . "</td>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['dob'] . "</td>
    <td> " . $row['medicare'] . "</td>
    <td> " . $row['telephone'] . "</td>
    <td> " . $row['address'] . "</td>
    <td> " . $row['city'] . "</td>
    <td> " . $row['province'] . "</td>
    <td> " . $row['postal_code'] . "</td>
    <td> " . $row['citizenship'] . "</td>
    <td> " . $row['email'] . "</td>
    <td> " . $row['end_date'] . "</td>
    </tr>";
}

$results20 = mysqli_query($db, $query_20)
?>
</tbody>
</table>

<div class="container">
    <div>
    <label id="Query20_label" for="table20" style="color:white;"> <h4>List of all public health workers in Québec who never been vaccinated or who have been vaccinated only one dose for Covid-19<h4> </label>
    <table id = 'table20' class = 'table20'>
    <thead>
<th> Emplotee ID </th>
<th> First Name </th>
<th> Last Name </th>
<th> Date of Birth</th>
<th> Telephone</th>
<th> City </th>
<th> Email </th>
<th> facility_id </th>
</thead>
<tbody>
</div>

<?php

while($row = mysqli_fetch_array($results20)) {

    echo "<tr>
    <td> " . $row['employee_id'] . "</td>
    <td> " . $row['first_name'] . "</td>
    <td> " . $row['last_name'] . "</td>
    <td> " . $row['dob'] . "</td>
    <td> " . $row['telephone'] . "</td>
    <td> " . $row['city'] . "</td>
    <td> " . $row['email'] . "</td>
    <td> " . $row['facility_id'] . "</td>
    </tr>";
}

mysqli_close($db); 
?>
</tbody>
</table>







</div>
</div>

</body>
</html>