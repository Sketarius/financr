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
			$this->store = new FinancrStore();

			$this->handleDashboard($subfunction);
		}

		private function handleDashboard($subfunction) {
			$this->displayDashboard();
		}

		private function displayDashboard() {
			$this->html->setPageTitle('Financr - User Dashboard');
			$this->html->addScript('js/dashboard.js');
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader('financrDashboard', 'mainController');

			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			$this->html->endDiv();
			echo "<div id=\"main_app\">\n";
			echo "	<div id=\"dashboard_side_bar\">\n";
			echo "		<div class=\"dashboard_side_bar_title\">Financr</div>\n";
			//$this->renderSideMenu();
			echo "	</div>\n";
			echo "	<div id=\"dashboard_main\">\n";
			echo "		{{test}}";
			echo "	</div>\n";
			echo "</div>\n";
		}

		private function renderSideMenu() {
			/*$result = $this->store->getSideMenuItems('USER');

			if ($result) {
				echo "<div id=\"side_menu\">\n";
				for ($i = 0; $i < sizeof($result); $i++) {
					echo "<div class=\"side_menu_item\">\n";
					echo "	<a href=\"" . $result[$i]['menu_url'] . "\">" . $result[$i]['menu_value'] . "</a>\n";
					echo "</div>\n";
				}
				echo "</div>\n";
			}*/
			echo "<div class=\"side_menu\" ng-controller=\"sideMenuController\">\n";
			echo "	<div class=\"side_menu_item\">\n";
			echo "	</div>\n";
			echo "</div>\n";
		}
		
		private function firstTimeSetup() {

		}
	}
?>
