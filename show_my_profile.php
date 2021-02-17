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
				<li><a href="edit_registration_links.php">Edit Registration</a></li>
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
          <h5><font color="white"><b>Mr.Jeetendra Raundale (B.E. Civil) Founder of Mee Maratha Group</b></font></h5>  
        <h1> Welcome <?php echo ($_SESSION['fname'] ."  " .$_SESSION['lname']); ?> : Profile</h1>
      </div>
    </section>


  <?php  	
    include 'mysqls/connect_db.php';  		
	$sql = "select * from register where username='".$_SESSION["username"]."'";// Email id can be same, but username must be unique    
    $result = $conn->query($sql);	
  ?>

  <!-- ======= Start of Profile Section ======= -->    
  <div class="container">    
    <h1 style="color:blue; text-align:center;">My Profile</h1>        
      
    <h1 style="color:blue; text-align:center;"><a href="https://chat.whatsapp.com/ErtdbEY0LpUEN0ETHsoKmW" style="color:#FF0000;" target="_blank">
		    मीमराठा ऑनलाइनवधुवरमेळावा - Whats Group link
		: https://chat.whatsapp.com/ErtdbEY0LpUEN0ETHsoKmW</a></h1> 
		
	<h1 style="color:blue; text-align:center;">ऑनलाइन  वधूवरमेळाव्यासाठी  पेमेन्ट  लिंक </h1>
	<h1 style="color:#FF0000; text-align:center;">Account Number:  5222000100118901</h1>
