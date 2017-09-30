<?php
	require_once('bdd.php');

		

	if (isset($_POST['title']) && isset($_POST['id']) && isset($_POST['event_detail']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['event_category']) && isset($_POST['event_venue']) && isset($_POST['event_ticket_price']) && isset($_POST['event_ticket_type']) && isset($_POST['event_ticket_total_no']) && isset($_POST['event_ticket_discount'])
	){


		echo $title = $_POST['title'];
		echo $id = $_POST['id'];
		echo $event_detail = $_POST['event_detail'];
		echo $start = $_POST['start'];
		echo $end = $_POST['end'];
		echo $event_category= ($_POST['event_category']==-1)?NULL:$_POST['event_category'];
		echo $event_venue= $_POST['event_venue'];
		echo $event_ticket_price= $_POST['event_ticket_price'];
		echo $event_ticket_type =$_POST['event_ticket_type'];
		echo $event_ticket_total_no= $_POST['event_ticket_total_no'];
		echo $event_ticket_discount= $_POST['event_ticket_discount'];

		$sql = "UPDATE `register_event` SET `petition_name` = '".$title."', `petition_details` = '".$event_detail."', `petition_date_start` = '".$start."', `petition_date_end` = '".$end."', `petition_category` = '".$event_category."', `petition_venue` = '".$event_venue."', `petition_ticket_price` = '".$event_ticket_price."', `petition_ticket_type` = '".$event_ticket_type."', `total_no_tickets` = '".$event_ticket_total_no."', `petition_discount` = '".$event_ticket_discount."' WHERE `register_event`.`petition_id` = ".$id."
		";

	
		if (mysqli_query($bdd, $sql)) {
		    echo "OK";
		} else {
		    echo "Error updating record: " . mysqli_error($bdd);
		    die();
		}


	}elseif (isset($_POST['delete_event']) && isset($_POST['id'])){
	
		
		$id = $_POST['id'];

		echo "Delete".$id;
		die();
		
		// $sql = "DELETE FROM events WHERE id = $id";
		// $query = $bdd->prepare( $sql );
		// if ($query == false) {
		//  print_r($bdd->errorInfo());
		//  die ('Erreur prepare');
		// }
		// $res = $query->execute();
		// if ($res == false) {
		//  print_r($query->errorInfo());
		//  die ('Erreur execute');
		// }
	
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);


?>