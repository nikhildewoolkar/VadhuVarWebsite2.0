<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "mysqls/connect_db.php";
 
// Define variables and initialize with empty values
$username  = "";
$username_err = "";

$new_password = "";
$new_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["txtusername"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["txtusername"]);
    }    	 
	
	// Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } else{
        $new_password = trim($_POST["new_password"]);
    }
		
	$deleteStory = $_POST["deleteStory"];        
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($username_err)){
		$sql = "SELECT password1 FROM register WHERE username = '". $_SESSION["username"]."'";		
			$result = $conn->query($sql);
			if ($result->num_rows=== 1) 
			{            
				$row = $result->fetch_assoc();			
        		if(password_verify($new_password, $row["password1"]))
				{
					$sql = "update register set verified= 'delet', deleteStory= '".$deleteStory."' 
					where username='".$_SESSION["username"]."' and username = '". $username."'";
					if($conn->query($sql)){
						if($conn -> affected_rows==1){						
							echo "<br><br><br>";
							echo "<p style='background-color:green; color:white; font-size:30px; '> You have been Deleted Successfully.</p>";
							echo "<br><br><br>";	
							echo "";
						}
						if($conn -> affected_rows==0){
							echo "<br><br><br>";
							echo "<p style='background-color:red; color:white; font-size:30px; '> Not Deleted. Error Occur. Try Again.</p>";
							echo "<br><br><br>";	
							echo "";
						}
					}
				}
				else{
					echo "<br><br><br>";
					echo "<p style='background-color:red; color:white; font-size:30px; '> Wrong Password. Please try again.</p>";
					echo "<br><br><br>";	
					echo "";
				}					
			} 
			else{	
				echo "<br><br><br>";
				echo "<p style='background-color:red; color:white; font-size:30px; '> Oops! No Data Found. Something went wrong. Please try again later.</p>";
				echo "<br><br><br>";			
        }
	}
    // Close connection
	$conn->close();	
}
?>
 
<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>वधु - वर सुचक : Delete Candidate</title>

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

    <!--start_mainwrrapr-->
    <!--start title wrapper -->
    <section class="titleWrapper">
      <div class="container">
          <h5><font color="white"><b>Mr.Jeetendra Raundale (B.E. Civil) Founder of Mee Maratha Group</b></font></h5> 
        <h1>Edit Profile</h1>
      </div>
    </section>
    <!--end title wrapper -->

    <div class="wrapper">
		<div class="container">
			<h5 class="Ourvarious2">Edit Profile : Set Me as Delete</h5> 
		</div>
	
        
		<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="form10" method="post"> 
		<div class="container clearfix">
		<div class="registration">
			<h5 class="heading">Thanks !!!!!  I want to withdraw my Candidature. </h5>
			
			
			
			<div class="row" align="center">        		
			<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="col-sm-4 labelControl"  align="right">Registered Email ID/ Username</label>				
				<div class="col-sm-4">
                <input type="text" name="txtusername" class="form-control" value="<?php echo $username; ?>">				
                <span class="help-block"><?php echo $username_err; ?></span>
				</div>
            </div> 
			</div>
			
			<div class="row" align="center">        		
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label class="col-sm-4 labelControl"  align="right">Password:</label>				
				<div class="col-sm-4">
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
				</div>
            </div>
			</div>		
			
			
			<div class="form-group row">
					<div class="col-sm-12">
						<label>Reason of Deletion / Any Feedback / Comment</label>						
						<textarea id="deleteStory" class="form-control" name="deleteStory" rows="2" maxlength="50">Thanks </textarea>						
					</div>
			</div>
			
			
			<div class="row" align="center">        		
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">                
				<a class="btn btn-link" href="show_my_profile.php">Cancel</a>
            </div>
			</div>	
		</div>	<!-- End of <div class="registration">-->
		</div>
        </form>
		</div>
		
    </div>    
	
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