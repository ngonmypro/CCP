<?
include "connect_mysql.php";

$sql1 = " CREATE TABLE IF NOT EXISTS `numchai_db`.`prhd_tb` ( ";
$sql1 .= " `pr_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
$sql1 .= " `pr_docid` VARCHAR( 20 ) NOT NULL , ";
$sql1 .= " `pr_date` DATETIME NOT NULL , ";
$sql1 .= " `pr_supid` VARCHAR( 50 ) NULL , ";
$sql1 .= " `pr_supname` VARCHAR( 200 ) NULL , ";
$sql1 .= " `pr_suptel` VARCHAR( 50 )  NULL , ";
$sql1 .= " `pr_supfax` VARCHAR( 50 )  NULL , ";
$sql1 .= " `pr_offid` VARCHAR( 50 )  NULL , ";
$sql1 .= " `pr_offname` VARCHAR( 100 )  NULL , ";
$sql1 .= " `pr_comment` TEXT  NULL , ";
$sql1 .= " `pr_num_c_stock` INT(10)  NULL  ,  ";
$sql1 .= " `pr_pri_c_stock` DOUBLE( 10,2 ) NULL  ,  ";
$sql1 .= " `pr_status` INT(1)  NULL  ,  ";
$sql1 .= " `pr_printnum` INT(5)  NULL    ";
$sql1 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb1 = mysql_query($sql1) or die(mysql_error()); 

$sql2 = " CREATE TABLE IF NOT EXISTS `numchai_db`.`employee_tb` ( ";
$sql2 .= " `emp_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
$sql2 .= " `emp_begin_name` VARCHAR( 10 )  NULL , ";
$sql2 .= " `emp_firstname` VARCHAR( 80 )  NULL , ";
$sql2 .= " `emp_username` VARCHAR( 10 )  NULL , ";
$sql2 .= " `emp_password` VARCHAR( 10 )  NULL , ";
$sql2 .= " `emp_position` VARCHAR( 80 )  NULL , ";
$sql2 .= " `emp_department` VARCHAR( 10 )  NULL , ";  //แผนก
$sql2 .= " `emp_status` VARCHAR( 30 )  NULL  ";
$sql2 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

 $create_tb2 = mysql_query($sql2) or die(mysql_error());

$sql3 = " CREATE TABLE IF NOT EXISTS `numchai_db`.`prdt_tb` ( ";
$sql3 .= " `prdt_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
$sql3 .= " `pr_docid` VARCHAR( 20 )  NOT NULL , ";
$sql3 .= " `prdt_numrow` INT NOT  NULL , ";
$sql3 .= " `prdt_procode` VARCHAR( 150 ) NULL , ";
$sql3 .= " `prdt_proname` VARCHAR( 255 ) NULL , ";
$sql3 .= " `prdt_proprice` DOUBLE( 10,2 ) NULL , ";
$sql3 .= " `prdt_pronum_stock` INT NULL , ";
$sql3 .= " `prdt_pronum_sell` INT NULL , ";
$sql3 .= " `prdt_pronum_pr` INT NULL , ";
$sql3 .= " `prdt_pronum_okbuy` INT NULL , ";
$sql3 .= " `prdt_inven_day` INT NULL , ";
$sql3 .= " `prdt_comment` VARCHAR( 255 ) NULL , ";
$sql3 .= " `prdt_status` INT( 1 ) NULL  ";
$sql3 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

 $create_tb3 = mysql_query($sql3) or die(mysql_error());

$sql4 = " CREATE TABLE IF NOT EXISTS `numchai_db`.`prdt_temp_tb` ( ";
$sql4 .= " `prdt_temp_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
$sql4 .= " `pr_temp_id` INT  NOT NULL , ";
$sql4 .= " `prdt_temp_numrow` INT NOT  NULL , ";
$sql4 .= " `prdt_temp_procode` VARCHAR( 150 ) NULL , ";
$sql4 .= " `prdt_temp_proname` VARCHAR( 255 ) NULL , ";
$sql4 .= " `prdt_temp_proprice` DOUBLE( 10,2 ) NULL , ";
$sql4 .= " `prdt_temp_pronum_stock` INT NULL , ";
$sql4 .= " `prdt_temp_pronum_sell` INT NULL , ";
$sql4 .= " `prdt_temp_pronum_pr` INT NULL , ";
$sql4 .= " `prdt_temp_pronum_okbuy` INT NULL , ";
$sql4 .= " `prdt_temp_inven_day` INT NULL , ";
$sql4 .= " `prdt_temp_comment` VARCHAR( 255 ) NULL , ";
$sql4 .= " `prdt_temp_status` INT( 1 ) NULL  ";
$sql4 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

 $create_tb4 = mysql_query($sql4) or die(mysql_error()); 
