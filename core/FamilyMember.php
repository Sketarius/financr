<?php
	class FamilyMember
	{
		private $firstName = null;
		private $lastName = null;
		private $occupation = null;

		private $earnsSalary = false;		

		public function __construct($firstName, $lastName, $occupation) {
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->occupation = $occupation;
		}

		public function setEarnsSalary($earnsSalary) {
			$this->earnsSalary = $earnsSalary;
		}

		
	}
?>
