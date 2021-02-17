<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script_photo.js"></script>
</head>
<body>
    <main id="main1">
        <div class="main">
            <div class="container">
                <div class="row" style="font-size:20px;">
                    <div class="col-sm-12">
                        <section id="applicant" class="applicant">                            
                            <h2 align="center">Upload Your Photo. </h2>
                            <h1 style="color:green; text-align:center;"><font color="red" size="20px">*</font>Follow the proper file name to upload Photo<font color="red" size="20px">(name_surname.jpg)</font></h1>
                            <hr>
                            <form action="" id="vacancy_reg" method="post">            
                                <table border="1" cellpadding="5" cellspacing="0" align="center">
                                <tr><td colspan="2">
                                    <div id="drop-box"><p>Select jpg File <font color="red" size="20px">(name_surname.jpg)</font></p></div>
                                    <br>
                                    <button type="button" class="btn btn-primary"><input type="file" name="upl" id="upl" /></button>
                                    </td>
                                </tr>                            
                                </table>                            
                            </form>
                        </section>
                    </div>
                </div>
            </div>  <!-- End of <div class="container"> -->
        </div>  <!-- End of <div class="main"> -->
    </main>
</body>