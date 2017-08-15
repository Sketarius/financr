<?php
	require_once('../utils/IndoGear/Database.php');

	class FinancrStore
	{
		private $conn = null;

		public function __construct() {
			$this->conn = new Database('/etc/financr/settings.conf');
		}

		public function registerUser($username, $password, $address1, $address2, $city, $state, $country, $email) {
			$qry = "INSERT into users(user_name, user_pass, user_pass_salt, user_address1, user_address2, user_city, user_state, user_country, user_email) VALUES ('$username', '$password', 'nosalt', '$address1', '$address2', '$city', '$state', '$country', '$email')";
			echo $qry;
			$result = $this->conn->insertQuery($qry);
		}
	}
?>