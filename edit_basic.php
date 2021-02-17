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
	$sql = "select username, m_status, nc, clwm, subcaste, qualification, qstream, occupation, income from register where username='".$_SESSION["username"]."'";
	$result = $conn->query($sql);
    if ($result->num_rows=== 1) {            		
		$row = $result->fetch_assoc();
	}
	else {
		echo "Some Error. Try Again! If Still Error exist, Contact Us!";	
	}
		
	// Save Form Value in Database After Editing 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$m_status = $_POST["MARITAL_STATUS"];
	$nc = $_POST["NOOFCHILDREN"];
	$clwm = $_POST["CHILDLIVINGWITHME"];	
	$subcaste = $_POST["txtSubcaste"];
	$qualification=$_POST["qualification"];
	$qstream=$_POST["qualification_stream"];
	$occupation=$_POST["occupation"];
	$income=$_POST["income"];
	
	$sql= "update register set m_status= '".$m_status. "', nc = '". $nc."', clwm= '". $clwm."', 
		subcaste = '". $subcaste."', qualification = '". $qualification."', qstream = '". $qstream."',
		 occupation = '". $occupation."', income = '". $income."'
		where username='".$_SESSION["username"]."' and id = '".$_SESSION["id"]."'";
    
	if ($conn->query($sql) === TRUE) {  	
			?>
			<script>
			if(confirm("Your Profile is updated on Maratha Vadhu Var"))
			{ 				
				document.location = "show_my_profile.php";
				//document.location = "edit_registration_links.php";
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
<title>वधु - वर सुचक : Edit Personal Data</title>
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
    	<h5 class="Ourvarious2">Edit Profile : Basic Information</h5> 
    </div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="editForm6" id="editForm6">	
    <div class="container clearfix">
		<!-- Start of Basic Info Edit Section -->
		<div class="registration">
			<h5 class="heading">Edit Basic Information</h5>
						
					<div class="form-group">
					  <label><b><font color="red">*&nbsp;&nbsp;</font></b>Marital Status*: 
					  <?=$row['m_status'] ?><?=$row['nc'] ?><?=$row['clwm']?>
					  </label>
					  <div class="radio radio-inline">
						<input type="radio" onClick="return hidediv2();" id="unmarried" 
						<?=$row['m_status']=="Unmarried" ? "checked" : ""?>
						value="Unmarried" name="MARITAL_STATUS" checked required>
						<label for="unmarried" class="malelable">Unmarried</label>
					  </div>
					  <div class="radio radio-inline">  
						<input type="radio" onClick="return dispdiv2();" id="widow/widower" 
						<?=$row['m_status']=="Widow/Widower" ? "checked" : ""?>
						value="Widow/Widower" name="MARITAL_STATUS" required>
						<label for="widow/widower" class="">Widow/Widower</label>
					  </div>
					  <div class="radio radio-inline">  
						<input type="radio" onClick="return dispdiv2();" id="divorcee" 
						<?=$row['m_status']=="Divorcee" ? "checked" : ""?>
						value="Divorcee" name="MARITAL_STATUS" required>
						<label for="divorcee" class="">Divorcee</label>
					  </div>
					  <div class="radio radio-inline">  
						<input type="radio"   onClick="return dispdiv2();" id="separated" 
						<?=$row['m_status']=="Separated" ? "checked" : ""?>
						value="Separated" name="MARITAL_STATUS" required>
						<label for="separated" class="">Separated</label>
					  </div>
					</div>
					<div id="showopd" style="display:none">
						<div class="form-group row">
						  <div class="col-sm-6">
							<label>No. Of Children</label>
							  <select name="NOOFCHILDREN" class="form-control">
							   <option selected="" value="">- Select -</option>							   
						<!--<option value="<?php echo $row['nc']; ?>" selected><?php echo $row['nc']; ?></option>-->
						
													<option value="0">None</option>
													<option value="One">1</option>
													<option value="Two">2</option>
													<option value="Three">3</option>
													<option value="Four and above">4 and above</option>
							  </select>
						  </div>
						  <div class="col-sm-6">
							<label>Children Living Status</label>    
							<div class="radio radio-inline">
							  <input type="radio" value="" id="NA2" name="CHILDLIVINGWITHME" checked>
							  <label for="NA2" class="">Not Applicable</label>
							</div>  
							<div class="radio radio-inline">
							  <input type="radio" value="Living" id="Living" name="CHILDLIVINGWITHME">
							  <label for="Living" class="malelable">Living with me</label>
							</div>  
							<div class="radio radio-inline">  
							  <input type="radio" Value="NotLiving" id="NotLiving" name="CHILDLIVINGWITHME">
							  <label for="NotLiving" class="">Not living with me</label>
							</div>
						  </div>
						</div>
						
						<script type="text/javascript" language="JavaScript">							
							function dispdiv2()
							{
							document.getElementById("showopd").style.display = 'block';
							}
							function hidediv2()
							{
							document.getElementById("showopd").style.display='none';
							}
						</script>
					</div>
			
                <div class="form-group row">					
					<div class="col-sm-4">
						<label>Religion- Cast</label>
						<input id="religion" class="form-control" type="text" name="religion" maxlength="20" value="Hindu-Maratha" disabled>
					</div>					  
					<div class="col-sm-4">
						<label>Sub-Cast</label>
						<input id="txtSubcaste" class="form-control" type="text" name="txtSubcaste"  
						value="<?php echo $row['subcaste'];?>" maxlength="20">
					</div>
				  
					<div class="col-sm-4">
						<label ><b><font color="red">*&nbsp;&nbsp;</font></b>Hightest Education </label>
							<select name="qualification" class="form-control">
								<option value="">- Select -</option>
								<option value="<?php echo $row['qualification']; ?>" selected><?php echo $row['qualification']; ?></option>
								<option value="PHD">PhD</option>
								<option value="Post_Graduation">Post Graduation</option>
								<option value="Graduation">Graduation</option>
								<option value="Graduation_engg">Engg. Graduation</option>
								<option value="Diploma">Diploma</option>
								<option value="HSC">HSC(12th)</option>
								<option value="SSC">SSC(10th)</option>
							</select>
					</div>
					<br><br><br><br>
					<div class="col-sm-4">
						<label>Stream </label>
						<input id="qualification_stream" class="form-control" type="text" name="qualification_stream" maxlength="20" 
						placeholder="B.Sc. - Chemistry" value="<?php echo $row['qstream'];?>">
					</div>
					<div class="col-sm-4">
					  <label><b><font color="red">*&nbsp;&nbsp;</font></b>Occupation </label>
					  <select id="occupation" name="occupation" class="form-control">
						<option value="">- Select -</option>
						<option value="<?php echo $row['occupation']; ?>" selected><?php echo $row['occupation']; ?></option>
						<option value="Service">Service</option>
						<option value="Business">Business</option>
						<option value="Service_&_Business">Service & Business</option>
					  </select>
					</div>
					<div class="col-sm-4">
						<label>Annual Income in Rs.</label>
							<select id="income" name="income" class="form-control">
								<option selected="" value="">- Select -</option>
								<option value="<?php echo $row['income']; ?>" selected><?php echo $row['income']; ?></option>
								<option value="1L">₹1L</option>
								<option value="1L-2L">₹1L - ₹2L</option>
								<option value="2L-3L">₹2L - ₹3L</option>
								<option value="3L-4L">₹3L - ₹4L</option>
								<option value="4L-5L">₹4L - ₹5L</option>
								<option value="5L-6L">₹5L - ₹6L</option>
								<option value="6L-8L">₹6L - ₹8L</option>
								<option value="8L-10L">₹8L - ₹10L</option>
								<option value="10L-12L">₹10L - ₹12L</option>
								<option value="12L-15L">₹12L - ₹15L</option>
								<option value="15L-20L">₹15L - ₹20L</option>
								<option value="20L-25L">₹20L - ₹25L</option>
								<option value="25L-30L">₹25L - ₹30L</option>
								<option value="30L-40L">₹30L - ₹40L</option>
								<option value="40L-50L">₹40L - ₹50L</option>
								<option value="Above_50L">Above ₹50L</option>
							</select>
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