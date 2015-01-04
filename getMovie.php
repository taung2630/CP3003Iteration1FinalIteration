<?php    
session_start();
?>
<?php
$myText = (string)$_GET['q'];


		
$connection = mysql_connect("localhost","833614","Mynameist2142","");
		if ( !$connection ) {
			die('Could not connect to localhost.');	
		}
		$db = mysql_select_db("833614", $connection);
		if ( !$db) {
			die ('Could not find database addressBook.');	
		}
		


$result = mysql_query( "SELECT * FROM movie WHERE genre LIKE '%".$myText."%'",$connection);
$result2 =mysql_num_rows($result);


echo '<form action="movieinfo.php" method="post" name ="movie">';

for ($x = 1; $x<=$result2; $x++)
		{
		
		if ($x%2==1){
		echo "<div id='fiftyleft'>";
		$row = mysql_fetch_array($result); {
		$moviename = $row['movieName'];
		if (strlen($moviename) < strlen("The Hobbit: The Battle Of The Five Armies")){
			$moviename = $moviename."<br/>";
		}
			echo "<p><br />".$moviename."<br />
			 <br/>Runtime - ".$row['length']."Mins<br/>
			 <br/>Genre - ".$row['genre']."<br/>
			 <br/>Available Showtimes - ".$row['showtimes']."<br/>			 
			 <br/>Available Cinemas - <br/><br/>".$row['cinema']."<br/>	
			 <label>
  			 <input type='radio' name='moviename' value='".$row['movieName']."' />
  			 <br/>".$row['imgLink']."<br/>
			 </label>
	 		 <center><input name='Submitmovie' type='submit' value='Learn More' ></center>";		
			 echo "</div>";							
		};}
		else
		{
			
			echo "<div id='fiftyright'>";
			$row = mysql_fetch_array($result); {
			$moviename = $row['movieName'];
			if (strlen($moviename) < strlen("The Hobbit: The Battle Of The Five Armies")){
			$moviename = $moviename."<br/>";
		}
			echo "<p><br />".$moviename."<br />
			 <br/>Runtime - ".$row['length']."Mins<br/>
			 <br/>Genre - ".$row['genre']."<br/>
			 <br/>Available Showtimes - ".$row['showtimes']."<br/>			 
			 <br/>Available Cinemas - <br/><br/>".$row['cinema']."<br/>	
			 <label>
  			 <input type='radio' name='moviename' value='".$row['movieName']."' />
  			 <br/>".$row['imgLink']."<br/>
			 </label>
			 <center><input name='Submitmovie' type='submit' value='Learn More' ></center>";
			 echo "</div>";
			 								
		}}
		
		};
		
		
echo '</form>';
mysql_close($connection);
?>
