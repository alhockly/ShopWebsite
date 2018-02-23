
  <style>
  @import url("sitewide.css");
  

  
</style>
<?php

$login_bool = include("checklogin.php");


echo "<ul class=\"menu\">";

echo "<li><a href=\"index.php\">Home</a></li>";

echo "<li><a href=\"books.php\">Books</a></li>";

echo "<li><a href=\"cds.php\">CDs</a></li>";

echo "<li><a href=\"games.php\">Games</a></li>";

echo "<li><a href=\"dvds.php\">DVDs</a></li>";

if ($login_bool=="1"){
	
	session_start(); 
		echo "<li class=\"name\">".$_SESSION['name']."</li>";
	# echo $_SESSION['User'];
	
}


##Login 
echo "<li style=\"float:right;padding-right:50px; ";

   if ($login_bool=="1"){
	   echo "background-color: #f3903f;"; 
   }
 
echo "\"><a href=\"login.php\">";

	 if ($login_bool=="1"){
	   echo "log out"; 
   }
	else{
		echo "log in";
		
	}

echo "</a></li>";

echo "</ul>";



?>