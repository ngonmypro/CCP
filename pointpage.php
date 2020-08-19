<?
	$custcode = $_POST['custcode'];
	$schs = $_POST['schs'];

	include "Connections/connect_sqlserver.php"; //เปิดการเชื่อมต่อ sql 
	
	if($schs==1){
	   	$custcodes = $custcode; 	
	}elseif($schs==2){
		$sql2 = "SELECT * FROM emmember Where memberno ='{$custcode}'";
		$result2 = odbc_exec($cid,$sql2);
		if($result2){
			$cust2item = odbc_fetch_array($result2);
			$custcodet = $cust2item['CustCode'];	
		}
	   	$custcodes = $custcodet;
	}elseif($schs==3){
		$sql3 = "select * from emcust where conttel like '%{$custcode}%' order by xpostime desc ";
		$result3 = odbc_exec($cid,$sql3);
		if($result3){
			$cust3item = odbc_fetch_array($result3);
			$custcodet = $cust3item['CustCode'];	
		}  
		$custcodes = $custcodet;
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h3>ข้อมูลแต้มสะสม</h3>
<?
	
	//แต้มที่หมดอายุปีนี้
	$yearnow =  date("Y");
	$yearnow2 = $yearnow + 543;
	$dateendyear = $yearnow . "1231";
	$expireday = "31/12/{$yearnow2}";
	 //คำสั่ง sql
	 $sql = " select sum(GoodPoint) as gp from posmemberpoint ";
	 $sql .= " where custcode = '{$custcodes}' and Expiredate between '{$dateendyear}' and '{$dateendyear}' and goodsign = '1' ";
	 $result = odbc_exec($cid,$sql); //ส่งคำสั่งไป exceute
	 if($result){
		$gpitem = odbc_fetch_array($result); //เก็บผลลัพธ์ใน Recordset  1 record 
		$gp = $gpitem['gp'];
		$gp2 = number_format($gp,0);
		if($gp){
			echo "แต้มสะสม: <B>{$gp2}</B> คะแนน > หมดอายุ วันที่ : <b>{$expireday}</b> <br>";	
		}else{
			//
		}// if gp
	 }//if result
	 //แต้มที่หมดอายุปีหน้า
	 $yearnow_2 = $yearnow + 1;
	 $yearnow2_2 = $yearnow_2 + 543;
	 $dateendyear_2 = $yearnow_2 . "1231";
	 $expireday_2 = "31/12/{$yearnow2_2}";
	 //คำสั่ง sql
	 $sql = " select sum(GoodPoint) as gp from posmemberpoint ";
	 $sql .= " where custcode = '{$custcodes}' and Expiredate between '{$dateendyear_2}' and '{$dateendyear_2}' and goodsign = '1' ";
	 $result = odbc_exec($cid,$sql); //ส่งคำสั่งไป exceute
	 if($result){
		$gpitem = odbc_fetch_array($result); //เก็บผลลัพธ์ใน Recordset  1 record 
		$gp_2 = $gpitem['gp'];
		$gp2_2 = number_format($gp_2,0);
		if($gp_2){
			echo "แต้มสะสม: <B>{$gp2_2}</B> คะแนน > หมดอายุ วันที่ : <b>{$expireday_2}</b> <br>";	
		}else{
			//
		}// if gp
	 }//if result
 
     //แต้มที่หมดอายุ 2 ปีถัดไป
	 $yearnow_3 = $yearnow + 2;
	 $yearnow2_3 = $yearnow_3 + 543;
	 $dateendyear_3 = $yearnow_3 . "1231";
	 $expireday_3 = "31/12/{$yearnow2_3}";
	 //คำสั่ง sql
	 $sql = " select sum(GoodPoint) as gp from posmemberpoint ";
	 $sql .= " where custcode = '{$custcodes}' and Expiredate between '{$dateendyear_3}' and '{$dateendyear_3}' and goodsign = '1' ";
	 $result = odbc_exec($cid,$sql); //ส่งคำสั่งไป exceute
	 if($result){
		$gpitem = odbc_fetch_array($result); //เก็บผลลัพธ์ใน Recordset  1 record 
		$gp_3 = $gpitem['gp'];
		$gp2_3 = number_format($gp_3,0);
		if($gp_3){
			echo "แต้มสะสม: <B>{$gp2_3}</B> คะแนน > หมดอายุ วันที่ : <b>{$expireday_3}</b> <br>";	
		}else{
			//
		}// if gp
	 }//if result
     
	 //แต้มที่ใช้ไปแล้ว ปีปัจจุบัน
	 //คำสั่ง sql
	 $sql = "select sum(GoodPoint) as gp from posmemberpoint where custcode = '{$custcodes}' and goodsign = '-1' ";
	 $result = odbc_exec($cid,$sql);
	 if($result){
		$gpitem = odbc_fetch_array($result); //เก็บผลลัพธ์ใน Recordset  1 record
		$gp_4 = $gpitem['gp'];
		$gp2_4 = number_format($gp_4,0);
		if($gp_4){
			echo "แต้มสะสม ที่ใช้ไปแล้ว : <B><font color='#FF0000'>{$gp2_4}</font></B> คะแนน  <br>";	
		}else{
			//
		}// if gp 	 
	 }
	 
	 echo "<h3>รวมแต้มสะสมคงเหลือที่ใช้ได้</h3>";
	 $allpoint = ($gp + $gp_2 + $gp_3) - $gp_4;
	 $allpoint2 = number_format($allpoint,0);
	 echo "<h1><font color='#009900'>{$allpoint2}</font> คะแนน</h1>";
 
	odbc_close($cid); // ปิดการเชื่อมต่อ sql
?>

</body>
</html>