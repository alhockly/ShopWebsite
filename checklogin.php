<?php
	
	error_reporting(0);

	session_start(); 
	
	
	if ($_SESSION[ 'User' ]!=''){
		
		#echo "logged  in as ";
		#echo $_SESSION['User'];
		return "1";
	}
	
	else{
		#echo "logged out ";
		
		return "0";
		$link = 'Location:login.php?item='.$item_code;
		
	
		#header($link);
		
		
	}











?>