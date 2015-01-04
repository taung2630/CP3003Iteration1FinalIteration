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
		error_reporting(0);
$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		
	
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database.');	
		}
		$query = "SELECT Username from userinfo WHERE Username ='".$_REQUEST['username']."'";
		$query1 = "SELECT Password from userinfo WHERE Password ='".$_REQUEST['password']."'";
		$query2 = "SELECT Email from userinfo WHERE Username ='".$_REQUEST['username']."'";
		
$result = mysql_query($query, $connection);
$result1 = mysql_query($query1, $connection);
$result2 = mysql_query($query2, $connection);
	if(mysql_num_rows($result) == 1 && mysql_num_rows($result1) > 0 && $_REQUEST['username']=="admin"){
		
		$_SESSION['msg'] = "Welcome admin";
		$_SESSION['login']= "2";	
	}
	
	else if(mysql_num_rows($result) == 1 && mysql_num_rows($result1) > 0 )
	{	
		$_SESSION['username']=$_POST['username'];
		$_SESSION['msg'] = "You are now logged in!";
		$_SESSION['login']= "1";
		while ($row = mysql_fetch_assoc($result2)) {
      	$_SESSION['email']=$row['Email'];
		}		
		echo "<p><h1>Welcome ".$_POST['username']."</p></h1>";
		
	} 
	else if (mysql_num_rows($result) > 0)
	{	
		$_SESSION['msg'] = "Incorrect Password!";
		unset($_SESSION['username']);
		
	}
	else
	{	
		$_SESSION['msg'] = "Username and password not recognized";
		unset($_SESSION['username']);
		
	
	}

	echo "<p><h1>".$_SESSION['msg']."</p></h1>";
	
	
?>
<center><h2>You will automatically be redirected after 5 seconds</h2>
<a href="index.php"><button>Click here to return to homepage now</button></a></center>
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
<meta http-equiv="refresh" content="5;URL=index.php" />
</body>
</html>
