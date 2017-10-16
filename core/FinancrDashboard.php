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
			$user_setup = $this->store->userCompletedFirstTimeSetup($_SESSION['session_email']);
			
			$this->html->setPageTitle('Financr - User Dashboard');
			$this->html->addScript('js/dashboard.js');
			if($user_setup) { 
				$this->html->addScript('https://www.gstatic.com/charts/loader.js');
				$this->html->addScript('js/dashboard_charts.js');
			}
			$this->html->addCSS('css/main.css');
			$this->html->displayHeader('financrDashboard', 'mainController');
			$this->html->beginDiv('header_top', 'id');
			$this->html->displayImage('Financr', 'assets/logo_64.png', 'logo_64');
			$this->html->endDiv();

			echo "<div id=\"main_app\" class=\"clearfix\">\n";
			echo "	<div id=\"dashboard_side_bar\">\n";
			echo "		<div class=\"dashboard_side_bar_title\">Financr</div>\n";
			echo "	</div>\n";
			echo "	<div id=\"dashboard_main\">\n";
			if ($user_setup) {
				
				echo "		<div style=\"position:relative;width:100%\">";
				echo "				<div id=\"chart_div\" style=\"position:absolute;right:600px;top:0px;width: 900px; height: 500px;\"></div>";
				echo "		</div>\n";
							
			} else {
				$this->firstTimeSetup();
			}
			echo "	</div>\n";	// dashboard_main
			echo "</div>\n"; // main_app
		}

		private function renderSideMenu() {
			echo "<div class=\"side_menu\" ng-controller=\"sideMenuController\">\n";
			echo "	<div class=\"side_menu_item\">\n";
			echo "	</div>\n";
			echo "</div>\n";
		}
		
		private function firstTimeSetup() {
			include('../ui/FirstTimeSetup.php');
		}
	}
?>
