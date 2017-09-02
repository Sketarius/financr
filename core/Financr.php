<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrStore.php');

	class Financr
	{
		private $html = null;
		private $cgi = null;

		public function __construct() {
			session_start();
			$this->html = new Html('Financr');
			$this->cgi = new Cgi();

			// User is not logged in!
			if (!$this->userIsLoggedIn()) {
				$this->renderLogin();
				$this->unitTestAddUser();
			// User is logged in!
			} else {
				
			}
		}

		private function renderLogin() {
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader();
			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			$this->html->endDiv();
			$this->html->beginDiv('login', 'class');
			$this->html->renderLogin('login_entry','login_entry','username','password',False);

			
			$this->html->endDiv();
			$this->html->displayFooter();
		}

		public function unitTestAddUser() {
			//phpinfo();
			$store = new FinancrStore();
			//$store->registerUser('sketarius', 'pmg2bhok', '1802 Trinity Blvd.', 'Blank here', 'Fort Wayne', 'IN', 'USA', 'sketarius@gmail.com');
			//$store->getUserEmail('sketarius');
			//$store->hashPassword('abc123');
			//$store->verifyPassword('sketarius', 'test123');
		}

		private function userIsLoggedIn() {
			return isset($_SESSION['logged']);
		}		

		private function setSession($key, $value) {
			$_SESSION[$key] = $value;
		}

		private function getSession($key) {
			return $_SESSION[$key];
		}

		private function killSession() {
			session_destroy();
		}
	}
?>
