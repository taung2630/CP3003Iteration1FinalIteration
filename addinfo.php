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
		$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database addressBook.');	
		}
	$query = "SELECT Username from userinfo WHERE Username ='".$_REQUEST['Username']."'";
	$query2 = "SELECT Email from userinfo WHERE Email ='".$_REQUEST['eAddress']."'";
	$result = mysql_query($query, $connection);
	$result2 = mysql_query($query2, $connection);
	
	 if(mysql_num_rows($result) == 1 & mysql_num_rows($result2) == 1 ){
		 $_SESSION['msg']="Error! Both username and email already registered";
		 echo '<meta http-equiv="refresh" content="5;URL=register.php" />';
		 echo "<p><h1>".$_SESSION['msg']."</p></h1>";
		 echo '<center><h2>You will automatically be redirected after 5 seconds</h2>
		<a href="register.php"><button>Click here to return to register now</button></a></center>';
		 
	 }
	 else if(mysql_num_rows($result) == 1){
		 $_SESSION['msg']="Error! Username already registered";
		 echo '<meta http-equiv="refresh" content="5;URL=register.php" />';
		 echo "<p><h1>".$_SESSION['msg']."</p></h1>";
		 echo '<center><h2>You will automatically be redirected after 5 seconds</h2>
		<a href="register.php"><button>Click here to return to register now</button></a></center>';
		 
	 }else if(mysql_num_rows($result2) == 1 ){
		 $_SESSION['msg']="Error! Email already registered";
		 echo '<meta http-equiv="refresh" content="5;URL=register.php" 	 			 		/>';
		 echo "<p><h1>".$_SESSION['msg']."</p></h1>";
		 echo '<center><h2>You will automatically be redirected after 5 seconds</h2>
 		<a href="register.php"><button>Click here to return to register now</button></a></center>';
	 }
	 else{
	$query3 = "INSERT INTO userinfo (Username, Password, Email, country, sex, fname, lname, telephone) VALUE('".$_REQUEST['Username']."','".$_REQUEST['Password']."','".$_REQUEST['eAddress']."','".$_REQUEST['countries']."','".$_REQUEST['sex']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['phnum']."')";
	$result3 = mysql_query($query3,$connection);
	 $_SESSION['msg']="Register Successful";
	 echo '<meta http-equiv="refresh" content="5;URL=index.php" />';
	 echo "<p><h1>".$_SESSION['msg']."</p></h1>";
	echo '<center><h2>You will automatically be redirected after 5  seconds</h2>
 	<a href="index.php"><button>Click here to return to homepage now </button></a></center>';
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
<meta http-equiv="refresh" content="5;URL=index.php" />
</body>
</html>
