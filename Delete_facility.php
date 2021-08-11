<?php
 include_once 'server.php';
$errors = array();

//Registering Facility


$facility_id = mysqli_real_escape_string($db, $_POST['facility_id']);

$user_check_query = "SELECT * FROM Facility WHERE facility_id = '$facility_id' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if(is_null($user['facility_id'])){array_push($errors, "Facility ID doesn't exist");}
//Prevents from deleting a person ID that does not exist in the Database.
if($user){
  if($user['facility_id'] != $facility_id){array_push($errors, "Facility ID doesn't exist");}

}

if(count($errors) == 0){

  $query = "UPDATE Facility SET isactive = 'FALSE' WHERE facility_id = '$facility_id'";
  mysqli_query($db,$query);
  header("Location: Sumbit.php");
}
else{
  header("Location: Failed.php");
}
//end deleting Facility

?>
