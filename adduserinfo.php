<?php 
	// upon user click submit button
	if ( isset($_REQUEST['Submit']) ) 
	{
		// step 1: connect to database server 
		$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		
	
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database cp2013.');	
		}

		
		$insert_query = "INSERT INTO userinfo (Username, Password, Email, country, sex, fname, lname, MovieTitle, CinemaNo, DateandTime, SeatNo, telephone) VALUES ('" . $_REQUEST['username'] ."','" . $_REQUEST['password'] ."','" . $_REQUEST['email']  ."','" . $_REQUEST['country'] ."','" . $_REQUEST['sex']  ."','" . $_REQUEST['fname']  ."','" . $_REQUEST['lname']  ."','" . $_REQUEST['mname']  ."','" . $_REQUEST['cinemano']  ."','" . $_REQUEST['dateandtime']  ."','" . $_REQUEST['seatno']  ."','" . $_REQUEST['telephone'] ."')";
		echo $insert_query;  
		
		$result = mysql_query($insert_query, $connection);	
		if ($result == TRUE)
			echo "<h3 style='color:blue;'>New record is added to database.</h3>";
		else 
			echo "<h3 style='color:red'>Fail to add new record  to database.</h3>";
		// run the query and process result
		$result = mysql_query($insert_query, $connection);	
		mysql_close($connection);		
	}
?>
