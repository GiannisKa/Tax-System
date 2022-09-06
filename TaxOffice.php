<?php

	include "TaxPayer.php";
	include "Employee.php";
	include "Freelancer.php";

	class TaxOffice{
		private $id;
		private $name;
		var $tax_payers = array();
		
		function __construct($i, $n) {
			$this->id = $i;
			$this->name = $n;
		}
		
		function load() {
			// Connection to database
			$link = mysqli_connect("localhost","root", "", "taxcalcsoftware");				
			// Check if the connection is established correctlly
			if (mysqli_connect_errno()) {
				echo "<h1 style='color: red'> Connection error </h1>";
				exit;
			}
			$sql = "select * from taxpayer";
			// Testing statement for checking the syntax of the query: 
			//echo $sql;
			$results = mysqli_query($link, $sql);
			while ($row = mysqli_fetch_assoc($results)) {	
				// Get the values for each product
				$id = $row['id'];
				$name = $row['name'];
				$occupation = $row['occupation'];
				$income = $row['income'];
				$tax_office = $row['tax_office'];
				// Create an object of type product, based on the previous values
				if(strcmp($occupation,"Freelancer") == 0){
					$tp = new Freelancer($id, $name, $occupation, $income, $tax_office);
				}else{
					$tp = new Employee($id, $name, $occupation, $income, $tax_office);
				}
				// Add the object product in the array stored as an attribute
				$this->tax_payers[count($this->tax_payers)] = $tp;
			}
		}
		
		function show(){
			echo	"<tr height='30px' width='100px'>
						<th> Tax Office: " . $this->name . " </th>
						<th> Tax Amount </th>
					</tr>";
			$total = 0;
			for ($i=0; $i<count($this->tax_payers); $i++){
				if(strcmp($this->name , $this->tax_payers[$i]->getTaxOffice()) == 0){
					echo "<tr>";
						echo  $this->tax_payers[$i]->show();
						echo "<td valign='center' height='30px'> " . $this->tax_payers[$i]->calcTax() . "</td>";
					echo "</tr>";
					$total += $this->tax_payers[$i]->calcTax();
				}
			}
			echo "<tr>";
				echo "<td valign='right' height='30px'> Total: </td>";
				echo "<td valign='center' height='30px'>" . $total . " euros</td>";
			echo "</tr>";
			
		}
				
	}
?>