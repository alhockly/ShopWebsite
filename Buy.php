<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Buy page</title>
  <style>
  @import url("sitewide.css");

  </style>
  
</head>
<body>



<?php include ( "menu.php"); ?>

<?php include ( "sidemenu.php"); ?>

<div class="title">

    	
   



	

	<?php
		$item_code = $_GET[ 'item' ];
		#echo $item_code;
	
		$buy_url = "confirmedbuy.php?item=".$item_code;
	
		$login_bool = require( "checklogin.php"); 

	

		if ($login_bool=="1"){
			
				# Connect to a database and access a table

				$dbname = 'ah17451'; # Change to your username
				$dbuser = 'ah17451';
				$dbpass = 'obscure';
				$dbhost = 'localhost';

				$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
				or die( "Unable to Connect to '$dbhost'" );

				mysqli_select_db( $link, $dbname )
				or die("Could not open the db '$dbname'");
			
			
				
				$query = "select * from inventory where item_code='$item_code'";
				$result = mysqli_query( $link, $query );

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
				
				if($stock <=0){
					header ("location: item.php?item=".$item_code);
				}
			
				mysqli_free_result( $result );
				mysqli_close( $link );
		}
	
		else{
			
			$link = 'Location:login.php?item='.$item_code;
		
			header($link);
			
		}

	
	



	?>

	<p class="title"> Buying <?php echo $name." for £".$price; ?></p>
	
	<p>Enter promo code:</p>
	
	<form action="confirmedbuy.php">
	<input type="text" name="promo" value="" >
	
	<input type="hidden" name="item" value="<?php echo $item_code;?>">
	<br>
		<input type="submit" value="Complete Purchase" style="margin-top:10px;">
	</form>
	
	
	
	
	
	
</div>

</body>
</html>
