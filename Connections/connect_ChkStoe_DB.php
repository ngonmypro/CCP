﻿<?
//$servername = 'MT_PROGRAM_01'; //\SQLEXPRESS'; //​กำ​หนดชื่อ​ server
//$user = 'sa'; //​กำ​หนดชื่อ​ user name ​ที่​จะ​ connect database
//$pass = 'yongdb'; //​กำ​หนด​ password ​ที่​จะ​ connect ​ไปที่​ database

$servername = '192.168.1.92'; // Server จริง
$user = 'sa'; // user จริง
$pass = 'yongdb'; //password จริง

$databasename = 'DB_Chkstore'; //​กำ​หนดชื่อ​ database ​บน​ Microsoft SQL

$conChkStore = "DRIVER={SQL Server};SERVER=$servername;DATABASE=$databasename;AutoTranslate=no"; 
//​เป็น​การกำ​หนด​ connection string ​ใน​การ​ connect ODBC
$cid2 = odbc_connect($conChkStore,$user, $pass) or die ("เชื่อม​ไม่​ได้");
if (!$cid2){
	echo "Can't connect SQL SERVER database!";
	exit();
	//$txtsql = "SELECT * FROM dbo.Officer WHERE Password='036780421580221'";	
	//$itemresult = odbc_exec($cid,$txtsql);
}else{
    //echo "เชื่อมต่อสำเร็จ...";	
}
?>