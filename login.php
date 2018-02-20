<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Login page</title>
  <style>
  @import url("/sitewide.css");
	div.login{
		border:solid;
		background-color:#B575A5;
		padding:20px;
		display:block;
		margin:0px 100px;
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
  <li><a href="/index.php">Home</a></li>
  <li><a href="/Books.php">Books</a></li>
  <li><a href="/cds.php">CDs</a></li>
  <li><a href="/games.php" >Games</a></li>
  <li><a href="/dvds.php">DvDs</a></li>
  <li style="#float:right;" class="active"><a href="#login">Login</a></li>
</ul>

<div style="padding:20px;margin-top:50px;text-align:center;">

	<h1 class="title">Log on Page</h1>
    	
   
</div>

<div class="login" style="text-align:center;float:center;text-align:center;">
	
	<form>
	<h1>Username</h1>
	<input class="loginform" type="text" name="User" value="">
	<br>
	<h1>Password</h1>
	<input class="loginform" type="text" name="Pass" value="">
	<br>
	 <input type="submit" value="Log on" style="margin-top:10px;">
    
	</form>
</div>


<?php
##LOGIN CODE
?>




</body>
</html>
