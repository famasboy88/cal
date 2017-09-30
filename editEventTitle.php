<?php

require_once('bdd.php');

if (isset($_POST['title']) && isset($_POST['id'])){
	

	$id = $_POST['id'];
	$title = $_POST['title'];
	
	$sql = "SELECT * FROM register_event WHERE petition_id =".$id." LIMIT 1";

	$req = mysqli_query($bdd,$sql);

	$row = mysqli_fetch_row($req);
	if($row!=NULL){
		$HTML='<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="updateEvent.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" value="'.$row[2].'" name="title" class="form-control" id="title" placeholder="Title" required="true">
					</div>
				  </div>

				  <div class="form-group">
					<label for="event_detail" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" name="event_detail" id="event_detail" placeholder="Event Details" required="true">'.$row[3].'</textarea>
						</div>
				  </div>

				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" value="'.$row[4].'" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>

				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" value="'.$row[5].'" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

				  <div class="form-group">
					<label for="event_category" class="col-sm-2 control-label">Category</label>
					<div class="col-sm-10">
					  <select name="event_category" class="form-control"  id="event_category" required="true">
						  <option value="-1">Choose Event Category ...</option>
						  <option value="Appearance" '.(($row[6]=='Appearance')?'selected="selected"':"").'>Appearance</option>
						  <option value="Attraction" '.(($row[6]=='Attraction')?'selected="selected"':"").'>Attraction</option>
						  <option value="Retreat" '.(($row[6]=='Retreat')?'selected="selected"':"").'>Retreat</option>
						  <option value="Training" '.(($row[6]=='Training')?'selected="selected"':"").'>Training</option>
						  <option value="Concert" '.(($row[6]=='Concert')?'selected="selected"':"").'>Attraction</option>
						  <option value="Conference" '.(($row[6]=='Conference')?'selected="selected"':"").'>Conference</option>
						  <option value="Convention" '.(($row[6]=='Convention')?'selected="selected"':"").'>Convention</option>
						  <option value="Gala" '.(($row[6]=='Gala')?'selected="selected"':"").'>Gala</option>
						  <option value="Festival" '.(($row[6]=='Festival')?'selected="selected"':"").'>Festival</option>
						  <option value="Competition" '.(($row[6]=='Competition')?'selected="selected"':"").'>Competition</option>
						  <option value="Meeting" '.(($row[6]=='Meeting')?'selected="selected"':"").'>Meeting</option>
						  <option value="Party" '.(($row[6]=='Party')?'selected="selected"':"").'>Party</option>
						  <option value="Rally" '.(($row[6]=='Rally')?'selected="selected"':"").'>Rally</option>
						  <option value="Screening" '.(($row[6]=='Screening')?'selected="selected"':"").'>Screening</option>
						  <option value="Seminar" '.(($row[6]=='Seminar')?'selected="selected"':"").'>Seminar</option>
						  <option value="Tour" '.(($row[6]=='Tour')?'selected="selected"':"").'>Tour</option>
						  <option value="Other" '.(($row[6]=='Other')?'selected="selected"':"").'>Other</option>
						</select>
					</div>
				  </div>											
					
				<div class="form-group">
					<label for="event_venue" class="col-sm-2 control-label">Venue</label>
					<div class="col-sm-10">
					  <input type="text" value="'.$row[7].'" name="event_venue" class="form-control" id="event_venue" placeholder="Venue" required="true">
					</div>
				</div>

				<hr>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Ticket Details</h4>
			  	</div>
			  	<br>
				<div class="form-group">
					<label for="event_ticket_price" class="col-sm-2 control-label">Price</label>
					<div class="col-sm-10">
					  <input type="number" value="'.$row[8].'" name="event_ticket_price" class="form-control" id="event_ticket_price" placeholder="Ticket Price" required="true">
					</div>
				</div>
				<div class="form-group">
					<label for="event_ticket_type" class="col-sm-2 control-label">Type</label>
					<div class="col-sm-10">
					  <input type="text"  value="'.$row[9].'" name="event_ticket_type" class="form-control" id="event_ticket_type" placeholder="Ticket Type (optional)">
					</div>
				</div>

				<div class="form-group">
					<label for="event_ticket_total_no" class="col-sm-2 control-label">Total Number</label>
					<div class="col-sm-10">
					  <input type="number" value="'.$row[10].'" name="event_ticket_total_no" class="form-control" id="event_ticket_total_no" placeholder="Ticket Total Number" required="true">
					</div>
				</div>

				<div class="form-group">
					<label for="event_ticket_discount" class="col-sm-2 control-label">Discount</label>
					<div class="col-sm-10">
					  <input type="number" value="'.$row[11].'" name="event_ticket_discount" class="form-control" id="event_ticket_discount" placeholder="Ticket Discount" required="true">
					</div>
				</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id" value="'.$id.'">
				  
				
				
			  </div>
			  <div class="modal-footer">
			  	<button type="submit" name="delete_event" id="delete_event" value="delete" class="btn btn-danger pull-left">Delete Event</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
				  ';

		echo $HTML;

	}else{
		echo "error";
	}
	
	mysqli_close($bdd);

	
	// $sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";

	
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

}
//header('Location: index.php');

	
?>
