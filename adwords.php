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
 	 			<li><a href="memberpage.php">Πίσω στο Ημερολόγιο</a></li>
    		</ul>
  		</div>
	</nav> <br /><br /><br />

</div>


<div class="container">
	<div class="container">
	<div class="tab">
  	<button class="tablinks" onclick="openCity(event, 'campaings')">Καμπάνιες</button>
  	<button class="tablinks" onclick="openCity(event, 'new_campaing')">Νέα Καμπάνια</button>
	</div>

	<div id="campaings" class="tabcontent">
	tbe1
	</div>

	<div id="new_campaing" class="tabcontent">
		<div class="container-fluid">
			<div class="row">
				<form>
					<div class="form-group">
						Όνομα Καμπάνιας: 
						<input class="form-control" type="text" name="Campaing_name">
					</div>
					<div class="form-group">
						Οριζόμενο Χρονικά Δίαστημα:
						<input class="form-control" id="datepicker" type="date" class="datepicker-input" placeholder="ΑΠΟ χχ-χχ-χχχ ΕΩΣ χχ-χχ-χχχχ">
					</div>
					<div class="form-group">
						Διαφημιστικά: (δικά σας)
						<input type="file" name="fileToUpload" id="fileToUpload">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ή<Br>
						Χρέωση γραφίστα(+x €):
						<input type="checkbox">
					</div>
					<div class="form-group">
						Budget/μέρα:
						<input class="form-control" type="text" name="budgerperday">
					</div>		
					<div class="form-group">
						Target group<br>
							<select class="form-control" multiple>
 								 <option>Newsbomb</option>
  								<option>Newsit</option>
  								<option>Tourlibouki</option>
							</select>

					</div>
				</form>
			</div>
		</div>
	</div>



	</div>
	</div>	



<?php 
//include header template
require('layout/footer.php'); 
?>
