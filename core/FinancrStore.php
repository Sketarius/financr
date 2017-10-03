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
		public function registerUser($password, $email) {
			$hashedpassword = $this->auth->hashPassword($password);
			$escaped_pw = $this->conn->escapeString($hashedpassword);
			$escaped_email = $this->conn->escapeString($email);

			$qry = "INSERT into users(user_pass, user_email) VALUES ('$escaped_pw', '$escaped_email')";
			$result = $this->conn->insertQuery($qry);
		}

		public function getUserEmail($username) {
			$result = $this->conn->selectQuery("user_email", "users", "user_name='$username'", "meh");	
		}
	}
?>
