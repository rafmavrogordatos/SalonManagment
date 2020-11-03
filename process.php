<?php
$connect=mysqli_connect('localhost','root','','succsteps');
 
if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}


// create a variable
$clientID=0;
$clientID=$clientID+1;
$first_name=$_POST['name'];
$last_name=$_POST['last'];
$address=$_POST['address'];
$num=$_POST['num'];
$city=$_POST['city'];
$postal=$_POST['postal'];
$state=$_POST['state'];
$birth=$_POST['birth'];
$giorti=$_POST['giorti'];
$kiniti=$_POST['kiniti'];
$tel=$_POST['tel'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$facebook=$_POST['facebook'];
$referredby=$_POST['referredby'];
//Execute the query
 
 
mysqli_query($connect,"INSERT INTO clients (clientID,name,last,address,num,city,postal,state,birth,giorti,tel,mobile,email,facebook,referredby,Kiniti)
		        VALUES ( '$clientID','$first_name','$last_name','$address','$num','$city','$postal','$state','$birth','$giorti','$tel','$mobile','$email','$facebook','$referredby','$kiniti' ) ");
				
	if(mysqli_affected_rows($connect) > 0){
	echo "<p>Ο πελάτης προσθέθηκε επιτυχώς!</p>";
} else {
	echo "Ο πελάτης δεν προσθέθηκε<br />";
	echo mysqli_error ($connect);
}

?>