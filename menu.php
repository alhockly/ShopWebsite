
  <style>
  @import url("sitewide.css");
  

  
</style>
<?php

$login_bool = include("checklogin.php");


echo "<ul class=\"menu\">";

echo "<li class=\"menu\"><a href=\"index.php\">Home</a></li>";

echo "<li class=\"menu\"><a href=\"books.php\">Books</a></li>";

echo "<li class=\"menu\"><a href=\"cds.php\">CDs</a></li>";

echo "<li class=\"menu\"><a href=\"games.php\">Games</a></li>";

echo "<li class=\"menu\"><a href=\"dvds.php\">DVDs</a></li>";

if ($login_bool=="1"){
	
	session_start(); 
		if($_SESSION['name']=="Manager")
		{
			echo "<li class=\"name\" style=\"background-color: #55ed0d;\">".$_SESSION['name']."</li>";
			
			echo "<li class=\"menu\" style=\"background-color: #55ed0d;\"><a href=\"stats.php\">Stats for managers</a></li>";
			
		}
		else{
			echo "<li class=\"name\" style=\"background-color: #b50061;\">Hi, ".$_SESSION['name']."</li>";
		
		}
	
}

echo "<li><form action=\"search.php\"><input type=\"text\" name=\"search\" value=\"\"></form></li>";


##Login 
echo "<li class=\"menu\" style=\"float:right;padding-right:50px; ";

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