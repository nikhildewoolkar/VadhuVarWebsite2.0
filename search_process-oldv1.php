<!DOCTYPE html>
<html lang="en">
<head>
  <title>वधु - वर सुचक :  Search</title>
  <link rel="icon" type="image/png" href="img/fav-16.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!--<link rel="stylesheet" type="text/css" href="mystyle.css">-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--  <script src="myscripts.js"></script> -->
  <style>
    table, th, td {
      border: 1px black;
      align: center;
    }
    th, td {
      padding: 2px;
    }
    tr.line1{
      color:white; background-color: orange; font-size: 18px;
    }
	img{
		height:80px;
		width:80px;
	}
  </style>
</head>

<body>
  <?php  
    include 'mysqls/connect_db.php';  
		if(isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
		// Need Some work : if(isset($_POST['txtFName']=== "Name" and !(isset($_POST['txtGender'])) and !(isset($_POST['district'])) and $_POST['district']!="NULL8" and isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
		
      $sql = "select * from register where moonsign='".$_POST['txtMoon']."'";
	}
	
	else if(isset($_POST['txtFName']) and $_POST['txtFName']!= "Name" and isset($_POST['txtGender']) and isset($_POST['district']) and $_POST['district']!="NULL8" and isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where fname='".$_POST["txtFName"]."' and gender='".$_POST["txtGender"]."' and add_district='".$_POST["district"]."' and add_city='".$_POST["txtcity"]."' and qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if($_POST['txtFName']=== "Name" and isset($_POST['txtGender']) and isset($_POST['district']) and $_POST['district']!="NULL8" and isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where gender='".$_POST["txtGender"]."' and add_district='".$_POST["district"]."' and add_city='".$_POST["txtcity"]."' and qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if(isset($_POST['txtGender']) and isset($_POST['district']) and $_POST['district']!="NULL8" and isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where gender='".$_POST["txtGender"]."' and add_district='".$_POST["district"]."' and add_city='".$_POST["txtcity"]."' and qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if(isset($_POST['district']) and $_POST['district']!="NULL8" and isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where add_district='".$_POST["district"]."' and add_city='".$_POST["txtcity"]."' and qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}	
	else if(isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where add_city='".$_POST["txtcity"]."' and qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if($_POST['txtcity']==="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if(isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where qualification='".$_POST["qualification"]."' and occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if(isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
      $sql = "select * from register where occupation='".$_POST["occupation"]."' and moonsign='".$_POST["txtMoon"]."'";
	}
	else if(isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
    {
		// Need Some work : if(isset($_POST['txtFName']=== "Name" and !(isset($_POST['txtGender'])) and !(isset($_POST['district'])) and $_POST['district']!="NULL8" and isset($_POST['txtcity']) and $_POST['txtcity']!="City" and isset($_POST['qualification']) and $_POST['qualification']!="NULL8" and isset($_POST["occupation"]) and $_POST['occupation']!="NULL8" and isset($_POST['txtMoon']) and $_POST['txtMoon']!="NULL8")
		
      $sql = "select * from register where moonsign='".$_POST["txtMoon"]."'";
	}
	
	
	
       

    else
    {
		//echo "Click some search criteria";
		// Redirect browser 
		//header("Location: http://www.geeksforgeeks.org");
		//exit;
    }

	
    
    
    $result = $conn->query($sql);
	
	
    //echo "Total Columns : ". $result->field_count. "<br>";

    /*Show Column Names:
    $sql2 = "SHOW COLUMNS FROM vacancy";
    $result2 = $conn->query($sql2); */
  ?>

  <!-- ======= Recruitment Section ======= -->    
  <div class="container">    
    <h1 style="color:blue; text-align:center;">All Candidate Listing</h1>    
    <!--<div class="row">-->
    <?php
  
      /* To Show Columns from database        
        $column_names=array();
        $i=0;
        while($row2 = $result2->fetch_assoc()){
          array_push($column_names, $row2['Field']);    
          $i++;     
        }  
      */
  
      // The code where td for each column
      if ($result->num_rows > 0) {    
        // output data of each row
        $row_flag=2;
        while($row = $result->fetch_assoc()) {
          
		?>
		<div class="row">
          <?php
            //$i=2;
            echo "<table>";
            echo "<tr  class='line1'>";      
            //echo "<td>" . $column_names[$i] . "</td>";  //Show Column Name from DB
            echo "<td>" . "<img src='upload/pic/". $row["photo"]. "' >" . "</td>";
            echo "<td>". "<b>Name: " . $row["fname"]. " ".$row["mname"]. " ".$row["lname"] . "</b></td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "Gender: ". $row["gender"]  . "</td>"; 
            echo "<td>". "Birth Date: ". $row["date1"] ."-". $row["month1"]."-". $row["year1"]. "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "Marital Status:". $row["m_status"] . " ". $row["nc"] . " ". $row["clwm"]. "</td>";  
            echo "<td>". "Religion:". $row["religion"] . $row["caste"]. $row["subcaste"]. "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" .  "Created By: ". $row["created_by"]. "Email Id: " . $row["emailid"]. "</td>";  //Show Column Name
            echo "<td>". "Mobile No: ". $row["mobile1"] . "Alternate No:". $row["mobile2"]. "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "Gothra:" .  $row["gothra"] ." MoonSign:". $row["moonsign"] ."</td>";  
            //Show Column Name
            echo "<td>". "Horos: " . $row["horos"] . " Manglik:". $row["manglik"] ."</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "<b>Birth Place:</b> " .  $row["birth_village"] ."<br>".$row["birth_city"] ."<br>".$row["birth_taluka"] ."<br>". $row["birth_district"] ."<br>". $row["birth_state"] ."<br>". $row["birth_country"] ."</td>";  
            echo "<td>". "Birth Time: " . $row["birth_hour"] . "-". $row["birth_min"] ." ".$row["ampm"] ."</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "Height: " . $row["height_cm"] . " Weight: ". $row["weight_kg"]. "</td>";  
            //Show Column Name
            echo "<td>". "Blood Group: ". $row["blood"] . "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "Complexion: " . $row["complexion"]. "</td>";  //Show Column Name
            echo "<td>". "Physical Status: ". $row["p_status"] ." Other:".  $row["physicalsts"]. " Body Type: ". $row["body_type"]. "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "<b>Qualification: " . $row["qualification"] . "</b></td>";  //Show Column Name
            echo "<td>". "<b>Occupation: ". $row["occupation"] . "</b></td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>" . "<b>Current Address</b>" .  $row["address1"]. "<br><b>".$row["add_city"]. "</b><br>". $row["add_district"]. "<br>". $row["add_state"]. "<br>". $row["add_country"]. "</td>";  
			
            echo "<td>" . "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>". $row["diet"] . "</td>";
            echo "<td>" . "Smoke:" . $row["smoke"]. " Drink:". $row["drink"]. "</td>";  //Show Column Name
            
            //$i++;
            echo "</tr>";


            echo "<tr>";      
            echo "<td>" . "<a href='upload/biodata/". $row["biodata"]. "' target='_new'>". "View Bio Data" . "</a>". "</td>"; 
            $dates2 = explode(' ', $row["last_update"]);
            $dat = $dates2[0];

            echo "<td>" . "Last Updated on " . $dat . "</td>";      
            //$i++;
            echo "</tr>";

            echo "</table>";    
            echo "<br>";
          ?>
        
    </div>   <!-- End of <div class="row">    -->      
                   
      <?php      
      } //End of While loop
      ?>
    
  </div> <!-- End of <div class="container">    -->
  <?php
  }   
  else {
	//echo "No Match Found!";
	// Redirect a page
	header("Location: searchoption.php");	
	//exit();
  }

  $conn->close();
?>



<footer>
  <div class="container fttop">
    <div class="col col-lg-4 col-md-4 col-sm-4">
      <h2>About Us</h2>
      <ul>
        <li><a href="aboutus.html">About Vadhu Var Suchak &raquo;</a></li>
        <li><a href="contactus.php">Contact Us &raquo;</a></li>
      </ul>
    </div>
    <div class="col col-lg-4 col-md-4 col-sm-4">
      <h2>Information</h2>
      <ul>
        <li><a href="privacy.html">Privacy Policy &raquo;</a></li>
        <li><a href="help.html">Help &raquo;</a></li>
      </ul>
    </div>
    <div class="col col-lg-4 col-md-4 col-sm-4">
      <h2>Social Media</h2>
      <ul class="list-inline">
        <li><a href="#" class="fa fa-facebook"></a></li>
        <li><a href="#" class="fa fa-twitter"></a></li>
        <li><a href="#" class="fa fa-youtube"></a></li>
        <li><a href="#" class="fa fa-instagram"></a></li>
      </ul>
    </div>

  </div>
  <div class="ftbottom">
    <div class="container">
      Copyright &copy; 2020Omist.in - All rights reserved.
    </div>
  </div>
</footer>
</body>
</html>