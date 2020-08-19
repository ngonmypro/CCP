<?
	$custcode = $_POST['custcode'];
	$schs = $_POST['schs'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h3>ข้อมูลลูกค้า/สมาชิก</h3>

<?
	include "Connections/connect_sqlserver.php"; //เปิดการเชื่อมต่อ sql 

	//คำสั่ง sql
	 if($schs==1){	
	 	$sql = "SELECT * FROM emmember Where custcode ='{$custcode}'";
	 }elseif($schs==2){
	    $sql = "SELECT * FROM emmember Where memberno ='{$custcode}'"; 		 
	 }elseif($schs==3){
		$sqlt = "select * from emcust where conttel like '%{$custcode}%' order by xpostime desc ";
		$resultt = odbc_exec($cid,$sqlt);
		if($resultt){
			$custtitem = odbc_fetch_array($resultt);
			$custcodet = $custtitem['CustCode'];	
		}
		$sql = "SELECT * FROM emmember Where custcode ='{$custcodet}'";
	 }
	 $result = odbc_exec($cid,$sql); //ส่งคำสั่งไป exceute
	 if($result){
	 $custitem = odbc_fetch_array($result); //เก็บผลลัพธ์ใน Recordset  1 record
	 	$brchcode = $custitem['BrchCode'];
		$membertypecode = $custitem['MemberTypeCode'];
		$memberno = $custitem['MemberNo'];
		$begindate = $custitem['BeginDate'];
		$enddate = $custitem['EndDate'];
		$custcodemem = $custitem['CustCode'];
		
		$newbeginDate = date("d-m-Y", strtotime($begindate));
		$newendDate = date("d-m-Y", strtotime($enddate));
		$newcustcode = strtoupper($custcode);
		$membertypename = getmembertype($membertypecode);
		
		if($brchcode){ // ถ้ามีรหัสสาขาแสดงว่าหาเจอ
			if($schs==1){
				$sql2 = "SELECT * FROM emcust Where custcode ='{$custcode}' ";
			}elseif($schs==2){
				$sql2 = "SELECT * FROM emcust Where custcode ='{$custcodemem}' ";	
			}elseif($schs==3){
				$sql2 = "SELECT * FROM emcust Where custcode ='{$custcodet}'";
			}
			$result2 = odbc_exec($cid,$sql2);
			if($result2){
				$custitem2 = odbc_fetch_array($result2);
				$custtitle = iconv('tis-620','utf-8',$custitem2['CustTitle']);
				$custname = iconv('tis-620','utf-8',$custitem2['CustName']);
				$custaddr1 = iconv('tis-620','utf-8',$custitem2['CustAddr1']);
				$district = iconv('tis-620','utf-8',$custitem2['District']);
				$amphur = iconv('tis-620','utf-8',$custitem2['Amphur']);
				$province = iconv('tis-620','utf-8',$custitem2['Province']);
				$postcode = $custitem2['PostCode'];
				$conttel = $custitem2['ContTel'];
				$custcodea = $custitem2['CustCode'];	
				
			}
			//echo "สาขา : {$brchcode} <br>";
			echo "ชื่อ-สกุล : <b>{$custtitle} {$custname}</b> <br>";
			echo "รหัสลูกค้า : <b>{$custcodea}</b> <br>";
			echo "รหัสสมาชิก : <b>{$memberno}</b> <br>";
			echo "ประเภทสมาชิก : <b>{$membertypename}</b> <br>";
			echo "วันสมัครบัตรสมาชิก : <b>{$newbeginDate}</b> <br>";
			echo "วันหมดอายุบัตรสมาชิก : <b>{$newendDate}</b> <br>";
			echo "<h3>ข้อมูลที่อยู่</h3>";
			echo " {$custaddr1} {$district} {$amphur} {$province} {$postcode} Tel. {$conttel}";
		}else{//if
			if($schs==1){
		  		echo "<font color='#FF6600'>ไม่พบข้อมูล รหัสลูกค้า: {$newcustcode}</font> <br>";
			}elseif($schs==2){
				echo "<font color='#FF6600'>ไม่พบข้อมูล รหัสสมาชิก: {$newcustcode}</font> <br>";
			}elseif($schs==3){
				echo "<font color='#FF6600'>ไม่พบข้อมูล เบอร์โทรศัพท์: {$newcustcode}</font> <br>";
			}
		}

	 }else{ //
		echo "ไม่พบข้อมูลลูกค้า รหัส :{$newcustcode} <br>";
	 } //if

	odbc_close($cid); // ปิดการเชื่อมต่อ sql
?>

</body>
</html>

<?
function getmembertype($x) {
   if($x=='M1'){
	 $z = 'ลูกค้าทั่วไป';  
   }elseif($x=='M2'){
     $z = 'ผู้รับเหมา';
   }elseif($x=='M3'){
	 $z = 'ร้านค้า';  
   }
   return $z;
}
?>