<?php
	require_once('FinancrAuth.php');

	class FinancrDashboard
	{
		private $app = null;
		private $html = null;
		private $cgi = null;
		private $auth = null;

		public function __construct($subfunction) {
			$this->app = new FinancrApp();
			$this->html = $this->app->getHTML();
			$this->cgi = $this->app->getCGI();
			$this->auth = new FinancrAuth();

			$this->handleDashboard($subfunction);
		}

		private function handleDashboard($subfunction) {
			$this->displayDashboard();
		}

		private function displayDashboard() {
			$this->html->setPageTitle('Financr - User Dashboard');
			$this->html->addScript('js/register.js');
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader();

			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			$this->html->endDiv();

			echo "<div id=\"dashboard_side_bar\">\n";
			echo "<div class=\"dashboard_side_bar_title\">Financr</div>\n";
			echo "</div>\n";
			echo "<div id=\"dashboard_main\">\n";
			echo "test2";
			echo "</div>\n";
		}
		
		private function firstTimeSetup() {
		}
	}
?>
