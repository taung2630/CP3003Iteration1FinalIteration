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

 		session_destroy();
		echo "<p><h1>You have logged out</p></h1>";
		
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
