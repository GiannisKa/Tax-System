<?php

	include "TaxOfficeList.php";

	// Create a list of available taxes
	$availableOffices = new TaxOfficeList();
	// Load avaiable taxes from DB
	$availableOffices->load();
	
	$availableOffices->show();
?>