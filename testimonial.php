<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 
include 'mysqls/connect_db.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $title = $_POST["title"];
  $response = $_POST["response"];
  date_default_timezone_set("Asia/Kolkata");
	//Logic to save contact in mysql

  $sql = "INSERT INTO testimonials (name, email, title, response)	VALUES ('$name', '$email', '$title', '$response')";
  if ($conn->query($sql) === TRUE) { 	
    $conn->close();	
    header('Location: index.html');			
  } 
  else {	echo "Error in Submitting Information. Fill the Contact Us Form & Try Again! "; $conn->close();}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>वधु - वर सुचक : Testimonial/Feedback Form </title>
  <meta name="Description" content="">
  <meta name="keywords" content="">
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
        <div class="logo"><a href=" " title="Vadhu Var Suchak"><img src="images\logo.png" alt=""></a></div>
        <button class="toggleButton">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <nav>
          <ul>
           <li><a href="index.html">Home</a></li>
           <li><a href="login.php" >Login</a></li>
           <li><a href="registration.php">Register</a> </li>
           <li ><a href="login.php">Search Options</a> </li>
           <li><a href="membership.html">Membership</a> </li>
           <li  class="active"><a href="contactus.php">Contact Us</a> </li>
           <li><a href="help.html">Help</a> </li>
           <li><a href="logout.php">logout</a></li>          
         </ul>
       </nav>
     </div>
   </div>
 </header>
 <!--end_header-->  

 <!-- ======= Contact Section ======= -->
 <section class="titleWrapper">
  <div class="container" data-aos="fade-up">
    <h5><font color="white"><b>Mr.Jeetendra Raundale (B.E. Civil) Founder of Mee Maratha Group</b></font></h5> 
    <h1>Contact Us</h1>
  </div>
</section>

<section class="wrapper Contactwrapper">
  <div class="container d-flex justify-content-center text-center">
    <div>
      <h1>Testimonial/Feedback Page</h1>
    </div>
    <br>
    <div class="row">
    <div class="col-sm-2"></div>
      <div class="col-sm-8">
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" role="form" class="php-email-form">
        <div class="form-row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" value="<?php echo ($_SESSION['fname'] ."  " .$_SESSION['lname']); ?>" data-rule="minlen:4" required readonly />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="email" class="form-control" name="email" id="email" value="<?php echo ($_SESSION['username']); ?>" data-rule="email" required readonly />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="title" id="title" placeholder="Enter a title" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="response" rows="5" data-rule="required" required" placeholder="Please enter your Testimonial/Feedback here"></textarea>
          <div class="validate"></div>
        </div>
              <!--
			  <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
            -->
            <div class="text-center"><button type="submit" class="btn btnpink loginbtn btn-lg">Send Message</button></div>
          </form>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->
  
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

  <!--<a href="#top" id="toTop"><i aria-hidden="true" class="glyphicon glyphicon-upload"></i></a>-->
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
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  window.onscroll = function() {scrollFunction()};

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