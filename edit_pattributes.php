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
	$sql = "select username, height_cm, weight_kg, blood, complexion, p_status, physicalsts, body_type, diet, smoke, drink 
			from register where username='".$_SESSION["username"]."'";
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
$height_cm = $_POST["txtHeight1"];
$weight_kg = $_POST["txtWeight"];
$blood = $_POST["txtBlood"];
$complexion = $_POST["txtComplexion"];
$p_status = $_POST["txtphysicalsts"];
$physicalsts = $_POST["physicalsts"];
$body_type = $_POST["txtBody"];
$diet = $_POST["txtDiet"];
$smoke = $_POST["txtSmoke"];
$drink = $_POST["txtDrink"];
	
$sql= "update register set height_cm= '".$height_cm. "', weight_kg = '". $weight_kg."', blood= '". $blood."', complexion = '". $complexion."', 
	   p_status = '". $p_status."' , physicalsts = '". $physicalsts."', body_type = '". $body_type."', diet = '". $diet."', 
	   smoke = '". $smoke."', drink = '". $drink."'where username='".$_SESSION["username"]."' and id = '".$_SESSION["id"]."'";
   
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
<title>वधु - वर सुचक : Edit Physical Attributes</title>
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
			<h1>Edit Physical Attributes</h1>      
		</div>
	</section>

 
