<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load composer's autoloader
	require 'vendor/autoload.php';
	
	class FinancrNotifications
	{

		private $carrierAddress = null;
		private $smtp_host = null;
		private $smtp_user = null;
		private $smtp_pass = null;

		public function __construct() {
			$this->carrierAddress = array("att"=>"txt.att.net",
										"tmobile"=>"tmomail.net",
										"verizon"=>"vtext.com",
										"sprint"=>"messaging.sprintpcs.com",
										"virgin"=>"vmobl.com",
										"tracfone"=>"mmst5.tracfone.com",
										"metropcs"=>"mymetropcs.com",
										"boostmobile"=>"myboostmobile.com",
										"cricket"=>"mms.cricketwireless.net",
										"ptel"=>"ptel.com",
										"republic"=>"text.republicwireless.com",
										"googlefi"=>"msg.fi.google.com",
										"suncom"=>"tms.suncom.com",
										"ting"=>"message.ting.com",
										"uscellular"=>"email.uscc.net",
										"consumercellular"=>"cingularme.com",
										"cspire"=>"cspirel.com",
										"pageplus"=>"vtext.com");
			$this->loadSMTPSettings();
		}
		

		private function loadSMTPSettings() {
			$file = fopen('/etc/financr/settings.conf', 'r');
			if($file) {
				while(($line = fgets($file)) != false) {
					$settings_tok = explode("=", $line);
					if(strcmp(trim($settings_tok[0]), 'smtp') == 0) {
						$this->smtp_host = trim($settings_tok[1]);
					} else if(strcmp(trim($settings_tok[0]), 'smtp_user') == 0) {
						$this->smtp_user = trim($settings_tok[1]);
					} else if(strcmp(trim($settings_tok[0]), 'smtp_pass') == 0) {
						$this->smtp_pass = trim($settings_tok[1]);
					}
				}
			}
		}

		public function scrapeForCarrier($phone_number) {
			$area_code = substr($phone_number, 0, 3);
			$pref_num = substr($phone_number, 3,6);
			$final_num = substr($phone_number, 6, 9);

			$url = "http://www.fonefinder.net/findome.php?npa=" . $area_code . "&nxx=" . $pref_num . "&thoublock=" . $final_num . "&usaquerytype=Search+by+Number&cityname=";

			$content = file_get_contents($url);

			libxml_use_internal_errors(true);
			$dom = new DOMDocument();
			$dom->loadHTML($content);
			$table = $dom->getElementsByTagName('td');
			$i=1;
			foreach($table as $t) {
				if($i == 7) {
					$content = $t->textContent;
					break;
				}
				$i++;
			}
			return $content;
		}

		public function sendText($phone_number) {
			
		}

		public function sendMail($email, $subject, $message) {
			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->Host = $this->smtp_host;
			$mail->SMTPAuth = true;
			$mail->Username = $this->smtp_user;
			$mail->Password = $this->smtp_pass;
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->From = 'info@financr.net';
			$mail->FromName = 'Financr';
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->addReplyTo('info@financr.net', 'Financr Info');

			$mail->addAddress($email);
			var_dump($mail->send());
		}
	}

?>