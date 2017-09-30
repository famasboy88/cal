<?php

// Connexion à la base de données
require_once('bdd.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$sql = "UPDATE register_event SET  petition_date_start = '".$start."', petition_date_end = '".$end."' WHERE petition_id = ".$id." ";

	
	if (mysqli_query($bdd, $sql)) {
	    echo "OK";
	} else {
	    echo "Error updating record: " . mysqli_error($bdd);
	}


	mysqli_close($bdd);

	// $sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";

	
	// $query = $bdd->prepare( $sql );
	// if ($query == false) {
	//  print_r($bdd->errorInfo());
	//  die ('Erreur prepare');
	// }
	// $sth = $query->execute();
	// if ($sth == false) {
	//  print_r($query->errorInfo());
	//  die ('Erreur execute');
	// }else{
	// 	die ('OK');
	// }

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
