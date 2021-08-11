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
                        <li><a href="Person_display.php">Person</a></li>
                        <li class="add_person"><a href="#"> > Add a New Person</a></li>
                    </ul>
                </nav>
            </div>
      </div>

    <form action="Insert_person.php" method="post">
      <div class="form">
        <h1>Add person</h1>
        <p>Please fill in this form to add a new person to the database.</p>
        <hr>
      <label id="person_id_label" for="person_id">Person ID: </label>
      <input type="number" name="person_id" id="person_id" required><br><br>

      <label id="first_name_label" for="first_name">First Name: </label>
      <input type="text" name="first_name" id="first_name" required><br><br>

      <label id="last_name_label" for="last_name">Last Name: </label>
      <input type="text" name="last_name" id="last_name" required><br><br>

      <label id="dob_label" for="dob">Date of Birth: </label>
      <input type="date" name="dob" id="dob" required><br>

      <label id="telephone_label" for="telephone">Telephone number: </label>
      <input type="tel" name="telephone" id="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx"  required><br><br>

      <label id="address_label" for="address">Address: </label>
      <input type="text" name="address" id="address" required><br><br>

      <label id="postal_code_label" for="postal_code">Postal Code: </label>
      <input type="text" name="postal_code" id="postal_cose" pattern="[A-Z]{1}[0-9]{1}[A-Z]{1} [0-9]{1}[A-Z]{1}[0-9]{1}" placeholder="A1A 1A1"  required><br><br>

      <label id="city_label" for="city">City: </label>
      <input type="text" name="city" id="city" required><br><br>

      <label id="province_label" for="province">Province: </label>
      <select name="province" id="province" required>
          <option value=" " >Choose here</option>
          <option value="Alberta">Alberta</option>
          <option value="British Columbia">British Columbia</option>
          <option value="Manitoba">Manitoba</option>
          <option value="New Brunswick">New Brunswick</option>
          <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
          <option value="Nova Scotia">Nova Scotia</option>
          <option value="Ontario">Ontario</option>
          <option value="Prince Edward Island">Prince Edward Island</option>
          <option value="Quebec">Quebec</option>
          <option value="Saskatchewan">Saskatchewan</option>

      </select>
      <!--<input type="text" name="province" id="province" required><br><br>
      -->
      <label id="email_label" for="email">Email </label>
      <input type="email" name="email" id="email" placeholeder="example@example.com" required><br><br>

      <label id="passport_num_label" for="passport_num">Passport Number: </label>
      <input type="text" name="passport_num" id="passport_num" minlength ="9" maxlength="9" placeholder="abcde1234" ><br><br>

      <!---->
      <label id="citizenship_label"  for="citizenship">Citizenship:</label>
        <select name="citizenship" id="citizenship" onchange = "checkIfCanadian()" required>
            <option value=" " >Choose here</option>
            <option value="Canadian">Canadian</option>
            <option value="Permanent Resident">Permanent Resident</option>
            <option value="Visitor">Visitor</option>
            <option value="Temporary Resident">Temporary Resident</option>

        </select>
      <br>
      <label id="infected_label"  for="infected">Are you or have you ever been infected with Covid-19? </label>
        <select name="infected" id="infected" onchange = "checkIfInfected()" required>
            <option value=" " >Choose here</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>

        </select>
      <br>

      <!-- <label id="citizenship_label"  for="citizenship" >Citizenship: </label>
      <input id="citizenship" type="text" name="citizenship" onkeydown = "checkIfCanadian()" size="60" placeholder="Canadian, Permanent Resident, visitor or Temporary resident"required><br><br>
    -->


      <label id="medicare_label" for="medicare">Medicare: </label>
      <input type="text" name="medicare" id="medicare" minlength ="12" maxlength="12" placeholder="abcdef123456"><br>

      <label id="SSN_label" for="SSN">Social Security Number: </label>
      <input type="text" name="SSN" id="SSN" minlength ="9" maxlength="9" pattern="[0-9]{3}[0-9]{3}[0-9]{3}"placeholder="123456789"><br><br>
<!--
      <label id="infection_num_label" for="infection_num">How many times have you been infected? </label>
      <input type="number" name="infection_num" id="infection_num" minlength ="1" maxlength="1" placeholder="1" onkeydown = "checkNum_of_infection()" ><br>

      <label id="variant_label" for="variant">What variant have you been infected with? </label>
      <select name="variant" id="variant" >
            <option value=" " >Choose here</option>
            <option value="alpha">Alpha</option>
            <option value="beta">Beta</option>
            <option value="delta">Delta</option>
            <option value="Gamma">Gamma</option>

        </select>
-->
      </div>
      <script>

        let text = "";
          //hide the input by default
          document.getElementById("medicare").style.display= 'none';
          document.getElementById("SSN").style.display= 'none';
          document.getElementById("medicare_label").style.display= 'none';
          document.getElementById("SSN_label").style.display= 'none';
          document.getElementById("infection_num_label").style.display= 'none';
          document.getElementById("infection_num").style.display= 'none';
          document.getElementById("variant_lable").style.display= 'none';
          document.getElementById("variant").style.display= 'none';


          //show if canadian
          function checkIfCanadian(){

              if((document.getElementById("citizenship").value == "Canadian") || (document.getElementById("citizenship").value == "Permanent Resident")){
                  document.getElementById("medicare_label").style.display= 'block';
                  document.getElementById("medicare").style.display= 'block';
                  document.getElementById("SSN").style.display= 'block';
                  document.getElementById("SSN_label").style.display= 'block';
                  document.getElementById("SSN").required = true;
                  document.getElementById("medicare").required = true;


                }else if ((document.getElementById("citizenship").value =="Visitor") || (document.getElementById("citizenship").value == "Temporary Resident")){
                  document.getElementById("medicare_label").style.display= 'none';
                  document.getElementById("medicare").style.display= 'none';
                  document.getElementById("SSN").style.display= 'none';
                  document.getElementById("SSN_label").style.display= 'none';
                  document.getElementById("SSN").required = FALSE;
                  document.getElementById("medicare").required = false;


                }

                else{
                  document.getElementById("medicare").style.display= 'none';
                  document.getElementById("SSN").style.display= 'none';
                  document.getElementById("medicare_label").style.display= 'none';
                  document.getElementById("SSN_label").style.display= 'none';

                }
          }
          /*// check number of infection
          function checkIfInfected(){
            if((document.getElementById("infected").value == "Yes"){
              function checkNum_of_infection() {
              

            }else if (document.getElementById("infected").value == "No"){

              document.getElementById("variant_lable").style.display= 'none';
              document.getElementById("variant").style.display= 'none';
              document.getElementById("variant").required = false;
            }
            else {
              document.getElementById("variant_lable").style.display= 'none';
              document.getElementById("variant").style.display= 'none';
              document.getElementById("variant").required = false;

            }
          }
          */









      </script>
      <input type="Submit">

    </form>


  </body>
</html>
