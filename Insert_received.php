<?php
 include_once 'server.php';
$errors = array();

//Registering person
//$person_id = $_POST['person_id'];

$person_id = mysqli_real_escape_string($db, $_POST['person_id']);
$dose_num = mysqli_real_escape_string($db, $_POST['dose_num']);
$date_received = mysqli_real_escape_string($db, $_POST['last_name']);
$facility_id = mysqli_real_escape_string($db, $_POST['facility_id']);
$employee_id = mysqli_real_escape_string($db, $_POST['employee_id']);
$vaccine_id = mysqli_real_escape_string($db, $_POST['vaccine_id']);
//$medicare = mysqli_real_escape_string($db, $_POST['medicare']);
//$passport


//check db for existing person unique values
$user_check_query = "SELECT * FROM Received WHERE dose_num = '$dose_num'  LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){

  if($user['dose_num'] === $dose_num){array_push($errors, "Dose number already exist");}

}
  if(count($errors) == 0){
    $query = "INSERT INTO Received VALUES ('$person_id', '$dose_num ', '$date_received', '$facility_id', '$employee_id','$vaccine_id')";
    mysqli_query($db,$query);
    // redirect to submitted page
    header("Location: Sumbit.php");
  }
  else{
      header("Location: Failed.php");
  }


?>
