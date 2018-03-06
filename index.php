<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Home</title>
  <style>
  @import url("sitewide.css");

  
  .img{
	  
	  height:30%;
	  
  }
  
  </style>
  
</head>
<body>


<?php include ( "menu.php"); ?>

<?php include ( "sidemenu.php"); ?>
 

<div class="title">

	<h1 class="title">Welcome to the Shopping website</h1>
    	
   
</div>

<h2 style="padding-left:100px;"> Editor's Picks<br></h2>


<div class="index_itemholder">

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

$a=array();

$x=0;
while($x<8){
		
$randnum=rand(1,24);

while (True){
	if (in_array($randnum,$a)){
		$randnum = rand(1,24);
	}
	else{
		break;
	}
}
array_push($a,$randnum);

if ($randnum<10){
	$query = "select * from inventory where item_code=\"AA01-00".$randnum.'"';
}
else{
	$query = "select * from inventory where item_code=\"AA01-0".$randnum.'"';
}


$result = mysqli_query( $link, $query );

	$row = mysqli_fetch_array($result);
	$name = $row['item_name'];
	$imgaddress="img/" . $row['item_image_loc'];
	$itemurl="item.php?item=".$row['item_code'];
	
	echo "<div class=\"homeitem\">";
	echo "<a href=\"".$itemurl."\">";
	echo "<h2 style=\"text-align: center;\">".$name."</h2>";
	echo "<img src=\"".$imgaddress."\" style=\"width:100%;\">";
	echo "</a>";
	echo "</div>";

$x= $x+1;
}

mysqli_free_result( $result );
mysqli_close( $link );
?>
</div>


<div style="margin-left:60px;">
<a href="reset.php">Reset DB</a>

</div>


</body>
</html>