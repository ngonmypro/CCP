<?
include "connect_mysql.php";

$sql_s = "SELECT * FROM employee_tb";
$result_s = mysql_query($sql_s) or die(mysql_error());
if (mysql_num_rows($result_s)==0){
$sql = " INSERT INTO `numchai_db`.`employee_tb` ( ";
$sql .= " `emp_id` , ";
$sql .= " `emp_begin_name` , ";
$sql .= " `emp_firstname` , ";
$sql .= " `emp_username` , ";
$sql .= " `emp_password` , ";
$sql .= " `emp_position` , ";
$sql .= " `emp_department` , ";
$sql .= " `emp_status` "; 
$sql .= " ) ";
$sql .= " VALUES ( ";
$sql .= " NULL , 'Admin', 'Admin', 'Admin', 'Admin1234', 'Admin', '1', 'Admin' ";
$sql .= " ); ";
$result = mysql_query($sql) or die(mysql_error());
}	
mysql_close($c);
?>