<section class="wrapper">
    <div class="container">
    	<h5 class="Ourvarious2">Edit Physical Attributes</h5> 
    </div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="editForm5" id="editForm5">	
	<!--<form action="registration_process.php" method="post" name="reg_form" id="reg_form">-->
    <div class="container clearfix">
        <div class="registration">
    		<h5 class="heading">Edit Physical Attributes</h5>
        <div class="form-group row">
      		<div class="col-sm-6">
            <label><b><font color="red">*&nbsp;&nbsp;</font></b>Height in cm</label>   
			<input id="txtHeight1" class="form-control" type="text" name="txtHeight1" value="<?php echo $row['height_cm'];?>" onfocusout="isEditHeightValid()">
            <!--<input id="txtHeight1" class="form-control" type="text" name="txtHeight1" required>-->
          </div>
          <div class="col-sm-6">
            <label><b><font color="red">*&nbsp;&nbsp;</font></b>Weight in Kg</label>
           <select id="txtWeight" class="form-control" name="txtWeight" required>
                                <option value="0">- Select -</option>
								<option value="<?php echo $row['weight_kg']; ?>" selected><?php echo $row['weight_kg']; ?></option>
                                <option value="41 kg">41 kg</option>
                                <option value="42 kg">42 kg</option>
                                <option value="43 kg">43 kg</option>
                                <option value="44 kg">44 kg</option>
                                <option value="45 kg">45 kg</option>
                                <option value="46 kg">46 kg</option>
                                <option value="47 kg">47 kg</option>
                                <option value="48 kg">48 kg</option>
                                <option value="49 kg">49 kg</option>
                                <option value="50 kg">50 kg</option>
                                <option value="51 kg">51 kg</option>
                                <option value="52 kg">52 kg</option>
                                <option value="53 kg">53 kg</option>
                                <option value="54 kg">54 kg</option>
                                <option value="55 kg">55 kg</option>
                                <option value="56 kg">56 kg</option>
                                <option value="57 kg">57 kg</option>
                                <option value="58 kg">58 kg</option>
                                <option value="59 kg">59 kg</option>
                                <option value="60 kg">60 kg</option>
                                <option value="61 kg">61 kg</option>
                                <option value="62 kg">62 kg</option>
                                <option value="63 kg">63 kg</option>
                                <option value="64 kg">64 kg</option>
                                <option value="65 kg">65 kg</option>
                                <option value="66 kg">66 kg</option>
                                <option value="67 kg">67 kg</option>
                                <option value="68 kg">68 kg</option>
                                <option value="69 kg">69 kg</option>
                                <option value="70 kg">70 kg</option>
                                <option value="71 kg">71 kg</option>
                                <option value="72 kg">72 kg</option>
                                <option value="73 kg">73 kg</option>
                                <option value="74 kg">74 kg</option>
                                <option value="75 kg">75 kg</option>
                                <option value="76 kg">76 kg</option>
                                <option value="77 kg">77 kg</option>
                                <option value="78 kg">78 kg</option>
                                <option value="79 kg">79 kg</option>
                                <option value="80 kg">80 kg</option>
                                <option value="81 kg">81 kg</option>
                                <option value="82 kg">82 kg</option>
                                <option value="83 kg">83 kg</option>
                                <option value="84 kg">84 kg</option>
                                <option value="85 kg">85 kg</option>
                                <option value="86 kg">86 kg</option>
                                <option value="87 kg">87 kg</option>
                                <option value="88 kg">88 kg</option>
                                <option value="89 kg">89 kg</option>
                                <option value="90 kg">90 kg</option>
                                <option value="91 kg">91 kg</option>
                                <option value="92 kg">92 kg</option>
                                <option value="93 kg">93 kg</option>
                                <option value="94 kg">94 kg</option>
                                <option value="95 kg">95 kg</option>
                                <option value="96 kg">96 kg</option>
                                <option value="97 kg">97 kg</option>
                                <option value="98 kg">98 kg</option>
                                <option value="99 kg">99 kg</option>
                                <option value="100 kg">100 kg</option>
                                <option value="101 kg">101 kg</option>
                                <option value="102 kg">102 kg</option>
                                <option value="103 kg">103 kg</option>
                                <option value="104 kg">104 kg</option>
                                <option value="105 kg">105 kg</option>
                                <option value="106 kg">106 kg</option>
                                <option value="107 kg">107 kg</option>
                                <option value="108 kg">108 kg</option>
                                <option value="109 kg">109 kg</option>
                                <option value="110 kg">110 kg</option>
                                <option value="111 kg">111 kg</option>
                                <option value="112 kg">112 kg</option>
                                <option value="113 kg">113 kg</option>
                                <option value="114 kg">114 kg</option>
                                <option value="115 kg">115 kg</option>
                                <option value="116 kg">116 kg</option>
                                <option value="117 kg">117 kg</option>
                                <option value="118 kg">118 kg</option>
                                <option value="119 kg">119 kg</option>
                                <option value="120 kg">120 kg</option>
                                <option value="121 kg">121 kg</option>
                                <option value="122 kg">122 kg</option>
                                <option value="123 kg">123 kg</option>
                                <option value="124 kg">124 kg</option>
                                <option value="125 kg">125 kg</option>
                                <option value="126 kg">126 kg</option>
                                <option value="127 kg">127 kg</option>
                                <option value="128 kg">128 kg</option>
                                <option value="129 kg">129 kg</option>
                                <option value="130 kg">139 kg</option>
                              </select>
          </div>
        </div>  
        <div class="form-group row">
          <div class="col-sm-6">
            <label>Blood Group</label>
         <select id="txtBlood" class="form-control" name="txtBlood">
                                <option value="">- Select -</option>
								<option value="<?php echo $row['blood']; ?>" selected><?php echo $row['blood']; ?></option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>
                              </select>
          </div>

          <div class="col-sm-6">
            <label>Complexion</label>
             <select id="txtComplexion" class="form-control" name="txtComplexion">
                                <option value="">- Select -</option>
								<option value="<?php echo $row['complexion']; ?>" selected><?php echo $row['complexion']; ?></option>
                                <option value="Very Fair">Very Fair</option>
                                <option value="Fair">Fair</option>
                                <option value="Wheatish">Wheatish</option>
                                <option value="Wheatish Medium">Wheatish Medium</option>
                                <option value="Wheatish Brown">Wheatish Brown</option>
                                <option value="Dark">Dark</option>
                              </select>
          </div>
        </div>

    		<div class="form-group">
          <label>Physical Status *: <?=$row['p_status']?> </label>
          <div class="radio radio-inline">
			<input type="radio" id="Pno" name="txtphysicalsts" <?=$row['p_status']=="No" ? "checked" : ""?> value="No" onClick="return hidediv();">
            <!--<input type="radio" onClick="return hidediv();" value="No" checked="checked"  id="Pno" name="txtphysicalsts">-->
            <label for="Pno" class="malelable">Normal</label>
          </div>
          <div class="radio radio-inline">  
			<input type="radio" id="Pyes" name="txtphysicalsts" <?=$row['p_status']=="Yes" ? "checked" : ""?> value="Yes" onClick="return dispdiv();">
            <!--<input type="radio" onClick="return dispdiv();" value="Yes" id="Pyes" name="txtphysicalsts">-->
            <label for="Pyes" class="">Physically challenged</label>

            <script type="text/javascript" language="JavaScript">
