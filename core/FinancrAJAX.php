<?php
	require_once('../utils/IndoGear/Html.php');
	require_once('../utils/IndoGear/Cgi.php');
	require_once('FinancrStore.php');
	
	class FinancrAJAX
	{
		private $app = null;
		private $cgi = null;
		private $store = null;

		public function __construct($app, $subfunction) {
			$this->app = $app;
			$this->cgi = $app->getCGI();
			$this->store = $app->getStore();

			if (strcmp($subfunction, 'carriers') == 0) {
				$this->handleCarriers();
			}
		}

		public function handleCarriers() {
			$action = $this->cgi->getValue('action');

			if(strcmp($action, 'get') == 0) {
				$this->store->getSMSCarriers();
			}
		}
	}
?>