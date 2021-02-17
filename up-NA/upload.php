<?php
	if(isset($_POST) == true){
		$errors= array();
		$file_name = $_FILES['upfile']['name'];
		
	    $file_size =$_FILES['upfile']['size'];
	    $file_tmp =$_FILES['upfile']['tmp_name'];
	    $file_type=$_FILES['upfile']['type'];   
	    $file_ext=strtolower(end(explode('.',$_FILES['upfile']['name'])));
	    $extensions = array("jpeg","jpg"); 		
	    if(in_array($file_ext,$extensions )=== false){
	    	$errors[]="extension not allowed, please choose a JPG, JPEG file.";
	    }
	    if($file_size > 1048576){
	    	$errors[]='File size grater than 1 MB';
	    }				
	    if(empty($errors)==true){
			/*$new="10.jpg";
			rename($file_name,$new);			
			move_uploaded_file($file_tmp,"upload_files/pic/".$new);*/
	    	//move_uploaded_file($file_tmp,"upload_files/pic/".$file_name);
			move_uploaded_file($file_tmp,"upload_files/pic/".date("jmyhis-").$file_name);//ddmmyyhhmmss
	    }else{
	        $myfile = fopen("log.txt", "w") or die("Unable to open file!");
			$txt = implode("\n", $errors);
			fwrite($myfile, $txt);
			fclose($myfile);
	    }
	}
?>
