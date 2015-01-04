<?php    
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="Icon" href="images/favicon.ico" >

<script type="text/javascript">

		</script>
<link rel="stylesheet" href="images/main.css" type="text/css" />
<title>Secure</title>

</head>

<body>
<div id="wrap">
	<div id="header">				
	  <h1 id="logo">Group<span class="green">4</span>Cinemas<span class="gray"></span></h1>	
		<h2 id="slogan">Best Cinemas in Singapore</h2> 
		
	</div>	
	<div id="content-wrap">		
	
		<div id="sidebar" >							
			<p></p>
		</div>
		<div id="main">	
		<?php  
		if ( isset($_POST['submit'])==true && isset($_POST['ticket_list'])==true) {  
	date_default_timezone_set('Asia/Singapore');
	$checked_count = count($_POST['ticket_list']);
	$ticketstring = "";
	$usertickets="";
	if ($checked_count!=0){
	foreach($_POST['ticket_list'] as $selected){
 	$ticketstring=$ticketstring.$selected;
	$usertickets=$usertickets.",".$selected;
	}
	$output = substr($usertickets,1);
	$date = date('Y-m-d H:i:s');
	$totalcost = $checked_count * 13 + 2;
	$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		
	
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database cp2013.');	
		}
		
		echo '<center><p><h3>You have selected to watch </h3><h1>'.$_SESSION['moviename'].'</h1><h3> on </h3><h1>'. $_SESSION['moviedate']." ".$_SESSION['movietime'] .'</h1><h3> at </h3><h1>'.$_SESSION['CinemaNo'].'</h1></p> <h3>Your tickets are</h3><h1>'.$output.'</h1><h3> Your final cost will be </h3><h1>$'.$totalcost.'</h1><h3> A receipt of your transaction will be sent to your email, any bookings that are cancelled will result in a $10 cancellation fee which will also be sent to your email </h3></center>';
		

	
	$insert_query = "INSERT INTO ticketinfo (Email, Dateoftickets, Timeoftickets, SeatNo, Moviename, Nooftickets, Dateandtimeofbooking, Totalcost, CinemaNo) VALUES ('" . $_SESSION['email'] ."','" . $_SESSION['moviedate'] ."','" . $_SESSION['movietime']  ."','" .$output."','" .$_SESSION['moviename']."','" .$checked_count."','" .$date."','" .$totalcost."','" .$_SESSION['CinemaNo']."')";
	mysql_query($insert_query, $connection);
		echo "<center><a href='index.php'><button>Click here to return to homepage now</button></a></center>";
		mysql_close($connection);
		}}
		
		else{
		echo "<h1>You have not selected any tickets</h1>
		<center><a href='movies.php'><button>Click here to return to booking page now</button></a></center>";
		}
		
?>


<br /><br />
 
		</div>	
		<div id="rightbar">
        
			
		</div>			
	</div>
<div id="footer">
	<div class="footer-left">
		<p class="align-left">			
		&copy; 2014 <strong>Group 4 Cinemas</strong> |
		Design by <strong>SP52 2014</strong>
		
		</p>		
	</div>
	
	<div class="footer-right">
		<p class="align-right">
		<a href="index.php">Home</a>&nbsp;|&nbsp;
  		<a href="contact.php">Contact</a>
   	
		</p>
	</div>
	</div>
</div>

</body>
</html>
