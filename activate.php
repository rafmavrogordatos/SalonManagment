<?php
require('includes/config.php');

//Collect values from the url
$memberID = trim($_GET['x']);
$active = trim($_GET['y']);

//If id is number and the active token is not empty carry on
if(is_numeric($memberID) && !empty($active)){

	//Update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE members SET active = 'Yes' WHERE memberID = :memberID AND active = :active");
	$stmt->execute(array(
		':memberID' => $memberID,
		':active' => $active
	));

	//If the row was updated redirect the user
	if($stmt->rowCount() == 1){

		//Redirect to login page
		header('Location: register.php?action=active');
		exit;

	} else {
		echo "Ο λογαριασμός σας δεν μπορεί να επιβεβαιωθεί. Παρακαλώ επικοινωνίστε μαζί μας."; 
	}
	
}
?>