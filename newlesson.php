<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");
$query = "insert into lesson (lesson, lang) value (\"".$_POST["title"]."\",\"".$_POST["lang"]."\")";
mysqli_query($link, $query);
$id = intval(mysqli_insert_id($link));
$array = [];
for($i = 0; $i < count($_POST["lineone"]); $i ++){
    $one = $_POST["lineone"][$i];
    $two = $_POST["linetwo"][$i];
    $thr = $_POST["linethr"][$i];
    $type = 0;
    if(strcmp($one, "") == 0 || strcmp($two, "") == 0){
        
    }else{
        if(strcmp($thr,"")){
            $type = 2;
        }else{
            $type = 1;
        }
        $temarr = [];
        array_push($temarr, $one);
        array_push($temarr, $two);
        array_push($temarr, $thr);
        array_push($temarr, $type);
        array_push($array, $temarr);
    }
}
for($i = 0; $i < count($array); $i ++){
    $subarr = $array[$i];
    $one = $subarr[0];
    $temquery = "insert into ".$_POST["lang"]." (lesson_id, type, lineone, linetwo, linethr) value (".intval($id).",".intval($subarr[3]).",\"".$subarr[0]."\",\"".$subarr[1]."\",\"".$subarr[2]."\")";
    mysqli_query($link, $temquery);
}

include 'index.php';
