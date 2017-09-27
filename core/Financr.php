<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrStore.php');
	require_once('FinancrRegister.php');
	require_once('FinancrApp.php');
	require_once('FinancrNotifications.php');

	class Financr
	{
		private $html = null;
		private $cgi = null;

		private $notloggedfuncs = null;

		public function __construct() {
			session_start();
			
			$this->app = new FinancrApp();
			$this->cgi = $this->app->getCGI();
			$this->html = $this->app->getHTML();

			$this->notloggedfuncs = array('register');

			// User is not logged in!
			if (!$this->userIsLoggedIn()) {
				// If function is accessible while not being logged in.
				if (in_array($this->cgi->getValue('f'), $this->notloggedfuncs)) {
					$this->handleFunction($this->cgi->getValue('f'), $this->cgi->getValue('s'));					
				// Not logged in, and no function request, redirect to login.
				} else {
					$this->html->setPageTitle('Financr');
					$this->renderHeaders();
					$this->renderLogin();

					$notifications = new FinancrNotifications();
					echo $notifications->scrapeForCarrier("2606227118");
					//$notifications->unitTestSendMail();
				}
			// User is logged in!
			} else {

			}
			$this->renderFooter();
		}

		private function handleFunction($function, $subfunction) {
			// Register an account
			if (strcmp($function, "register") == 0) {
				$register = new FinancrRegister($subfunction);
			// Dashboard for logged-in user
			} else if (strcmp($function, "dashboard") == 0) {

			}
		}

		private function renderHeaders() {
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader();
		}

		private function renderFooter() {
			$this->html->displayFooter();
		}

		private function renderLogin() {
			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			$this->html->endDiv();
			$this->html->beginDiv('login', 'class');
			$this->html->renderLogin('login_entry','login_entry','username','password',False);

			
			$this->html->endDiv();
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
