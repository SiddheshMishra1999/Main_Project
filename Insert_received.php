<?php
 include_once 'server.php';
$errors = array();

//Registering person
$person_id = mysqli_real_escape_string($db, $_POST['person_id']);
$date_received = mysqli_real_escape_string($db, $_POST['date_received']);
$facility_id = mysqli_real_escape_string($db, $_POST['facility_id']);
$employee_id = mysqli_real_escape_string($db, $_POST['employee_id']);
$vaccine_id = mysqli_real_escape_string($db, $_POST['vaccine_id']);
//$medicare = mysqli_real_escape_string($db, $_POST['medicare']);
//$passport


//Finds current dose number to be incremented later when vaccination is a success.
$user_check_query1 = "SELECT COUNT(dose_num) FROM Received WHERE person_id = '$person_id'";
$results1 = mysqli_query($db, $user_check_query1);
$user1 = mysqli_fetch_assoc($results1);
$dose_num = $user1['COUNT(dose_num)'];
////////////////////////////////////////////////////////////////////////////////



//Error Check# 1: Employee, Checks if employee works at facility.

$user_check_query = "SELECT * FROM Works_at, Facility WHERE Works_at.facility_id = Facility.facility_id
AND end_date IS NOT NULL
AND Facility.facility_id = '$facility_id'
AND Works_at.employee_id = '$employee_id'";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);
if($user){
  if($user['employee_id'] == $employee_id ){array_push($errors, "Worker does not work at that facility (quit)");}
}

$user_check_query = "SELECT * FROM Works_at, Facility WHERE Works_at.facility_id = Facility.facility_id
AND Works_at.employee_id = '$employee_id'";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);
if($user){
  if($user['facility_id'] != $facility_id ){array_push($errors, "Worker does not work at that facility (quit)");}
}

//////////////////////////////////////////////////////////////////



//Error Check# 2: Active Person,Checks is person is active to get a vaccine.
$user_check_query = "SELECT * FROM Person WHERE person_id = '$person_id' ";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);
if($user){
  if($user['isActive'] == "FALSE" ){array_push($errors, "Person is not active");}
}
////////////////////////////////////////////////////////////////////////////



//Error Check# 3: Available Vaccine inventory, checks if there is more than 0 vaccines available and if the facility is active.
$user_check_query = "SELECT * FROM Facility,Inventory
WHERE Facility.facility_id = Inventory.facility_id
AND Inventory.vaccine_id = '$vaccine_id'
AND Facility.facility_id = '$facility_id'";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);
if($user){
  if($user['amount'] == 0){array_push($errors, "Not enough vaccines in inventory");}
  if($user['isactive'] == "FALSE"){array_push($errors, "Facility is closed");}
}
////////////////////////////////////////////////////////////////////////////////////////////////

//Error Check# 4: Age check
// $user_check_query = "SELECT *
// FROM Person,AgeGroup ,Admin, Facility , Postal_code, Received
// WHERE Person.person_id = $person_id AND
// Facility.postal_code = Postal_code.postal_code AND
// Admin.Province = Postal_code.province AND
// Admin.eligible_GroupID >= AgeGroup.GroupID AND
// Received.facility_id = $facility_id AND
// (FLOOR(DATEDIFF($date_received, Person.dob)/365.25) >= min_age) LIMIT 1 )";

// $results = mysqli_query($db, $user_check_query);
// $user = mysqli_fetch_assoc($results);
// if($user){
//   if($user['person_id'] == $person_id){array_push($errors, "Person is in wrong age group");}
// }
////////////////////////////////////////////////////////////////////////////////////////////////






//Vaccination Process
  if(count($errors) == 0){
    $dose_num++;
    $query = "INSERT INTO Received VALUES ('$person_id', '$dose_num ', '$date_received', '$facility_id', '$employee_id','$vaccine_id')";
    mysqli_query($db,$query);
    //Sends to success page
    header("Location: Successreceived.php");
  }
  else{
      //Sends to fail page because of one of the errors.
      header("Location: Failedreceived.php");
  }

?>
