<?php    
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="Icon" href="images/favicon.ico" >
<link rel="stylesheet" href="images/main.css" type="text/css" />
<title>User Account</title>

</head>

<body>
<div id="wrap">
	<div id="header">				
		<h1 id="logo">Group<span class="green">4</span>Cinemas<span class="gray"></span></h1>	
		<h2 id="slogan">Best Cinemas in Singapore</h2> 
		<ul>
			<li><a href="index.php"><span>Home</span></a></li>
			<li><a href="movies.php"><span>Movies</span></a></li>
            <li><a href="booking.php"><span>Booking</span></a></li>
            <li><a href="about.php"><span>About</span></a></li>
            <li><a href="feedback.php"><span>Feedback</span></a></li>
            <li><a href="contact.php"><span>Contact</span></a></li>
		</ul>	
	</div>	
	<div id="content-wrap">		
		<center><h2>You can change your previous bookings here</h2>
        <form action="usersecure.php" method="POST">
        <input type="submit" name="submit1" value="Sort by movie" />
        <input type="submit" name="submit1" value="Sort by booking date" />
        <input type="submit" name="submit1" value="Sort by cost" />
        <input type="submit" name="submit1" value="Sort by cinema" />
        </form>
    <form action="deleteuserbooking.php" method="POST">  
        <table border="1" cellspacing="0" width="100%" style="table-layout:auto">
        <tr>
        <th>Select booking to change</th>
        <th>Date of movie</th>
        <th>Time of movie</th>
        <th>Seat No.</th>
        <th>Movie Name</th>
        <th>No. of tickets</th>
        <th>Time of booking</th>
        <th>Total Cost</th>
        <th>Cinema Name</th>             
        </tr>
        <?php
		$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		
		
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database.');	
		}
		if ($_REQUEST['submit1']== "Sort by movie"){
		$result = mysql_query("SELECT * FROM ticketinfo WHERE  Email ='".$_SESSION['email']."' ORDER BY Moviename", $connection);}
		elseif($_REQUEST['submit1']== "Sort by booking date"){
		$result = mysql_query("SELECT * FROM ticketinfo WHERE  Email ='".$_SESSION['email']."' ORDER BY Dateandtimeofbooking", $connection);
		}
		elseif($_REQUEST['submit1']== "Sort by cost"){
		$result = mysql_query("SELECT * FROM ticketinfo WHERE  Email ='".$_SESSION['email']."' ORDER BY Totalcost", $connection);
		}
		elseif($_REQUEST['submit1']== "Sort by cinema"){
		$result = mysql_query("SELECT * FROM ticketinfo WHERE  Email ='".$_SESSION['email']."' ORDER BY CinemaNo", $connection);
		}
		else
   
            $result = mysql_query("SELECT * FROM ticketinfo WHERE  Email ='".$_SESSION['email']."' ORDER BY Dateandtimeofbooking", $connection);	
      
            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td height='100px'><input name='delete' type='radio' value='" .$row['Dateandtimeofbooking']. "' /></td>";
                echo "<td height='100px'>" . $row['Dateoftickets'] . "</td>";
                echo "<td height='100px'>" . $row['Timeoftickets'] . "</td>";
                echo "<td height='100px'>" . $row['SeatNo'] . "</td>";
				echo "<td height='100px'>" . $row['Moviename'] . "</td>";		
				echo "<td height='100px'>" . $row['Nooftickets'] . "</td>";		
				echo "<td height='100px'>" . $row['Dateandtimeofbooking'] . "</td>";		
				echo "<td height='100px'>" ."$". $row['Totalcost'] . "</td>";
				echo "<td height='100px'>" . $row['CinemaNo'] . "</td>";					
                echo "</tr>";										
            }

            mysql_free_result($result);
            mysql_close($connection);										
        ?>
        </table>
		<p align='center'><input type="submit" name="submit" value="Update" />
    	<input type="submit" name="submit" value="Delete" /> </p>
    </form>
    </center>

<br /><br />
		<div id="sidebar" >							
			<h1>About us</h1>
			<h1>Useful links</h1>
            <p align="center"><a href="http://www.imdb.com" target="_blank">IMDB</a></p>
            <p align="center"><a href="https://www.yahoo.com/movies" target="_blank">Yahoo Movies</a></p>
            <p align="center"><a href="http://www.youtube.com/user/movieclipsTRAILERS/videos" target="_blank">Youtube Movies Trailers</a></p>
           	
		</div>
		<div id="main">	
        
		<?php
		
		$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		
		
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database.');	
		}

		$result = mysql_query("SELECT * from userinfo WHERE Email ='".$_SESSION['email']."'", $connection);	
		
			echo "<h1>User information</h1>";
		while ($row = mysql_fetch_array($result)) {
			
			echo "<center><h3>Username: ".$row['Username'] . "</center></h3><br /><br />";
			echo "<center><h3>Email Address: ".$row['Email'] . "</center></h3><br /><br />";	
			echo "<center><h3>Country of origin: ".$row['country'] . "</center></h3><br /><br />";
			echo "<center><h3>Sex: ".$row['sex'] . "</center></h3><br /><br />";
			echo "<center><h3>First Name: ".$row['fname'] . "</center></h3><br /><br />";
			echo "<center><h3>Last Name: ".$row['lname'] . "</center></h3><br /><br />";	
			echo "<center><h3>Contact Number: ".$row['telephone'] . "</center></h3><br /><br />";	
									
		}
		
		mysql_free_result($result); 		
		
		$result1 = mysql_query("SELECT username from comments WHERE username ='".$_SESSION['username']."'", $connection);
		$numrow = mysql_num_rows($result1);
		echo "<center><h3>No. of comments given: ".$numrow."</center></h3><br /><br />";
		
		mysql_close($connection);										
    ?>
    
		</div>	
		<div id="rightbar">
        
		<?php 
		include('login.php');
		 ?>  
			<h1>About Group4Cinemas</h1>
			<p>Group4Cinemas offers the best cinemas in Singapore,which show all the latest movies, serve the best food and offer the best viewing experiences, come down and watch movies now or book tickets online!</p></div>
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
