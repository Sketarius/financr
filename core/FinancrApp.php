<?php
	class FinancrApp
	{
		private $html = null;
		private $cgi = null;
		private $store = null;

		public function __construct() {
			$this->cgi = new Cgi();
			$this->html = new Html(strlen($this->cgi->getValue('page_title')) > 0 ?($this->cgi->getValue('page_title')):'Financr');
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