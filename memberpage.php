<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'SuccSteps Salon Management - Home';

//include header template
require('layout/header.php'); 
?>

<div class="container">
  <nav class="navbar navbar-default">
      <div class="container-fluid">
          <ul class="nav navbar-nav">
          <li><a href="clients.php">Πελάτες</a></li>
            <li><a href="#">Κλείσιμο Λογαριασμού</a></li>
            <li><a href="accountant/">Λογιστήριο</a></li>
            <li><a href="#">Google Adwords Καμπάνιες</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Ομαδικό Μήνυμα</a></li>
        <li><a href="#">Ρυθμίσεις</a></li>
        </ul>
      </div>
  </nav> <br /><br /><br />

</div>

	<div class="embed-responsive embed-responsive-4by3">
   		<center> <iframe src="iframes/basic.html" height="850" width="1140"></iframe> </center>
	</div>


<?php 
//include header template
require('layout/footer.php'); 
?>
