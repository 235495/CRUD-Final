<?php
//process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {//Check it is coming from a form
    
		//mysql credentials
    $mysql_host = "localhost";
    $mysql_username = "shs235495";
    $mysql_password = "shakopeesabers1";
    $mysql_database = "Destiny2Clan";
	
	//delcare PHP variables
	
	$Gamertag = $_POST["Gamertag"];
	$MemberStatus = $_POST["MemberStatus"];
	$Years = $_POST["Years"];
	$MainClass = $_POST["MainClass"];
	$MainSubclass = $_POST["MainSubclass"];
	$Additional = $_POST["Additional"];
	
	
	
	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
	
		$statement = $mysqli->prepare("INSERT INTO info (Gamertag, MemberStatus, Years, Mainclass, MainSubclass, Additional) VALUES(?, ?, ?, ?, ?, ?)"); //prepare sql insert query
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ssssss', $Gamertag, $MemberStatus, $Years, $MainClass, $MainSubclass, $Additional); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br("Hello "." ". $Gamertag . "! We appreciate that you joined our clan and have became a ". $MemberStatus . ". Thanks for being here for ". $Years ." year(s).", false);
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
         }
else{
    echo ("error");
    }         
?>