<!DOCTYPE html>

<?php
$item_code = $_GET[ 'item' ];


# Connect to a database and access a table

$dbname = 'ah17451'; # Change to your username
$dbuser = 'ah17451';
$dbpass = 'obscure';
$dbhost = 'localhost';

$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
or die( "Unable to Connect to '$dbhost'" );

mysqli_select_db( $link, $dbname )
or die("Could not open the db '$dbname'");

$test_query = "select * from inventory where item_code='$item_code'";
$result = mysqli_query( $link, $test_query );

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	$name = $row['item_name'];
	$author = $row['item_author'];
	$desc = $row['item_description'];
	$imgurl = 'img/'.$row['item_image_loc'];
	$price = $row['item_price'];
	$stock = $row['item_stock_count'];
	
	$buyurl= "item.php?item=". $item_code;
}

mysqli_free_result( $result );
mysqli_close( $link );
?>


<html>
<head>
  <meta charset="UTF-8" />
  <title>Buy <?php echo $name;?> </title>
  <style>
  @import url("sitewide.css");
	div.basic{
		border:solid;
		background-color:#B575A5;
		margin:100px;
		display:block;
		text-align:center;
		
		
	}

 .main_img{
	 
	 height:300px;
 }
  
  </style>
  
</head>
<body>



<?php include ( "menu.php"); ?>

<?php include ( "sidemenu.php"); ?>

<?php $login_bool = require( "checklogin.php"); ?>


<?php


$item_code = $_GET[ 'item' ];


# Connect to a database and access a table

$dbname = 'ah17451'; # Change to your username
$dbuser = 'ah17451';
$dbpass = 'obscure';
$dbhost = 'localhost';

$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
or die( "Unable to Connect to '$dbhost'" );

mysqli_select_db( $link, $dbname )
or die("Could not open the db '$dbname'");

$test_query = "select * from inventory where item_code='$item_code'";
$result = mysqli_query( $link, $test_query );

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	$name = $row['item_name'];
	$author = $row['item_author'];
	$desc = $row['item_description'];
	$imgurl = 'img/'.$row['item_image_loc'];
	$price = $row['item_price'];
	$stock = $row['item_stock_count'];
	
	$buyurl= "item.php?item=". $item_code;
}

mysqli_free_result( $result );
mysqli_close( $link );
?>




<div class="title">

	<h1 class="title"></h1>
    	
   
</div>




<div class="basic">




<h1 class="title"><?php echo $name?> </h1>
<p><img class="main_img" src="<?php echo $imgurl?>"></p>
<p><?php echo $author?> </p>
<br>
<p><?php echo $desc?> </p>


<h3 align-self="right" class="title" > 

<?php

if ($stock >0){
	
	if ($login_bool=="1"){
		echo "<a href=Buy.php?item=$item_code>Buy for £";
		echo $price ;
		echo "</a>";
	}
	else{
		echo "<a href=login.php?item=$item_code>Log in and Buy for £";
		echo $price ;
		echo "</a>";
		
	}
}
else{
	
	echo "Not in stock :(";
	
	
}

 ?>
 </h3>

 <p>
<?php echo $stock; ?> left!
</p>



</div>



</body>
</html>
