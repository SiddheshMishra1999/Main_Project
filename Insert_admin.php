<?php
 include_once 'server.php';
$errors = array();

//Registering Facility

$eligible_GroupID = mysqli_real_escape_string($db, $_POST['eligible_GroupID']);
$Province = mysqli_real_escape_string($db, $_POST['Province']);


// //check db for existing person unique values
// $user_check_query = "SELECT * FROM Admin WHERE eligible_GroupID = '$eligible_GroupID' AND province ='$facility_id' LIMIT 1";
// $results = mysqli_query($db, $user_check_query);
// $user = mysqli_fetch_assoc($results);

// if($user){

//   if($user['shipment_num'] === $shipment_num){array_push($errors, "shipment number already exist");}
// }
//   if(count($errors) == 0){

    $query = "UPDATE Admin SET eligible_GroupID = '$eligible_GroupID' WHERE Province = '$Province'";
    mysqli_query($db,$query);
    // redirect to submitted page
    header("Location: SubmitAdmin.php");


?>