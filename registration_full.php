  <?php
  	//Start session
  session_start();

  	// Check if the user has come from registration.php page, if not then redirect him to registration.php page
  if(!isset($_SESSION["newregistration"]) || $_SESSION["newregistration"] !== true){
    header("location: registration.php");
    exit;
  }

  	// Access Session variable
  $emailid = $_SESSION["newemail"];

  	// Unset all of the session variables
  $_SESSION = array();

  	// Destroy the session.
  session_destroy();
  ?>

  <!-- HTML Logic-->
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>वधु - वर सुचक : Registration</title>
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
             <li><a href="login.php" >Login</a></li>
             <li class="active"><a href="registration.php">New Registeration</a> </li>			
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
      <h5><font color="white"><b>Mr.Jeetendra Raundale (B.E. Civil) Founder of Mee Maratha Group</b></font></h5> 
      <h1>Registration</h1>      
    </div>
  </section>


  <section class="wrapper">
    <div class="container">
      <h5 class="Ourvarious2"> Welcome <?php echo "$emailid"; ?></h5> 
      <h5 class="Ourvarious2">Follow few steps to create your profile </h5> 
    </div>
    <form action="registration_process.php" method="post" name="reg_form" id="reg_form">
      <div class="container clearfix">
        <div class="registration">
          <h5 class="heading">Basic Information</h5>
          <div class="form-group row">
            <div class="col-sm-4">
              <label><b><font color="red">*&nbsp;&nbsp;</font></b>First Name</label>
              <input id="txtFName" class="form-control" type="text" name="txtFName" required maxlength="20" placeholder="Max 20 characters">
            </div>
            <div class="col-sm-4">
             <label><b><font color="red">*&nbsp;&nbsp;</font></b>Middle Name</label>
             <input id="txtMName" class="form-control" type="text" name="txtMName" required maxlength="20" placeholder="Max 20 characters" onfocusin="isFNameValid()">
           </div>

           <div class="col-sm-4">
            <label><b><font color="red">*&nbsp;&nbsp;</font></b>Last Name</label>
            <input id="txtLastName" class="form-control" type="text" name="txtLastName" required maxlength="20" placeholder="Max 20 characters" onfocusin="isMNameValid()">
          </div>  
        </div>
        <div class="form-group row">
          <div class="col-sm-6">
            <label>Gender</label>
            <div class="clearfix"> 
              <div class="radio radio-inline">
                <input type="radio" value="Male" id="Male" name="txtGender" checked>
                <label for="Male" class="malelable">Male</label>
              </div>
              <div class="radio radio-inline">
                <input type="radio" value="Female" id="Female" name="txtGender">
                <label for="Female" class="">Female</label>
              </div>   
            </div>
          </div>
          <div class="col-sm-6 dob">
            <label><b><font color="red">*&nbsp;&nbsp;</font></b>Date of Birth</label>
            <div class="clearfix">
             <div class="col-sm-4">
              <select class="age form-control" name="dobDay" required onfocusin="isLNameValid()">
               <option selected="DD">Date</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
               <option value="7">7</option>
               <option value="8">8</option>
               <option value="9">9</option>
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
               <option value="21">21</option>
               <option value="22">22</option>
               <option value="23">23</option>
               <option value="24">24</option>
               <option value="25">25</option>
               <option value="26">26</option>
               <option value="27">27</option>
               <option value="28">28</option>
               <option value="29">29</option>
               <option value="30">30</option>
               <option value="31">31</option>
             </select>
           </div>
           <div class="col-sm-4">
            <select class="age form-control" name="dobMonth" required>
             <option selected="MM">Month</option>
             <option value="1">January</option>
             <option value="2">February</option>
             <option value="3">March</option>
             <option value="4">April</option>
             <option value="5">May</option>
             <option value="6">June</option>
             <option value="7">July</option>
             <option value="8">August</option>
             <option value="9">September</option>
             <option value="10">October</option>
             <option value="11">November</option>
             <option value="12">December</option>
           </select>
         </div>

         <div class="col-sm-4">
          <select class="age form-control" name="dobYear" required>
            <option selected="YYYY">Year</option>
            <option value="1950">1950</option>
            <option value="1951">1951</option>
            <option value="1952">1952</option>
            <option value="1953">1953</option>
            <option value="1954">1954</option>
            <option value="1955">1955</option>
            <option value="1956">1956</option>
            <option value="1957">1957</option>
            <option value="1958">1958</option>
            <option value="1959">1959</option>
            <option value="1960">1960</option>
            <option value="1961">1961</option>
            <option value="1962">1962</option>
            <option value="1963">1963</option>
            <option value="1964">1964</option>
            <option value="1965">1965</option>
            <option value="1966">1966</option>
            <option value="1967">1967</option>
            <option value="1968">1968</option>
            <option value="1969">1969</option>
            <option value="1970">1970</option>
            <option value="1971">1971</option>
            <option value="1972">1972</option>
            <option value="1973">1973</option>
            <option value="1974">1974</option>
            <option value="1975">1975</option>
            <option value="1976">1976</option>
            <option value="1977">1977</option>
            <option value="1978">1978</option>
            <option value="1979">1979</option>
            <option value="1980">1980</option>
            <option value="1981">1981</option>
            <option value="1982">1982</option>
            <option value="1983">1983</option>
            <option value="1984">1984</option>
            <option value="1985">1985</option>
            <option value="1986">1986</option>
            <option value="1987">1987</option>
            <option value="1988">1988</option>
            <option value="1989">1989</option>
            <option value="1990" selected>1990</option>
            <option value="1991">1991</option>
            <option value="1992">1992</option>
            <option value="1993">1993</option>
            <option value="1994">1994</option>
            <option value="1995">1995</option>
            <option value="1996">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2005">2005</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label><b><font color="red">*&nbsp;&nbsp;</font></b>Marital Status</label>
    <div class="radio radio-inline">
      <input type="radio" onClick="return hidediv2();" id="unmarried" value="Unmarried" name="MARITAL_STATUS" checked required>
      <label for="unmarried" class="malelable">Unmarried</label>
    </div>
    <div class="radio radio-inline">  
      <input type="radio" onClick="return dispdiv2();" id="widow/widower" value="Widow/Widower" name="MARITAL_STATUS" required>
      <label for="widow/widower" class="">Widow/Widower</label>
    </div>
    <div class="radio radio-inline">  
      <input type="radio" onClick="return dispdiv2();" id="divorcee" value="Divorcee" name="MARITAL_STATUS" required>
      <label for="divorcee" class="">Divorcee</label>
    </div>
    <div class="radio radio-inline">  
      <input type="radio"   onClick="return dispdiv2();" id="separated" value="Separated" name="MARITAL_STATUS" required>
      <label for="separated" class="">Separated</label>
    </div>
  </div>

  <div id="showopd" style="display:none">
   <div class="form-group row">
    <div class="col-sm-6">
      <label>No. Of Children</label>
      <select name="NOOFCHILDREN" class="form-control">
       <option selected="" value="">- Select -</option>
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
</div>
<div class="form-group row">
 <div class="col-sm-4">
  <label>Religion- Cast</label>
  <input id="religion" class="form-control" type="text" name="religion" maxlength="20" value="Hindu-Maratha" disabled>
