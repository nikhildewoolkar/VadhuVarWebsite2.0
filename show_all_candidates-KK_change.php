<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>वधु - वर सुचक : Membership</title>

    <meta name="robots" content="NOODP" />
    <meta name="theme-color" content="#e91e63" />
    <link href="fonts/opensans.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/form.css" rel="stylesheet" />
    <link href="css/profile.css" rel="stylesheet" />
    <link href="css/search_result.css" rel="stylesheet" />
    <link href="css/membership.css" rel="stylesheet" />
    <link href="css/static_content.css" rel="stylesheet" />
    <link href="css/gallery.css" rel="stylesheet" />
    <link href="css/mainstyle.css" rel="stylesheet" />
    <link href="css/media_query.css" rel="stylesheet" />    
  </head>
  <body>    
    <header>
      <div class="topbar">
        <div class="container">
          <marquee>
            <font color="#ff6600" size="4px">वधु - वर सुचक. नातं मराठी मनाचं..... आम्ही तुमच्या साठी उत्तम जोडीदार शोधायला मदत करू.      Email ID:  meemarathavadhuvar@gmail.com </font>
          </marquee>
        </div>
      </div>
      <div class="headerbar">
        <div class="container">
          <div class="logo">
            <a href=" " title="Vadhu Var Suchak"
              ><img src="images\logo.png" alt=""
            /></a>
          </div>
          <button class="toggleButton">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <nav>
            <ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="login.php" >Login</a></li>
				<li ><a href="registration.php">Register</a> </li>
				<li ><a href="login.php">Search Options</a> </li>
				<li class="active"><a href="membership.html">Membership</a> </li>
				<li ><a href="contactus.php">Contact Us</a> </li>
				<li ><a href="help.html">Help</a> </li>
				<li ><a href="logout.php">logout</a> </li>        
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <!--start_mainwrrapr-->
    <!--start title wrapper -->
    <section class="titleWrapper">
      <div class="container">
<h5><font color="white"><b>Mr.Jeetendra Raundale (B.E. Civil) Founder of Mee Maratha Group</b></font></h5> 
        <h1>All Candidate Listing</h1>
      </div>
    </section>
    <!--end title wrapper -->


  <?php  
    include 'mysqls/connect_db.php';  
    $sql = "select * from register";
      
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
            echo "<td>" . "<img src='upphoto/upload_files/pic/". $row["photo"]. "' >" . "</td>";
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
            echo "<td>" . "<b>Current Address</b>" .  $row["address"]. "<br><b>".$row["add_city"]. "</b><br>". $row["add_district"]. "<br>". $row["add_state"]. "<br>". $row["add_country"]. "</td>";  
			
            echo "<td>" . "</td>";
            //$i++;
            echo "</tr>";

            echo "<tr>";      
            echo "<td>". $row["diet"] . "</td>";
            echo "<td>" . "Smoke:" . $row["smoke"]. " Drink:". $row["drink"]. "</td>";  //Show Column Name
            
            //$i++;
            echo "</tr>";


            echo "<tr>";      
            echo "<td>" . "<a href='upbiodata/upload_files/biodata/". $row["biodata"]. "' target='_new' download>". "View Bio Data" . "</a>". "</td>"; 
            $dates2 = explode(' ', $row["last_update"]);
            $dat = $dates2[0];

            echo "<td>" . "Last Updated on " . $dat . "</td>";      
            //$i++;
            echo "</tr>";

            echo "</table>";    
            echo "<br>";
          ?>
		  <hr>
        
    </div>   <!-- End of <div class="row">    -->      
                   
      <?php      
      } //End of While loop
      ?>
    
  </div> <!-- End of <div class="container">    -->
  <?php
  }   
  else {
    echo "Sorry for Inconvenience. Technical Problem.";
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
        <li><a href="https://www.facebook.com/pg/meemaraths/groups/" class="fa fa-facebook"></a></li>
        <li><a href="https://t.me/joinchat/FYM2vkJx5eodAPn1tlnNbg" class="fa fa-tumblr"></a></li>
        
        <li><a href="https://www.youtube.com/channel/UCXPhhEm5dIk9cSu_b46pySQ" class="fa fa-youtube"></a></li>
        <li><a href="#" class="fa fa-instagram"></a></li>
      </ul>
    </div>
  </div>
 <p align="center" color="orange"> <b>Mr.Jeetendra Raundale (B.E. Civil)</b></p>
        <p align="center"> <b>Founder Mee Maratha Group</b></p>
  
  <div class="ftbottom">
    <div class="container">
      Copyright &copy; 2020Omist.in - All rights reserved.
    </div>
  </div>
</footer>

</body>
</html>