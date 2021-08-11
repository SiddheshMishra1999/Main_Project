<?php

include_once 'server.php'
?>

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
                    <li><a href="Received_display.php">Vaccinations</a></li>
                        <li class="home"><a href="#"> > Vaccinate someone</a></li>
                    </ul>
                </nav>
            </div>
      </div>

    <form action="Insert_Reception.php" method="post">
      <div class="form">
        <h1>Vaccination center</h1>
        <p>Please fill in this form to add a new person being vaccinated.</p>
        <hr>

        <label id="person_id_label" for="person_id">Person ID: </label>
      <input type="number" name="person_id" id="person_id" required><br><br>

      <label id="dose_num_label" for="dose_num_id">Person ID: </label>
      <input type="number" name="dose_num_id" id="dose_num_id" required><br><br>

      <label id="dov_label" for="dov">Date of Vaccination: </label>
      <input type="date" name="dov" id="dov" required><br><br>

      <label id="facility_id_label" for="facility_id">What is the ID of the location where you were vaccinated?: </label>
      <input type="number" name="facility_id" id="facility_id"  required><br><br>

      <label id="employee_id_label" for="employee_id">What is the ID of the employee vaccinated you?: </label>
      <input type="number" name="employee_id" id="employee_id" required><br><br>

      <label id="vaccine_id" for="vaccine_id">What is the ID of the vaccine you received?: </label>
      <input type="text" name="vaccine_id" id="vaccine_id" pattern="[1-4]{1}" placeholder="From 1 to 4" required><br><br>


      <div class="row">
    <div class="column">
    <label id="exist_table_label" for="exist_table"> <h5>List of People and their dose_num, facilities, emplaoyee_id and vaccine id that exist in the database:<h5> </label>
        <table id="exists_table">
        <thead>
            <th>Facility ID </th>
            <th>Facility Name </th>
            <th>Employee ID </th>
            </thead>
            <tbody>
            <?php

                include_once 'server.php';

                $query = "SELECT Works_at.facility_id, Facility.name, employee_id FROM Works_at, Facility
                WHERE end_date IS NULL
                AND Works_at.facility_id = Facility.facility_id
                ORDER BY Works_at.facility_id ASC ";
                $results = mysqli_query($db, $query);
                // $user = mysqli_fetch_assoc($results);
            ?>
            <?php


                while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
                echo "<tr>
                <td>" . $row['facility_id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['employee_id'] . "</td>
                </tr>";  
            }

            mysqli_close($db); //Make sure to close out the database connection

            ?>
            </tbody>


        </table>
    </div>
</div> 
</body>
</html>