/* 


$sql5 = " CREATE TABLE IF NOT EXISTS `rites_db`.`answer_tb` ( ";
$sql5 .= " `id_ans` INT NOT NULL AUTO_INCREMENT ,  ";
$sql5 .= " `detail_ans` TEXT NOT NULL ,  ";
$sql5 .= " `name_ans` VARCHAR( 30 ) NOT NULL , ";
$sql5 .= " `email_ans` VARCHAR( 30 ) NOT NULL , ";
$sql5 .= " `date_ans` DATE NOT NULL , ";
$sql5 .= " `ref_id` INT NOT NULL , " ;
$sql5 .= " PRIMARY KEY(`id_ans`)  ";
$sql5 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

 $create_tb5 = mysql_query($sql5) or die(mysql_error());

$sql6 = " CREATE TABLE IF NOT EXISTS `rites_db`.`repairing_tb` ( ";
$sql6 .= " `rep_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,  ";
$sql6 .= " `rep_name` VARCHAR( 50 )  NOT NULL , ";
$sql6 .= " `rep_goods` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_date` DATE NOT NULL , ";
$sql6 .= " `rep_group` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_agen` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_phone` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_building` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_room` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_equip` VARCHAR( 50 )  NULL , ";
$sql6 .= " `rep_statedetail` TEXT  NULL , ";
$sql6 .= " `rep_status` VARCHAR( 10 )  NULL ,  ";
$sql6 .= " `rep_cause` TEXT  NULL  ";
$sql6 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

	$create_tb6 = mysql_query($sql6) or die(mysql_error());

$sql8 = " CREATE TABLE IF NOT EXISTS `rites_db`.`news_tb` ( ";
$sql8 .= " `id_new` INT NOT NULL AUTO_INCREMENT ,  ";
$sql8 .= " `title_new` VARCHAR(100) NOT NULL ,  ";
$sql8 .= " `detail_new` TEXT NOT NULL ,  ";
$sql8 .= " `type_new` INT(5) NOT NULL  ,  ";
$sql8 .= " `photo_new` VARCHAR(80) NULL ,  ";
$sql8 .= " `date_new` DATE NOT NULL ,  ";
$sql8 .= " `time_new` TIME NOT NULL  ,  ";
$sql8 .= " PRIMARY KEY(`id_new`)  ";
$sql8 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

 $create_tb8 = mysql_query($sql8) or die(mysql_error());
 *//*
$sql9 = " CREATE TABLE IF NOT EXISTS `chpro_db`.`pay_confirm_tb` ( ";
$sql9 .= " `pc_id` INT NOT NULL AUTO_INCREMENT ,  ";
$sql9 .= " `b_name` VARCHAR(80)  NULL ,  ";
$sql9 .= " `b_no` VARCHAR(80)  NULL ,  ";
$sql9 .= " `bb_name` VARCHAR(80)  NULL ,  ";
$sql9 .= " `b_a` DOUBLE( 10,2 )  NULL ,  ";
$sql9 .= " `rent_id` INT NULL ,  ";
$sql9 .= " PRIMARY KEY(`pc_id`)  ";
$sql9 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
  $create_tb9 = mysql_query($sql9) or die(mysql_error());

$sql10 = " CREATE TABLE IF NOT EXISTS `chpro_db`.`pay_all_tb` ( ";
$sql10 .= " `pl_id` INT NOT NULL AUTO_INCREMENT ,  ";
$sql10 .= " `b_name` VARCHAR(80)  NULL ,  ";
$sql10 .= " `b_no` VARCHAR(80)  NULL ,  ";
$sql10 .= " `bb_name` VARCHAR(80)  NULL ,  ";
$sql10 .= " `b_a` DOUBLE( 10,2 )  NULL ,  ";
$sql10 .= " `rent_id` INT NULL ,  ";
$sql10 .= " PRIMARY KEY(`pl_id`)  ";
$sql10 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
  $create_tb10 = mysql_query($sql10) or die(mysql_error());
  
$sql11 = " CREATE TABLE IF NOT EXISTS `chpro_db`.`blank_tb` ( ";
$sql11 .= " `blank_id` INT NOT NULL AUTO_INCREMENT ,  ";
$sql11 .= " `blank_name` VARCHAR(80)  NULL ,  ";
$sql11 .= " `blank_no` VARCHAR(80)  NULL ,  ";
$sql11 .= " `blank_name_con` VARCHAR(80)  NULL ,  ";
$sql11 .= " PRIMARY KEY(`blank_id`)  ";
$sql11 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

 $create_tb11 = mysql_query($sql11) or die(mysql_error());

$sql12 = " CREATE TABLE IF NOT EXISTS `chpro_db`.`har_rent_tb` ( ";
$sql12 .= " `date_rent_id` INT NOT NULL AUTO_INCREMENT ,  ";
$sql12 .= " `rent_id` INT NULL ,  ";
$sql12 .= " `date_new` DATE NULL ,  ";
$sql12 .= " `har_id` VARCHAR( 5 )  NULL , ";
$sql12 .= " `har_name` VARCHAR( 30 )  NULL , ";
$sql12 .= " `har_rent_price` DOUBLE( 10,2 )  NULL , ";
$sql12 .= " PRIMARY KEY(`date_rent_id`)  ";
$sql12 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";

	$create_tb12 = mysql_query($sql12) or die(mysql_error());
*/
mysql_close($c);
?>