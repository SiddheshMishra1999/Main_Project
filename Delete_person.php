<?php
 include_once 'server.php';
$errors = array();

//Registering person


$person_id = mysqli_real_escape_string($db, $_POST['person_id']);

$user_check_query = "SELECT * FROM Person WHERE person_id = '$person_id' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if(is_null($user['person_id'])){array_push($errors, "Person ID doesn't exist");}
//Prevents from deleting a person ID that does not exist in the Database.
if($user){
  if($user['person_id'] != $person_id){array_push($errors, "Person ID doesn't exist");}

}

if(count($errors) == 0){

  $query = "UPDATE Person SET isActive = 0 WHERE person_id = '$person_id';";
  mysqli_query($db,$query);
  header("Location: Sumbit.php");
}
else{
  header("Location: Failed.php");
}
//end deleting Person

?>
