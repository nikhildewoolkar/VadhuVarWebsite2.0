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
    <title> वधु - वर सुचक -My Profile</title>
    <meta
      name="keywords"
      content="Maratha Vadhu Var, Maratha Matrimony"
    />
    <meta name="Description" content="" />
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
				<li  class="active"><a href="searchoption.php">Partner Search Options</a> </li>
				<li ><a href="membership.html">Membership</a> </li>
				<li ><a href="contactus.php">Contact Us</a> </li>
				<li ><a href="contactus.php">Help</a> </li>
				<li ><a href="logout.php">logout</a> </li>
			</ul>
          </nav>            
        </div>
      </div>
    </header>
	
	<section class="titleWrapper">
      <div class="container">
        <h1>My Profile</h1>
      </div>
    </section>


  <?php  	
    include 'mysqls/connect_db.php';  
		//$emailid = $_POST["txtusername"];
		//$sql = "select * from register where emailid='".$_POST["txtusername"]."'";
		$sql = "select * from register where emailid='".$_SESSION["username"]."'";
    
    
    $result = $conn->query($sql);
	
	
    //echo "Total Columns : ". $result->field_count. "<br>";

    /*Show Column Names:
    $sql2 = "SHOW COLUMNS FROM vacancy";
    $result2 = $conn->query($sql2); */
  ?>

  <!-- ======= Recruitment Section ======= -->    
  <div class="container">    
    <h1 style="color:blue; text-align:center;">My Profile</h1>    
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
      if ($result->num_rows=== 1) {    
        // output data of each row
        //$row_flag=2;
        //while($row = $result->fetch_assoc()) {
		$row = $result->fetch_assoc();
          
		?>
		<hr>
		<div class="container">
		<div class="row" align="center">
			<a href="up/upload_photo.php" target="_blank"><button type="button" class="btn btn-success">Upload Profile Photo</button></a>
			<a href="up/upload_biodata.php" target="_blank"><button type="button" class="btn btn-success">Upload Bio Data</button></a>
			<!--<a href="edit_registration.php" target="_new"><button type="button" class="btn btn-warning">Edit Profile</button></a>-->
      <a href="" target="_new"><button type="button" class="btn btn-warning">Edit Profile(Need Verfication)</button></a>
			<a href="reset_pwd.php" target="_new"><button type="button" class="btn btn-warning">Change Password</button></a>
			<hr>
      <div class="form-group buttonWrapper" align="center">
      <a href=""><button type="button" class="btn btn-primary loginbtn btn-lg">Search Life Partner(Need Verfication)</button></a> 
	  <!--<a href="searchoption.php"><button type="button" class="btn btn-primary loginbtn btn-lg">Search Life Partner</button></a> -->
        </div>       		
		</div>
		</div>
		<hr>
		<section class="wrapper search_result">
       <div class="container">
        <div class="row clearfix">
           <h5 class="Ourvarious"> Users   <?php echo "<span>". $row["id"]. "</span>" ;  ?>  </h5>
              <div class="col-lg-9 keepcenter">
                <ul class="result">
                    <li>
          <?php
            echo "<h4>" . $row["fname"]. "  ".$row["mname"]. "  ".$row["lname"] . "</h4>";
?>
            <div  class="clearfix">
			         <div class="left col-lg-4">
				          <a href="" data-toggle="modal"  class="img"> <?php echo  "<img src='up/upload_files/pic/". $row["photo"]. "' >"  ; ?>    </a>
               </div>
          
                                    <div class="right col-lg-8">
                                      <div class="aboutSummary">
				                               <div class="groupinfo clearfix">
					                                <div class="group fullwidth">
						                                <label> Gender </label>
						                                <?php echo "<span>". $row["gender"]. "&nbsp;</span>" ;  ?> 
                                            <label> Birth Date </label>
						                                <?php echo "<span>". $row["date1"] ."-". $row["month1"]."-". $row["year1"]. "&nbsp;</span>" ;  ?>
                                            <label> Marital Status</label>
						                                <?php echo "<span>". $row["m_status"] . " ". $row["nc"] . " ". $row["clwm"]. "&nbsp;</span>" ;  ?>
                                            <label> Religion </label>
						                                <?php echo "<span>". $row["religion"] ."&nbsp&nbsp&nbsp&nbsp". $row["caste"]."&nbsp&nbsp&nbsp&nbsp". $row["subcaste"]. "&nbsp;</span>" ;  ?>
                                            <label> Email Id </label>
						                                <?php echo "<span>". $row["emailid"]. "&nbsp;</span>" ;  ?> 
											<label> Created By </label>
														<?php echo "<span>". $row["created_by"]. "&nbsp;</span>" ;  ?> 
                                            <label> Mobile No. </label>
						                                <?php echo "<span>". $row["mobile1"] . "&nbsp&nbsp&nbsp&nbsp Alternate No:". $row["mobile2"]. "&nbsp;</span>" ;  ?> 
                                            <label> Gothra </label>
						                                <?php echo "<span>".  $row["gothra"] ."&nbsp&nbsp&nbsp&nbsp MoonSign:   ". $row["moonsign"] . "&nbsp;</span>" ;  ?> 
                                            <label> Horos </label>
						                                <?php echo "<span>". $row["horos"] . "&nbsp&nbsp&nbsp&nbsp Manglik: ". $row["manglik"] . "&nbsp;</span>" ;  ?> 
                                            <label> Birth Place </label>
						                                <?php echo "<span>".  $row["birth_village"] .",&nbsp".$row["birth_city"] .",&nbsp".$row["birth_taluka"] .",&nbsp". $row["birth_district"] .",&nbsp". $row["birth_state"] .",&nbsp". $row["birth_country"] . "</span>" ;  ?> 
                                            <label> Birth Time </label>
						                                <?php echo "<span>". $row["birth_hour"] . "-". $row["birth_min"] ." ".$row["ampm"] . "</span>" ;  ?> 
					                        <label> Height </label>
						                                <?php echo "<span>". $row["height_cm"] . " &nbsp cm,&nbsp&nbsp&nbspWeight: ". $row["weight_kg"]. "</span>" ;  ?> 
											<label> Blood Group </label>
						                                <?php echo "<span>". $row["blood"] . "&nbsp;</span>" ;  ?> 																                                
                                            <label> Complexion </label>
						                                <?php echo "<span>". $row["complexion"]. "&nbsp;</span>" ;  ?> 
                                            <label> Physical Status </label>
						                                <?php echo "<span>". $row["p_status"] . "&nbsp;</span>" ;  ?> 
														<!--
											<label> Other </label>
						                                <?php echo "<span>". $row["physicalsts"] . "&nbsp;</span>" ;  ?> 	
											<label> Body Type </label>
						                                <?php echo "<span>". $row["body_type"] . "&nbsp;</span>" ;  ?> 	
                                            <label> Qualification </label>
						                                <?php echo "<span>". $row["qualification"] . "&nbsp;</span>" ;  ?> 
                                            <label> Occupation </label>
						                                <?php echo "<span>". $row["occupation"] . "&nbsp;</span>" ;  ?> -->
                                            <label> Current Address </label>
						                                <?php echo "<span>".  $row["address"]. ",&nbsp" . $row["add_city"]. ",&nbsp".$row["txtadd_tal"]. ",&nbsp". $row["add_district"]. ",&nbsp". $row["add_state"]. ",&nbsp". $row["add_country"].  "</span>" ;  ?> 
                                            <label> Diet </label>
						                                <?php echo "<span>". $row["diet"] . "&nbsp;</span>" ;  ?> 
                                            <label> Smoke </label>
						                                <?php echo "<span>". $row["smoke"]. " &nbsp&nbsp Drink:". $row["drink"]. "&nbsp;</span>" ;  ?> 
                                            
						                                <h5 align="center"><?php echo  "<a href='up/upload_files/biodata/". $row["biodata"]. "' target='_new' download>". "View Bio Data" . "</a> "; ?> </h5>
                                            
                                          </div>
					                            </div>
                                    </div>
             </div> 
             <?php
                $dates2 = explode(' ', $row["last_update"]);
                $dat = $dates2[0];
              ?>
                  <h5><?php echo "<td>" . "Last Updated on " . $dat . "</td>";  ?>     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNote :- All information is entered by User by Own.</h5>
          </li>
          </ul>
          </div>
        </div>  
      </div>    
    </section>    
           <!-- End of <div class="row">    -->
		
          <?php /*
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
			*/
          ?>
        
    <!-- </div>   <!-- End of <div class="row">    -->      
                   
      
	  
	    
	  <hr>
	  <?php      
      //} //End of While loop
      ?>
    
  </div> <!-- End of <div class="container">    -->
  <?php
  }   
  else {
	//echo "No Match Found!";
	// Redirect a page
	//header("Location: searchoption.html");	
	header("Location: ../index.html");	
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
      Copyright &copy; 2020 Omist.in - All rights reserved.
    </div>
  </div>
</footer>

    <a href="javascript:void(0)" id="toTop" onclick="topFunction()"
      ><i aria-hidden="true" class="glyphicon glyphicon-upload"></i
    ></a>
    <!-- End Footer -->
    <script type="text/JavaScript">
      <!--
      function MM_openBrWindow(theURL,winName,features) { //v2.0
        window.open(theURL,winName,features);
      }
      //-->
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
      var gaJsHost =
        "https:" == document.location.protocol ? "https://ssl." : "http://www.";
      document.write(
        unescape(
          "%3Cscript src='" +
            gaJsHost +
            "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"
        )
      );
      window.onscroll = function() {
        scrollFunction();
      };

      function scrollFunction() {
        if (
          document.body.scrollTop > 20 ||
          document.documentElement.scrollTop > 20
        ) {
          document.getElementById("toTop").style.display = "block";
        } else {
          document.getElementById("toTop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0; // For Chrome, Safari and Opera
        document.documentElement.scrollTop = 0; // For IE and Firefox
      }
    </script>    
  </body>  
</html>
