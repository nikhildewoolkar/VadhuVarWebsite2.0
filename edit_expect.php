<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'mysqls/connect_db.php';
// Display Database value in Edit registration form 
	$sql = "select username, quali_s, quali_s_stream, occu_s, txt_s_exp from register where username='".$_SESSION["username"]."'";
	$result = $conn->query($sql);
    if ($result->num_rows=== 1) {            		
		$row = $result->fetch_assoc();
	}
	else {
		echo "Some Error. Try Again! If Still Error exist, Contact Us!";	
	}
	//Copied above logic from edit_registartion_process.php
	
	// Save Form Value in Database After Editing 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$quali_s = $_POST["quali_s"];//New
$quali_s_stream = $_POST["quali_s_stream"];//New
$occu_s = $_POST["occu_s"];
$txt_s_exp = $_POST["txt_s_exp"];//New	
	
$sql= "update register set quali_s= '".$quali_s. "', quali_s_stream = '". $quali_s_stream."', occu_s= '". $occu_s."', txt_s_exp = '". $txt_s_exp."' 
where username='".$_SESSION["username"]."' and id = '".$_SESSION["id"]."'";
    
	if ($conn->query($sql) === TRUE) {  	
			?>
			<script>
			if(confirm("Your Profile is updated on Maratha Vadhu Var"))
			{ 				
				document.location = "show_my_profile.php";
			}
			</script>
			<?php		
    } 
	else {	echo "<br> Error: Try Again after some time Or conatct Us! "; }
	$conn->close(); 
}
/*else
{
	// It works but by default it appears when page loads. Logically it works correctly.
	//echo "Some Problem Occured in Form Submission. Follow Edit Registration link from menu bar!";
}*/
?>


<!-- HTML Logic-->
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>वधु - वर सुचक : Edit Expectation</title>
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
			<li><a href="show_my_profile.php">My Profile</a></li>	
			<li class="active"><a href="edit_registration_links.php">Edit Profile</a> </li>
			<li ><a href="searchoption.php">Search Options</a></li>
			<li ><a href="membership.html">Membership</a> </li>
			<li ><a href="contactus.php">Contact Us</a> </li>
			<li ><a href="help.html">Help</a> </li>
			<li ><a href="logout.php">logout</a> </li>	
        </ul>
      </nav>
    </div>
  </div>
</header>

	<section class="titleWrapper">
		<div class="container">
			<h1>Edit Profile</h1>      
		</div>
	</section>
 
  <section class="wrapper">
    <div class="container">
    	<h5 class="Ourvarious2">Edit Profile : Expectations from Partner</h5> 
    </div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="editForm6" id="editForm6">	
    <div class="container clearfix">
		<!-- Start of Spouse -->
		<div class="registration">
			<h5 class="heading">Expectation From Life Partner - Spouse </h5>
                <div class="form-group row">
					<div class="col-sm-4">
						<label>Spouse Minimum Qualification </label>
						<select name="quali_s" class="form-control">
							<option value="">- Select -</option>
							<option value="<?php echo $row['quali_s']; ?>" selected><?php echo $row['quali_s']; ?></option>
							<option value="PHD">PHD</option>
							<option value="Post_Graduation">Post Graduation</option>
							<option value="Graduation">Graduation</option>
							<option value="Graduation_engg">Engg. Graduation</option>
							<option value="Diploma">Diploma</option>
							<option value="HSC">HSC(12th)</option>
							<option value="SSC">SSC(10th)</option>
						</select>
					</div>
					<div class="col-sm-4">
						<label>Stream </label>
						<input id="quali_s_stream" class="form-control" type="text" name="quali_s_stream" maxlength="20" value="<?php echo $row['quali_s_stream'];?>">
						<!--<input id="quali_s_stream" class="form-control" type="text" name="quali_s_stream" maxlength="20" placeholder="B.Com.">-->
					</div>					
					<div class="col-sm-4">
						<label>Spouse Occupation</label>
						<select id="occu_s" class="form-control" name="occu_s">
						<option value="Does_not_matter">Does not matter</option>
						<option value="<?php echo $row['occu_s']; ?>" selected><?php echo $row['occu_s']; ?></option>
						<option value="Service">Service</option>
						<option value="Business">Business</option>
                        <option value="Service_&_Business">Service & Business</option>
						<option value="HouseWife">House Wife</option>
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-12">
						<label>Any Other Expectations </label>
						<!--<input id="txt_s_exp" class="form-control" type="textarea" name="txt_s_exp">-->
						<textarea id="txt_s_exp" class="form-control" name="txt_s_exp" rows="2" maxlength="200"><?php echo $row['txt_s_exp'];?></textarea>
						<!--<textarea id="txt_s_exp" name="txt_s_exp" class="form-control" rows="2"  style="text-align:left;"> </textarea> -->
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12">
						<b>I hereby declare that the above mentioned information is correct to the best of my
						knowledge and I bear the responsibility for the correctness of the above mentioned particulars.</b>
					</div>
				</div>

				<div class="form-group">
					<div class="checkbox">
						<input type="checkbox" id="terms" name="Accept" value="I Accept" required>
						<label for="terms"><b><font color="red">*&nbsp;&nbsp;</font></b>I Accept the terms and Conditions. </label>
					</div>
				</div>
				<div class="form-group buttonWrapper">
					<input type="submit" value="Submit" class="btn btn-success loginbtn btn-lg" style="background : green">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="edit_registration_links.php"><input type="button" value="Cancel" class="btn btnpink loginbtn btn-lg" style="background : #ff6600"></a>
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
/*
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
window.onscroll = function() {scrollFunction()};*/

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

<script type="text/javascript">
/*
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));*/
</script>
</body>
</html>