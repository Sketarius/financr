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

		public function emailAlreadyRegistered($email) {
			$escaped_email = $this->conn->escapeString($email);

			$result = $this->conn->selectQuery('user_id', 'users', "user_email='$escaped_email'");
			if (sizeof($result) > 0) {
				return true;
			}

			return false;
		}

		public function addNewSession($email) {
			$session_key = $this->auth->generateRandomString(40);
			$qry = "INSERT into user_sessions(session_key, session_user_id, session_create_dt) VALUES('$session_key', (SELECT user_id FROM users WHERE user_email='$email'), NOW());";
			echo $qry;
			$result = $this->conn->insertQuery($qry);
		}
	}
?>
