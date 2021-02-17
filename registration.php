<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$emailid = $_POST["EMAILconfirm"];//New
	
	include 'mysqls/connect_db.php';
	$sql="select emailid from register where emailid='$emailid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {            		
		//echo "Username already exists";
		echo "<br><br>";
		echo "<p style='background-color:red; color:white; font-size:30px; '> Email ID is already taken by another Vadhu/ Var. Try some other Valid Email ID!</p>";
		echo "<br><br>";	
	}
	else { 
		// Email id is available, so start a new session
        session_start();                            
        // Store data in session variables
		$_SESSION["newregistration"] = true;
        $_SESSION["newemail"] = $emailid;
		
		// Redirect user to registration_full.php page
        //header("location: registration_full.php");
		?><script>
			if(confirm("Yes! Email ID is Available"))
			{ 				
				
				document.location = "registration_full.php";
			}
			</script><?php
	}
	$conn->close(); 
}
?>


<!-- HTML Logic-->
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>वधु - वर सुचक : New Registration</title>
<meta name="robots" content="NOODP">
<meta name="theme-color" content="#e91e63" />
<link href='fonts/opensans.css' rel='stylesheet' type='text/css'>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/common.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">
<link href="css/search_result.css" rel="stylesheet">
<link href="css/membership.css" rel="stylesheet">
<link href="css/static_content.css" rel="stylesheet">
<link href="css/gallery.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
<link href="css/media_query.css" rel="stylesheet">

<script type="text/javascript" src="myjs/jquery-latest.js"></script>
<script type="text/javascript" src="ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="myjs/scripts.js"></script>
<script type="text/javascript" src="myjs/search.js"></script>
<script type="text/javascript" src="myjs/religion-caste.js"></script>
<script type="text/javascript" src="myjs/validate8.js"></script>
<script type="text/javascript" language="JavaScript">
</script>
</head>

<body class="ragistration">
<header>
  <div class="topbar">
    <div class="container">
    <marquee><font color="#ff6600" size="4px">वधु - वर सुचक. नातं मराठी मनाचं..... आम्ही तुमच्या साठी उत्तम  जोडीदार शोधायला  मदत करू.  </font></marquee>
    </div>
  </div>
  <div class="headerbar">
    <div class="container">
      <div class="logo"><a href=" " title="Vadhu Var Suchak"><img src="images\logo.png" alt=""></a></div>
      <button class="toggleButton">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <nav>
        <ul>
			<li><a href="index.html">Home</a></li>		
			<li class="active"><a href="registration.php">New Registration</a> </li>		
			<li ><a href="membership.html">Membership</a> </li>
			<li ><a href="contactus.php">Contact Us</a> </li>
			<li ><a href="help.html">Help</a> </li>
        </ul>
      </nav>
    </div>
  </div>
</header>

	<section class="titleWrapper">
		<div class="container">
			<h1>New Registration</h1>      
		</div>
	</section>
 
  <section class="wrapper">
    <div class="container">
    	<h5 class="Ourvarious2">New Registration</h5> 
    </div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="reg_Form1" id="reg_Form1">	
    <div class="container clearfix">
		<!-- Start of Spouse -->
		<div class="registration">
			<h5 class="heading">Email Id Registration </h5>
                <div class="form-group row">
					<div class="col-sm-6">
						<label><b><font color="red">*&nbsp;&nbsp;</font></b>Email ID (Enter correct Valid Email Id. It will be Verified)<br> Example: sarita@gmail.com</label>
						<input id="EMAILconfirm" class="form-control" type="email" name="EMAILconfirm" required placeholder="Enter correct Email Id for Verification">
					</div>
				</div>
				
				<div class="form-group buttonWrapper">
					<input type="submit" value="Check Availability of Email ID" class="btn btn-success loginbtn btn-lg" style="background : orange">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				</div>   
			</div>				<!-- Div calss registration -->			
		</div>	
	</form>
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
      Copyright &copy; 2020 Omist.in - All rights reserved.
    </div>
  </div>
</footer>

  
<a href="javascript:void(0)" id="toTop" onclick="topFunction()"><i aria-hidden="true" class="glyphicon glyphicon-upload"></i></a>
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

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
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