$(document).ready(function(){
	$("#timepicker1").timemachine({format:"AMPM",showSecs:false,min_increment:1});
});
function dispdiv()
{
document.getElementById("phydiv").style.display = 'block';
}
function hidediv()
{
document.getElementById("phydiv").style.display='none';
}

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
        </div>
	   
	   <div style="display:none;" id="phydiv">
	   
	   <div class="form-group">
          <label>Select Type :</label>
          <select name="physicalsts" id="physicalsts"  class="form-control">
          				<option value="" selected="">Select</option>
						<!--<option value="<?php echo $row['physicalsts']; ?>" selected><?php echo $row['physicalsts']; ?></option>-->
						<option value="Physically challenged from birth">Physically challenged from birth</option>
						<option value="Physically challenged due to accident">Physically challenged due to accident</option>
						<option value="Mentally challenged from birth">Mentally challenged from birth</option>
						<option value="Mentally challenged due to accident">Mentally challenged due to accident</option>
						<option value="Physical abnormality affecting only looks">Physical abnormality affecting only looks</option>
						<option value="Physical abnormality affecting bodily functions">Physical abnormality affecting bodily functions</option>
						<option value="Physically and mentally challenged">Physically and mentally challenged</option>
						<option value="Other">Other</option>
					</select>
        </div>
	   
							
					</div>
    		<div class="form-group">
          <label><b><font color="red">*&nbsp;&nbsp;</font></b>Body Type :</label>
          <div class="radio radio-inline">
			<input type="radio" id="Bno" name="txtBody" <?=$row['body_type']=="Slim" ? "checked" : ""?> value="Slim" required>
            <!--<input type="radio" value="Slim" name="txtBody" id="Bno" required>-->
            <label for="Bno" class="malelable">Slim</label>
          </div>
          <div class="radio radio-inline">  
			<input type="radio" id="Byes" name="txtBody" <?=$row['body_type']=="Average" ? "checked" : ""?> value="Average" required>
            <!--<input type="radio" value="Average" checked="checked" name="txtBody" id="Byes" required>-->
            <label for="Byes" class="">Average</label>
          </div>
          <div class="radio radio-inline">
			<input type="radio" id="Bdo_not_know" name="txtBody" <?=$row['body_type']=="Athletic" ? "checked" : ""?> value="Athletic" required>
            <!--<input type="radio" value="Athletic" name="txtBody" id="Bdo_not_know" required>-->
            <label for="Bdo_not_know" class="">Athletic</label>
          </div>
          <div class="radio radio-inline">  
			<input type="radio" id="Bnot_applicable" name="txtBody" <?=$row['body_type']=="Heavy" ? "checked" : ""?> value="Heavy" required>
            <!--<input type="radio" value="Heavy" name="txtBody" id="Bnot_applicable" required>-->
            <label for="Bnot_applicable" class="">Heavy</label>
          </div>
        </div>
		
    		<div class="form-group row">
          <div class="col-sm-4">
            <label>Diet</label>  
            <select id="txtDiet" class="form-control" name="txtDiet">
								<option value="<?php echo $row['diet']; ?>" selected><?php echo $row['diet']; ?></option>
                                <option value="Veg">Veg</option>
                                <option value="Eggetarian">Eggetarian</option>
                                <option value="Occasionally Non-Veg">Occasionally Non-Veg</option>
                                <option value="Non-Veg">Non-Veg</option>
                                <option value="Jain">Jain</option>
                                <option value="Vegan">Vegan</option>
                                <option value="">Not Applicable</option>
                              </select>
          </div>
        </div>
        
        <div class="form-group row">
          <div class="col-sm-4">
            <label><b><font color="red">*&nbsp;&nbsp;</font></b>Smoke</label>
            <div class="radio radio-inline">
				<input type="radio" id="Sno" name="txtSmoke" <?=$row['smoke']=="No" ? "checked" : ""?> value="No" required>
              <!--<input type="radio" value="No"  checked="checked" name="txtSmoke" id="Sno" required>-->
              <label for="Sno" class="malelable">No</label>
            </div>
            <div class="radio radio-inline">  
				<input type="radio" id="Syes" name="txtSmoke" <?=$row['smoke']=="Yes" ? "checked" : ""?> value="Yes" required>
              <!--<input type="radio"  value="Yes" name="txtSmoke" id="Syes" required>-->
              <label for="Syes" class="">Yes</label>
            </div>
          </div>

          <div class="col-sm-4">
             <label><b><font color="red">*&nbsp;&nbsp;</font></b>Drink :</label> 
              <div class="radio radio-inline">
				<input type="radio" id="Dno" name="txtDrink" <?=$row['drink']=="No" ? "checked" : ""?> value="No" required>
                <!--<input type="radio"value="No" checked="checked" name="txtDrink" id="Dno" required>-->
                <label for="Dno" class="malelable">No</label>
              </div>
              <div class="radio radio-inline">
				<input type="radio" id="Dyes" name="txtDrink" <?=$row['drink']=="Yes" ? "checked" : ""?> value="Yes" required>
                <!--<input type="radio" value="Yes" name="txtDrink" id="Dyes" required>-->
                <label for="Dyes" class="">Yes</label>
              </div>   
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
       
      </div>
    </div>
<!--</div>-->
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
      Copyright &copy; 2020Omist.in - All rights reserved.
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
  <script src="js/custom.js"></script>-->
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