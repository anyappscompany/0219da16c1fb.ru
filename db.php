<?php

$dbname = "miner";  //user215195_miner
$user = "root";
$pass = "";

$db = mysql_connect("localhost",$user,$pass);

mysql_select_db($dbname, $db);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $db);


?>