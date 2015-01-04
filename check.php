<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Check</title>
</head>

<body>
<table border="1" cellpadding="10px" cellspacing="0">
    <tr>
    <th>Username</th>
    <th>Password</th>
    <th>Email Address</th>  
    <th>Country</th>
    <th>Email Address</th>
    <th>First Name</th>
    <th>Last Name</th>                  
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
			echo "<td>" . $row['Username'] . "</td>";
			echo "<td>" . $row['Password'] . "</td>";
			echo "<td>" . $row['Email'] . "</td>";	
			echo "<td>" . $row['country'] . "</td>";
			echo "<td>" . $row['sex'] . "</td>";
			echo "<td>" . $row['fname'] . "</td>";
			echo "<td>" . $row['lname'] . "</td>";			
			echo "</tr>";										
		}
		mysql_free_result($result);		
		
	
		mysql_close($connection);										
    ?>
    </table></p>
</body>
</html>
