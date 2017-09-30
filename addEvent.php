<?php

// Connexion à la base de données
require_once('bdd.php');


//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['event_detail']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['event_category']) && isset($_POST['event_venue']) && isset($_POST['event_ticket_price']) && isset($_POST['event_ticket_type']) && isset($_POST['event_ticket_total_no']) && isset($_POST['event_ticket_discount'])
	){
	
	$title = $_POST['title'];
	$event_detail = $_POST['event_detail'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$event_category= ($_POST['event_category']==-1)?NULL:$_POST['event_category'];
	$event_venue= $_POST['event_venue'];
	$event_ticket_price= $_POST['event_ticket_price'];
	$event_ticket_type =$_POST['event_ticket_type'];
	$event_ticket_total_no= $_POST['event_ticket_total_no'];
	$event_ticket_discount= $_POST['event_ticket_discount'];

	

	$sql = "INSERT INTO `register_event`(`petition_id`, `petition_status`, `petition_name`, `petition_details`, `petition_date_start`, `petition_date_end`, `petition_category`, `petition_venue`, `petition_ticket_price`, `petition_ticket_type`, `total_no_tickets`, `petition_discount`, `time_requested`, `user_id`) VALUES 
	('','Active','".$title."','".$event_detail."','".$start."','".$end."','".$event_category."','".$event_venue."',".$event_ticket_price.",'".$event_ticket_type."',".$event_ticket_total_no.",".$event_ticket_discount.",'',3)";

	if (mysqli_query($bdd, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}

	mysqli_close($bdd);

	// $sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	// //$req = $bdd->prepare($sql);
	// //$req->execute();
	
	// echo $sql;
	
	// $query = $bdd->prepare( $sql );
	// if ($query == false) {
	//  print_r($bdd->errorInfo());
	//  die ('Erreur prepare');
	// }
	// $sth = $query->execute();
	// if ($sth == false) {
	//  print_r($query->errorInfo());
	//  die ('Erreur execute');
	// }

	// if($event_category==NULL){
	// 	echo "NULL";
	// }else{
	// 	echo $event_category;
	// }
	
}

	
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
