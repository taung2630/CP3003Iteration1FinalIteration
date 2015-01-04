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


	if ($_REQUEST['Updateuserinfo'] == 'Delete')
	{		
		
		$delete_query = "DELETE FROM userinfo WHERE Email = '" . $_REQUEST['update'] . "'";
		$delete_query1 = "DELETE FROM ticketinfo WHERE Email = '" . $_REQUEST['update'] . "'";
		$result = mysql_query($delete_query, $connection);	
		$result1 = mysql_query($delete_query1, $connection);	
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
	
	elseif ($_REQUEST['Updateuserinfo'] == 'Update'){
		$_SESSION['firstemail'] = $_REQUEST['update'];
		echo "<center><h3>You have selected to change information for ".$_REQUEST['update']." Please add the updated information for this user</center></h3>";
	$result = mysql_query('SELECT * FROM userinfo WHERE Email = "'.$_REQUEST['update'].'"', $connection);	
		
	
		while ($row = mysql_fetch_array($result)) {
		echo '<form action="adminUI.php" method="get">
    	<center><table width="350" border="0">
          <tr >
            <td>Username</td>
            <td><input type="text" name="username" width="200" value = '. $row['Username'] .'></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password" value = '. $row['Password'] .' width="200"/></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="email" name="email" width="200" value = '. $row['Email'] .' ></td>
          </tr>
          <tr>
            <td>Country</td>
            <td><input type="text" name="country" value = '. $row['country'] .' width="200" /></td>
          </tr>
          <tr>
            <td>Sex</td>
            <td><input type="text" name="sex" value = '. $row['sex'] .' width="200" /></td>
          </tr>
          <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" value = '. $row['fname'] .' width="200" /></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname" value = '. $row['lname'] .' width="200" /></td>
          </tr>
          <tr>
            <td>Telephone</td>
            <td><input type="number" name="telephone" value = '. $row['telephone'] .' width="200" /></td>
          </tr>
          
          <tr >
          	<td></td>
            <td align="center"><input type="submit" name="Submitadd" value="Add">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset"></td>
          </tr>
		</table></center>
    </form>';							
		}
		
		
		
		$delete_query = "DELETE FROM userinfo WHERE Email = '" . $_REQUEST['update'] . "'";
		
		$result = mysql_query($delete_query, $connection);	
		
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
