<?php include('server.php') ?>
<html>
<body>

<form action="Person.php" method="post">
  <div class="container">
    <h1>Add person</h1>
    <p>Please fill in this form to add a new person to the database.</p>
    <hr>
Person ID: <input type="number" name="person_id"><br>
First name: <input type="text" name="first_name"><br>
Last name: <input type="text" name="last_name"><br>
Date of Birth: <input type="date" name="dob"><br>
Telephone Number: <input type="text" name="telephone"><br>
Postal Code: <input type="text" name="postal_code"><br>
Country: <input type="text" name="country"><br>
Province: <input type="text" name="province"><br>
City: <input type="text" name="city"><br>
Address: <input type="text" name="address"><br>
E-mail: <input type="text" name="email"><br>
Passport Number: <input type="text" name="passport_num"><br>
Citizenship: <input type="text" name="citizenship"><br>
Medicare (if Canadian) <input type="text" name="medicare"><br>
SSN (if Canadian) <input type="text" name="SSN"><br>

<input type="submit">

</div>
</form>


</body>
</html>
