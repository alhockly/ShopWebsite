<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Book page</title>
  <style>
  @import url("sitewide.css");
	div.item{
		border:solid;
		background-color:#B575A5;
		padding:20px;
		display:block;
		margin:10px;
		height:100px;
	}
  
  body {
	  margin:0;
	background-color:#703C63;
  
  }

ul {
    list-style-type: none;
    margin: 0;
    padding: 15;
	padding-right:13;
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
	align-self:center;
	
}

li {
   float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #BCBCBC;
}

.active {
    background-color: #703C63;
}
  
 .itemimg{
	 height:100%;
	
	 padding-right: 20px;
	 
 }
  
  </style>
  
</head>
<body>



<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="Books.php">Books</a></li>
  <li><a href="cds.php">CDs</a></li>
  <li><a href="games.php">Games</a></li>
  <li><a href="dvds.php">DvDs</a></li>
  <li style="#float:right;"><a href="/login.php">Login</a></li>
</ul>

<div style="padding:20px;margin-top:50px;text-align:center;">

    	
   



	<p class="title"> Buying

	<?php
		$item_code = $_GET[ 'item' ];
		echo $item_code;
	
	session_start(); 
	
	
	
	
	if ($_SESSION[ 'User' ]!=''){
		
		echo "loggined in";
		echo $_SESSION['User'];
		
	}
	
	else{
		
		$link = 'Location:login.php?item='.$item;
		
		#header($link);
		
		
	}
	

	
	
	
		
	##if session > process payment with session account info
	
	
	
	
	
	# Connect to a database and access a table

	$dbname = 'ah17451'; # Change to your username
	$dbuser = 'root';
	$dbpass = 'alex';
	$dbhost = 'localhost';

	$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
	or die( "Unable to Connect to '$dbhost'" );

	mysqli_select_db( $link, $dbname )
	or die("Could not open the db '$dbname'");

	$test_query = "select * from inventory where item_code=".$item_code;
	$result = mysqli_query( $link, $test_query );

	while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
	{
		
		
	}

	mysqli_free_result( $result );
	mysqli_close( $link );
	?>

	</p>
</div>

</body>
</html>
