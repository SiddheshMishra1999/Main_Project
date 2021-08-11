<?php
 include_once 'server.php';
$errors = array();

//Registering Facility

$shipment_num = mysqli_real_escape_string($db, $_POST['shipment_num']);
$facility_id = mysqli_real_escape_string($db, $_POST['facility_id']);
$vaccine_id = mysqli_real_escape_string($db, $_POST['vaccine_id']);
$date_of_reception = mysqli_real_escape_string($db, $_POST['date_of_reception']);
$amount = mysqli_real_escape_string($db, $_POST['amount']);


//check db for existing person unique values
$user_check_query = "SELECT * FROM Reception WHERE shipment_num = '$shipment_num' AND facility_id ='$facility_id' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){

  if($user['shipment_num'] === $shipment_num){array_push($errors, "shipment number already exist");}
}
  if(count($errors) == 0){

    $query = "INSERT INTO Reception VALUES ('$shipment_num', '$facility_id', '$vaccine_id', '$date_of_reception', '$amount')";
    mysqli_query($db,$query);
    // redirect to submitted page
    header("Location: Submitreception.php");


  }
  else{
      header("Location: Failedfacility.php");
  }


?>
