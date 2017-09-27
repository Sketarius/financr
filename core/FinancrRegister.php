<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrApp.php');

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
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader();
			if (strcmp($subfunction, "invite") == 0) {
				$this->renderInviteRegister();
			} else {
				$this->renderRegister();
			}
		}

		private function renderInviteRegister() {
			echo "Invite Register page here!";
		}

		private function renderRegister() {
			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');

			echo "<table>\n";
			echo "	<tr>\n";
			echo "		<td></td>\n";
			echo "	</tr>\n";
			echo "</table>\n";
			$this->html->endDiv();


		}
	}
?>