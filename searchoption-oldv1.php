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
    <title>वधु - वर सुचक : Search Life Partner</title>
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
				<li class="active"><a href="searchoption.php">Search Life Partner</a> </li>
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
        <h1>Search Option</h1>
      </div>
    </section>

    <section class="wrapper">
      <div class="staticContainer2 searchOption">
        <div class="clearfix">
		<h1><marquee>Wait Till 25th July 2020</marquee></h1>
          <!--search logic-->
		  <!--action="search_process.php"-->
          <form            
			action="#"
            method="post"
            name="form1"
            id="form1">
            <div class="container clearfix">
              <div class="registration">
                <h5 class="heading">Basic Search</h5>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>Search By Name</label>
                    <input id="txtFName" class="form-control" type="text" name="txtFName" maxlength="20" placeholder="Max 20 characters" value="Name" />
                  </div>
                  <div class="col-sm-6">
                    <label>Search By Gender</label>
                    <div class="clearfix">
                      <div class="radio radio-inline">
                        <input type="radio" value="Male" id="Male" name="txtGender" />
                        <label for="Male" class="malelable">Bride</label>
                      </div>
                      <div class="radio radio-inline">
                        <input type="radio" value="Female" id="Female" name="txtGender" />
                        <label for="Female" class="">Bridegroom</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 ">
                    <label>Search By District</label>
                    <div class="clearfix">
                    
                        <select id="district" class="form-control" name="district">
							<option value="NULL8" selected="selected">District Wise Search</option>                                                     
							<option value="">--Select Option--</option>
							<option value="Ahmednagar">Ahmednagar</option>
							<option value="Akola">Akola</option>
							<option value="Amravati">Amravati</option>
							<option value="Aurangabad">Aurangabad</option>
							<option value="Raigad">Raigad</option>
							<option value="Latur">Latur</option>
			<option value="2701">NANDURBAR</option>
			<option value="2702">DHULE</option>
			<option value="2703">JALGAON</option>
			<option value="2704">BULDANA</option>
			<option value="2705">AKOLA</option>
			<option value="2706">WASHIM</option>
			<option value="2707">AMRAVATI</option>
			<option value="2708">WARDHA</option>
			<option value="2709">NAGPUR</option>
			<option value="2710">BHANDARA</option>
			<option value="2711">GONDIYA</option>
			<option value="2712">GADCHIROLI</option>
			<option value="2713">CHANDRAPUR</option>
			<option value="2714">YAVATMAL</option>
			<option value="2715">NANDED</option>
			<option value="2716">HINGOLI</option>
			<option value="2717">PARBHANI</option>
			<option value="2718">JALNA</option>
			<option value="2719">AURANGABAD</option>
			<option value="2720">NASHIK</option>
			<option value="2721">THANE</option>
			<option value="2722">MUMBAI (BMC)</option>
			<option value="2723">MUMBAI (DYD)</option>
			<option value="2724">RAIGAD </option>
			<option value="2725">PUNE</option>
			<option value="2726">AHMADNAGAR</option>
			<option value="2727">BID</option>
			<option value="2728">LATUR</option>
			<option value="2729">OSMANABAD</option>
			<option value="2730">SOLAPUR</option>
			<option value="2731">SATARA</option>
			<option value="2732">RATNAGIRI</option>
			<option value="2733">SINDHUDURG</option>
			<option value="2734">KOLHAPUR</option>
			<option value="2735">SANGLI</option>
			<option value="2736">PALGHAR</option>      
							
							
                          
                        </select>
                    </div>
                  </div>
                        <div class="col-sm-6 ">
                          <label>Search By city</label>
                          <div class="clearfix">
                              <input id="txtcity" class="form-control" value="City" type="text" name="txtcity" maxlength="20" placeholder="Max 20 characters" />
                           </div>
                           </div>

                </div>
                <div class="form-group row">
                  <div class="col-sm-6 ">
                  <label>Search By Qualification</label>
                  <select name="qualification" class="form-control">
                    <option selected="" value="NULL8">- Select -</option>
                    <option value="PHD">PhD</option>
                    <option value="Post_Graduation">Post Graduation</option>
                    <option value="Graduation">Graduation</option>
                    <option value="Graduation_engg">Engg. Graduation</option>
                    <option value="Diploma">Diploma</option>
                    <option value="HSC">HSC(12th)</option>
                    <option value="SSC">SSC(10th)</option>
                  </select>
                  </div>
                  <div class="col-sm-6">
                    <label>Search By Occupation </label>
                    <select id="occupation" name="occupation" class="form-control">
                      <option selected="" value="NULL8">- Select -</option>
                      <option value="Service">Service</option>
                      <option value="Business">Business</option>
                      <option value="Service_&_Business">Service & Business</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>Search By Moonsign</label>
                  
                    <select id="txtMoon" class="form-control" name="txtMoon">
                      <option value="NULL8">Does not matter</option>
                      <option value="Mesh (Aries)">Mesh (Aries)</option>
                      <option value="Vrishabh (Taurus)">Vrishabh (Taurus)</option>
                      <option value="Mithun (Gemini)">Mithun (Gemini)</option>
                      <option value="Karka (Cancer)">Karka (Cancer)</option>
                      <option value="Simha (Leo)">Simha (Leo)</option>
                      <option value="Kanya (Virgo)">Kanya (Virgo)</option>
                      <option value="Tula (Libra)">Tula (Libra)</option>
                      <option value="Vrischika (Scorpio)">Vrischika (Scorpio)</option>
                      <option value="Dhanu (Sagittarious)">Dhanu (Sagittarious)</option>
                      <option value="Makar (Capricorn)">Makar (Capricorn)</option>
                      <option value="Kumbha (Aquarious)">Kumbha (Aquarious)</option>
                      <option value="Meen (Pisces)">Meen (Pisces)</option>
                    </select>
                  </div>
                </div>

                

                  <div class="form-group buttonWrapper">
                        <input type="submit" value="Search" class="btn btnpink loginbtn btn-lg" style="background : #ff6600">
                  </div>
                <!--</div>-->
              </div>
            </div>
          </form>
		  

          <!--end of search-->
        </div>
      </div>
    </section>

    
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
