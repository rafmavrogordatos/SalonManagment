<?php
include('config.php')
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>SuccSteps | Λογιστήριο</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="SuccSteps Logo" /></a>
	    </div>
        <div class="content">
<?php
//We display a welcome message, if the user is logged, we display it username
?>
Γεία σου<?php if(isset($_SESSION['username'])){echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');} ?>,<br />
<br />
Μπορειτε να <a href="users.php">δειτε την λίστα των χρηστών</a>.<br /><br />
<?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($_SESSION['username']))
{
//We count the number of new messages the user has
$nb_new_pm = mysqli_fetch_array(mysqli_query($con,'select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['memberID'].'" and user1read="no") or (user2="'.$_SESSION['memberID'].'" and user2read="no")) and id2="1"'));
//The number of new messages is in the variable $nb_new_pm
$nb_new_pm = $nb_new_pm['nb_new_pm'];
//We display the links
?>
<a href="list_pm.php">Εισερχόμενα(<?php echo $nb_new_pm; ?> unread)</a><br />
<a href="connexion.php">Εξοδος</a>
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
<a href="connexion.php">Σύνδεση</a>
<?php
}
?>
		</div>
		
	</body>
</html>