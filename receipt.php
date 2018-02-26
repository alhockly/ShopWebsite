<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Receipt</title>
  <style>
  @import url("sitewide.css");

  
  </style>
  
</head>
<body>



<?php include ( "menu.php"); ?>
<?php include ( "sidemenu.php"); ?>
<?php
	$item = $_GET[ 'item' ];
	$price = $_GET['price'];
		
?>

<div class="title">

    	
 

	<p class="title">
		<?php echo "Congrats!<br>You spent £".$price." on ".$item;?>
	</p>
	
	<p class="title"><a href="index.php">Back to home</a></p>
	
	
	
	
</div>

</body>
</html>
