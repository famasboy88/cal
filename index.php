<?php
require_once('bdd.php');


$sql = "SELECT * FROM register_event WHERE petition_status = 'Active'";

$req = mysqli_query($bdd,$sql);
//$req->execute();

// $events = $req->fetchAll();
$event = array();

if(mysqli_num_rows($req)>0){
	while ($row = mysqli_fetch_assoc($req)) {
		$event[] = $row;
	}
}

// foreach ($event as $key ) {
// 	echo $key['petition_name'];
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendar Module</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Menu</a>
                    </li>
                </ul>
            </div> -->

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title" required="true">
					</div>
				  </div>

				  <div class="form-group">
					<label for="event_detail" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" name="event_detail" id="event_detail" placeholder="Event Details" required="true"></textarea>
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
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>

				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

				  <div class="form-group">
					<label for="event_category" class="col-sm-2 control-label">Category</label>
					<div class="col-sm-10">
					  <select name="event_category" class="form-control"  id="event_category" required="true">
						  <option value="-1">Choose Event Category ...</option>
						  <option value="Appearance">Appearance</option>
						  <option value="Attraction">Attraction</option>
						  <option value="Retreat">Retreat</option>
						  <option value="Training">Training</option>
						  <option value="Concert">Attraction</option>
						  <option value="Conference">Conference</option>
						  <option value="Convention">Convention</option>
						  <option value="Gala">Gala</option>
						  <option value="Festival">Festival</option>
						  <option value="Competition">Competition</option>
						  <option value="Meeting">Meeting</option>
						  <option value="Party">Party</option>
						  <option value="Rally">Rally</option>
						  <option value="Screening">Screening</option>
						  <option value="Seminar">Seminar</option>
						  <option value="Tour">Tour</option>
						  <option value="Other">Other</option>
						</select>
					</div>
				  </div>											
					
				<div class="form-group">
					<label for="event_venue" class="col-sm-2 control-label">Venue</label>
					<div class="col-sm-10">
					  <input type="text" name="event_venue" class="form-control" id="event_venue" placeholder="Venue" required="true">
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
					  <input type="number" name="event_ticket_price" class="form-control" id="event_ticket_price" placeholder="Ticket Price" required="true">
					</div>
				</div>
				<div class="form-group">
					<label for="event_ticket_type" class="col-sm-2 control-label">Type</label>
					<div class="col-sm-10">
					  <input type="text" name="event_ticket_type" class="form-control" id="event_ticket_type" placeholder="Ticket Type (optional)">
					</div>
				</div>

				<div class="form-group">
					<label for="event_ticket_total_no" class="col-sm-2 control-label">Total Number</label>
					<div class="col-sm-10">
					  <input type="number" name="event_ticket_total_no" class="form-control" id="event_ticket_total_no" placeholder="Ticket Total Number" required="true">
					</div>
				</div>

				<div class="form-group">
					<label for="event_ticket_discount" class="col-sm-2 control-label">Discount</label>
					<div class="col-sm-10">
					  <input type="number" name="event_ticket_discount" class="form-control" id="event_ticket_discount" placeholder="Ticket Discount" required="true">
					</div>
				</div>
				

			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.js'></script>
	
	<script>

	
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,agenda'
			},
			defaultDate: "<?php date_default_timezone_set('UTC'); echo date('d/M/Y'); ?>",
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					// $('#ModalEdit #id').val(event.id);
					// $('#ModalEdit #title').val(event.title);
					// //$('#ModalEdit #color').val(event.color);
					// $('#ModalEdit').modal('show');
					var dataSet = 'id='+ event.id +'&title='+event.title;
					$.ajax({
						type: "POST",
						url: 'editEventTitle.php',
						data: dataSet,
						cache: false,
						success: function(result){
							if(result!="error"){
								$('#ModalEdit').html(result);
								$('#ModalEdit').modal('show');
							}else{
								alert("Error");
							}
							
							
						},
						error: function(jqXHR, errorThrown){
							console.log(errorThrown);
						}
					});
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
				<?php foreach($event as $events): 
				
					$start = explode(" ", $events['petition_date_start']);
					$end = explode(" ", $events['petition_date_end']);
					if($start[1] == '00:00:00'){
						$start = $start[0];
					}else{
						$start = $events['petition_date_start'];
					}
					if($end[1] == '00:00:00'){
						$end = $end[0];
					}else{
						$end = $events['petition_date_end'];
					}

					//echo $event['start'];
				?>
				{
					id: '<?php echo $events['petition_id']; ?>',
					title: '<?php echo $events['petition_name']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					
				},
				<?php endforeach; ?>		
			
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			

			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep != 'OK'){
						alert(rep);
					}
				}
			});
		}

		////////////////////////
		
	});



</script>

</body>

</html>
