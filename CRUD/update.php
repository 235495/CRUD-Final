<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: Destiny2Clan.html');
        exit;   
    }
else
    {
        echo $studentID;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM info WHERE gamertag='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $Gamertag = $row[0];     
	    $Years = $row[1];
	    $MainClass = $row[2];
	    $MainSubclass = $row[3];
	    $Additional = $row[4];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['Gamertag'].".";
	                    echo "<TABLE><TR><TH>Gamertag</TH><TH>Years of Experience</TH><TH>Favorite Class</TH><TH>Favorite Subclass</TH><TH>Additional Information</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['Gamertag']. "</TD><TD>". $row['Years']. "</TD><TD>". $row['MainClass']. "</TD><TD>".$row['MainSubclass'] ."</TD><TD>". $row['Additional']. "</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = Gamertag value=".$row['Gamertag']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='Gamertag' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='MemberStatus'>";
                        echo "<option value="Status in Clan" >Status in Clan</option>";
                        echo "<option value="Member" >Member</option>";
                        echo "<option value="Admin" >Admin</option>";
                        echo "<option value="Co-Leader" >Co-Leader</option>";
                        echo "<option value="Leader" >Leader</option>";
                        echo "<option value="Founder" >Founder</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='Years'>";
                        echo "<option value="Clan Veterancy" >Clan Veterancy</option>";
                        echo "<option value="Less than a year" >Less than a year</option>";
                        echo "<option value="One year" >One year</option>";
                        echo "<option value="Two years" >Two years</option>";
                        echo "<option value="Three years" >Three years</option>";
                        echo "</select></TD>
                        echo "<TD><select id='select' name='MainClass'>";
                        echo "<option value="Favorite Class" >Favorite Class</option>";
                        echo "<option value="Titan" >Titan</option>";
                        echo "<option value="Hunter" >Hunter</option>";
                        echo "<option value="Warlock" >Warlock</option>";
                        echo "</select></TD>
                        echo "<TD><select id='select' name='MainSubclass'>";
                        echo "<option value="Favorite Subclass" >Favorite Sublass</option>";
                        echo "<option value="Arc" >Arc</option>";
                        echo "<option value="Solar" >Solar</option>";
                        echo "<option value="Void" >Void</option>";
                        echo "</select></TD>
                        echo "<TR><TD><input type='text' name = Additional value=".$row['Additional']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Additional Information' name='Additional' class='advancedSearchTextBox'></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>