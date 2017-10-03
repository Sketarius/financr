<?php
	class FinancrDashboard
	{
		private $app = null;
		private $html = null;
		private $cgi = null;

		public function __construct($subfunction) {
			$this->app = new FinancrApp();
			$this->html = $this->app->getHTML();
			$this->cgi = $this->app->getCGI();

			$this->handleDashboard($subfunction);
		}

		private function handleDashboard($subfunction) {

		}

		private function displayDashboard() {
			
		}
	}
?>