<?php
 include_once 'server.php';
$errors = array();

//Registering person
//$person_id = $_POST['person_id'];

$person_id = mysqli_real_escape_string($db, $_POST['person_id']);
$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
$dob = mysqli_real_escape_string($db, $_POST['dob']);
$telephone = mysqli_real_escape_string($db, $_POST['telephone']);
$postal_code = mysqli_real_escape_string($db, $_POST['postal_code']);
$medicare = mysqli_real_escape_string($db, $_POST['medicare']);
$city = mysqli_real_escape_string($db, $_POST['city']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$passport_num = mysqli_real_escape_string($db, $_POST['passport_num']);
$citizenship = mysqli_real_escape_string($db, $_POST['citizenship']);
//$SSN = $_POST['SSN'];
$SSN = mysqli_real_escape_string($db, $_POST['SSN']);
$province = mysqli_real_escape_string($db, $_POST['province']);

//check for missing values

if(empty($first_name)) {
  $first_name = "SELECT first_name FROM Person WHERE person_id = $person_id";
}
if(empty($medicare)) {
  $medicare = "SELECT medicare FROM Person WHERE person_id = $person_id";
}
if(empty($last_name)) {
  $last_name = "SELECT last_name FROM Person WHERE person_id = $person_id";
}
if(empty($dob)) {
  $dob = "SELECT dob_name FROM Person WHERE person_id = $person_id";
}
if(empty($telephone)) {
  $telephone = "SELECT telephone FROM Person WHERE person_id = $person_id";
}
if(empty($postal_code)) {
  $postal_code = "SELECT postal_code FROM Person WHERE person_id = $person_id";
}

if(empty($city)) {
  $city = "SELECT city FROM Person WHERE person_id = $person_id";
}
if(empty($address)) {
  $address = "SELECT address FROM Person WHERE person_id = $person_id";
}
if(empty($email)) {
  $email = "SELECT email FROM Person WHERE person_id = $person_id";
}
if(empty($passport_num)) {
  $passport_num = "SELECT passport_num FROM Person WHERE person_id = $person_id";
}
if(empty($citizenship)) {
  $citizenship = "SELECT citizenship FROM Person WHERE person_id = $person_id";
}

if(empty($SSN)) {
  $SSN = "SELECT SSN FROM Person WHERE person_id = $person_id";
}
if(empty($province)) {
  $province = "SELECT SSN FROM Person WHERE person_id = $person_id";
}



$query = "UPDATE Person SET first_name = '$first_name' WHERE person_id = '$person_id'";
mysqli_query($db,$query);
$query = "UPDATE Person SET last_name = '$last_name' WHERE person_id = '$person_id'";
mysqli_query($db,$query);
$query = "UPDATE Person SET medicare = '$medicare' WHERE person_id = '$person_id'";
mysqli_query($db,$query);
$query = "UPDATE Person SET dob = '$dob' WHERE person_id = '$person_id'";
mysqli_query($db,$query);
$query = "UPDATE Person SET telephone = '$telephone' WHERE person_id = '$person_id'";
mysqli_query($db,$query);
$query = "UPDATE Person SET postal_code = '$postal_code' WHERE person_id = '$person_id'";
mysqli_query($db,$query);


  $query7 = "UPDATE Postal_code SET city = '$city' WHERE postal_code= '$postal_code'";
  mysqli_query($db,$query7);



  $query8 = "UPDATE Person SET adress= '$address' WHERE person_id = '$person_id'";
  mysqli_query($db,$query8);

  $query9 = "UPDATE Person SET email= '$email' WHERE person_id = '$person_id'";
  mysqli_query($db,$query9);

  $query10 = "UPDATE Person SET passport_num= '$passport_num' WHERE person_id = '$person_id'";
  mysqli_query($db,$query10);

  $query11 = "UPDATE Person SET citizenship= '$citizenship' WHERE person_id = '$person_id'";
  mysqli_query($db,$query11);

  $query12 = "UPDATE Person SET SSN= '$SSN' WHERE person_id = '$person_id'";
  mysqli_query($db,$query12);

  $query12 = "UPDATE Postal_code SET province= '$province' WHERE postal_code = '$postal_code'";
  mysqli_query($db,$query12);



  // redirect to submitted page
  header("Location: Sumbit.php");



//end registering Person

?>
