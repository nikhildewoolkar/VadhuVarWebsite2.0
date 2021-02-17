<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: show_my_profile.php");
    exit;
}
// Include connect_db file
include 'mysqls/connect_db.php';
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Check if username is empty
    if(empty(trim($_POST["txtusername"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["txtusername"]);
    }    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }    
    // Validate credentials
    if(empty($username_err) && empty($password_err))
	{
        $sql = "SELECT id, username, emailid, password1 FROM register WHERE username = '". $username."'";		
			$result = $conn->query($sql);
			if ($result->num_rows=== 1) 
			{            
				$row = $result->fetch_assoc();			
        		if(password_verify($password, $row["password1"]))
				{
					// Password is correct, so start a new session
                    session_start();                            
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    // Redirect user to welcome page
                    header("location: show_my_profile.php");
                }
				else
				{
                    // Display an error message if password is not valid
                    $password_err = "The password you entered was not valid.";
                }
            }        
    }
	else
	{
        echo "Oops! Something went wrong. Please try again later.";
    }
    // Close connection
	$conn->close();
}
?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>वधु - वर सुचक : Login </title>
<meta name="Description" >
<meta name="keywords" >
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
    <script type="text/javascript" src="myjs/search.js"></script>
    <script type="text/javascript" src="myjs/religion-caste.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
      integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd"
      crossorigin="anonymous"></script>
      
      
      <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>


</head>
<body>

<header>
  <div class="topbar">
    <div class="container">

    <marquee>
            <font color="#ff6600" size="4px">वधु - वर सुचक. नातं मराठी मनाचं..... आम्ही तुमच्या साठी उत्तम
              जोडीदार शोधायला  मदत करू.
            </font>
          </marquee>
    </div>
  </div>
  <div class="headerbar">
    <div class="container">
      <div class="logo">
        <a href="index.html" title="Vadhu Var Suchak"><img src="images\logo.png" alt="" /></a>
      </div>
      <button class="toggleButton">
        <span></span>
        <span></span>
        <span></span>
      </button>
		<nav >
			<ul>
				<li><a href="index.html">Home</a></li>
				<li class="active" ><a href="login.php" >Login</a></li>
				<li ><a href="registration.php">Register</a> </li>
				<li ><a href="login.php">Search Options</a> </li>
				<li ><a href="membership.html">Membership</a> </li>
				<li ><a href="contactus.php">Contact Us</a> </li>
				<li ><a href="help.html">Help</a> </li>
				<li ><a href="logout.php">logout</a> </li>
			</ul>
        </nav>       
    </div>
  </div>
</header>

<div class="hiddenDiv"></div>

<!--start title wrapper -->
  <section class="titleWrapper">
    <div class="container">
      <h1>Member Login</h1>
      
    </div>
  </section>
<!--end title wrapper -->

<!-- Start of Login -->
<section class="wrapper">
     <div class="staticContainer paymentContainer">
	    <!--  <div class="form-group clearfix">-->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<!--<FORM action="" method="post" name="form1" id="form1" onSubmit="return validate(this);">-->
			<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="col-sm-4 labelControl">Email ID/ Username</label>				
				<div class="col-sm-8">
                <input type="text" name="txtusername" class="form-control" value="<?php echo $username; ?>">				
                <span class="help-block"><?php echo $username_err; ?></span>
				</div>
            </div>    
			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="col-sm-4 labelControl">Password</label>
				<div class="col-sm-8">
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
				</div>
            </div>
            <div class="form-group">
				<div class="col-sm-12" align="center">
                <input type="submit" class="btn btn-primary" value="Login">
				</div>
            </div>  			
			<div class="form-group clearfix">
				<!-- Dont delete. forgotpassword page is not yet created
				<label class="col-sm-4 labelControl"><a href="forgotpassword.html">Forgot Password ?</a></label>
				<div class="col-sm-8">					
				</div>
				-->
			</div>
			<div class="form-group clearfix">
				<label class="col-sm-12 labelControl"><a href="registration.php">Sign up for free Registration!</a></label>				
			</div>            
		</form>			
        <!--</div>-->
    </div>
</section>

<!-- End of Login -->
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
</body>
</html>
