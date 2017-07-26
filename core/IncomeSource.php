<?php
	class IncomeSource
	{
		private $isSalary = false;
		private $payCheckAmount = null;

		private $wagePerHour = null;
		private $hoursPerWeek = null;
		
		public __construct($isSalary, $wageOrSalary, $hoursPerWeek) {
			// If salary, set PayCheck amount
			if ($isSalary) {
				$this->isSalary;
				$this->payCheckAmount = $wageOrSalary;
			} else {
				$this->wagePerHour = $wageOrSalary;
				$this->hoursPerWeek = $hoursPerWeek;
			}
		}
	}
?>
