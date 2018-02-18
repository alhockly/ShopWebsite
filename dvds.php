<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Movies page</title>
  <style>
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
  <li><a href="/index.php">Home</a></li>
  <li><a href="/Books.php">Books</a></li>
  <li><a href="/cds.php">CDs</a></li>
  <li><a href="/games.php">Games</a></li>
  <li><a class="active">DvDs</a></li>
  <li style="#float:right;"><a href="/login">Login</a></li>
</ul>

<div style="padding:20px;margin-top:50px;text-align:center;">

	<h1>Welcome to the Films section</h1>
    	
   
</div>


<?php
# Connect to a database and access a table

$dbname = 'ah17451'; # Change to your username
$dbuser = 'root';
$dbpass = 'alex';
$dbhost = 'localhost';

$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
or die( "Unable to Connect to '$dbhost'" );

mysqli_select_db( $link, $dbname )
or die("Could not open the db '$dbname'");

$test_query = "select * from inventory where item_group=1004";
$result = mysqli_query( $link, $test_query );

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
	$url= "/item.php?item=". $row['item_code'];
	#echo $url;
	
	$imgaddress="/img/" . $row['item_image_loc'];
	#echo $imgaddress;
	
	echo '<div class="item">';
	echo "<a href='$url'>";
	
	
 
	echo "<img class='itemimg'  src=$imgaddress align='left'>";
	echo "<h3>",$row[ 'item_name' ], '</h3>';
	echo $row[ 'item_author' ], ' <br><div align="right">£', $row[ 'item_price' ],'</div>',"<br />\n";
	echo "</a>";
	echo '</div>';
}

mysqli_free_result( $result );
mysqli_close( $link );
?>




</body>
</html>