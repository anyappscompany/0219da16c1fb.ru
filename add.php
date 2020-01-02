<?php

include_once("db.php");


$uniquehardid = $_POST['id'];
$processorname = $_POST['processorname'];
$processormanufacturer = $_POST['processormanufacturer'];
$videocontrollername = $_POST['videocontrollername'];
$videocontrollerprocessorpame = $_POST['videocontrollerprocessorname'];
$videocontrolleradapterram = $_POST['videocontrolleradapterram'];
$harddrives = $_POST['harddrives'];
$harddrivessizes = $_POST['harddrivessizes'];
$physicalmemory = $_POST['physicalmemory'];
$os = $_POST['os'];
$wb = $_POST['wb'];

//"&harddrives=" + HttpUtility.UrlEncode(hardDrives) + "&harddrivessizes=" + HttpUtility.UrlEncode(hardDrivesSizes) + "&physicalmemory=" + HttpUtility.UrlEncode(physicalMemory)

$cur_date = date("Y-m-d H:i:s");

mysql_query("INSERT INTO users (unique_hard_id, processor_name, processor_manufacturer, video_controller_name, video_controller_processor_pame, video_controller_adapter_ram, hard_drives, hard_drives_sizes, physical_memory, os, wb, add_date, load_date) VALUES ('".mysql_real_escape_string($uniquehardid)."', '".mysql_real_escape_string($processorname)."', '".mysql_real_escape_string($processormanufacturer)."', '".mysql_real_escape_string($videocontrollername)."', '".mysql_real_escape_string($videocontrollerprocessorpame)."', '".mysql_real_escape_string($videocontrolleradapterram)."', '".mysql_real_escape_string($harddrives)."', '".mysql_real_escape_string($harddrivessizes)."', '".mysql_real_escape_string($physicalmemory)."', '".mysql_real_escape_string($os)."', '".mysql_real_escape_string($wb)."', '".$cur_date."', '".$cur_date."') ON DUPLICATE KEY UPDATE load_date='".$cur_date."'");
//file_put_contents("INSERT INTO starts (unique_hard_id, load_date) VALUES ('".mysql_real_escape_string($uniquehardid)."', '".$cur_date."')");
mysql_query("INSERT INTO starts (unique_hard_id, load_date) VALUES ('".mysql_real_escape_string($uniquehardid)."', '".$cur_date."')");


mysql_close($db);
?>