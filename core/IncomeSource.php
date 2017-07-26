<?php
	class IncomeSource
	{
		private $isSalary = false;
		private $payCheckAmount = null;
		private $paymentFrequency = null;
		
		private static $WEEKLY_PAY   = 0;
		private static $BIWEEKLY_PAY = 1;
		private static $SPECIFIC_PAY = 2;
		
		public __construct($isSalary, $paycheckAmount, $payFrequency) {
			$this->isSalary = $isSalary;
			$this->paymentFrequency = $paymentFrequency;
		}
	}
?>