</div>

  			<!--
  			<div class="col-sm-4">
  				<label>Cast</label>           
  				<input id="caste" class="form-control" type="text" name="caste" value="Maratha" maxlength="20" disabled>
  			</div>
     -->
     <div class="col-sm-4">
      <label>Sub-Cast</label>
      <input id="txtSubcaste" class="form-control" type="text" name="txtSubcaste" value="Maratha" maxlength="20">
    </div>

    <div class="col-sm-4">
      <label ><b><font color="red">*&nbsp;&nbsp;</font></b>Hightest Education </label>
      <select name="qualification" class="form-control">
        <option selected="" value="">- Select -</option>
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
      <input id="qualification_stream" class="form-control" type="text" name="qualification_stream" maxlength="20" placeholder="B.Sc. - Chemistry">
    </div>
    <div class="col-sm-4">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>Occupation </label>
      <select id="occupation" name="occupation" class="form-control">
        <option selected="" value="">- Select -</option>
        <option value="Service">Service</option>
        <option value="Business">Business</option>
        <option value="Service_&_Business">Service & Business</option>
      </select>
    </div>
    <div class="col-sm-4">
      <label>Annual Income in Rs.</label>
      <select id="income" name="income" class="form-control">
        <option selected="" value="">- Select -</option>
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
</div>


