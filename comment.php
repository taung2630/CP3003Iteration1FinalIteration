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
<title>Logout</title>

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
			die ('Could not find database.');	
		}
$query = "SELECT username from comments WHERE username ='".$_SESSION['username']."'";
$result = mysql_query($query, $connection);

if(mysql_num_rows($result) >= 1){
	if(isset($_POST['comment'])){
         $content = htmlentities(nl2br($_POST['comment']));
            $sql = "INSERT INTO comments VALUES ('".$_SESSION['username']."','".$_SESSION['email'].mysql_num_rows($result)."','".$content."','".$_REQUEST["servicerating"]."','".$_REQUEST["websiterating"]."')";
            mysql_query($sql, $connection);
			mysql_close($connection);
			
}
}
else {
	if(isset($_POST['comment'])){
         $content = htmlentities(nl2br($_POST['comment']));
            $sql = "INSERT INTO comments VALUES ('".$_SESSION['username']."','".$_SESSION['email']."','".$content."','".$_REQUEST["servicerating"]."','".$_REQUEST["websiterating"]."')";
            mysql_query($sql, $connection);
			mysql_close($connection);
			
}
}	
	echo "<p><h1>Thank you for your cooperation</p></h1>";
	?>
<center><h2>You will automatically be redirected after 3 seconds</h2>
<a href="feedback.php"><button>Click here to return to feedback page now</button></a></center>
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
