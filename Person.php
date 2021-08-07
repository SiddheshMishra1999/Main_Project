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
                    <li class="home"><a href="#">Home</a></li>
                    <li class="person"><a href="Person.php">New Person</a></li>
                    <li class="vaccine"><a href="Vaccine.php">Vaccines</a></li>
                    <li class ="facility"><a href="Facility.php">Facilities</a></li>
                </ul>
                
            </nav>
        </div>
  </div>

<form action="Sumbit.php" method="post">
  <div class="container">
    <h1>Add person</h1>
    <p>Please fill in this form to add a new person to the database.</p>
    <hr>
Person ID: <input type="number" name="person_id" required><br>
First name: <input type="text" name="first_name" required><br>
Last name: <input type="text" name="last_name" required><br>
Date of Birth: <input type="date" name="dob" required><br>
Telephone Number: <input type="text" name="telephone" required><br>
Postal Code: <input type="text" name="postal_code" required><br>
Province: <input type="text" name="province" required><br>
City: <input type="text" name="city" required><br>
Address: <input type="text" name="address"><br>
E-mail: <input type="text" name="email" required><br>
Citizenship: <input type="text" name="citizenship" required><br>
Passport Number(Optional): <input type="text" name="passport_num"><br>
Medicare (if Canadian) <input type="text" name="medicare"><br>
SSN (if Canadian) <input type="text" name="SSN"><br>

<input type="submit">

</div>
</form>


</body>
</html>
