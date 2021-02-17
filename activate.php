<?php
 session_start();
include 'mysqls/connect_db.php';
 if(isset($_GET['token'])){
 	$token = $_GET['token'];
 	$updatequery = " update register set verified='yes' where token = '$token' ";
 	$query = mysqli_query($conn, $updatequery);
 	if($query){
 		if(isset($_SESSION['msg'])){
 			$_SESSION['msg'] = "Account activated.";
 			header('location:login.php');
 		}
 		else{
 			$_SESSION['msg'] = "There is some error. Please try again or contact administrator.";
 			header('location:login.php');
 		}
 	}else{
 		$_SESSION['msg'] = "Unable to update account.";
 		header('location:registration_process.php');
 	}
 }
?>