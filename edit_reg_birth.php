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
	$sql = "select * from register where username='".$_SESSION["username"]."'";
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
$gothra = $_POST["txtGothra"];
$moonsign = $_POST["txtMoon"];
$horos = $_POST["txtHorosMatch"];
$manglik = $_POST["txtManglik"];
$birth_country = $_POST["country"];
$birth_state = $_POST["state"];
$birth_district = $_POST["txtbdistrict"];
$birth_taluka = $_POST["txtbtaluka"];
$birth_city = $_POST["txtbcity"];
$birth_village = $_POST["txtbvillage"];
$birth_hour = $_POST["timehr"];
$birth_min = $_POST["timemin"];
$ampm = $_POST["timeampm"];

$sql= "update register set gothra= '".$gothra. "', moonsign = '". $moonsign."', horos = '". $horos."', manglik = '". $manglik."',
	birth_village = '". $birth_village."', birth_city = '". $birth_city."', birth_taluka = '". $birth_taluka."', birth_district = '". $birth_district."',
	birth_state = '". $birth_state."', birth_country = '". $birth_country."', birth_hour = '". $birth_hour."', birth_min = '". 
	$birth_min."', ampm = '". $ampm."' where username='".$_SESSION["username"]."' and id = '".$_SESSION["id"]."'";
    
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
	else {	echo "<br> Error: Try Again after some time Or conatct Us! ";
			//$conn->close();				
	        //$conn->error;
	    
	}
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
<title>वधु - वर सुचक : Edit Birth Data</title>
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
    	<h5 class="Ourvarious2">Edit your profile </h5> 
    </div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="editForm2" id="editForm2">
	<!--<form action="registration_process.php" method="post" name="reg_form" id="reg_form">-->
    <div class="container clearfix">
        <div class="registration">
        <h5 class="heading">Edit Socio Religious Attributes </h5>
        <div class="form-group row">
          <div class="col-sm-6">
            <label>Gothra</label>
            <input id="txtGothra" class="form-control" type="text" name="txtGothra" maxlength="20" value="<?php echo $row['gothra'];?>">			
          </div>
          <div class="col-sm-6">
           <label>Rashi</label>           
            <select id="txtMoon" class="form-control" name="txtMoon">
						<option value="<?php echo $row['moonsign']; ?>" selected><?php echo $row['moonsign']; ?></option>
                        <option value="Does not matter">Does not matter</option>
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

        <div class="form-group">
          <label>Horos Match :: <?=$row['horos']?></label>    
          <div class="radio radio-inline">
			<input type="radio" id="no" name="txtHorosMatch" <?=$row['horos']=="No" ? "checked" : ""?> value="No" required>
            <!--<input type="radio" value="No" checked="checked" id="no" name="txtHorosMatch" required>-->
            <label for="no" class="malelable">No</label>
          </div>
          <div class="radio radio-inline">  
			<input type="radio" id="yes" name="txtHorosMatch" <?=$row['horos']=="Yes" ? "checked" : ""?> value="Yes" required>
            <!--<input type="radio" name="txtHorosMatch" id="yes" value="Yes" required>-->
            <label for="yes" class="">Yes</label>
          </div>
          
          <div class="radio radio-inline">  
			<input type="radio" id="not_applicable" name="txtHorosMatch" <?=$row['horos']=="NA" ? "checked" : ""?> value="NA" required>
            <!--<input type="radio" name="txtHorosMatch" id="not_applicable" value="NA" required>-->
            <label for="not_applicable" class="">Not Applicable</label>
          </div>
        </div>
		
        <div class="form-group">
          <label>Manglik</label>
           <div class="radio radio-inline">
			<input type="radio" id="no2" name="txtManglik" <?=$row['manglik']=="No" ? "checked" : ""?> value="No" required>
            <!--<input type="radio" value="No" checked="checked" id="no2" name="txtManglik" required>-->
            <label for="no2" class="malelable">No</label>
          </div>
          <div class="radio radio-inline">  
			<input type="radio" id="yes2" name="txtManglik" <?=$row['manglik']=="Yes" ? "checked" : ""?> value="Yes" required>
            <!--<input type="radio" name="txtManglik" id="yes2" value="Yes" required>-->
            <label for="yes2" class="">Yes</label>
          </div>
          
          <div class="radio radio-inline">  
			<input type="radio" id="not_applicable2" name="txtManglik" <?=$row['manglik']=="NA" ? "checked" : ""?> value="NA" required>
            <!--<input type="radio" name="txtManglik" id="not_applicable2" value="NA" required>-->
            <label for="not_applicable2" class="">Not Applicable</label>
          </div>
        </div>		    
		
    		<div class="form-group row">
          <div class="col-sm-2">
		  <label>Birth Country</label>            
            <select id="country" class="form-control" name="country">
			  <option value="<?php echo $row['birth_country']; ?>" selected><?php echo $row['birth_country']; ?></option>
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
              <option value="American Samoa">American Samoa</option>
              <option value="Andorra">Andorra</option>
              <option value="Angola">Angola</option>
              <option value="Anguilla">Anguilla</option>
              <option value="Antartica">Antarctica</option>
              <option value="Antigua and Barbuda">Antigua and Barbuda</option>
              <option value="Argentina">Argentina</option>
              <option value="Armenia">Armenia</option>
              <option value="Aruba">Aruba</option>
              <option value="Australia">Australia</option>
              <option value="Austria">Austria</option>
              <option value="Azerbaijan">Azerbaijan</option>
              <option value="Bahamas">Bahamas</option>
              <option value="Bahrain">Bahrain</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Barbados">Barbados</option>
              <option value="Belarus">Belarus</option>
              <option value="Belgium">Belgium</option>
              <option value="Belize">Belize</option>
              <option value="Benin">Benin</option>
              <option value="Bermuda">Bermuda</option>
              <option value="Bhutan">Bhutan</option>
              <option value="Bolivia">Bolivia</option>
              <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
              <option value="Botswana">Botswana</option>
              <option value="Bouvet Island">Bouvet Island</option>
              <option value="Brazil">Brazil</option>
              <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
              <option value="Brunei Darussalam">Brunei Darussalam</option>
              <option value="Bulgaria">Bulgaria</option>
              <option value="Burkina Faso">Burkina Faso</option>
              <option value="Burundi">Burundi</option>
              <option value="Cambodia">Cambodia</option>
              <option value="Cameroon">Cameroon</option>
              <option value="Canada">Canada</option>
              <option value="Cape Verde">Cape Verde</option>
              <option value="Cayman Islands">Cayman Islands</option>
              <option value="Central African Republic">Central African Republic</option>
              <option value="Chad">Chad</option>
              <option value="Chile">Chile</option>
              <option value="China">China</option>
              <option value="Christmas Island">Christmas Island</option>
              <option value="Cocos Islands">Cocos (Keeling) Islands</option>
              <option value="Colombia">Colombia</option>
              <option value="Comoros">Comoros</option>
              <option value="Congo">Congo</option>
              <option value="Congo">Congo, the Democratic Republic of the</option>
              <option value="Cook Islands">Cook Islands</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Cota D'Ivoire">Cote d'Ivoire</option>
              <option value="Croatia">Croatia (Hrvatska)</option>
              <option value="Cuba">Cuba</option>
              <option value="Cyprus">Cyprus</option>
              <option value="Czech Republic">Czech Republic</option>
              <option value="Denmark">Denmark</option>
              <option value="Djibouti">Djibouti</option>
              <option value="Dominica">Dominica</option>
              <option value="Dominican Republic">Dominican Republic</option>
              <option value="East Timor">East Timor</option>
              <option value="Ecuador">Ecuador</option>
              <option value="Egypt">Egypt</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Equatorial Guinea">Equatorial Guinea</option>
              <option value="Eritrea">Eritrea</option>
              <option value="Estonia">Estonia</option>
              <option value="Ethiopia">Ethiopia</option>
              <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
              <option value="Faroe Islands">Faroe Islands</option>
              <option value="Fiji">Fiji</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="France Metropolitan">France, Metropolitan</option>
              <option value="French Guiana">French Guiana</option>
              <option value="French Polynesia">French Polynesia</option>
              <option value="French Southern Territories">French Southern Territories</option>
              <option value="Gabon">Gabon</option>
              <option value="Gambia">Gambia</option>
              <option value="Georgia">Georgia</option>
              <option value="Germany">Germany</option>
              <option value="Ghana">Ghana</option>
              <option value="Gibraltar">Gibraltar</option>
              <option value="Greece">Greece</option>
              <option value="Greenland">Greenland</option>
              <option value="Grenada">Grenada</option>
              <option value="Guadeloupe">Guadeloupe</option>
              <option value="Guam">Guam</option>
              <option value="Guatemala">Guatemala</option>
              <option value="Guinea">Guinea</option>
              <option value="Guinea-Bissau">Guinea-Bissau</option>
              <option value="Guyana">Guyana</option>
              <option value="Haiti">Haiti</option>
              <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
              <option value="Holy See">Holy See (Vatican City State)</option>
              <option value="Honduras">Honduras</option>
              <option value="Hong Kong">Hong Kong</option>
              <option value="Hungary">Hungary</option>
              <option value="Iceland">Iceland</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Iran">Iran (Islamic Republic of)</option>
              <option value="Iraq">Iraq</option>
              <option value="Ireland">Ireland</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Jamaica">Jamaica</option>
              <option value="Japan">Japan</option>
              <option value="Jordan">Jordan</option>
              <option value="Kazakhstan">Kazakhstan</option>
              <option value="Kenya">Kenya</option>
              <option value="Kiribati">Kiribati</option>
              <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Kuwait">Kuwait</option>
              <option value="Kyrgyzstan">Kyrgyzstan</option>
              <option value="Lao">Lao People's Democratic Republic</option>
              <option value="Latvia">Latvia</option>
              <option value="Lebanon" >Lebanon</option>
              <option value="Lesotho">Lesotho</option>
              <option value="Liberia">Liberia</option>
              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
              <option value="Liechtenstein">Liechtenstein</option>
              <option value="Lithuania">Lithuania</option>
              <option value="Luxembourg">Luxembourg</option>
              <option value="Macau">Macau</option>
              <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
              <option value="Madagascar">Madagascar</option>
              <option value="Malawi">Malawi</option>
              <option value="Malaysia">Malaysia</option>
              <option value="Maldives">Maldives</option>
              <option value="Mali">Mali</option>
              <option value="Malta">Malta</option>
              <option value="Marshall Islands">Marshall Islands</option>
              <option value="Martinique">Martinique</option>
              <option value="Mauritania">Mauritania</option>
              <option value="Mauritius">Mauritius</option>
              <option value="Mayotte">Mayotte</option>
              <option value="Mexico">Mexico</option>
              <option value="Micronesia">Micronesia, Federated States of</option>
              <option value="Moldova">Moldova, Republic of</option>
              <option value="Monaco">Monaco</option>
              <option value="Mongolia">Mongolia</option>
              <option value="Montserrat">Montserrat</option>
              <option value="Morocco">Morocco</option>
              <option value="Mozambique">Mozambique</option>
              <option value="Myanmar">Myanmar</option>
              <option value="Namibia">Namibia</option>
              <option value="Nauru">Nauru</option>
              <option value="Nepal">Nepal</option>
              <option value="Netherlands">Netherlands</option>
              <option value="Netherlands Antilles">Netherlands Antilles</option>
              <option value="New Caledonia">New Caledonia</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="Niger">Niger</option>
              <option value="Nigeria">Nigeria</option>
              <option value="Niue">Niue</option>
              <option value="Norfolk Island">Norfolk Island</option>
              <option value="Northern Mariana Islands">Northern Mariana Islands</option>
              <option value="Norway">Norway</option>
              <option value="Oman">Oman</option>
              <option value="Pakistan">Pakistan</option>
              <option value="Palau">Palau</option>
              <option value="Panama">Panama</option>
              <option value="Papua New Guinea">Papua New Guinea</option>
              <option value="Paraguay">Paraguay</option>
              <option value="Peru">Peru</option>
              <option value="Philippines">Philippines</option>
              <option value="Pitcairn">Pitcairn</option>
              <option value="Poland">Poland</option>
              <option value="Portugal">Portugal</option>
              <option value="Puerto Rico">Puerto Rico</option>
              <option value="Qatar">Qatar</option>
              <option value="Reunion">Reunion</option>
              <option value="Romania">Romania</option>
              <option value="Russia">Russian Federation</option>
              <option value="Rwanda">Rwanda</option>
              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
              <option value="Saint LUCIA">Saint LUCIA</option>
              <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
              <option value="Samoa">Samoa</option>
              <option value="San Marino">San Marino</option>
              <option value="Sao Tome and Principe">Sao Tome and Principe</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="Senegal">Senegal</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra">Sierra Leone</option>
              <option value="Singapore">Singapore</option>
              <option value="Slovakia">Slovakia (Slovak Republic)</option>
              <option value="Slovenia">Slovenia</option>
              <option value="Solomon Islands">Solomon Islands</option>
              <option value="Somalia">Somalia</option>
              <option value="South Africa">South Africa</option>
              <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
              <option value="Span">Spain</option>
              <option value="SriLanka">Sri Lanka</option>
              <option value="St. Helena">St. Helena</option>
              <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
              <option value="Sudan">Sudan</option>
              <option value="Suriname">Suriname</option>
              <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
              <option value="Swaziland">Swaziland</option>
              <option value="Sweden">Sweden</option>
              <option value="Switzerland">Switzerland</option>
              <option value="Syria">Syrian Arab Republic</option>
              <option value="Taiwan">Taiwan, Province of China</option>
              <option value="Tajikistan">Tajikistan</option>
              <option value="Tanzania">Tanzania, United Republic of</option>
              <option value="Thailand">Thailand</option>
              <option value="Togo">Togo</option>
              <option value="Tokelau">Tokelau</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
              <option value="Tunisia">Tunisia</option>
              <option value="Turkey">Turkey</option>
              <option value="Turkmenistan">Turkmenistan</option>
              <option value="Turks and Caicos">Turks and Caicos Islands</option>
              <option value="Tuvalu">Tuvalu</option>
              <option value="Uganda">Uganda</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
              <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
              <option value="Uruguay">Uruguay</option>
              <option value="Uzbekistan">Uzbekistan</option>
              <option value="Vanuatu">Vanuatu</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Viet Nam</option>
              <option value="Virgin Islands (British)">Virgin Islands (British)</option>
              <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
              <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
              <option value="Western Sahara">Western Sahara</option>
              <option value="Yemen">Yemen</option>
              <option value="Serbia">Serbia</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabwe">Zimbabwe</option>
              <option value="Other">Other</option>
            </select>
            

          </div>
          <div class="col-sm-2">
            <label>Birth State</label>            
            <select name="state" id="state" class="form-control">
			  <option value="<?php echo $row['birth_state']; ?>" selected><?php echo $row['birth_state']; ?></option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Bihar">Bihar</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Delhi">Delhi</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Puducherry">Puducherry</option>
              <option value="Goa">Goa</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Maharashtra" selected>Maharashtra</option>
              <option value="Manipur">Manipur</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Odisha">Odisha</option>
              <option value="Punjab">Punjab</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Telangana">Telangana</option>
              <option value="Tripura">Tripura</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Uttarakhand">Uttarakhand</option>
              <option value="West Bengal">West Bengal</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="col-sm-2">
            <label>Birth District</label>
			<input id="txtbdistrict" class="form-control" type="text" name="txtbdistrict" maxlength="20"  value="<?php echo $row['birth_district'];?>">
            <!--<input id="txtbdistrict" class="form-control" type="text" name="txtbdistrict" maxlength="20">-->
          </div>
          <div class="col-sm-2">
            <label>Birth Taluka</label>
			<input id="txtbtaluka" class="form-control" type="text" name="txtbtaluka" maxlength="20"  value="<?php echo $row['birth_taluka'];?>">
            <!--<input id="txtbtaluka" class="form-control" type="text" name="txtbtaluka" maxlength="20">-->
          </div>
          <div class="col-sm-2">
            <label>Birth City</label>
			<input id="txtbcity" class="form-control" type="text" name="txtbcity" maxlength="20"  value="<?php echo $row['birth_city'];?>">
            <!--<input id="txtbcity" class="form-control" type="text" name="txtbcity" maxlength="20">-->
          </div>
          <div class="col-sm-2">
            <label>Birth Village</label>
			<input id="txtbvillage" class="form-control" type="text" name="txtbvillage" maxlength="20"  value="<?php echo $row['birth_village'];?>">
            <!--<input id="txtbvillage" class="form-control" type="text" name="txtbvillage" maxlength="20">-->
          </div></div>

          <div class="form-group row">
          <div class="col-sm-4">
		        <label>Time of Birth In Hour</label>
            	<select name="timehr" class="form-control">
					<option value="NA">-NA-</option>
					<option value="<?php echo $row['birth_hour']; ?>" selected><?php echo $row['birth_hour']; ?></option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07" >07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>

            </div>
            <div class="col-sm-4">
              <label>Time of Birth In Minute</label>
              <!--<input id="txtTb" class="form-control" type="text" name="txtTb" maxlength="20">-->

              <select name="timemin" class="form-control">
				<option value="NA">-NA-</option>
				<option value="<?php echo $row['birth_min']; ?>" selected><?php echo $row['birth_min']; ?></option>				
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21" >21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="26">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label>AM and PM</label>
				<select name="timeampm" class="form-control">
					<option value="NA">-NA-</option>
					<option value="<?php echo $row['ampm']; ?>" selected><?php echo $row['ampm']; ?></option>				
					<option value="AM">AM</option>
					<option value="PM">PM</option>
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