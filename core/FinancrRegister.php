<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrApp.php');
	require_once('FinancrStore.php');
	require_once('FinancrNotifications.php');

	class FinancrRegister
	{
		private $app = null;
		private $html = null;
		private $cgi = null;

		public function __construct($subfunction) {
			$this->app = new FinancrApp();
			$this->html = $this->app->getHTML();
			$this->cgi = $this->app->getCGI();

			$this->handleRegister($subfunction);
		}

		private function handleRegister($subfunction) {
			$this->html->setPageTitle('Financr - Register');
			$this->html->addScript('js/register.js');
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader();
			if (strcmp($subfunction, "invite") == 0) {
				$this->renderInviteRegister();
			} else if (strcmp($subfunction, "submit_registration") == 0) {
				$this->registerNewUser();
			} else {
				$this->renderRegister();
			}
		}

		private function registerNewUser() {
			$store = new FinancrStore();
			$notifications = new FinancrNotifications();
			$email = $this->cgi->getValue('email');
			$pass = $this->cgi->getValue('password1');

			if (!$store->emailAlreadyRegistered($email)) {
				$store->registerUser($pass, $email);
				$notifications->sendMail($email, 'Welcome to Financr!', 'Hey,<br/>Thanks for taking your time to try out Financr.' .
																		'If you have any questions contact us!<br />Thanks<br />' .
																		'The Financr Team');
				echo "Registered!";
			} else {
				echo "Email already exists";
			}
		}

		private function renderInviteRegister() {
			echo "Invite Register page here!";
		}

		private function renderRegister() {
			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			echo "<form method=\"POST\">";
			echo "<input type=\"hidden\" name=\"f\" value=\"register\" />\n";
			echo "<input type=\"hidden\" name=\"s\" value=\"submit_registration\" />\n";
			echo "<table>\n";
			echo "	<tr>\n";
			echo "		<td>E-Mail</td>\n";
			echo "		<td><input type=\"text\" name=\"email\" /></td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td>Password</td>\n";
			echo "		<td><input type=\"password\" id=\"password1\" name=\"password1\" /></td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td>Confirm Password</td>\n";
			echo "		<td><input type=\"password\" id=\"password2\" name=\"password2\" /></td>\n";
			echo "	</tr>\n";
			echo "	<tr>\n";
			echo "		<td></td><td><input id=\"submit\" type=\"submit\" value=\"register\" disabled/></td>\n";
			echo "	</tr>\n";
			echo "</table>\n";
			echo "</FORM>\n";
			$this->html->endDiv();
		}
	}
?>
