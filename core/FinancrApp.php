<?php
	class FinancrApp
	{
		private $html = null;
		private $cgi = null;
		private $store = null;

		public function __construct() {
			$this->cgi = new Cgi();
			$this->html = new Html(strlen($this->cgi->getValue('page_title')) > 0 ?($this->cgi->getValue('page_title')):'Financr');

			// Adding JQuery to all instances of FinancrApp
			$this->html->addScript('lib/jquery-3.2.1.min.js');
			$this->html->addScript('lib/angular.min.js');
		}

		public function getCGI() {
			return $this->cgi;
		}

		public function getHTML() {
			return $this->html;
		}

		public function getStore() {
			return $this->store;
		}
	}
?>