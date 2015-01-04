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
	
	$connection = mysql_connect("localhost", "833614","Mynameist2142");
	if ( !$connection ) {
		die('Could not connect to localhost.');	
	}
	
	
	$db = mysql_select_db("833614", $connection);
	if ( !$db) {
		die ('Could not find database addressBook.');	
	}
		$query = "SELECT CinemaNo FROM ticketinfo WHERE Dateandtimeofbooking = '".$_REQUEST['delete']."'";
		$result1 = mysql_query($query, $connection);
		while ($row = mysql_fetch_assoc($result1)) {
    $_SESSION['CinemaNo']= $row["CinemaNo"];
}
		$query2 = "SELECT Email FROM ticketinfo WHERE Dateandtimeofbooking = '".$_REQUEST['delete']."'";
		$result2 = mysql_query($query2, $connection);
		while ($row = mysql_fetch_assoc($result2)) {
    $_SESSION['email']= $row["Email"];
}


	if ($_REQUEST['submit'] == 'Delete')
	{		
		
		$delete_query = "DELETE FROM ticketinfo WHERE Dateandtimeofbooking = '" . $_REQUEST['delete'] . "' AND Email = '".$_SESSION['email']."'";
		
		$result = mysql_query($delete_query, $connection);	
		if ($result == TRUE)
		{
			echo "<center><h3 style='color:blue;'>Record is deleted from database.</h3></center>";
			echo "<center><h2>You will automatically be redirected after 5 seconds</h2>
 		 <a href='adminUI.php'><button>Click here to return to userpage now</button></a></center>";
		 echo '<meta http-equiv="refresh" content="5;URL=adminUI.php" />';
		}
		else 
			{
				echo "<h3 style='color:red'>Fail to delete selected record from database.</h3>";	
				echo "<center><h2>You will automatically be redirected after 5 seconds</h2>
 		 <a href='adminUI.php'><button>Click here to return to userpage now</button></a></center>";
		 echo '<meta http-equiv="refresh" content="5;URL=adminUI.php" />';
			}
	}
	
	elseif ($_REQUEST['submit'] == 'Update'){
		echo "<center><h3>You have selected to change the booking of ".$_SESSION['email']." on ".$_REQUEST['delete']."</center></h3>";
		echo "<center><h3>Please choose another booking by clicking on the link below. You may change the cinema by selecting another cinema</center></h3>";
		echo "<br />";
		
	
		$delete_query = "DELETE FROM ticketinfo WHERE Dateandtimeofbooking = '" . $_REQUEST['delete'] . "' AND Email = '".$_SESSION['email']."'";
		
		$result = mysql_query($delete_query, $connection);	
		echo '<center><form action="movies.php">
    <input type="submit" value="Change booking">
</form></center>';
	}
            mysql_close($connection);
	
	
?>

 
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
