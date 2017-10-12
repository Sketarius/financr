<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrStore.php');
	require_once('FinancrRegister.php');
	require_once('FinancrApp.php');
	require_once('FinancrNotifications.php');
	require_once('FinancrAuth.php');
	require_once('FinancrDashboard.php');

	class Financr
	{
		private $html = null;
		private $cgi = null;

		private $notloggedfuncs = null;
		private $loggedinfuncs = null;

		public function __construct() {			
			$this->app = new FinancrApp();
			$this->cgi = $this->app->getCGI();
			$this->html = $this->app->getHTML();
			$this->auth = new FinancrAuth();
			$this->store = new FinancrStore();

			$this->notloggedfuncs = array('register', 'login');
			$this->loggedinfuncs = array('dashboard');

			// User is not logged in!
			if (!$this->auth->isLoggedIn()) {
				// If function is accessible while not being logged in.
				if (in_array($this->cgi->getValue('f'), $this->notloggedfuncs)) {
					$this->handleFunction($this->cgi->getValue('f'), $this->cgi->getValue('s'));					
				// Not logged in, and no function request, redirect to login.
				} else {
					$this->html->setPageTitle('Financr');
					$this->renderHeaders();
					$this->renderLogin();
				}
			// User is logged in!
			} else {
				// Verify session key is real
				if ($this->store->verifySession($_SESSION['session_email'], $_SESSION['session_key'])) {
					// Function is accessible only while being logged in.
					if (in_array($this->cgi->getValue('f'), $this->loggedinfuncs)) {
						$this->handleFunction($this->cgi->getValue('f'), $this->cgi->getValue('s'));
					} else {
						//$this->handleFunction('dashboard', '');
						header('Location: index.php?f=dashboard'); 
					}
				// Session is either fake or old.
				} else {
					session_destroy();
					$this->html->setPageTitle('Financr');
					$this->renderHeaders();
					$this->renderLogin();
				}
			}
			$this->renderFooter();
		}

		private function handleFunction($function, $subfunction) {
			// Register an account
			if (strcmp($function, "register") == 0) {
				$register = new FinancrRegister($subfunction);
			// Dashboard for logged-in user
			} else if (strcmp($function, "dashboard") == 0) {
				$dashboard = new FinancrDashboard($subfunction);
			} else if (strcmp($function, "login") == 0) {
				if ($this->auth->verifyPassword($_POST['username'], $_POST['password'])) {
					$this->store->addNewSession($_POST['username']);
					header('Location: index.php?f=dashboard');
				}
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
			echo "<form method=\"POST\">";
			echo "<input type=\"hidden\" name=\"f\" value=\"login\" />";
			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			$this->html->endDiv();
			$this->html->beginDiv('login', 'class');
			$this->html->renderLogin('login_entry','login_entry','username','password',False);
			$this->html->endDiv();
			echo "</form>";
		}		

		private function userIsLoggedIn() {
			return $this->auth->isLoggedIn();
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
