<?php


session_start();

$user= $_SESSION['User'];
$name= $_SESSION['name'];
$item_code = $_GET[ 'item' ];
$promo = $_GET[ 'promo' ];


if  ($name=="Manager"){
	echo "<script>alert(\"Managers cannot place an order!\")</script>";
	echo "<a href=\"index.php\">back to home</a>";
	EXIT();
}

 $dbname = 'ah17451'; # Change to your username
 $dbuser = 'ah17451';
 $dbpass = 'obscure';
 $dbhost = 'localhost';
 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
 or die( "Unable to Connect to '$dbhost'" );
 mysqli_select_db( $link, $dbname )
 or die("Could not open the db '$dbname'");

 
 ######## get quantity left
$test_query = "select item_stock_count from inventory where item_code=\"".$item_code."\"";
#echo $test_query;
$result = mysqli_query( $link, $test_query );
$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );

$stock = $row['item_stock_count'];
echo "<p>stock left ".$stock."</p>";
if ($stock <1){
	header ("location: item.php?item=".$item_code);
	exit();
	
}


######
 
 
 
 $discount=1;
###query database to see if promocode is legit/ calc new discount multiplier

$test_query = "select * from promotion_code where code=\"".$promo."\"";
$result = mysqli_query( $link, $test_query );
if ( mysqli_num_rows( $result ) == 1 ){				####if there is at least 1 match

		echo "promo found - ";
		$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
		echo $row['discount']."% off<br>";
		$discount = 1 - ($row['discount']/100);
		#echo "<br>".$discount;
		
}

#########################################



####get price
$test_query = "select item_price from inventory where item_code=\"".$item_code."\"";
#echo $test_query;
$result = mysqli_query( $link, $test_query );
$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );

$price = $row['item_price'];
$price = $price*$discount;
######

if($discount!=1){

echo "Price after discount - £".$price."<br><br>";
}
else{
	echo "price - £".$price."<br><br>";
	
}


echo "<p>Green indicates SQL success, Red indicates failure</p>";


###UPDATE STOCK COUNT

$update_stock = "UPDATE inventory SET item_stock_count=item_stock_count-1 WHERE item_code=\"".$item_code."\";";

$result = mysqli_query( $link, $update_stock );
if ($result){
	echo "<p style=\"color:green;\">".$update_stock."</p>";
}
else{
	echo "<p style=\"color:red;\">".$$update_stock."</p>";
	
}


##MAKE customer_order

$date_now = date("Y/m/d");

$shipdate = date('Y/m/d', strtotime("+3 days"));


$make_customer_order = "INSERT INTO customer_order (order_date,delivered,shipping_date,customer_number) VALUES (now(), FALSE, adddate(now(), interval 3 day),".$user.");";

$result = mysqli_query( $link, $make_customer_order );

if ($result){
	echo "<p style=\"color:green;\">".$make_customer_order."</p>";
}
else{
	echo "<p style=\"color:red;\">".$make_customer_order."</p>";
	
}



#####



#GET CUSTOMER_ORDER order_number
$get_latest_order_num = "Select max(order_number) from customer_order;";


$result = mysqli_query( $link, $get_latest_order_num );
$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );

if ($result){
	echo "<p style=\"color:green;\">".$get_latest_order_num."</p>";
	
}
else{
	echo "<p style=\"color:red;\">".$get_latest_order_num."</p>";
	
}


###

######Make order_item row
$make_order_item = "INSERT INTO order_item VALUES (\"".$item_code."\", ".$price.", ".$row['max(order_number)']." ,1);";

$result = mysqli_query( $link, $make_order_item );

if ($result){
	echo "<p style=\"color:green;\">".$make_order_item."</p>";
	
}
else{
	echo "<p style=\"color:red;\">".$make_order_item."</p>";
	
}

########
 



#header("location: receipt.php?item=".$item_code."&price=".$price);




echo "<br><a href=\"item.php?item=";
echo $item_code."\">back to item</a>";

echo "<br><a href=\"receipt.php?item=";
echo $item_code."&price=".$price;
echo "\">Go to receipt</a>";


?>