<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Music page</title>
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


  
 .itemimg{
	 height:100%;
	
	 padding-right: 20px;
	 
 }
  
  </style>
  
</head>
<body>

<?php include ( "menu.php"); ?>


<div style="padding:20px;margin-top:50px;text-align:center;">

	<h1 class="title">RESET PAGE</h1>
    	
   
</div>


<?php
# Connect to a database and access a table

$dbname = 'ah17451'; # Change to your username
$dbuser = 'ah17451';
$dbpass = 'obscure';
$dbhost = 'localhost';

$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
or die( "Unable to Connect to '$dbhost'" );

mysqli_select_db( $link, $dbname )
or die("Could not open the db '$dbname'");

$query = "select * from inventory where item_group=1002";
$result = mysqli_query( $link, $query );



mysqli_free_result( $result );
mysqli_close( $link );
?>




</body>
</html>
