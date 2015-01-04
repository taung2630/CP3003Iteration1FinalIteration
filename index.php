<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="Icon" href="images/favicon.ico" >
<link rel="stylesheet" href="images/main.css" type="text/css" />
<title>Group 4 Cinema</title>
<script type="text/javascript">
	 var image1 = new Image()
    image1.src = "images/TheHobbit.jpg"
    var image2 = new Image()
    image2.src = "images/SeventhSon.jpg"
	var image3 = new Image()
	image3.src =  "images/NightAtTheMuseum3.jpg"
	var image4 = new Image()
	image4.src = "images/ExodusGodsAndKings.jpg"

</script>
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


        <br /><br />
      	<center><p><img src="images/TheHobbit.jpg" width="500" height="300" name="slide" /></p></center>
<script type="text/javascript">
        var step=1;
        function slideit()
        {
            document.images.slide.src = eval("image"+step+".src");
            if(step<4)
                step++;
            else
                step=1;
            setTimeout("slideit()",2500);
        }
        slideit();
</script>
		<h2 align="center">Introduction</h2>
        <center>
          <h3>Welcome to The Group 4 Cinemas</h3></center>
        <p>Group4Cinemas is a booking website which allows movie goers to easily book movie tickets for a group of cinemas. We allow movie goers to choose the cinemas which offer the most convinient showtimes and locations.</p><p> All the cinemas in our group are located popular locations all throughout Singapore. We offer the best movie viewing experience for our viewers. Our cinemas are occupied with state of the art sound systems and projectors for a immersive movie experience. </p>
     <p><a href="contact.php">Locations of our three cinemas</a></p>
        
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
