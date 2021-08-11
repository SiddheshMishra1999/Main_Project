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
                <a class="logo" href="Index.php">Comp 353 </a>
                <nav>
                    <ul class="main-nav">
                        <li><a href="Transfer_display.php">Transfer</a></li>
                        <li class="home"><a href="#"> > Add a new Transfer</a></li>
                    </ul>
                </nav>
            </div>
      </div>

    <form action="Insert_Transfer.php" method="post">
      <div class="form">
        <h1>Make a new transfer</h1>
        <p>Please fill in this form to add a new transfer to the database.</p>
        <hr>
      <label id="transfer_num_label" for="transfer_num">Transfer Number: </label>
      <input type="number" name="transfer_num" id="transfer_num" required><br><br>

      <label id="facility_id_label" for="facility_id">From Facility ID: </label>
      <input type="text" name="facility_id" id="facility_id" required><br><br>

      <label id="vaccine_id" for="vaccine_id">Vaccine ID: </label>
      <input type="text" name="vaccine_id" id="vaccine_id" required><br><br>

      <label id="send_date_label" for="send_date">Send Date: </label>
      <input type="date" name="send_date" id="send_date" required><br><br>

      <label id="reception_date_label" for="reception_date">Date of reception: </label>
      <input type="date" name="reception_date" id="reception_date" required><br><br>

      <label id="facility_to_label" for="facility_to">To Facility ID: </label>
      <input type="number" name="facility_to" id="facility_to" required><br><br>


      <br><br>

      <!--<input type="text" name="province" id="province" required><br><br>
      -->
    <br>
      <br>
      <input type="Submit">

    </form>


  </body>
</html>
