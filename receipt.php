<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Buy page</title>
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



<?php include ( "menu.php"); ?>
<?php
	$item = $_GET[ 'item' ];
	$price = $_GET['price'];
		
?>

<div style="padding:20px;margin-top:50px;text-align:center;">

    	
   



	



	<p>
		<?php echo "Congrats!<br>You spent £".$price." on ".$item;?>
	</p>
	
	<p><a href="index.php">Back to home</a></p>
	
	
	
	
</div>

</body>
</html>
