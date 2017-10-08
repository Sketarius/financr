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

		public function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function isLoggedIn() {
			if (isset($_SESSION['session_email']) && isset($_SESSION['session_key'])) {
				return true;
			}

			return false;
		}

		public function login($email) {
			
		}
	}
?>
