<?php
 include_once 'server.php';
$errors = array();

//Registering facility
//$facility_id = $_POST['facility_id'];

$facility_id = mysqli_real_escape_string($db, $_POST['facility_id']);
$type_name = mysqli_real_escape_string($db, $_POST['type_name']);
$name = mysqli_real_escape_string($db, $_POST['name']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$webaddress = mysqli_real_escape_string($db, $_POST['webaddress']);
$telephone = mysqli_real_escape_string($db, $_POST['telephone']);
$postal_code = mysqli_real_escape_string($db, $_POST['postal_code']);
$province = mysqli_real_escape_string($db, $_POST['province']);
$city = mysqli_real_escape_string($db, $_POST['province']);

//check for missing values

// if(empty($facility_id)) {
//   $facility_id = "SELECT first_name FROM Facility WHERE facility_id = $facility_id";
// }
if(empty($type_name)) {
  $type_name = "SELECT type_name FROM Facility WHERE facility_id = $facility_id";
}
if(empty($name)) {
  $name = "SELECT name FROM Facility WHERE facility_id = $facility_id";
}
if(empty($webaddress)) {
  $webaddress = "SELECT dob_name FROM Facility WHERE facility_id = $facility_id";
}
if(empty($telephone)) {
  $telephone = "SELECT telephone FROM Facility WHERE facility_id = $facility_id";
}
if(empty($postal_code)) {
  $postal_code = "SELECT postal_code FROM Facility WHERE facility_id = $facility_id";
}

if(empty($city)) {
  $city = "SELECT city FROM Facility WHERE facility_id = $facility_id";
}
if(empty($address)) {
  $address = "SELECT address FROM Facility WHERE facility_id = $facility_id";
}
if(empty($province)) {
  $province = "SELECT SSN FROM Facility WHERE facility_id = $facility_id";
}



$query = "UPDATE Facility SET first_name = '$first_name' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query);
$query = "UPDATE Facility SET name = '$name' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query);
$query = "UPDATE Facility SET type_name = '$type_name' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query);
$query = "UPDATE Facility SET webaddress = '$webaddress' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query);
$query = "UPDATE Facility SET telephone = '$telephone' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query);
$query = "UPDATE Facility SET postal_code = '$postal_code' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query);
$query7 = "UPDATE Postal_code SET city = '$city' WHERE postal_code= '$postal_code'";
mysqli_query($db,$query7);
$query8 = "UPDATE Facility SET address= '$address' WHERE facility_id = '$facility_id'";
mysqli_query($db,$query8);
$query12 = "UPDATE Postal_code SET province= '$province' WHERE postal_code = '$postal_code'";
mysqli_query($db,$query12);



  // redirect to submitted page
  header("Location: Submitfacility.php");



//end registering Facility

?>
