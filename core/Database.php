<?php
	class Database
	{
		private $host = null;
		private $db = null;
		private $user = null;
		private $pass = null;

		public  function __construct($settingsFile) {
			$this->loadDBConf($settingsFile);
		}
		
		private function loadDBConf($settingsFile) {
			$file = fopen($settingsFile, 'r');
			if($file) {
				while(($line = fgets($file)) != false) {
					$settings_tok = explode("=", $line);
					if(strcmp(trim($settings_tok[0]), 'host') == 0) {
						$this->host = trim($settings_tok[1]);
					} else if(strcmp(trim($settings_tok[0]), 'db') == 0) {
						$this->db = trim($settings_tok[1]);
					} else if(strcmp(trim($settings_tok[0]), 'user') == 0) {
						$this->user = trim($settings_tok[1]);
					} else if(strcmp(trim($settings_tok[0]), 'pass') == 0) {
						$this->pass = trim($settings_tok[1]);
					}
				}
			}				
		}
		
		public function query($query) {
			
		}
		
	}
?>
