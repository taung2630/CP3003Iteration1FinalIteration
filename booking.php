<?php    
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="Icon" href="images/favicon.ico" >
<link rel="stylesheet" href="images/main.css" type="text/css" />
<title>Booking</title>

</head>

<body>
<div id="wrap">
	<div id="header">				
		<h1 id="logo">Group<span class="green">4</span>Cinemas<span class="gray"></span></h1>	
		<h2 id="slogan">Best Cinemas in Singapore</h2> 
			<ul>
			<li><a href="index.php"><span>Home</span></a></li>
			<li><a href="movies.php"><span>Movies</span></a></li>
            <li id="current"><a href="booking.php"><span>Booking</span></a></li>
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
		<h2 align="center">Online Booking</h2>
       <?php
	   
	   $connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}

		$_SESSION['moviename'];
		$_SESSION['movietime']=$_REQUEST['time'];
		$_SESSION['CinemaNo'] =$_REQUEST['CinemaNo'];
		$_SESSION['moviedate'] = $_REQUEST['bday'];
		
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database cp2013.');	
		}
		$query1 = "SELECT SeatNo from ticketinfo WHERE Moviename ='".$_SESSION['moviename']."'";
		$query2 = "SELECT SeatNo from ticketinfo WHERE Dateoftickets ='".$_SESSION['moviedate']."'";
		$query3 = "SELECT SeatNo from ticketinfo WHERE Timeoftickets ='".$_SESSION['movietime']."'";
		$query4 = "SELECT SeatNo from ticketinfo WHERE CinemaNo ='".$_SESSION['CinemaNo']."'";
		$query5 = "SELECT * from ticketinfo WHERE CinemaNo ='".$_SESSION['CinemaNo']."' AND Timeoftickets ='".$_SESSION['movietime']."' AND  Dateoftickets ='".$_SESSION['moviedate']."' AND Moviename ='".$_SESSION['moviename']."'";
		
	
		$result1 = mysql_query($query5, $connection);
		
		$finaltakenseats="";
		while ($row = mysql_fetch_array($result1)){
		 $finaltakenseats =$finaltakenseats.$row['SeatNo'].",";
		}
		
		
		$finaltakenseatscomma = substr($finaltakenseats,0,-1);

	
	$finaltakenseatlist = explode(",",$finaltakenseatscomma);
	

	
		$username = $_SESSION["username"];
		$tickettable = '<table width="100%" border="1" style="table-layout:fixed" onclick="selectCell(event)">
		
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A1"></center>A1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A2"></center>A2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A3"></center>A3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A4"></center>A4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A5"></center>A5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A6"></center>A6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A7"></center>A7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A8"></center>A8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A9"></center>A9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A10"></center>A10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A11"></center>A11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A12"></center>A12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="A13"></center>A13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B1"></center>B1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B2"></center>B2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B3"></center>B3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B4"></center>B4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B5"></center>B5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B6"></center>B6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B7"></center>B7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B8"></center>B8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B9"></center>B9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B10"></center>B10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B11"></center>B11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B12"></center>B12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="B13"></center>B13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C1"></center>C1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C2"></center>C2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C3"></center>C3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C4"></center>C4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C5"></center>C5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C6"></center>C6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C7"></center>C7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C8"></center>C8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C9"></center>C9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C10"></center>C10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C11"></center>C11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C12"></center>C12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="C13"></center>C13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D1"></center>D1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D2"></center>D2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D3"></center>D3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D4"></center>D4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D5"></center>D5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D6"></center>D6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D7"></center>D7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D8"></center>D8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D9"></center>D9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D10"></center>D10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D11"></center>D11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D12"></center>D12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="D13"></center>D13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E1"></center>E1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E2"></center>E2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E3"></center>E3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E4"></center>E4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E5"></center>E5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E6"></center>E6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E7"></center>E7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E8"></center>E8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E9"></center>E9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E10"></center>E10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E11"></center>E11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E12"></center>E12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="E13"></center>E13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F1"></center>F1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F2"></center>F2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F3"></center>F3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F4"></center>F4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F5"></center>F5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F6"></center>F6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F7"></center>F7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F8"></center>F8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F9"></center>F9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F10"></center>F10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F11"></center>F11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F12"></center>F12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="F13"></center>F13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H1"></center>G1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H2"></center>G2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H3"></center>G3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H4"></center>G4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H5"></center>H5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H6"></center>H6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H7"></center>H7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H8"></center>H8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H9"></center>H9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H10"></center>H10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H11"></center>H11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H12"></center>H12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="H13"></center>H13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I1"></center>I1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I2"></center>I2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I3"></center>I3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I4"></center>I4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I5"></center>I5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I6"></center>I6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I7"></center>I7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I8"></center>I8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I9"></center>I9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I10"></center>I10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I11"></center>I11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I12"></center>I12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="I13"></center>I13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J1"></center>J1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J2"></center>J2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J3"></center>J3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J4"></center>J4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J5"></center>J5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J6"></center>J6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J7"></center>J7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J8"></center>J8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J9"></center>J9</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J10"></center>J10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J11"></center>J11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J12"></center>J12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="J13"></center>J13</th>
  </tr>
  <tr>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K1"></center>K1</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K2"></center>K2</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K3"></center>K3</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K4"></center>K4</th>
    <th scope="col" width="6.66%"></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K5"></center>K5</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K6"></center>K6</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K7"></center>K7</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K8"></center>K8</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K9"></center>K9</th>
    <th scope="col" width="6.66%"><center></th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K10"></center>K10</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K11"></center>K11</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K12"></center>K12</th>
    <th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="K13"></center>K13</th>
  </tr>
</table>';

foreach ($finaltakenseatlist as $finalseat){
					
						if (strpos($tickettable,'"'.$finalseat.'"') !== false) {
    $tickettable=str_replace('<th scope="col" width="6.66%"><center><input type="checkbox" name="ticket_list[]" value="'.$finalseat.'"></center>'.$finalseat.'</th>','<th scope="col" width="6.66%" bgcolor="#FF0000"><center><input type="checkbox" name="ticket_list[]" value="'.$finalseat.'" disabled = "disabled"></center>'.$finalseat.'</th>',$tickettable);}
	;
}
				
	
	if (!isset($_REQUEST['gotoBooking']) && $_SESSION['login']=="1"){
			echo '<center><h3>Please choose your movies in the movie page</h3></center>';
		}
		elseif ($_SESSION['login']=="1" || $_SESSION['login']=="2"){
       echo '
	<center><h3>Welcome to Group4Cinemas Online Booking system</h3>
	<center><h3>Movie: '.$_SESSION['moviename'].'</h3></center>
	<center><h3>Time: '.$_SESSION['movietime'].'</h3></center>
	<center><h3>Date: '.$_SESSION['moviedate'].'</h3></center>
	<center><h3>Cinema: '.$_SESSION['CinemaNo'].'</h3></center>
	<h3>Welcome '.$username.'</h3>
	<h3>Please choose your desired seats from the seating plan below</h3></center>
	
	   <form action="bookingadd.php" method="post" onsubmit="return validateForm()">	
	   <center><h2>Screen</h2></center>
        '.$tickettable.'
<br /><br />
<center><input name="submit" type="submit" value="Submit" ></center>
</form>';	
		}
		
		else	{
			echo '<center><h3>Please login or register to book online tickets </h3></center>';
	  }
	   mysql_close($connection);
             ?>	
        <p><center>Tickets are 13SGD per ticket and there is a $2 booking fee</center></p>
        <p><center>Seats highlighted in red are not available<br /><br />
        <a href="movies.php">Go back to movie page</a></center></p>
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
