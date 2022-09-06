<?php
	
	include "TaxOffice.php";

	class TaxOfficeList{
		var $tax_offices = array();
		
		function load() {
			// Connection to database
			$link = mysqli_connect("localhost","root", "", "taxcalcsoftware");				
			// Check if the connection is established correctlly
			if (mysqli_connect_errno()) {
				echo "<h1 style='color: red'> Connection error </h1>";
				exit;
			}
			$sql = "select * from country";
			// Testing statement for checking the syntax of the query: 
			//echo $sql;
			$results = mysqli_query($link, $sql);
			while ($row = mysqli_fetch_assoc($results)) {	
				// Get the values for each product
				$id = $row['id'];
				$city = $row['city'];
				// Create an object of type product, based on the previous values
				$to = new TaxOffice($id, $city);
				$to->load();
				// Add the object product in the array stored as an attribute
				$this->tax_offices[count($this->tax_offices)] = $to;
			}
		}
		
		function show() {
			echo "<table border ='1' >";
			for ($i=0; $i<count($this->tax_offices); $i++) {
				$this->tax_offices[$i]->show();
			}
			echo "</table>";
		}
	}
?>