<h1 style="color:#FF0000; text-align:center;">IFSC Code: KARB0000522</h1>
<h1 style="color:#FF0000; text-align:center;">NAME: MEE MARATHA</h1>  
		
    <?php  
      if ($result->num_rows=== 1) {            
		$row = $result->fetch_assoc();          
		?>
		<hr>
		<div class="container">
			<div class="row" align="center">
			<a href="upphoto/upload_photo.php" target="_new"><button type="button" class="btn btn-success">Upload Profile Photo</button></a>
			<a href="upbiodata/upload_biodata.php" target="_new"><button type="button" class="btn btn-success">Upload Bio Data</button></a>			
			<a href="edit_registration_links.php" target="_new"><button type="button" class="btn btn-warning">Edit Profile</button></a>
			<a href="reset_pwd.php" target="_new"><button type="button" class="btn btn-warning">Change Password</button></a>
			<hr>
				<div class="form-group buttonWrapper" align="center">      
					<a href="searchoption.php"><button type="button" class="btn btn-primary loginbtn btn-lg">Search Life Partner (For Verified User)</button></a> 
				</div>       		
			</div>
		</div>
		<hr>
		<section class="wrapper search_result">
       <div class="container">
        <div class="row clearfix">
           <h5 class="Ourvarious"> <?php echo "<span>". $row["username"]. "</span>" ;  ?>  </h5>
           <marquee>
         <font color="#ff6600" size="4px">If You Wish Upload Your Profile Photo &/ or Bio Data to make easy searching.  </font>
      </marquee>
           
              <div class="col-lg-9 keepcenter">
                <ul class="result">
                    <li><?php echo "<h4>" . $row["fname"]. "  ".$row["mname"]. "  ".$row["lname"] . "</h4>";?>
					<div  class="clearfix">
						<div class="left col-lg-4">
				          <a href="" data-toggle="modal"  class="img"> <?php echo  "<img src='upphoto/upload_files/pic/". $row["photo"]. "' >"  ; ?></a>
						</div>          
                        <div class="right col-lg-8">
                            <div class="aboutSummary">
				                <div class="groupinfo clearfix">
					                <div class="group fullwidth">
						                <label>Gender </label><?php echo "<span>". $row["gender"]. "&nbsp;</span>" ;  ?> 
                                        <label>Birth Date </label><?php echo "<span>". $row["date1"] ."-". $row["month1"]."-". $row["year1"]. "&nbsp;</span>"; ?>
                                        <label>Marital Status</label><?php echo "<span>". $row["m_status"] . " ". $row["nc"] . " ". $row["clwm"]. "&nbsp;</span>"; ?>
                                        <label>Religion </label><?php echo "<span>". $row["religion"] ."&nbsp&nbsp&nbsp&nbsp". $row["caste"]."&nbsp&nbsp&nbsp&nbsp". $row["subcaste"]. "&nbsp;</span>"; ?>
										<label>Qualification </label><?php echo "<span>". $row["qualification"]. ", &nbsp;".$row["qstream"]." &nbsp;</span>"; ?> 
										<label>Occupation </label><?php echo "<span>". $row["occupation"]. ", &nbsp;".$row["income"]." &nbsp;</span>"; ?> 
										<label>Current Address </label><?php echo "<span>". $row["address"]. ", &nbsp;".$row["add_city"]." &nbsp;<br>".
										$row["txtadd_tal"]. ", &nbsp;".$row["add_district"]. ", &nbsp;".$row["add_state"]. ", &nbsp;".$row["add_country"]. ", &nbsp;</span>"; ?>
                                        <label>Mobile No. </label><?php echo "<span>". $row["mobile1"] . "&nbsp&nbsp&nbsp&nbsp Alternate No:". $row["mobile2"]. "&nbsp;</span>"; ?> 
                                        <label>Gothra </label><?php echo "<span>".  $row["gothra"] .", &nbsp&nbsp&nbsp&nbsp Rashi:   ". $row["moonsign"] . "&nbsp;</span>"; ?> 
                                        <label>Horos </label><?php echo "<span>". $row["horos"] . "&nbsp&nbsp&nbsp&nbsp Manglik: ". $row["manglik"] . "&nbsp;</span>"; ?> 
                                        <label>Birth Place </label><?php echo "<span>".  $row["birth_village"] .",&nbsp".$row["birth_city"] .",&nbsp".$row["birth_taluka"] .
										"&nbsp <br>". $row["birth_district"] .",&nbsp". $row["birth_state"] .",&nbsp". $row["birth_country"] . "</span>" ;  ?> 
                                        <label>Birth Time </label><?php echo "<span>". $row["birth_hour"] . "-". $row["birth_min"] ." ".$row["ampm"] . "</span>"; ?> 
					                    <label>Height </label><?php echo "<span>". $row["height_cm"] . " &nbsp cm,&nbsp&nbsp&nbspWeight: ". $row["weight_kg"]. "</span>"; ?> 
										<label>Blood Group </label><?php echo "<span>". $row["blood"] . "&nbsp;</span>"; ?> 
										<label>Complexion </label><?php echo "<span>". $row["complexion"]. "&nbsp;</span>"; ?> 
                                        <label>Physical Status </label><?php echo "<span>". $row["p_status"] . ", &nbsp;" . $row["physicalsts"] ."</span>"; ?> 
										<label>Body Type </label><?php echo "<span>". $row["body_type"] . "&nbsp;</span>"; ?>
										<label>Diet </label><?php echo "<span>". $row["diet"] . "&nbsp;</span>"; ?> 
                                        <label>Smoke </label><?php echo "<span>". $row["smoke"]. ", &nbsp&nbsp Drink:". $row["drink"]. "&nbsp;</span>"; ?>
										<label>Expectation </label><?php echo "<span>". $row["spouseQualification"] . ",&nbsp;". $row["spouseStream"] .",&nbsp;".$row["spouseOccupation"] . ",&nbsp". $row["spouseDiet"] .",&nbsp;".$row["spouseSalary"] . ",&nbsp;". $row["spouseAgeDiff"] .",&nbsp;".$row["spouseComplexion"] . ",&nbsp". $row["spouseBodyType"] .",&nbsp;".$row["spouseSmoking"] . ",&nbsp;".$row["spouseAlcohol"] . ",&nbsp;</span>"; ?> 
										<label>Other Expectation </label><?php echo "<span>". $row["txt_s_exp"] ."&nbsp; </span>"; ?> 
										<label>Created By </label><?php echo "<span>". $row["created_by"]. "&nbsp;</span>"; ?> 			                                         
						                <h5 align="center"><?php 
										//if($row["biodata"]<> "NULL" ){
											echo  "<a href='upbiodata/upload_files/biodata/". $row["biodata"]. "' target='_new' download>". "View Bio Data" . "</a> "; 
										//}
										?>
										</h5>                                            
                                    </div>
					            </div>
                            </div>
						</div> 
						<?php
						$dates2 = explode(' ', $row["last_update"]);
						$dat = $dates2[0]; ?>
						<h5><?php echo "<td>" . "Last Updated on " . $dat . "</td>";  ?>     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNote :- All information is entered by me & It is correct.</h5>
					</li>
					</ul>
				</div>
        </div>  
      </div>    
	  </div>
    </section>    
          
	  <hr>
	  <?php      
      //} //End of While loop
      ?>
    
    
  <?php
  }   
  else { header("Location: index.html"); exit(); } ?>
  </div> <!-- End of <div class="container">    -->
  <!-- ======= End of Profile Section ======= -->  
  
  
  <!-- ======= Start of Delete and Set MArried ======= --> 
		<hr>
		<div class="container">
			<div class="row" align="center">			
			
				<div class="form-group buttonWrapper" align="center">      
					<a href="setMarried.php"><button type="button" class="btn btn-primary loginbtn btn-lg">Thanks! I am Married</button></a> 
          <hr><a href="setDelete.php" target="_new"><button type="button" class="btn btn-danger">Sorry! Delete My Profile</button></a>      
          <hr><a href="testimonial.php" target="_new"><button type="button" class="btn btn-secondary">Give Feedback/Testimonial</button></a>      
				</div>       		
			</div>
		</div>
		<hr>
	<!-- ======= End of Delete and Set MArried ======= --> 
  
  
  <?php $conn->close();
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
