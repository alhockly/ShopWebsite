
  <style>
  @import url("sitewide.css");
  

  
</style>
<?php
$login_bool = include("checklogin.php");




echo "<ul class=";
echo "menu";

echo "> <li><a href=";

echo "index.php";

echo ">Home</a></li><li>";

echo"<a href=";
echo "books.php";

  
echo  ">Books</a></li><li><a href=";

echo "cds.php";
  
echo ">CDs</a></li><li><a href=";

echo "games.php";

echo ">Games</a></li><li><a href=";

echo "dvds.php";
echo ">DVDs</a></li>";

echo "<li";




   if ($login_bool=="1"){
	   echo " style='background-color: #f3903f';"; 
   }


 
echo "><a href=";
 
echo "login.php";


echo ">";

	 if ($login_bool=="1"){
	   echo "log out"; 
   }
	else{
		echo "log in";
		
	}

echo "</a></li></ul>";



?>