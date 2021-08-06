<?php

session_start();

$db = mysqli_connect('kjc353.encs.concordia.ca','kjc353_1','TeamCoen','kjc353_1') or die("Connection failed to database.")

$errors = array();

//Registering person
$person_id = mysqli_real_escape_string($db, $_POST['person_id']);

//check db for existing person
$user_check_query = "SELECT * FROM Person WHERE person_id = $person_id or .... LIMIT 1";


?>
