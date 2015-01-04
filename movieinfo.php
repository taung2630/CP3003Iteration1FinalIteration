<?php    
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="Icon" href="images/favicon.ico" >
<link rel="stylesheet" href="images/main.css" type="text/css" />
<title>Group 4 Cinema</title>

</head>

<body>

<div id="wrap">
	<div id="header">				
		<h1 id="logo">Group<span class="green">4</span>Cinemas<span class="gray"></span></h1>	
		<h2 id="slogan">Best Cinemas in Singapore</h2> 
		<ul>
			<li id="current"><a href="index.php"><span>Home</span></a></li>
			<li><a href="movies.php"><span>Movies</span></a></li>
            <li><a href="booking.php"><span>Booking</span></a></li>
            <li><a href="about.php"><span>About</span></a></li>
            <li><a href="feedback.php"><span>Feedback</span></a></li>
            <li><a href="contact.php"><span>Contact</span></a></li>
		</ul>	
	</div>	
	<div id="content-wrap">		
    	
	
		<div id="sidebar" >							
			<h1>Useful links</h1>
            <p align="center"><a href="http://www.imdb.com" target="_blank">IMDB</a></p>
            <p align="center"><a href="https://www.yahoo.com/movies" target="_blank">Yahoo Movies</a></p>
            <p align="center"><a href="http://www.youtube.com/user/movieclipsTRAILERS/videos" target="_blank">Youtube Movies Trailers</a></p>
           	
		</div>
		<div id="main">	
<form action="booking.php" method="post" name ="movie">
 <?php
 	   $_SESSION['moviename']=$_REQUEST['moviename'];
	   date_default_timezone_set('Asia/Singapore');
		$presentdate = date('Y-m-d');
	   $connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database addressBook.');	
		}
		$result = mysql_query( "SELECT * FROM movie WHERE movieName = '".$_SESSION['moviename']."'",$connection);
		
		while ($row = mysql_fetch_array($result)){

		
		echo "<center><h3>Movie: ".$_SESSION['moviename']."</h3>
		<br/>".$row['imgLink']."<br/>
		<p>".$row['movieInfo']."</p>
			  <p>".$row['rating']."</p>
			  <p>".$row['movieTrailer']."</p>
			  <br/>".$row['showtimes']."<br/>			 
			 <br/>".$row['cinema']." - Cinema<br/><br/>";
		
		echo "Choose your date: <input type='date' name='bday' value ='".$presentdate."' min = '".$presentdate."'></center><br />";
		}
		?>
        <center><input name="gotoBooking" type="submit" value="Continue to booking" ><br/><br/>

        <a href="movies.php">Go back to movie page</a></center></form>
        
        
        
		</div>	
		<div id="rightbar">
        
		<?php 
		include('login.php');
		 ?>  
			<h1>About Group4Cinemas</h1>
			<p>Group4Cinemas offers the best cinemas in Singapore,which show all the latest movies, serve the best food and offer the best viewing experiences, come down and watch movies now or book tickets online!</p>
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
