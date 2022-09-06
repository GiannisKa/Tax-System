<?php
	abstract class TaxPayer{
		private $id;
		private $name;
		private $occupation;
		private $income;
		private $tax_office;
		
		function __construct($id, $n, $o, $i, $t) {
			$this->id = $id;
			$this->name = $n;
			$this->occupation = $o;
			$this->income = $i;
			$this->tax_office = $t;			
		}
		
		public abstract function calcTax();
		
		function show(){
			echo "<td valign='center' height='30px'> TaxPayer " . $this->name . " (" . $this->occupation . ") Income: " . $this->income . " euros </td>";
		}
		
		function getTaxOffice(){
			return $this->tax_office;
		}
	}
?>