<?php
	
	class Freelancer extends TaxPayer{
		
		private $id;
		private $name;
		private $occupation;
		private $income;
		private $tax_office;
		
		function __construct($id, $n, $o, $i, $t) {
			parent::__construct($id, $n, $o, $i, $t);		
			$this->income=$i;
			$this->tax_office=$t;
		}
		
		function calcTax(){
			if($this->income <= 25000){
				return ($this->income * 0.26) + ($this->income * 0.01) + 650;
			}else{
				return $this->income * 0.35 + $this->income * 0.02 + 650;
			}
		}
		
	}
?>