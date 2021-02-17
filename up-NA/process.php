<?php
$fname = $_POST["First_Name"];
$lname = $_POST["Last_Name"];
$cname = $_POST["CName"];
$phone = $_POST["Phone"];
$email = $_POST["Email_Id"];
$address = $_POST["address"];
$rwebsite = $_POST["RWebsite"];
$position = $_POST["Position"];
$salary = $_POST["Salary"];
$quali = $_POST["Qualification"];
$extra = $_POST["Extra"];
$file_paths = $_POST["upl"];

	include 'connect_db.php';

    $sql = "INSERT INTO vacancy (fname, lname, cname, phone, email, address, rwebsite, position, salary, quali, extra, file_paths)  VALUES ('$fname', '$lname', '$cname', '$phone', '$email', '$address', '$rwebsite', '$position', '$salary', '$quali', '$extra', '$file_paths')";
    
	if ($conn->query($sql) === TRUE) {  		
        echo "<p style='color:white; background-color: green; font-size:20px; text-align:center;'> Thank You ". $fname ;
        echo "<br>";
        echo "We will publish this recruitment very soon before 24 hours </p>";        
	} 
	else {	echo "Error: " . $sql . "<br>" . $conn->error;	}
	$conn->close();
?>