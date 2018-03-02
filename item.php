<!DOCTYPE html>

<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$user= $_SESSION['User'];
$name= $_SESSION['name'];


$item_code = $_GET[ 'item' ];
if(isset($rating)){
$rating = $_GET[ 'rating' ];
}
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
		margin-top:0px;
		display:block;
		text-align:center;
		border-radius: 5px;
		
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






<div class="title">

	<h1 class="title"></h1>
    	
   
</div>




<div class="basic">




<h1 class="title"><?php echo $name?> </h1>
<p><img class="main_img" src="<?php echo $imgurl?>"></p>
<p><?php echo $author?> </p>

<p><?php echo $desc?> </p>






<?php		

	mysqli_free_result( $result );
	if($login_bool && $_SESSION['name']!="Manager"){			//if logged in AND not manager
		
		//check if user has left a review for this item already
		$check_for_review = "select * from review where customer_number=".$user." AND item_code=\"".$item_code."\";";
		//echo $check_for_review."<br>";
		$result = mysqli_query( $link, $check_for_review );
		
		
		$row = mysqli_fetch_array($result);
	

		if ( mysqli_num_rows($result) == 1  ){		//if there is a review for this user and item
		
		
			echo "<p>Thanks for the review of ".$row['rating']." Stars</p>";
		}
		else{
		
		
			echo "<p>Leave a rating:</p>";
			echo "<form action=\"submitreview.php\"> ";
			echo "<input type=\"hidden\" name=\"item\" value=\"".$item_code."\">";
			echo "<input type=\"radio\" name=\"rating\" value=\"1\">";
			echo "<input type=\"radio\" name=\"rating\" value=\"2\">";
			echo "<input type=\"radio\" name=\"rating\" value=\"3\">";
			echo "<input type=\"radio\" name=\"rating\" value=\"4\">";
			echo "<input type=\"radio\" name=\"rating\" value=\"5\">";
			echo "<input type=\"submit\"  value=\"Rate\">";
			echo"</form>";
		}
		
	}
	

?>

<?php
mysqli_free_result( $result );
mysqli_close( $link );
?>





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


