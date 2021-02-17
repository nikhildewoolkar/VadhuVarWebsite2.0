<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_SESSION["verified"]) && $_SESSION["verified"] ==="admin")
{
}
else if(!isset($_SESSION["verified"]) || $_SESSION["verified"] !== "em"){
    header("location: needverify.html");
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
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--  <script src="myscripts.js"></script> -->
  <style>
    table, th, td {
      border: 1px black;
      align: center;
    }
    th, td {
      padding: 2px;
    }
    tr.line1{
      color:white; background-color: orange; font-size: 18px;
    }
	
  </style>

	
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
          <h5><font color="white"><b>Mr.Jeetendra Raundale (B.E. Civil) Founder of Mee Maratha Group</b></font></h5>  
        <h1>Welcome <?php echo ($_SESSION['fname'] ."  " .$_SESSION['lname']); ?> : Search Option</h1>
      </div>
    </section>

  <?php  
    include 'mysqls/connect_db.php';  
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		$gender = (isset($_POST["txtGender"]))? $_POST["txtGender"] : "NULL8" ;
		$district = (isset($_POST["district"]))? strtoupper($_POST["district"]) : "NULL8" ;
		//$district = (isset($_POST["district"]))? $_POST["district"] : "NULL8" ;
		//$taluka = (isset($_POST["txttaluka"])) ? strtoupper($_POST["txttaluka"]) : "NULL8";
		$quali = (isset($_POST["qualification"])) ? $_POST["qualification"] : "NULL8";
		$occu = (isset($_POST["occupation"])) ? $_POST["occupation"] : "NULL8";
		$rashi = (isset($_POST["txtrashi"])) ? $_POST["txtrashi"] : "NULL8";
		
		if($gender!=="NULL8" and $district !=="NULL8" and $quali !== "NULL8")
		{
			$sql = "select * from register where gender='".$gender."' and upper(add_district)='".$district."' and qualification='". $quali . "' and verified = 'em'";
		}
		else if($gender!=="NULL8" and $district !=="NULL8")
		{
			$sql = "select * from register where gender='".$gender."' and upper(add_district)='".$district."' and verified = 'em'";
		}
		else if($gender!=="NULL8" and $quali !=="NULL8")
		{
			$sql = "select * from register where gender='".$gender."' and qualification='".$quali."' and verified = 'em'";
		}
		else if($district !=="NULL8" and $quali !=="NULL8")
		{
			$sql = "select * from register where upper(add_district)='".$district."' and qualification='".$quali."' and verified = 'em'";
		}
		else if($gender !=="NULL8")
		{
			$sql = "select * from register where gender='".$gender."' and verified = 'em'";			
		}	
		else if($district !=="NULL8" )
		{
			$sql = "select * from register where upper(add_district)='".$district."' and verified = 'em'";			
		}					
		else if($quali !=="NULL8" )
		{
			$sql = "select * from register where qualification='".$quali."' and verified = 'em'";			
		}					
		else 
		{
			//No one is selected then 
			/*?>
			<script>
			if(confirm("You have not selected anything"))
			{ 
				document.location = "http://meemarathavadhuvar.in/searchoption.php";
			}
			</script>
			<?php*/
			//echo "Plesea Give some search criteria";
			// Redirect browser 
			//before uploading redirect it to searchoption.php page
			//header("Location: searchoption.php");
			header("Location: http://meemarathavadhuvar.in/searchoption.php");
			exit;			
		}		
		$result = $conn->query($sql);	
  ?>

  <!-- ======= All Candidate Listing ======= -->    
  <div class="container">    
    <h1 style="text-align:center;">All Candidate Listing</h1>      
    <?php
        if ($result->num_rows > 0) {    
        // output data of each row
        $row_flag=2;
        while($row = $result->fetch_assoc()) {          
		?>
		
		
		<section class="wrapper search_result">
		<div class="container">
        <div class="row clearfix">
           <h5 class="Ourvarious"> Candidate   <?php echo "<span>". $row["fname"]. "</span>" ;  ?>  </h5>
           
                         <div class="col-lg-9 keepcenter">
                <ul class="result">
                    <li>
          <?php
            echo "<h4>" . $row["fname"]. "  ".$row["mname"]. "  ".$row["lname"] . "</h4>";
?>
            <div  class="clearfix">
			         <div class="left col-lg-4">
				          <a href="" data-toggle="modal"  class="img"> <?php echo  "<img src='upphoto/upload_files/pic/". $row["photo"]. "' >"  ; ?>    </a>
               </div>
               
                <div class="right col-lg-8">
                                      <div class="aboutSummary">
				                               <div class="groupinfo clearfix">
					                                <div class="group fullwidth">
           
           <label> Gender </label>
						                                <?php echo "<span>". $row["gender"]. "&nbsp;</span>" ;  ?> 
                                            <label> Birth Year </label>
						                                <?php echo "<span>". $row["year1"]. "&nbsp;</span>" ;  ?>
                                            <label> Marital Status</label>
						                                <?php echo "<span>". $row["m_status"] . " ". $row["nc"] . " ". $row["clwm"]. "&nbsp;</span>" ;  ?>
						                                <label> Religion </label>
						                                <?php echo "<span>". $row["religion"] ."&nbsp&nbsp&nbsp&nbsp". $row["caste"]."&nbsp&nbsp&nbsp&nbsp". $row["subcaste"]. "&nbsp;</span>" ;  ?>
                                            <label> Email Id </label>
						                                <?php echo "<span>". $row["emailid"]. "&nbsp;</span>" ;  ?> 
										
                                           
                                            <label> Gothra </label>
						                                <?php echo "<span>".  $row["gothra"] ."&nbsp&nbsp Rashi:   ". $row["moonsign"] . "&nbsp;</span>" ;  ?> 
                                            <label> Horos </label>
						                                <?php echo "<span>". $row["horos"] . "&nbsp&nbsp&nbsp&nbsp Manglik: ". $row["manglik"] . "&nbsp;</span>" ;  ?> 
                                            
					                        <label> Height </label>
						                                <?php echo "<span>". $row["height_cm"] . " &nbsp cm,&nbsp&nbsp&nbspWeight: ". $row["weight_kg"]. "</span>" ;  ?> 
											 
						                                 <label> Complexion </label>
						                                <?php echo "<span>". $row["complexion"]. "&nbsp;</span>" ;  ?> 
                                            <label> Physical Status </label>
						                                <?php echo "<span>". $row["p_status"] . "&nbsp;</span>" ;  ?> 
														
											<label> Other </label>
						                                <?php echo "<span>". $row["physicalsts"] . "&nbsp;</span>" ;  ?> 	
											<label> Body Type </label>
						                                <?php echo "<span>". $row["body_type"] . "&nbsp;</span>" ;  ?> 	
                                            <label> Qualification </label>
						                                <?php echo "<span>". $row["qualification"] . "&nbsp;</span>" ;  ?> 
                                            <label> Occupation </label>
						                                <?php echo "<span>". $row["occupation"]. "&nbsp;</span>" ;  ?> 
                                            <label> Current Address </label>
						                                <?php echo "<span>".  $row["address"]. ",&nbsp" . $row["add_city"]. ",&nbsp".$row["txtadd_tal"]. ",&nbsp". $row["add_district"]. ",&nbsp". $row["add_state"]. ",&nbsp". $row["add_country"].  "</span>" ;  ?> 
                                            <label> Diet </label>
						                                <?php echo "<span>". $row["diet"] . "&nbsp;</span>" ;  ?> 
						                                <label> Smoke </label>
						                                <?php echo "<span>". $row["smoke"]. " &nbsp&nbsp Drink:". $row["drink"]. "&nbsp;</span>" ;  ?> 
						                                
						                 <label> Expectations from Spouse: </label>
						                                <?php echo "<span>" . $row["quali_s"] . ", Stream: ". $row["quali_s_stream"] ."</span>" ;  ?>
                                            <br><label> Any other Expectation: </label>
						                                <?php echo "<span>" . $row["txt_s_exp"]." </span>" ;  ?>
						                 
          
    
           
        
          
                                               </div>
					                            </div>
                                    </div>
             </div> 
          
            </li>
          </ul>
          </div>
       </div> 
    </div> 
    </section>
    
    
    <!-- End of <div class="row">    -->      
                   
      <?php      
      } //End of While loop
      ?>
    
  </div> <!-- End of <div class="container">    -->
  <?php
  }   
  else {
		echo "<br><br><br>";
		echo "<p style='background-color:red; color:white; font-size:30px; '> No Match Found! Change the search Parameter and Try Again!</p>";
		echo "<br><br><br>";		
  }

  $conn->close();
	}//End of Main if($_SERVER["REQUEST_METHOD"] == "POST")
	else{
		echo"Login first and then search your partner";
	}
	
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
      Copyright &copy; 2020Omist.in - All rights reserved.
    </div>
  </div>
</footer>
</body>
</html>