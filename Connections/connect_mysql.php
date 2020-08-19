<?
	$host="localhost";
	$user="root";
	$pw="root";
	
	$dbname="test";
	
	$c=mysql_connect($host,$user,$pw); //เชื่อมตอ
	mysql_select_db($dbname,$c); //เลือกติดต่อกับฐานข้อมูลที่กำหนด
	mysql_query("set names tis620"); //เชื่อมต่อไปเป็นภาษาไทย
 	if(!$c){
		echo"<h3>Can't connect database!</h3>";
		exit();
	}
 ?>
