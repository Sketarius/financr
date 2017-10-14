<?php
	
	class FinancrSetupWizard
	{
		private $app = null;
		private $html = null;
		private $cgi = null;
		private $auth = null;

		public function __construct() {
			$this->app = new FinancrApp();
			$this->html = $this->app->getHTML();
			$this->cgi = $this->app->getCGI();
			$this->auth = new FinancrAuth();
			$this->store = new FinancrStore();
		}
	}

?>