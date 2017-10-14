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
			echo "<div ng-controller=\"firstTimeSetupController\" style=\"font-family: Arial; margin: 50px; margin-top: 10px; display: inline-block; width: 900px;\">";
			// Perform first time user setup here!
			echo " <h3>Before you start using Financr, we'll need to gather some information...	</h3>\n";
			echo "	<div id=\"firsttime_setup_accordian\">\n";
			echo "		<h3> Basic Details </h3>\n";
			echo "		<div>\n";
			echo "			<table>\n";
			echo "				<tr>\n";
			echo "					<td>First Name </td><td><input type=\"text\" name=\"first_name\" style=\"width: 150px;\" /></td>\n";
			echo "				</tr>\n";
			echo "				<tr>\n";
			echo "					<td>Last Name </td><td><input type=\"text\" name=\"last_name\" style=\"width: 150px;\" /></td>\n";
			echo "				</tr>\n";
			echo "				<tr>\n";
			echo "					<td>Address 1 </td><td><input type=\"text\" name=\"address1\" /></td>\n";
			echo "				</tr>\n";
			echo "				<tr>\n";
			echo "					<td>Address 2 </td><td><input type=\"text\" name=\"address2\" /></td>\n";
			echo "				</tr>\n";
			echo "				<tr>\n";
			echo "					<td>City </td><td><input type=\"text\" name=\"city\" style=\"width: 95px;\" /></td>\n";
			echo "				</tr>\n";
			echo "				<tr>\n";
			echo "					<td>State </td><td><input type=\"text\" name=\"state\"style=\"width: 40px;\" /></td>\n";
			echo "				</tr>\n";
			echo "				<tr>\n";
			echo "					<td>Country </td><td><input type=\"text\" name=\"country\" style=\"width: 80px;\" /></td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			echo "		</div>\n";
			echo "		<h3> Financial Details </h3>\n";
			echo "		<div>\n";
			echo "			<div style=\"margin: 10px; color: #ff0000;\"> Don't worry if you don't have all your account information, you can add additonal accounts later.</div>\n";
			echo "			<table>\n";
			echo "				<tr>\n";
			echo "					<td>How many people in the household will we finance for?</td>\n";
			echo "					<td>\n";
			echo "						<input ng-model=\"adults_employed\" ng-change=\"checkForZero()\" type=\"number\" name=\"adults_employed\" />\n";
			echo "					</td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			echo "			<table>\n";
			echo "				<tr>\n";
			echo "					<th>\n";
			echo "						Account Name\n";
			echo "					</th>\n";
			echo "					<th>\n";
			echo "						Starting Balance\n";
			echo "					</th>\n";
			echo "				</tr>\n";
			echo "				<tr ng-repeat=\"start in range(adults_employed)\">\n";
			echo "					<td style=\"padding-right: 50px;\"><input type=\"text\" placeholder=\"Account Name\" /></td>\n";
			echo "					<td>$ <input placeholder=\"0.00\" type=\"currency\" name=\"{{start+1}}_balance\" /></td>\n";
			echo "				</tr>\n";
			echo "			</table>\n";
			echo "		</div>\n";
			echo "		<h3> Notification Settings </h3>\n";
			echo "	</div>\n";
			echo "</div>\n";
		}
	}
?>
