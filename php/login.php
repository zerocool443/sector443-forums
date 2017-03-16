<?php 

include("./creds.php");

$emaddr = $_POST['emaddr'];
$pswd = $_POST['pswd'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
	{
    die("Connection failed: " . $conn->connect_error);
	} 


$sql01 = "SELECT * from users where EmailAddess='$emaddr';";
$result01 = $conn->query($sql01);

if ($result01->num_rows > 0)
        {
        
			while($row = $result01->fetch_assoc())
            {
              if($row['Password']==$pswd)
              	echo "Correct password";
              else {
              	echo "Incorrect Password";
              	
              }
            }


        }
        
        else {

        }

$conn->close();



?>