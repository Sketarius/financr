<?php
	class FinancrRegister
	{
		public function __construct($subfunction) {
			$this->handleRegister($subfunction);
		}

		private function handleRegister($subfunction) {
			if (strcmp($subfunction, "invite") == 0) {
				$this->renderInviteRegister();
			} else {
				$this->renderRegister();
			}
		}

		private function renderInviteRegister() {
			echo "Invite Register page here!";
		}

		private function renderRegister() {
			echo "Normal Register page here!";
		}
	}
?>