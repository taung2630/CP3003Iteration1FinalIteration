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
	<center><h1>Welcome Admin</h1></center>
		<form action="updateinfo.php" method="POST">
	
		<table border="1" width="100%">
    <tr>
    <th>Select entry to modify</th>
    <th>Username</th>
    <th>Password</th>
    <th>Email Address</th>  
    <th>Country</th>
    <th>Sex</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Telephone</th>                              
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

		$result = mysql_query('SELECT * FROM userinfo', $connection);	
		
	
		while ($row = mysql_fetch_array($result)) {
			echo "<tr>";
			echo "<td height='100px'><input name='update' type='radio' value='" .$row['Email']. "' /></td>";
			echo "<td>" . $row['Username'] . "</td>";
			echo "<td>" . $row['Password'] . "</td>";
			echo "<td>" . $row['Email'] . "</td>";	
			echo "<td>" . $row['country'] . "</td>";
			echo "<td>" . $row['sex'] . "</td>";
			echo "<td>" . $row['fname'] . "</td>";
			echo "<td>" . $row['lname'] . "</td>";	
            echo "<td>" . $row['telephone'] . "</td>";		
			echo "</tr>";											
		}
		mysql_free_result($result);		
		
	
		mysql_close($connection);										
    ?>
    
    </table></p>
    <p align='center'><input type="submit" name="Updateuserinfo" value="Update" />
    	<input type="submit" name="Updateuserinfo" value="Delete" /> </p>
    </form>
<p>
    <!-- upon the page launch, retrieve all records from table colleague and display -->
    <center><h1>Select a booking to modify </h1>  
    <form action="adminUI.php" method="POST">
        <input type="submit" name="submit1" value="Sort by movie" />
        <input type="submit" name="submit1" value="Sort by booking date" />
        <input type="submit" name="submit1" value="Sort by cost" />
        <input type="submit" name="submit1" value="Sort by cinema" />
        <input type="submit" name="submit1" value="Sort by email" />
        </form></center>  
	<form action="adminchangebooking.php" method="POST">  
    	 
        <table border="1" cellspacing="0" width="100%" style="table-layout:auto">
        <tr>
        <th>Select booking to change</th>
        <th>Email</th>
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
		$result = mysql_query("SELECT * FROM ticketinfo ORDER BY Moviename", $connection);}
		elseif($_REQUEST['submit1']== "Sort by booking date"){
		$result = mysql_query("SELECT * FROM ticketinfo ORDER BY Dateandtimeofbooking", $connection);
		}
		elseif($_REQUEST['submit1']== "Sort by cost"){
		$result = mysql_query("SELECT * FROM ticketinfo ORDER BY Totalcost", $connection);
		}
		elseif($_REQUEST['submit1']== "Sort by cinema"){
		$result = mysql_query("SELECT * FROM ticketinfo ORDER BY CinemaNo", $connection);
		}
		elseif($_REQUEST['submit1']== "Sort by Email"){
		$result = mysql_query("SELECT * FROM ticketinfo ORDER BY Email", $connection);
		}
		else
   
            $result = mysql_query("SELECT * FROM ticketinfo  ORDER BY Dateandtimeofbooking", $connection);	
      
            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td height='100px'><input name='delete' type='radio' value='" .$row['Dateandtimeofbooking']. "' /></td>";
				echo "<td height='100px'>" . $row['Email'] . "</td>";
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
    
<h1>Add info</h1>
    <form action="adminUI.php" method="get">
    	<center><table width="350" border="0">
          <tr >
            <td>Username</td>
            <td><input type="text" name="username" width="200"/></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password" width="200"/></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="email" name="email" width="200"/></td>
          </tr>
          <tr>
            <td>Country</td>
            <td><input type="text" name="country" width="200" /></td>
          </tr>
          <tr>
            <td>Sex</td>
            <td><input type="text" name="sex" width="200" /></td>
          </tr>
          <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" width="200" /></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname" width="200" /></td>
          </tr>
          <tr>
            <td>Telephone</td>
            <td><input type="number" name="telephone" width="200" /></td>
          </tr>
          
          <tr >
          	<td></td>
            <td align="center"><input type="submit" name="Submitadd" value="Add">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset"></td>
          </tr>
		</table></center>
    </form>
    
    

<?php

	$connection = mysql_connect("localhost","833614","Mynameist2142","");
	if ( !$connection ) {
		die('Could not connect to localhost.');	
	}
	

	$db = mysql_select_db("833614", $connection);
	if ( !$db) {
		die ('Could not find database addressBook.');	
	}


	if ($_REQUEST['Submitadd'] == "Add") 
	{
	$url =  $_SERVER['REQUEST_URI'];
	$suburl = substr ($url,6);
	
			$modify_query = "UPDATE ticketinfo SET Email='".$_REQUEST['email']."' WHERE Email='".$_SESSION['firstemail']."'";	
	$result1 = mysql_query($modify_query, $connection);	

		
	
		$insert_query = "INSERT INTO userinfo (Username, Password, Email, country, sex, fname, lname, telephone) VALUES ('" . $_REQUEST['username'] ."','" . $_REQUEST['password'] ."','" . $_REQUEST['email']  ."','" . $_REQUEST['country'] ."','" . $_REQUEST['sex']  ."','" . $_REQUEST['fname']  ."','" . $_REQUEST['lname'] ."','" . $_REQUEST['telephone'] ."')";
		
		$result = mysql_query($insert_query, $connection);	
		
		$result = mysql_query($insert_query, $connection);	
		mysql_close($connection);	
	
	}
?>

    <center><a href="index.php">Homepage</a></center>
<br /><br />
 
		
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
