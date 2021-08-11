<?php

include_once 'server.php';
?>

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
                    <li><a href="Facility.php">Facility</a></li>
                    <li class="Delete_facility"><a href="#"> > Delete a Facility</a></li>
                </ul>

            </nav>
        </div>
  </div>

<form action="Delete_facility.php" method="post">
  <div class="form">
    <h1>Delete Facility</h1>
    <p>Please enter the Facility ID that you wish to render inactive </p>
    <hr>
  <label id="facility_id_label" for="facility_id">Facility ID: </label>
  <input type="number" name="facility_id" id="facility_id"required><br><br>


  </div>
  <input type="Submit">

</form>


</body>
</html>

