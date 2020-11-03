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

	<div class="row">


			<form>
    		&nbsp&nbsp&nbsp&nbspΕπιλογή Πελάτη: <select name="clients_list">
    		<option value="volvo">Πελάτης Α</option>
    		<option value="saab">Πελάτης Β</option>
    		<option value="fiat">Πελάτης Γ</option>
    		<option value="audi">Πελάτης Δ</option>
  			</select>
  			&nbsp <input class="btn btn-default" type="submit" name="Επιλογή" value="Επιλογή" height="5px"></form>
  						
  						<div id="dialog-form" title="Προσθήκη Νέου Πελάτη">
 
  							<form name="new_client" method="POST" action="process.php">
   							 <fieldset>
      							<label for="name">Ονομα</label>
      							<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
      							<label for="last">Επωνυμο</label>
      							<input type="text" name="last" id="last" class="text ui-widget-content ui-corner-all">
      							<label for="address">Διεύθυνση</label>
      							<input type="text" name="address" id="address" class="text ui-widget-content ui-corner-all">
      							<label for="num">Αριθμός</label>
      							<input type="text" name="num" id="num" class="text ui-widget-content ui-corner-all">
      							<label for="city">Πόλη</label>
      							<input type="text" name="city" id="city" class="text ui-widget-content ui-corner-all">
      							<label for="postal">ΤΚ</label>
      							<input type="text" name="postal" id="postal" class="text ui-widget-content ui-corner-all">
      							<label for="state">Νομός</label>
      							<input type="text" name="state" id="state" class="text ui-widget-content ui-corner-all">
      							<label for="birth">Ημ/νία Γενέθλίων</label>
      							<input type="text" name="birth" id="birth" class="text ui-widget-content ui-corner-all">
      							<label for="giorti">Γιορτή</label>
      							<input type="text" name="giorti" id="giorti" class="text ui-widget-content ui-corner-all">
      							<label for="kiniti">Είναι κινητή;</label>
      							<input type="checkbox" name="kiniti" id="kiniti" class="text ui-widget-content ui-corner-all">
      							<label for="tel">Σταθερό</label>
      							<input type="text" name="tel" id="tel" class="text ui-widget-content ui-corner-all">
      							<label for="mobile">Κινητό</label>
      							<input type="text" name="mobile" id="mobile" class="text ui-widget-content ui-corner-all">
      							<label for="email">Ηλ. Ταχυδρομείο</label>
      							<input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all">
     						    <label for="facebook">Facebook</label>
      							<input type="text" name="facebook" id="facebook" class="text ui-widget-content ui-corner-all">
      							<label for="password">Συστάθηκε από</label>
     						    <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">
 
      							<!-- Allow form submission with keyboard without duplicating the dialog button -->
      							<input type="submit" method="POST" action="process.php" tabindex="-1" style="position:absolute; top:-1000px">
   							 </fieldset>
 						    </form>
						</div>
						&nbsp&nbsp&nbsp&nbsp<button class="btn btn-primary" id="create-user">Προσθήκη Πελάτη</button>		
						
 			</form>
			

	</div>
<br>
</div>
<div class="container">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Stoixeia')">Στοιχεία</button>
  <button class="tablinks" onclick="openCity(event, 'Istoriko')">Ιστορικό</button>
  <button class="tablinks" onclick="openCity(event, 'Vafeio')">Βαφείο</button>
  <button class="tablinks" onclick="openCity(event, 'Pontoi')">Πόντοι</button>
  <button class="tablinks" onclick="openCity(event, 'Referrals')">Referrals</button>
</div>

<div id="Stoixeia" class="tabcontent">
	<div id="clientId">
		Κωδ. Πελάτη
		<input type="text" 
	</div>
</div>

<div id="Istoriko" class="tabcontent">
tbe2
</div>

<div id="Vafeio" class="tabcontent">
tbe3
</div>

<div id="Pontoi" class="tabcontent">
tbe4
</div>

<div id="Referrals" class="tabcontent">
tbe5
</div>

</div>

<?php 
//include header template
require('layout/footer.php'); 
?>