<?php 

include("./creds.php");

$fn = $_POST['fn'];
$ln = $_POST['ln'];
$ea = $_POST['ea'];
$p = $_POST['p'];



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
	{
    die("Connection failed: " . $conn->connect_error);
	} 


$sql01 = "SELECT * from users where EmailAddess='$ea';";
$result01 = $conn->query($sql01);

if ($result01->num_rows > 0)
        {
        	echo"User Already exists Please try another one ";
        }
        else {

        	$sql02 = "INSERT INTO `users`(`FIrstName`, `LastName`, `Username`, `Password`, `EmailAddess`) VALUES ('$fn','$ln','$ea','$p','$ea')";
			
            if ($conn->query($sql02) === TRUE) {
                echo "Successfully Registered";
                
            }
            else
            {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }


       }	

$conn->close();

?>