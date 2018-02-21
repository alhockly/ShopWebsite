<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Login page</title>
  <style>
  @import url("sitewide.css");
	div.login{
		border:solid;
		background-color:#B575A5;
		padding:20px;
		display:block;
		margin:0px 500px;
		height:20%;
	}
.loginform{
	
	align:left;
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
  <li><a href="index.php">Home</a></li>
  <li><a href="Books.php">Books</a></li>
  <li><a href="cds.php">CDs</a></li>
  <li><a href="games.php" >Games</a></li>
  <li><a href="dvds.php">DvDs</a></li>
  <li style="#float:right;" class="active"><a href="#login">Login</a></li>
</ul>

<div style="padding:20px;margin-top:50px;text-align:center;">

	<h1 class="title">Log on Page</h1>
    	
   
</div>



<div class="login" style="text-align:center;float:center;text-align:center;">
<div style="center;">	
	<form>
	<h1 >User</h1>
	<br>
	<input class="loginform" type="text" name="User" value="">
	<br>
	<h1 >Pass</h1>
	<input class="loginform" type="text" name="Pass" value="">
	<br>
	 <input type="submit" value="Log on" style="margin-top:10px;">
    
	</form>
	
</div>


<?php



$item =  $_GET['item'];
echo $item;


session_start();
$_SESSION = array();
session_destroy(); 

if ( isset( $_GET[ 'User' ] ) && isset( $_GET[ 'Pass' ] ) )
{
 $User = $_GET[ 'User' ];
 echo $User;
 $Pass = $_GET[ 'Pass' ];
 $dbname = 'ah17451'; # Change to your User
 $dbuser = 'root';
 $dbpass = 'alex';
 $dbhost = 'localhost';
 $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
 or die( "Unable to Connect to '$dbhost'" );
 mysqli_select_db( $link, $dbname )
 or die("Could not open the db '$dbname'");

 $Pass_query = "select * from customer where firstname = '" .
 $User . "' and passwd = MD5( '" . $Pass . "' )";
 $result = mysqli_query( $link, $Pass_query );
 
if ( mysqli_num_rows( $result ) == 1 ) # Number of result rows
 {
	echo "success";
 session_start();
 $_SESSION[ 'User' ] = $User;
 
 header( 'Location: buy.php?item='.$item );
 exit();
 }
 else
 {
 echo '<p>Login failed. Please try again.</p>', "\n";
 echo '<p>Number of result rows is ', mysqli_num_rows( $result ),
 '</p>';
 }
}
?> 


</div>


<?php
##LOGIN CODE
?>




</body>
</html>
