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
			echo "This is the dashboard.";
		}

		private function displayDashboard() {
			
		}
		
		private function firstTimeSetup() {
		}
	}
?>
