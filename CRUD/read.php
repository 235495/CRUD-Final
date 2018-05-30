<?php
//read.php
require_once 'login.php';
$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	
$sql = "SELECT * FROM info WHERE MemberStatus='" . $_POST['MemberStatus'] . "'";
$result = $conn->query($sql);

$Gamertag = $row[0];
$MemberStatus = $row[1];
$Years = $row[2];
$MainClass = $row[3];
$MainSubclass = $row[4];
$MainSubclass = $row[5];
$Additional = $row[6];
// HTML to display the form on this page.
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2>Here is the roster for "." ". $_POST["MemberStatus"]."</H2>");

if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	{	echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
		echo "<TABLE><TR><TH>Gamertag</TH><TH>Years</TH><TH>MainClass</TH><TH>MainSubclass</TH><TH>Additional</TH></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	while($row = $result->fetch_assoc())
		{
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			echo "<TD>".$row['Gamertag']. "</TD><TD>".$row['MemberStatus']. "</TD><TD>".$row['MainClass']. "</TD><TD>". $row['Years']. "</TD><TD>".$row['MainClass'] ."</TD><TD>".$row['MainSubclass']. "</TD><TD>".$row['Additional'] ."</TD>";
			echo "<TD><form action= 'update.php' method = 'post'>";
			echo "<button name = 'update'   type = 'submit' value =".$row['Gamertag'].">Edit</button></FORM>";
			echo "<TD><form action= 'delete.php' method = 'post'>";
			echo "<button name = 'delete'   type = 'submit' value =".$row['Gamertag'].">Delete</button></FORM>";
			echo "</TR>";
		}
	echo "</TABLE>";
	}
	else{
		echo "<br> 0 results";
		}
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
echo '</body>';
	
?>