<div class="registration">
  <h5 class="heading">Current Address/ Permanent Address</h5>
  <div class="form-group row">
    <div class="col-sm-4">
      <label>Address Line 1</label>
      <input id="txtaddress" class="form-control" type="text" name="txtaddress" maxlength="20">
    </div>
    <div class="col-sm-4">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>City/ Nearest City</label>
      <input id="txtadd_city" class="form-control" type="text" name="txtadd_city" maxlength="20" required>
    </div>
    <div class="col-sm-4">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>Taluka</label>
      <input id="txtadd_tal" class="form-control" type="text" name="txtadd_tal" maxlength="50" required>
    </div>
    <br><br>
    <div class="col-sm-4">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>District</label>
      <input id="txtadd_district" required class="form-control" type="text" name="txtadd_district" maxlength="20" required>
    </div>
    <div class="col-sm-4">
      <label>State</label>      
      <select name="txtadd_state" id="txtadd_state" class="form-control">
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
    <div class="col-sm-4">
      <label>Country</label>
      <!-- <input id="txtadd_country" required class="form-control" type="text" name="txtadd_country" maxlength="20">-->            
      <select id="txtadd_country" class="form-control" name="txtadd_country">
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
        <option value="India" selected>India</option>
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

  </div>
</div>



<div class="registration">
  <h5 class="heading">New Account Information</h5>
  <div class="form-group row">
    <div class="col-sm-6">
      <label>Profile Created By</label>
      <select class="form-control" id="postedby" name="postedby">          
        <option value="Self">Self</option>
        <option value="Parents">Parents</option>
        <option value="Brother">Brother</option>
        <option value="Sister">Sister</option>
        <option value="Friend">Friend</option>
        <option value="Relative">Relative</option></select>
      </div>

      <div class="col-sm-6">
        <label><b><font color="red">*&nbsp;&nbsp;</font></b>Email ID (It is correct and Valid Email Id)</label>
        <input id="EMAILconfirm" class="form-control" type="email" name="EMAILconfirm" required readonly value="<?php echo $emailid; ?>">
      </div>

    </div>

    <div class="form-group row">
      <div class="col-sm-6">
       <label><b><font color="red">*&nbsp;&nbsp;</font></b>Password</label>
       <input id="txtp" class="form-control" type="password"  name="txtp" required>
     </div>
     <div class="col-sm-6">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>Confirm Password</label>
      <input id="txtcp" class="form-control" type="password"  name="txtcp" required onfocusout="check_equal()">
      <script>
        function check_equal()
        { pass1=reg_form.txtp.value;
          pass2=reg_form.txtcp.value;
          if(pass1 != pass2)
          {  					
           alert("Password is not Matched!");
           reg_form.txtp.focus();					
         }                
       }
     </script>
   </div>  

 </div>


 <div class="form-group row">
  <div class="col-sm-6">
    <label><b><font color="red">*&nbsp;&nbsp;</font></b>Mobile Number</label>
    <input id="txtMobile" class="form-control" type="text" name="txtMobile" required>
    <script>
      function chk_mobile1()
      { 
        str=reg_form.txtMobile.value;              

        if((str.length>"9") && (str.length<"15")){
          return true;
        }
        else{
          alert("Enter Valid Mobile Number");
          reg_form.txtMobile.focus();
        }
      }
    </script>
  </div>
  <div class="col-sm-6">
    <label>Alternate Contact Number</label>
    <input id="txtPhone" class="form-control" type="text" name="txtPhone" onfocusin = "chk_mobile1()" onfocusout="chk_mobile2()" >
    <script>
      function chk_mobile2()
      { 
  				//chk_mobile1();
          str=reg_form.txtPhone.value;
          if(str.length=="0" || str.length<"15"){
            return true;
          }
          else{
            alert("Enter Valid Alternate Contact Number");
          }
        }
      </script>
    </div>
  </div>
