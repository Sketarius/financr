<?php
	require_once('../utils/IndoGear/Database.php');

	class FinancrStore
	{
		private $conn = null;

		public function __construct() {
			$this->conn = new Database('/etc/financr/settings.conf');
		}

		// Register a new user
		public function registerUser($username, $password, $address1, $address2, $city, $state, $country, $email) {
			$hashedpassword = $this->hashPassword($password);
			$qry = "INSERT into users(user_name, user_pass, user_pass_salt, user_address1, user_address2, user_city, user_state, user_country, user_email) VALUES ('$username', '$hashedpassword', 'nosalt', '$address1', '$address2', '$city', '$state', '$country', '$email')";
			$result = $this->conn->insertQuery($qry);
		}

		private function hashPassword($password) {
			return hash("sha256", $password);
		}

		public function verifyPassword($username, $password) {
			$result = $this->conn->selectQuery("user_pass", "users", "user_name='$username'", null);
			//print_r($result);
			
			$enteredPass = $this->hashPassword(trim($password));
			$retrievedPass = $result[0]["user_pass"];

			if (strcmp($enteredPass, $retrievedPass) !== 0) {
			}			
	
			echo $enteredPass . "<br />";
			echo $retrievedPass;
			
		}

		public function getUserEmail($username) {
			$result = $this->conn->selectQuery("user_email", "users", "user_name='$username'", "meh");	
		}
	}
?>
