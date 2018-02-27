<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Stats</title>
  <style>
  @import url("sitewide.css");
  
  table{
	  width:100%;
	  padding-left:80px;
  }
  h1{
	  
	  padding-left:80px;
  }
  
  </style>
  
</head>
<body>


<?php

session_start();

if($_SESSION['name']!="Manager"){
	
	header('Location: login.php');
	
}


?>

<?php include ( "menu.php"); ?>

<?php include ( "sidemenu.php"); ?>
 

<div class="title">

	<h1 class="title">Stats Page</h1>
    	
   
</div>

<?php

	$dbname = 'ah17451'; # Change to your username
	$dbuser = 'ah17451';
	$dbpass = 'obscure';
	$dbhost = 'localhost';

		$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
	or die( "Unable to Connect to '$dbhost'" );

	mysqli_select_db( $link, $dbname )
	or die("Could not open the db '$dbname'");

?>

<h1>Inventory</h1>
<table border="1" >
<tr><th>Code</th><th>Item</th><th>Author</th><th>Price</th><th>Stock count</th><th>Order count</th></tr>
<?php

$query = "select * from inventory";



$result = mysqli_query( $link, $query );

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'item_code' ], '</td>',
  '<td>', $row[ 'item_name' ], '</td>',
  '<td>', $row[ 'item_author' ], '</td>',
  '<td>', $row[ 'item_price' ], '</td>',
  '<td>', $row[ 'item_stock_count' ], '</td>',
  '<td>', $row[ 'item_order_count' ], '</td>';
  echo "</tr>\n";
	
}

echo "";
?>
</table>


<h1>Customers</h1>
<table border="1" >
<tr><th>ID</th><th>Title</th><th>First name</th><th>Surname</th><th>password</th></tr>
<?php

$query = "select * from customer";
$result = mysqli_query( $link, $query );
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'customer_number' ], '</td>',
  '<td>', $row[ 'title' ], '</td>',
  '<td>', $row[ 'firstname' ], '</td>',
  '<td>', $row[ 'surname' ], '</td>',
  '<td>', $row[ 'passwd' ], '</td>';
  
  echo "</tr>\n";
	
}

echo "";
?>
</table>

<h1>Customer Orders</h1>
<table border="1" >
<tr><th>Num</th><th>order date</th><th>delivered</th><th>shipping date</th><th>Customer num</th></tr>
<?php

$query = "select * from customer_order";
$result = mysqli_query( $link, $query );
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'order_number' ], '</td>',
  '<td>', $row[ 'order_date' ], '</td>',
  '<td>', $row[ 'delivered' ], '</td>',
  '<td>', $row[ 'shipping_date' ], '</td>',
  '<td>', $row[ 'customer_number' ], '</td>';
  
  echo "</tr>\n";
	
}

echo "";
?>
</table>

<h1>Order item</h1>
<table border="1" >
<tr><th>item code</th><th>Value</th><th>order number</th><th>quantity</th></tr>
<?php

$query = "select * from order_item ORDER BY order_number";
$result = mysqli_query( $link, $query );
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'item_code' ], '</td>',
  '<td>', $row[ 'value' ], '</td>',
  '<td>', $row[ 'order_number' ], '</td>',
  '<td>', $row[ 'quantity' ], '</td>';
  
  
  echo "</tr>\n";
	
}

echo "";
?>
</table>

<h1>Manager table</h1>
<table border="1" >
<tr><th>Num</th><th>first name</th><th>surname</th><th>Initials</th><th>password</th><th>pass phrase</th></tr>
<?php

$query = "select * from manager";
$result = mysqli_query( $link, $query );
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'manager_number' ], '</td>',
  '<td>', $row[ 'firstname' ], '</td>',
  '<td>', $row[ 'surname' ], '</td>',
  '<td>', $row[ 'initals' ], '</td>',
  '<td>', $row[ 'passwd' ], '</td>',
  '<td>', $row[ 'passphrase' ], '</td>';
  
  echo "</tr>\n";
	
}

echo "";
?>
</table>

<h1>Reviews</h1>
<table border="1" >
<tr><th>Num</th><th>customer num</th><th>item code</th><th>Rating</th></tr>
<?php

$query = "select * from review";
$result = mysqli_query( $link, $query );
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'review_number' ], '</td>',
  '<td>', $row[ 'customer_number' ], '</td>',
  '<td>', $row[ 'item_code' ], '</td>',
  '<td>', $row[ 'rating' ], '</td>';
  
  
  echo "</tr>\n";
	
}

echo "";
?>
</table>

<h1>Promotion Codes</h1>
<table border="1" >
<tr><th>Code</th><th>Discount</th></tr>
<?php

$query = "select * from promotion_code";
$result = mysqli_query( $link, $query );
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
	
echo "<tr>\n";
  echo '<td>', $row[ 'code' ], '</td>',
  '<td>', $row[ 'discount' ], '</td>';

  
  echo "</tr>\n";
	
}

echo "";
?>
</table>

<br><br>

<?php
	mysqli_free_result( $result );
	mysqli_close( $link );
?>
</body>
</html>
