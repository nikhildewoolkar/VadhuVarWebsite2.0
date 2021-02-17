<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fname = $_POST["txtFName"];
	$mname = $_POST["txtMName"];
	$lname = $_POST["txtLastName"];
	$gender = $_POST["txtGender"];
	$date1 = $_POST["dobDay"];
	$month1 = $_POST["dobMonth"];
	$year1 = $_POST["dobYear"];
	$m_status = $_POST["MARITAL_STATUS"];
	$nc = $_POST["NOOFCHILDREN"];
	$clwm = $_POST["CHILDLIVINGWITHME"];
	$religion = "Hindu-Maratha";
//$religion = $_POST["religion"];
	$subcaste = $_POST["txtSubcaste"];
	$qualification=$_POST["qualification"];
	$qstream=$_POST["qualification_stream"];
	$occupation=$_POST["occupation"];
$income=$_POST["income"]; //New

$address=$_POST["txtaddress"];
$add_city=$_POST["txtadd_city"];
$txtadd_tal=$_POST["txtadd_tal"];
$add_district=$_POST["txtadd_district"];
$add_state=$_POST["txtadd_state"];
$add_country=$_POST["txtadd_country"];

$created_by = $_POST["postedby"];
$emailid = $_POST["EMAILconfirm"];
$password1 = $_POST["txtcp"];
$mobile1 = $_POST["txtMobile"];
$mobile2 = $_POST["txtPhone"];
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

// $quali_s = $_POST["quali_s"];
// $quali_s_stream = $_POST["quali_s_stream"];
// $occu_s=$_POST["txt_s_Occ"];//New
$spouseQualification = $_POST["spouseQualification"];
$spouseStream = $_POST["spouseStream"];
$spouseOccupation=$_POST["spouseOccupation"];
$spouseDiet = $_POST["spouseDiet"];
$spouseSalary = $_POST["spouseSalary"];
$spouseAgeDiff = $_POST["spouseAgeDiff"];
$spouseComplexion = $_POST["spouseComplexion"];
$spouseBodyType=$_POST["spouseBodyType"];
$spouseSmoking = $_POST["spouseSmoking"];
$spouseAlcohol = $_POST["spouseAlcohol"];
$txt_s_exp = $_POST["txt_s_exp"];

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

//$username1= "";
$username1 = (isset($_POST["EMAILconfirm"]))? ($_POST["EMAILconfirm"]): ("uid");
$hashedpassword1 = "0";
$hashedpassword1 = password_hash($password1, PASSWORD_DEFAULT); // Creates a password hash

$token = bin2hex(random_bytes(15));

include 'mysqls/connect_db1.php';

$sql = "INSERT INTO register (fname, mname, lname, gender, date1, month1, year1, m_status, nc, clwm, religion, subcaste, 
qualification, qstream, occupation, income, address, add_city, txtadd_tal, add_district, add_state, add_country,
created_by, emailid, password1, mobile1, mobile2, gothra, moonsign, horos, manglik, 
birth_village, birth_city, birth_taluka, birth_district, birth_state, birth_country, birth_hour, birth_min, ampm, 
spouseQualification, spouseStream, spouseOccupation, spouseDiet, spouseSalary, spouseAgeDiff, spouseComplexion, spouseBodyType, spouseSmoking, spouseAlcohol, txt_s_exp ,height_cm, weight_kg, blood, complexion, p_status, physicalsts, body_type, diet, smoke, drink, username, token, verified, last_login)  
VALUES ('$fname', '$mname', '$lname', '$gender', '$date1', '$month1', '$year1', '$m_status', '$nc', '$clwm', '$religion', '$subcaste',
'$qualification','$qstream','$occupation','$income','$address','$add_city', '$txtadd_tal', '$add_district', '$add_state', '$add_country',
'$created_by', '$emailid', '$hashedpassword1', '$mobile1', '$mobile2', '$gothra', '$moonsign', '$horos', '$manglik', 
'$birth_village','$birth_city', '$birth_taluka', '$birth_district', '$birth_state', '$birth_country', '$birth_hour', '$birth_min', '$ampm', 
'$spouseQualification', '$spouseStream', '$spouseOccupation', '$spouseDiet', '$spouseSalary', '$spouseAgeDiff', '$spouseComplexion', '$spouseBodyType', '$spouseSmoking', '$spouseAlcohol', '$txt_s_exp' ,'$height_cm', '$weight_kg', '$blood', '$complexion', '$p_status','$physicalsts', '$body_type',  
'$diet', '$smoke', '$drink', '$username1', '$token', 'no', now())";    
//$_SERVER["REQUEST_METHOD"] == "NULL";
if ($conn->query($sql) === TRUE) { 
	$subject = "Email Activation";
	$body = "Hi, $fname $lname. Click here to activate your account http://localhost/vadhuvar/activate.php?token=$token ";
	$sender_email = "From: sah.ayush96@gmail.com";

	if (mail($emailid, $subject, $body, $sender_email)) {
		$_SESSION['msg'] = "Check your mail to activate account $emailid";
		header('location:login.php');
	} else {
		echo "Email sending failed...";
	}
	?>
	<!-- 
	<script>			
		if(confirm("You are successfully registered! Welcome to Maratha Vadhu Var! \n Within 24 Hours Your email id and Mobile number will be verified using OTP. \n Click on Login"))
		{ 
			document.location = "http://meemarathavadhuvar.in/login.html";
				//document.location = "index.html";
				//exit();
				//document.location = "http://meemarathavadhuvar.in/login.php";
			}
	</script> 
	-->
		<?php		
			/*echo "<script>alert('Welcome to Maratha Vadhu Var ". $fname. " Click on Login')</script>"; 
			echo "<p style='color:white; background-color: green; font-size:20px; text-align:center;'> Thank You <b>". $fname. "</b><br>";
        	
        	echo "We will publish your profile very soon.</p>"; 
        	echo "<br><br> <hr>"; */
        } 
        else {	echo "<br> Error: Try Again after some time Or conatct Us!";
	        //echo $conn->error; 
    }
    $conn->close();	
}
else
	echo "Some Problem Occured in Form Submission. Follow Registration link from menu bar!"
?>