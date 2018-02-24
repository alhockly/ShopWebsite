<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Home</title>
  <style>
  @import url("sitewide.css");

	

  
  body {
	  margin:0;
	background-color:#703C63;
  
  }


  
 .itemimg{
	 height:100%;
	
	 padding-right: 20px;
	 
 }
  
  
  .img{
	  
	  height:30%;
	  
  }
  
  </style>
  
</head>
<body>


<?php include ( "menu.php"); ?>


 

<div style="padding:20px;margin-top:50px;text-align:center;">

	<h1 class="title">Welcome to the shopping website</h1>
    	
   
</div>

<h2> Editor's Picks<br></h2>
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


#echo $query."<br>";

$result = mysqli_query( $link, $query );

	$row = mysqli_fetch_array($result);
	$name = $row['item_name'];
	$imgaddress="img/" . $row['item_image_loc'];
	
	
	echo "<div class=\"homeitem\">";
	#echo $query."<br>";
	echo "<h2 style=\"text-align: center;\">".$name."</h2>";
	echo "<img src=\"".$imgaddress."\" style=\"width:100%;\">";
	echo "</div>";

$x= $x+1;
}




mysqli_free_result( $result );
mysqli_close( $link );
?>


<?php
	echo var_dump($a);
?>

</body>
</html>
