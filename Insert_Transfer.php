<?php
 include_once 'server.php';
$errors = array();

//Registering Facility

$transfer_num = mysqli_real_escape_string($db, $_POST['transfer_num']);
$facility_id = mysqli_real_escape_string($db, $_POST['facility_id']);
$vaccine_id = mysqli_real_escape_string($db, $_POST['vaccine_id']);
$send_date = mysqli_real_escape_string($db, $_POST['send_date']);
$reception_date = mysqli_real_escape_string($db, $_POST['reception_date']);
$count_send = mysqli_real_escape_string($db, $_POST['count_send']);
$facility_to = mysqli_real_escape_string($db, $_POST['facility_to']);

//check db for existing person unique values
$user_check_query = "SELECT * FROM Transfer WHERE transfer_num = '$transfer_num' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){

  if($user['transfer_num'] === $transfer_num){array_push($errors, "transfer number already exist");}
}
  if(count($errors) == 0){

    $query = "INSERT INTO Transfer (transfer_num, facility_id, vaccine_id, send_date, reception_date, count_send, facility_to) VALUES ('$transfer_num', '$facility_id', '$vaccine_id', '$send_date', '$reception_date','$count_send', '$facility_to ')";
    mysqli_query($db,$query);
    // redirect to submitted page
    header("Location: Submittransfer.php");


  }
  else{
      header("Location: Failedtransfer.php");
  }


?>