</div>

<div class="registration">
  <h5 class="heading">Socio Religious Attributes </h5>


  <div class="form-group row">
    <div class="col-sm-6">
      <label>Gothra</label>
      <input id="txtGothra" class="form-control" type="text" name="txtGothra">
    </div>
    <div class="col-sm-6">
     <label>Rashi</label>

     <select id="txtMoon" class="form-control" name="txtMoon">
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
  <label>Horos Match :</label>    
  <div class="radio radio-inline">
    <input type="radio" value="No" checked="checked" id="no" name="txtHorosMatch" required>
    <label for="no" class="malelable">No</label>
  </div>
  <div class="radio radio-inline">  
    <input type="radio" name="txtHorosMatch" id="yes" value="Yes" required>
    <label for="yes" class="">Yes</label>
  </div>

  <div class="radio radio-inline">  
    <input type="radio" name="txtHorosMatch" id="not_applicable" value="NA" required>
    <label for="not_applicable" class="">Not Applicable</label>
  </div>
</div>

<div class="form-group">
  <label>Manglik</label>
  <div class="radio radio-inline">
    <input type="radio" value="No" checked="checked" id="no2" name="txtManglik" required>
    <label for="no2" class="malelable">No</label>
  </div>
  <div class="radio radio-inline">  
    <input type="radio" name="txtManglik" id="yes2" value="Yes" required>
    <label for="yes2" class="">Yes</label>
  </div>

  <div class="radio radio-inline">  
    <input type="radio" name="txtManglik" id="not_applicable2" value="NA" required>
    <label for="not_applicable2" class="">Not Applicable</label>
  </div>
</div>


<div class="form-group row">
  <div class="col-sm-2">
    <label>Birth Country</label>

    <!--<input id="txtPb" class="form-control" type="text" name="txtPb" maxlength="20">  -->
    <select id="country" class="form-control" name="country">
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
      <option value="India" selected>India</option>
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
    <!--<input id="txtPb" class="form-control" type="text" name="txtPb" maxlength="20">-->
    <select name="state" id="state" class="form-control">
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
    <input id="txtbdistrict" class="form-control" type="text" name="txtbdistrict" maxlength="20">
  </div>
  <div class="col-sm-2">
    <label>Birth Taluka</label>
    <input id="txtbtaluka" class="form-control" type="text" name="txtbtaluka" maxlength="20">
  </div>
  <div class="col-sm-2">
    <label>Birth City</label>
    <input id="txtbcity" class="form-control" type="text" name="txtbcity" maxlength="20">
  </div>
  <div class="col-sm-2">
    <label>Birth Village</label>
    <input id="txtbvillage" class="form-control" type="text" name="txtbvillage" maxlength="20">
  </div></div>

  <div class="form-group row">
    <div class="col-sm-4">
      <label>Time of Birth In Hour</label>
      <!--<input id="txtTb" class="form-control" type="text" name="txtTb" maxlength="20">-->
      <select name="timehr" class="form-control">
        <option value="NA" selected>-NA-</option>
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
        <option value="NA" selected>-NA-</option>
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
      <!--<input id="txtTb" class="form-control" type="text" name="txtTb" maxlength="20">-->
      <select name="timeampm" class="form-control">
        <option value="NA" selected>-NA-</option>
        <option value="AM">AM</option>
        <option value="PM">PM</option>
      </select>

    </div>
  </div>
</div>

