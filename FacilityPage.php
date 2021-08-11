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
                        <li><a href="FacilityPage.php">Person</a></li>
                        <li class="add_dacility"><a href="#"> > Add a New Facility</a></li>
                    </ul>
                </nav>
            </div>
      </div>

    <form action="Insert_Facility.php" method="post">
      <div class="form">
        <h1>Add Facility</h1>
        <p>Please fill in this form to add a new facility to the database.</p>
        <hr>
      <label id="facility_id_label" for="facility_id">Facility ID: </label>
      <input type="number" name="facility_id" id="facility_id" required><br><br>

      <label id="name_label" for="first_name">Name: </label>
      <input type="text" name="name" id="name" required><br><br>

      <label id="address_label" for="address">Address: </label>
      <input type="text" name="address" id="address" required><br><br>

      <label id="telephone_label" for="telephone">Telephone number: </label>
      <input type="tel" name="telephone" id="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx"  required><br><br>

      <label id="webaddress_label" for="webaddress">Webaddress: </label>
      <input type="text" name="webaddress" id="webaddress" required><br><br>

      <label id="postal_code_label" for="postal_code">Postal Code: </label>
      <input type="text" name="postal_code" id="postal_cose" pattern="[A-Z]{1}[0-9]{1}[A-Z]{1} [0-9]{1}[A-Z]{1}[0-9]{1}" placeholder="A1A 1A1"  required><br><br>

      <label id="province_label" for="province">Province: </label>
      <select name="province" id="province" required>
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

      </select>
      <br><br>

      <label id="city_label" for="city">City: </label>
      <input type="text" name="city" id="city" required><br><br>

      <label id="type_name" for="type_name">Type: </label>
      <select name="type_name" id="type_name" required>
          <option value=" " >Choose here</option>
          <option value="clinic">Clinic</option>
          <option value="hospital">Hospital</option>
          <option value="special facility">Special Facility</option>

      </select>
      <!--<input type="text" name="province" id="province" required><br><br>
      -->
    <br>
      <br>
      <input type="Submit">

    </form>


  </body>
</html>
