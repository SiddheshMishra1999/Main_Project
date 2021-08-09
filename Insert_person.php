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
/*
if(empty($passport_num)) {
  $passport_num = NULL;
  }
  if(empty($medicare)) {
  $medicare = NULL;
  }
  if(empty($SSN)) {
  $SSN = NULL;
  }
*/

//check db for existing person unique values
$user_check_query = "SELECT * FROM Person WHERE person_id = '$person_id' or medicare = '$medicare' or SSN = '$SSN' or passport_num = '$passport_num' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){

  if($user['person_id'] === $person_id){array_push($errors, "Person ID already exist");}


if(count($errors) == 0){

  $query = "INSERT INTO Person VALUES ('$person_id', '$SSN', '$passport_num', '$medicare', '$first_name', '$last_name', '$dob','$telephone','$address','$email','$citizenship','$postal_code')";
  mysqli_query($db,$query);
  $query2 = "INSERT INTO Postal_code VALUES ('$postal_code','$city','$province')";
  mysqli_query($db,$query2);
  // redirect to submitted page
  header("Location: Sumbit.php");


}
else{
    header("Location: Failed.php");
}
//end registering Person

?>
