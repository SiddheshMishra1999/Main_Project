<?php

include_once 'server.php'
?>

<html>
  <head>
    <link rel="stylesheet" href="main.css">
  </head>
<body>

<div class="navbar">
        <div class="delete">
            <a class="logo" href="Index.php">Comp 353 </a>

            <nav>
                <ul class="main-nav">
                    <li><a href="Person_display.php">Person</a></li>
                    <li><a href="Facility.php"> > Delete a Person</a></li>
                </ul>

            </nav>
        </div>
  </div>

<form action="Delete_person.php" method="post">
  <div class="form">
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
