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
                        <li><a href="Reception.php">Reception</a></li>
                        <li class="add_shipment"><a href="#"> > Add a new shipment</a></li>
                    </ul>
                </nav>
            </div>
      </div>

    <form action="Insert_Reception.php" method="post">
      <div class="form">
        <h1>Send a new shipment</h1>
        <p>Please fill in this form to add a new shipment to the database.</p>
        <hr>
      <label id="shipment_num_label" for="shipment_num">Shipment Number: </label>
      <input type="number" name="shipment_num" id="shipment_num" required><br><br>

      <label id="facility_id_label" for="facility_id">Facility ID: </label>
      <input type="text" name="facility_id" id="facility_id" required><br><br>

      <label id="vaccine_id" for="vaccine_id">Vaccine ID: </label>
      <input type="text" name="vaccine_id" id="vaccine_id" required><br><br>

      <label id="date_of_reception_label" for="date_of_reception">Date of reception: </label>
      <input type="date" name="date_of_reception" id="date_of_reception" required><br><br>

      <label id="amount_label" for="amount">Shipment Number: </label>
      <input type="number" name="amount" id="amount" required><br><br>


      <br><br>

      <!--<input type="text" name="province" id="province" required><br><br>
      -->
    <br>
      <br>
      <input type="Submit">

    </form>


  </body>
</html>
