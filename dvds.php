<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Movies page</title>
  <style>
  @import url("sitewide.css");
  

  
  body {
	  margin:0;
	background-color:#703C63;
  
  }



ul.sidemenu {
    list-style-type: none;
    margin: 0;
    padding-top: 15px;
    width: 20px;
    background-color: #f1f1f1;
	height:100%;
	position: fixed;
}




div.sidemenu{
	#display: block;
    color: #000;	
    #padding: 8px 16px;
    text-decoration: none;
	width:20;
	width:30px;
	height:25%;
	
	
}



li.menuside {
	padding-top:20px;
    display: block;
    color: #000;
    padding: 8px 16px;
    text-align: left;
    #padding: 14px 16px;
    text-decoration: none;
	margin:0px;
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

<div style="margin:0px;">
<ul class="sidemenu">
  <li class="sidemenu"><div class="sidemenu" style="background-color:#56d9ec;"><a href="#home">A</a></div></li>
  <li class="sidemenu"><div class="sidemenu"><a href="#news">B</a></li>
  <li class="sidemenu"><div class="sidemenu"><a href="#contact">C</a></li>
 
</ul>
</div>


<div style="padding:20px;margin-top:50px;text-align:center;">

	<h1 class="title">Welcome to the Films section</h1>
    	
   
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

$test_query = "select * from inventory where item_group=1004";
$result = mysqli_query( $link, $test_query );

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
	$url= "item.php?item=". $row['item_code'];
	#echo $url;
	
	$imgaddress="img/" . $row['item_image_loc'];
	#echo $imgaddress;
	
	echo '<div class="item">';
	echo "<a href='$url'>";
	
	
 
	echo "<img class='itemimg'  src=$imgaddress align='left'>";
	echo "<h3>",$row[ 'item_name' ], '</h3>';
	echo $row[ 'item_author' ], ' <br></a><div align="right" class="price"><b>£', $row[ 'item_price' ],'</b></div>',"<br />\n";
	echo '</div>';
}

mysqli_free_result( $result );
mysqli_close( $link );
?>




</body>
</html>
