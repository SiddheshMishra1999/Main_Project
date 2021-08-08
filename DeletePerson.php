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
            <a class="logo" href="#">Comp 353 </a>

            <nav>
                <ul class="main-nav">
                    <li><a href="Index.php">Home</a></li>
                    <li class="person"><a href="Person.php">New Person</a></li>
                    <li><a href="Vaccine.php">Vaccines</a></li>
                    <li><a href="Facility.php">Facilities</a></li>
                </ul>

            </nav>
        </div>
  </div>

<form action="Delete_person.php" method="post">
  <div class="container">
    <h1>Delete Person</h1>
    <p>Please enter the Person ID that you wish to delete from the database</p>
    <hr>
  <label id="person_id_label" for="person_id">Person ID: </label>
  <input type="number" name="person_id" id="person_id"required><br><br>


  </div>
  <input type="Submit">

</form>


</body>
</html>
