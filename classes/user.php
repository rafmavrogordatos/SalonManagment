<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($vat_number){

		try {
			$stmt = $this->_db->prepare('SELECT password, vat_number, memberID FROM members WHERE vat_number = :vat_number AND active="Yes" ');
			$stmt->execute(array('vat_number' => $vat_number));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($vat_number,$password){

		$row = $this->get_user_hash($vat_number);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['vat_number'] = $row['vat_number'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
