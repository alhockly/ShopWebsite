<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Search</title>
  <style>
  @import url("sitewide.css");

  
  </style>
  
</head>
<body>


<?php include ( "menu.php"); ?>

<?php include ( "sidemenu.php"); ?>
 
<div class="title">

	<h1 class="title">Search</h1> 

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

$search_term = $_GET[ 'search' ];

$clean_search_term = mysqli_real_escape_string ($link , $_GET[ 'search' ] );

$search_query = "select * from inventory where item_description LIKE \"%".$clean_search_term."%\" OR item_name LIKE \"%".$clean_search_term."%\"";


$result = mysqli_query( $link, $search_query );
$numresults = mysqli_num_rows( $result );

if ($numresults==1){
	echo "<p>".$numresults." result for \"".$clean_search_term."\" in description and title</p>";
}
else{
	echo "<p>".$numresults." results for \"".$clean_search_term."\" in description and title</p>";
}


while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
	$url= "item.php?item=". $row['item_code'];
	$imgaddress="img/" . $row['item_image_loc'];
	
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
</div>







</body>
</html>