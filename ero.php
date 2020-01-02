<?php

include_once("db.php");
             //file_put_contents("333.txt", $_POST);

/*$uniquehardid = $_POST['id'];
$processorname = $_POST['processorname'];
$processormanufacturer = $_POST['processormanufacturer'];
$videocontrollername = $_POST['videocontrollername'];
$videocontrollerprocessorpame = $_POST['videocontrollerprocessorname'];
$videocontrolleradapterram = $_POST['videocontrolleradapterram'];
$harddrives = $_POST['harddrives'];
$harddrivessizes = $_POST['harddrivessizes'];
$physicalmemory = $_POST['physicalmemory'];*/

//"&harddrives=" + HttpUtility.UrlEncode(hardDrives) + "&harddrivessizes=" + HttpUtility.UrlEncode(hardDrivesSizes) + "&physicalmemory=" + HttpUtility.UrlEncode(physicalMemory)

$uniquehardid = $_POST['u'];
$error_num = $_POST['n'];
$os = $_POST['os'];
$error_text = $_POST['m'];
$win_bit = $_POST['wb'];

$cur_date = date("Y-m-d H:i:s");
//mysql_query("INSERT INTO users (unique_hard_id, processor_name, processor_manufacturer, video_controller_name, video_controller_processor_pame, video_controller_adapter_ram, hard_drives, hard_drives_sizes, physical_memory, add_date, load_date) VALUES ('".mysql_real_escape_string($uniquehardid)."', '".mysql_real_escape_string($processorname)."', '".mysql_real_escape_string($processormanufacturer)."', '".mysql_real_escape_string($videocontrollername)."', '".mysql_real_escape_string($videocontrollerprocessorpame)."', '".mysql_real_escape_string($videocontrolleradapterram)."', '".mysql_real_escape_string($harddrives)."', '".mysql_real_escape_string($harddrivessizes)."', '".mysql_real_escape_string($physicalmemory)."', '".$cur_date."', '".$cur_date."') ON DUPLICATE KEY UPDATE load_date='".$cur_date."'");
mysql_query("INSERT INTO errors (unique_hard_id, error_num, os, wb, error_text, add_date) VALUES ('".mysql_real_escape_string($uniquehardid)."', '".mysql_real_escape_string($error_num)."', '".mysql_real_escape_string($os)."', '".mysql_real_escape_string($win_bit)."', '".mysql_real_escape_string($error_text)."', '".$cur_date."')");

//echo "INSERT INTO errors (unique_hard_id, error_num, os, error_text, add_date) VALUES ('".mysql_real_escape_string($uniquehardid)."', '".mysql_real_escape_string($error_num)."', '".mysql_real_escape_string($os)."', '".mysql_real_escape_string($error_text)."', '".$cur_date."')";


mysql_close($db);
?>