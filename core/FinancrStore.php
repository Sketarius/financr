<?php
	require_once('../utils/IndoGear/Database.php');
	require_once('FinancrAuth.php');

	class FinancrStore
	{
		private $conn = null;
		private $auth = null;

		public function __construct() {
			$this->conn = new Database('/etc/financr/settings.conf');
			$this->auth = new FinancrAuth();
		}

		// Register a new user
		public function registerUser($username, $password, $address1, $address2, $city, $state, $country, $email) {
			$hashedpassword = $this->auth->hashPassword($password);
			$qry = "INSERT into users(user_name, user_pass, user_pass_salt, user_address1, user_address2, user_city, user_state, user_country, user_email) VALUES ('$username', '$hashedpassword', 'nosalt', '$address1', '$address2', '$city', '$state', '$country', '$email')";
			$result = $this->conn->insertQuery($qry);
		}

		public function getUserEmail($username) {
			$result = $this->conn->selectQuery("user_email", "users", "user_name='$username'", "meh");	
		}
	}
?>
