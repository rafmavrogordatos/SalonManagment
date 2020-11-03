<?php require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['vat_number']) < 3){
		$error[] = 'vat_number is too short.';
	} else {
		$stmt = $db->prepare('SELECT vat_number FROM members WHERE vat_number = :vat_number');
		$stmt->execute(array(':vat_number' => $_POST['vat_number']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['vat_number'])){
			$error[] = 'vat_number provided is already in use.';
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO members (nameofSalon,firstname,lastname,homeadress,home_num,city,postalcode,state,tel,mobile,tax_office,vat_number,password,email,active) VALUES (:nameofSalon, :firstname, :lastname, :homeadress, :home_num, :city, :postalcode, :state, :tel, :mobile, :tax_office, :vat_number, :password, :email, :active)');
			$stmt->execute(array(
				':nameofSalon' => $_POST['nameofSalon'],
				':firstname' => $_POST['firstname'],
				':lastname' => $_POST['lastname'],
				':homeadress' => $_POST['homeadress'],
				':home_num' => $_POST['home_num'],
				':city' => $_POST['city'],
				':postalcode' => $_POST['postalcode'],
				':state' => $_POST['state'],
				':tel' => $_POST['tel'],
				':mobile' => $_POST['mobile'],
				':tax_office' => $_POST['tax_office'],
				':vat_number' => $_POST['vat_number'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			//redirect to index page
			header('Location: register.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'SuccSteps Salon Management - Registration Form';

//include header template
require('layout/header.php');
?>


<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>SuccSteps Registration</h2>
				<p>Already a member? <a href='index.php'>Login</a></p>
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
				?>
				<div class="form-group">
					<input type="text" name="nameofSalon" id="nameofSalon" class="form-control input-lg" placeholder="Ονομα Κομμωτηρίου" value="<?php if(isset($error)){ echo $_POST['city']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="text" name="firstname" id="firstname" class="form-control input-lg" placeholder="Ονομα Ιδιοκτήτη" value="<?php if(isset($error)){ echo $_POST['firstname']; } ?>" tabindex="2">
				</div>	
				<div class="form-group">
					<input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Επώνυμο Ιδιοκτήτη" value="<?php if(isset($error)){ echo $_POST['lastname']; } ?>" tabindex="3">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="homeadress" id="homeadress" class="form-control input-lg" placeholder="Διέυθυνση Κομμωτηρίου" tabindex="4">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="home_num" id="home_num" class="form-control input-lg" placeholder="Αριθμός" tabindex="5">
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="city" id="city" class="form-control input-lg" placeholder="Πόλη" value="<?php if(isset($error)){ echo $_POST['city']; } ?>" tabindex="6">
				</div>
				<div class="form-group">
					<input type="text" name="postalcode" id="postalcode" class="form-control input-lg" placeholder="Τ.Κ." value="<?php if(isset($error)){ echo $_POST['postalcode']; } ?>" tabindex="7">
				</div>
				<div class="form-group">
					<input type="text" name="state" id="state" class="form-control input-lg" placeholder="Νομός" value="<?php if(isset($error)){ echo $_POST['state']; } ?>" tabindex="8">
				</div>
				<div class="form-group">
					<input type="text" name="tel" id="tel" class="form-control input-lg" placeholder="Σταθερό" value="<?php if(isset($error)){ echo $_POST['tel']; } ?>" tabindex="9">
				</div>
				<div class="form-group">
					<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Κινητό" value="<?php if(isset($error)){ echo $_POST['mobile']; } ?>" tabindex="10">
				</div>
				<div class="form-group">
					<input type="text" name="tax_office" id="tax_office" class="form-control input-lg" placeholder="ΔΟΥ" value="<?php if(isset($error)){ echo $_POST['tax_office']; } ?>" tabindex="11">
				</div>
				<div class="form-group">
					<input type="text" name="vat_number" id="vat_number" maxlength="9" class="form-control input-lg" placeholder="ΑΦΜ" value="<?php if(isset($error)){ echo $_POST['vat_number']; } ?>" tabindex="12">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="13">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Κωδικός Πρόσβασης" tabindex="14">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Κωδικός Πρόσβασης" tabindex="15">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Εγγραφή" class="btn btn-primary btn-block btn-lg" tabindex="16"></div>
				</div>
			</form>
		</div>
	</div>

</div>

<?php
//include header template
require('layout/footer.php');
?>