<!-- Start of Expectation form Spouse -->
<div class="registration">
 <h5 class="heading">Expectation From Life Partner - Spouse </h5>
 <div class="form-group row">
   <div class="col-sm-4">
    <label>Spouse Minimum Qualification </label>
    <select name="spouseQualification" class="form-control">
     <option value="PHD">PhD</option>
     <option value="Post_Graduation">Post Graduation</option>
     <option value="Graduation">Graduation</option>
     <option value="Graduation_engg">Engg. Graduation</option>
     <option value="Diploma">Diploma</option>
     <option value="HSC">HSC(12th)</option>
     <option value="SSC">SSC(10th)</option>
     <option value="NA">Does not matter</option>
   </select>
 </div>
 <div class="col-sm-4">
  <label>Spouse's Education Stream</label>
  <input id="spouseStream" class="form-control" type="text" name="spouseStream" maxlength="20" placeholder="B.Com">
</div>					
<div class="col-sm-4">
  <label>Spouse Occupation</label>
  <select id="spouseOccupation" class="form-control" name="spouseOccupation">
    <option value="Service">Service</option>
    <option value="Business">Business</option>
    <option value="Service_&_Business">Service & Business</option>
    <option value="HouseWife">House Wife</option>
    <option value="NA">Does not matter</option>
  </select>
</div>
</div>

<div class="form-group row">
 <div class="col-sm-4">
  <label>Spouse Diet Preference</label>
  <select id="spouseDiet" class="form-control" name="spouseDiet">
    <option value="Veg">Veg</option>
    <option value="Eggetarian">Eggetarian</option>
    <option value="Occasionally Non-Veg">Occasionally Non-Veg</option>
    <option value="Non-Veg">Non-Veg</option>
    <option value="Jain">Jain</option>
    <option value="Vegan">Vegan</option>
    <option selected= "" value="NA">Does Not Matter</option>
  </select>
</div>
<div class="col-sm-4">
  <label>Spouse Salary</label>
  <select name="spouseSalary" id="spouseSalary" class="form-control">
   <option value="2.5">0 to 2.5 lakh</option>
   <option value="5">2.5 lakh to 5 lakh</option>
   <option value="10">5 lakh to 10 lakh</option>
   <option value="11">More than 10 lakh</option>
   <option selected="" value="0">Does Not Matter</option>
 </select>
</div>         
<div class="col-sm-4">
  <label>Spouse Age Difference</label>
  <input id="spouseAgeDiff" type="Number" class="form-control"  name="spouseAgeDiff" min="0" max="20" value="0">
</div>
</div>
<div class="form-group row">
  <div class="col-sm-4">
    <label>Spouse Marital Status</label>
    <select name="spouseMaritalStatus" id="spouseMaritalStatus" size="5" class="form-control" multiple>
     <option value="unmarried">Unmarried</option>
     <option value="widow">Widow/Widower</option>
     <option value="divorcee">Divorcee</option>
     <option value="separated">Separated</option>
     <option selected="" value="NA">Does Not Matter</option>
   </select>
 </div>
 <div class="col-sm-4">
  <label>Spouse's Cast</label>
  <select name="spouseCast" id="spouseCast" class="form-control custom-select custom-select-lg mb-3">
   <option value="Hindu-Maratha">Hindu-Maratha</option>
   <option selected="" value="NA">Does Not Matter</option>
 </select>
 <br>
 <label>Spouse's Complexion</label>
 <select name="spouseComplexion" id="spouseComplexion" class="form-control">
   <option value="light">Light</option>
   <option value="widow">Fair</option>
   <option value="separated">Brown</option>
   <option value="divorcee">Dark</option>
   <option selected="" value="NA">Does Not Matter</option>
 </select>
</div>
<div class="col-sm-4">
  <label>Spouse's Body Type</label>
  <select name="spouseBodyType" id="spouseBodyType" size="5" class="form-control" multiple>
   <option value="fit">Fit</option>
   <option value="slim">Slim</option>
   <option value="obese">Obese</option>
   <option value="overweight">Over-weight</option>
   <option selected="" value="NA">Does Not Matter</option>
 </select>
