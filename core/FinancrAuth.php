<?php
	require_once('../utils/IndoGear/Database.php');
	
	class FinancrAuth
	{
		private $conn = null;

		public function __construct() {
			$this->conn = new Database('/etc/financr/settings.conf');
		}

		public function hashPassword($password) {
			return hash("sha256", $password);
		}

		public function verifyPassword($email, $password) {
			$result = $this->conn->selectQuery("user_pass", "users", "user_email='$email'", null);
			
			$enteredPass = $this->hashPassword(trim($password));
			$retrievedPass = $result[0]["user_pass"];

			if (strcmp($enteredPass, $retrievedPass) !== 0) {
				return true;
			}

			return false;
		}
	}
?>
