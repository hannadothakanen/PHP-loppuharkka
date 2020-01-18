<?php
header('Content-Type: application/json');

	$json_data = file_get_contents("Tuotteet.json");

	$json = json_decode($json_data);
	$Tuotteet = $json ->Tuotteet;

$output = array_filter($Tuotteet, "rajapinta");
echo json_encode($output);


	function rajapinta($data){

		if (isset($_GET['rajapinta'])) {
    	$tuotelista = $_GET['Tuotteet']; 
    		return true; }
	

		if (isset($_GET['Kategoria'])) {
			$Kategoria = $_GET['Kategoria'];

			if(isset($data ->Kategoria) && $data ->Kategoria == $Kategoria)
			{
				return true;
			}
				return false;
			}

		if (isset($_GET['Id'])) {
			$id = $_GET['Id'];

			if(isset($data ->Id) && $data ->Id == $id)
			{
				return true;
			}
				return false;
			}

		if (isset($_GET['hinta'])) {
			$hinta = $_GET['hinta'];

			if (isset($data ->hinta ) && $data ->hinta < $hinta)
			{
				return true;
			}
				return false;
			}

		if (isset($_GET['paino'])) {
			$paino = $_GET['paino'];

			if (isset($data ->paino ) && $data ->paino > $paino)
			{
				return true;
			}
				return false;
			}

		else
			{
			echo json_encode($data);
			}
	}
?>