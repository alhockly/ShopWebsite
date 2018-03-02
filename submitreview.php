<?php
session_start();

if (isset($_GET[ 'rating' ])){

	

	$user= $_SESSION['User'];

	 $dbname = 'ah17451'; # Change to your username
	 $dbuser = 'ah17451';
	 $dbpass = 'obscure';
	 $dbhost = 'localhost';
	 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
	 or die( "Unable to Connect to '$dbhost'" );
	 mysqli_select_db( $link, $dbname )
	 or die("Could not open the db '$dbname'");


	$rating = $_GET[ 'rating' ];
	$item_code = $_GET[ 'item' ];

	if (isset($rating)){
		
		$post_rating = "INSERT INTO review (customer_number,item_code,rating) VALUES (".$user.",\"".$item_code."\",".$rating.");";
	  
		$result = mysqli_query( $link, $post_rating );
		if($result){
			echo "posted rating";
			header("location:item.php?item=".$item_code);
		}
		else{
			
			echo "failed: or alrady exists ".$post_rating;
			
			header("location:item.php?item=".$item_code);
		}
	}

}
else{
header("location:item.php?item=".$item_code);

}


?>