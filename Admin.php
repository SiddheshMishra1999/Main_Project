
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
                        <li class="home"><a href="#"> > Change Eligible Age Groups</a></li>
                    </ul>
                </nav>
            </div>
      </div>
      <div class="row">
    <div class="column">
<table id="form_table">

    <form action="Insert_admin.php" method="post">
      <div class="form">
        <h1>Admin center</h1>
        <p>Please fill in this form to change the eligible Age group for a certain Province.</p>
        <hr>

        <label id="eligible_GroupID_label" for="eligible_GroupID">The Eligible Group Id: </label>
      <input type="number" name="eligible_GroupID" id="eligible_GroupID" required><br><br>

      <label id="Province_label" for="Province">Province: </label>
      <select name="Province" id="Province" required>
          <option value=" " >Choose here</option>
          <option value="Alberta">Alberta</option>
          <option value="British Columbia">British Columbia</option>
          <option value="Manitoba">Manitoba</option>
          <option value="New Brunswick">New Brunswick</option>
          <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
          <option value="Nova Scotia">Nova Scotia</option>
          <option value="Nunavut">Nunavut</option>
          <option value="Ontario">Ontario</option>
          <option value="Prince Edward Island">Prince Edward Island</option>
          <option value="Quebec">Quebec</option>
          <option value="Saskatchewan">Saskatchewan</option>


     
      <input type="Submit">


</table>
<?php

include_once 'server.php';

$query = "SELECT * FROM Admin ORDER BY Province ASC";
$results = mysqli_query($db, $query);

                $query2 = "SELECT * FROM AgeGroup";
                $results2 = mysqli_query($db, $query2);
                // $user = mysqli_fetch_assoc($results);
?>

<table id="admin_table">

    <label id="admin_table_label" for="admin_table"> <h5>List of People and their dose_num, facilities, emplaoyee_id and vaccine id that exist in the database:<h5> </label>
        <thead>
            <th>Eligible Group Id </th>
            <th>Province </th>
            </thead>
            <tbody>

            <?php


                while($row = mysqli_fetch_array($results)){   //Creates a loop to loop through results
                echo "<tr>
                <td>" . $row['eligible_GroupID'] . "</td>
                <td>" . $row['Province'] . "</td>
                </tr>";  
            }

            ?>
            </tbody>
        </table>


        <table id="agegroup_table">

    <label id="agegroup_table_label" for="agegroup_table"> <h5>List of People and their dose_num, facilities, emplaoyee_id and vaccine id that exist in the database:<h5> </label>
        <thead>

            <th>Group Id </th>
            <th>Description </th>
            <th>Maximum Age</th>
            <th>Minimum Age  </th>
            </thead>
            <tbody>
            
            <?php
                while($row = mysqli_fetch_array($results2)){   //Creates a loop to loop through results
                echo "<tr>
                <td>" . $row['GroupID'] . "</td>
                <td>" . $row['description'] . "</td>
                <td>" . $row['max_age'] . "</td>
                <td>" . $row['min_age'] . "</td>

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
