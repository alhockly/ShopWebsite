<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Home</title>
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

	<h1 class="title">Welcome to the shopping website</h1>
    	
   
</div>

</p> Editor's Picks</p>
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

$x=0;
while($x<4){
$randnum=rand(10,24);


$query = "select * from inventory where item_code=AA01-0".$randnum;

echo $query."<br>";

$result = mysqli_query( $link, $query );

echo $result['item_name'];


$x= $x+1;
}



while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
	$url= "item.php?item=". $row['item_code'];
	echo $url;

	
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