</div>
</div>
<div class="form-group row">
  <fieldset>
    <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Spouse Habbits</b></legend>
    <div class="col-sm-6">
      <label>Smoking</label>
      <select name="spouseSmoking" id="spouseSmoking" class="form-control">
       <option value="smoker">Smoker</option>
       <option value="non-smoker">Non-Smoker</option>
       <option selected="" value="NA">Does Not Matter</option>
     </select>
   </div>
   <div class="col-sm-6">
    <label>Alcohol</label>
    <select name="spouseAlcohol" id="spouseAlcohol" class="form-control">
     <option value="alcoholic">Alcoholic</option>
     <option value="non-alcoholic">Non-Alcoholic</option>
     <option selected="" value="NA">Does Not Matter</option>
   </select>
 </div>
</fieldset>
</div>
<div class="form-group row">
 <div class="col-sm-12">
  <label>Any Other Expectations </label>
  <!--<input id="txt_s_exp" class="form-control" type="textarea" name="txt_s_exp">-->
  <textarea id="txt_s_exp" name="txt_s_exp" class="form-control" rows="2"  style="text-align:left;">
  </textarea> 
</div>
</div>
</div>


<!-- End of Expectation from Spouse -->

<div class="registration">
  <h5 class="heading">Physical Attributes</h5>
  <div class="form-group row">
    <div class="col-sm-6">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>Height in cm</label>   
      <input id="txtHeight1" class="form-control" type="text" name="txtHeight1" required>
    </div>
    <div class="col-sm-6">
      <label><b><font color="red">*&nbsp;&nbsp;</font></b>Weight in Kg</label>
      <select id="txtWeight" class="form-control" name="txtWeight" required onfocusin="isHeightValid()">
        <option value="0">- Select -</option>
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
        <option value="58 kg" selected="selected">58 kg</option>
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
        <option selected="" value="">- Select -</option>
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
        <option selected="" value="">- Select -</option>
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
    <label>Physical Status *</label>
    <div class="radio radio-inline">
      <input type="radio" onClick="return hidediv();" value="No" checked="checked"  id="Pno" name="txtphysicalsts">
      <label for="Pno" class="malelable">Normal</label>
    </div>
    <div class="radio radio-inline">  
      <input type="radio" onClick="return dispdiv();" value="Yes" id="Pyes" name="txtphysicalsts">
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
        <option value="">Select</option>
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
      <input type="radio" value="Slim" name="txtBody" id="Bno" required>
      <label for="Bno" class="malelable">Slim</label>
    </div>
    <div class="radio radio-inline">  
      <input type="radio" value="Average" checked="checked" name="txtBody" id="Byes" required>
      <label for="Byes" class="">Average</label>
    </div>
    <div class="radio radio-inline">
      <input type="radio" value="Athletic" name="txtBody" id="Bdo_not_know" required>
      <label for="Bdo_not_know" class="">Athletic</label>
    </div>
    <div class="radio radio-inline">  
      <input type="radio" value="Heavy" name="txtBody" id="Bnot_applicable" required>
      <label for="Bnot_applicable" class="">Heavy</label>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-4">
      <label>Diet</label>  
      <select id="txtDiet" class="form-control" name="txtDiet">
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
        <input type="radio" value="No"  checked="checked" name="txtSmoke" id="Sno" required>
        <label for="Sno" class="malelable">No</label>
      </div>
      <div class="radio radio-inline">  
        <input type="radio"  value="Yes" name="txtSmoke" id="Syes" required>
        <label for="Syes" class="">Yes</label>
      </div>
    </div>

    <div class="col-sm-4">
     <label><b><font color="red">*&nbsp;&nbsp;</font></b>Drink :</label> 
     <div class="radio radio-inline">
      <input type="radio"value="No" checked="checked" name="txtDrink" id="Dno" required>
      <label for="Dno" class="malelable">No</label>
    </div>
    <div class="radio radio-inline">
      <input type="radio" value="Yes" name="txtDrink" id="Dyes" required>
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
 <input type="reset" value="Reset" class="btn btnpink loginbtn btn-lg" style="background : #ff6600">
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