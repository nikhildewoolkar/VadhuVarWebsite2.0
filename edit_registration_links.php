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
    <title>वधु - वर सुचक : Edit Registration Links</title>
    <meta
      name="keywords"
      content="Vadhu Var Maratha Matrimony"
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
              ><img src="images/logo.png" alt=""
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
				<li class="active"><a href="edit_registration_links.php">Edit Registration</a></li>
				<li><a href="searchoption.php">Search Life Partner</a> </li>
				<li><a href="membership.html">Membership</a> </li>
				<li><a href="contactus.php">Contact Us</a> </li>
				<li><a href="help.html">Help</a> </li>
				<li><a href="logout.php">logout</a></li>			
                      
            </ul>			
          </nav>
        </div>
      </div>
    </header>    

    <section class="titleWrapper">
      <div class="container">
        <h1>Welcome <?php echo ($_SESSION['fname'] ."  " .$_SESSION['lname']); ?> : Edit Registration Links</h1>
      </div>
    </section>


	<!-- Form1 Start-->
    <section class="wrapper">
      <div class="staticContainer2 searchOption">
        <div class="clearfix">
		<h1><marquee>Edit Profile</marquee></h1>          	  
		  <!-- start Edit Registration Links section -->
    <section class="wrapper">
      <div class="container">
        <div class="palnWrapper clearfix">
          <div class="box">
			<!--
			<a href="edit_reg_basicinfo.php" target="_new"><h2>Basic Information</h2></a><hr>			
			<h2>Current/ Parmanent Address</h2><hr>-->
			<!--<h2>Mobile Number</h2><hr>-->
			<a href="edit_basic.php" target="_new"><h2>Basic Information</h2></a><hr>
			<a href="edit_address.php" target="_new"><h2>Current / Resendentiual Address</h2></a><hr>
            <a href="edit_reg_birth.php" target="_new"><h2>Socio Religious Attributes (Rashi & Birth Data)</h2></a><hr>
            <a href="edit_pattributes.php" target="_new"><h2>Physical Attributes</h2></a><hr>
			<a href="edit_expect.php" target="_new"><h2>Expectation from Life Partner</h2></a>
			<h2></h2>
            <div class="button">
              <a href="show_my_profile.php"><input type="button" value="View Profile" class="btn btnpink"/></a>
            </div>
          </div>		  
        </div>
      </div>
    </section>
		  <!-- End Edit Registration Links section -->		  
		  </div>
		  </div>
		  </section>
		  <!-- End of Form1 -->	
		  
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

    
	
    <!--<a href="#top" id="toTop"><i aria-hidden="true" class="glyphicon glyphicon-upload"></i></a>-->
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
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
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
