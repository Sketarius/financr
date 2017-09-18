<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrStore.php');
	require_once('FinancrRegister.php');


	class Financr
	{
		private $html = null;
		private $cgi = null;

		private $notloggedfuncs = null;

		public function __construct() {
			session_start();
			$this->html = new Html('Financr');
			$this->cgi = new Cgi();

			$this->notloggedfuncs = array('register');

			// User is not logged in!
			if (!$this->userIsLoggedIn()) {
				// If function is accessible while not being logged in.
				if (in_array($this->cgi->getValue('f'), $this->notloggedfuncs)) {
					$this->handleFunction($this->cgi->getValue('f'), $this->cgi->getValue('s'));					
				// Not logged in, and no function request, redirect to login.
				} else {
					$this->renderLogin();
				}
			// User is logged in!
			} else {

			}
		}

		private function handleFunction($function, $subfunction) {
			if (strcmp($function, "register") == 0) {
				$register = new FinancrRegister($subfunction);
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
