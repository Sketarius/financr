<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load composer's autoloader
	require 'vendor/autoload.php';
	
	class FinancrNotifications
	{

		/**
			AT&T: number@txt.att.net
			T-Mobile: number@tmomail.net)
			Verizon: number@vtext.com (text-only), number@vzwpix (text + photo)
			Sprint: number@messaging.sprintpcs.com or number@pm.sprint.com
			Virgin Mobile: number@vmobl.com
			Tracfone: number@mmst5.tracfone.com
			Metro PCS: number@mymetropcs.com
			Boost Mobile: number@myboostmobile.com
			Cricket: number@mms.cricketwireless.net
			Ptel: number@ptel.com
			Republic Wireless: number@text.republicwireless.com
			Google Fi (Project Fi): number@msg.fi.google.com
			Suncom: number@tms.suncom.com
			Ting: number@message.ting.com
			U.S. Cellular: number@email.uscc.net
			Consumer Cellular: number@cingularme.com
			C-Spire: number@cspire1.com
			Page Plus: number@vtext.com

		**/

		private $carrierAddress = null;

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
		}

		public function scrapeForCarrier($phone_number) {
			$area_code = substr($phone_number, 0, 3);
			$local_num = substr($phone_number, 3,6);
			$final_num = substr($phone_number, 6, 9);

			$url = "http://www.fonefinder.net/findome.php?npa=" . $area_code . "&nxx=" . $local_num . "&thoublock=" . $final_num . "&usaquerytype=Search+by+Number&cityname=";

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

		public function unitTestSendMail() {
			// Instantiate Class
			$mail = new PHPMailer();
			 
			
			//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.comcast.net';					  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'sketarius';                        // SMTP username
		    $mail->Password = 'Artbelliscool1';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to


			$mail->From      = 'info@financr.net';
	        $mail->FromName  = 'Financr';
	        $mail->isHTML(true);
	        $mail->Subject   = 'Welcome to Financr!';
	        $mail->Body      = "Hi Uncle Steve! I'm sending a test text from my Financr application. Tell me if you have received this. Don't reply to this text.";
			$mail->addReplyTo('info@financr.net', 'Information');
 
			// Send To
			$mail->addAddress( "2604401610@messaging.sprintpcs.com" ); // Where to send it
			//$mail->addAddress("2604139274@vtext.com");
			var_dump( $mail->send() );      // Send!
		}
	}

?>