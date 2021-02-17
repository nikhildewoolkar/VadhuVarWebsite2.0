<?php
	include 'connect_db.php';

	if(isset($_POST['approve'])){
        if(isset($_POST['check'])){
            foreach ($_POST['check'] as $value){
                $sql = "UPDATE vacancy SET status = '1' WHERE vid = $value"; 
                $result = $conn->query($sql);    
            }
        echo "<h1 style='background-color:green; color:white;'>The selected recruitment advertised are approved </p>";
        }        
        else{
        	echo "<h1 style='background-color:red; color:white;'> Please Select check box to approve the recruitment advertisment</h1>";
    	}
    }
?>