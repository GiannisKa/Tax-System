<?php

	class Employee extends TaxPayer{
		
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
			if($this->income <= 35000){
				$total = $this->income * 0.22;
				if($this->income <= 25000){
					return $total + $this->income * 0.01;
				}else{
					return $total + $this->income * 0.02;
				}
			}else{
				return $this->income * 0.28 + $this->income * 0.02;
			}
		}
		
	}
?>