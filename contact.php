<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="Icon" href="images/favicon.ico" >
<link rel="stylesheet" href="images/main.css" type="text/css" />
<title>Contact</title>

</head>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
      function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(1.336578, 103.811656),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
		
		var marker = new google.maps.Marker({		
			position : new google.maps.LatLng(1.29102,103.860217),
			map: map,
			title: 'Downtown Cinema'
		});
		var marker = new google.maps.Marker({		
			position : new google.maps.LatLng(1.333470, 103.740197),
			map: map,
			title: 'Jurong Cinema'
		});
		var marker = new google.maps.Marker({		
			position : new google.maps.LatLng(1.369280, 103.848133),
			map: map,
			title: 'AMK Cinema'
		});
		
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
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
            <li id="current"><a href="contact.php"><span>Contact</span></a></li>
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
		 <h1>Contact</h1>
         <center><h2>You can contact us at</h2></center>
        <div id="fiftyleft">
         <strong><p>Jurong Cinema</strong><br /><br />
Phone: 6684 2153<br /><br />
<a href="mailto:G4C@gmail.com?Subject=Need%20help" target="_top">
Email Us</a><br /><br />
2 Jurong East Central 1, Singapore 609731<br /><br />
</p></div>
         <div id="fiftyright">
          <p><strong>AMK Cinema</strong><br /><br />
Phone: 8568 0986<br /><br />
<a href="mailto:G4C@gmail.com?Subject=Need%20help" target="_top">
Email Us</a><br /><br />
53 Ang Mo Kio Avenue 3, Singapore 569933<br /><br />
</p></div>
<hr />
<center><p><strong>Downtown Cinema - Main Office</strong><br /><br />
Phone: 6338 0880<br /><br /> Fax: 6338 0889<br /><br />
<a href="mailto:G4C@gmail.com?Subject=Need%20help" target="_top">
Email Us</a><br /><br />
15 Mandarina Avenue, Marina Square, Singapore 039799<br /><br />
</p></center>
<div id="map_canvas"></div><br /><br />
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
