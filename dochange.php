<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");
$query = "select * from ".$_POST["language"]." where lesson_id = ".$_POST["lesson_id"];
$result = mysqli_query($link, $query);
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
    mysqli_data_seek($result, 0);
    $num = mysqli_num_rows($result);
    $finded = false;
    for($j = 0; $j < $num; $j ++ ){
        $faarr = mysqli_fetch_assoc($result);
        $thisone = $faarr["lineone"];
        if(strcmp($one, $thisone) == 0){
            $finded = true;
            if(strcmp($subarr[1], $faarr["linetwo"]) == 0){
                
            }else{
                $temQuery = "update ".$_POST["language"]." set linetwo = \"".$subarr[1]."\" where lineone = \"".$one."\" and lesson_id = ".intval($_POST["lesson_id"]);
                mysqli_query($link, $temQuery);
            }
            if(strcmp($subarr[2], $faarr["linethr"]) == 0){
                
            }else{
                $temQuery = "update ".$_POST["language"]." set linethr = \"".$subarr[2]."\" where lineone = \"".$one."\" and lesson_id = ".intval($_POST["lesson_id"]);
                mysqli_query($link, $temQuery);
            }
            if(strcmp($subarr[3], $faarr["type"]) == 0){
                
            }else{
                $temQuery = "update ".$_POST["language"]." set type = \"".$subarr[3]."\" where lineone = \"".$one."\" and lesson_id = ".intval($_POST["lesson_id"]);
                mysqli_query($link, $temQuery);
            }
        }
    }
    if($finded == false){
        $temquery = "insert into ".$_POST["language"]." (lesson_id, type, lineone, linetwo, linethr) value (".intval($_POST["lesson_id"]).",".intval($subarr[3]).",\"".$subarr[0]."\",\"".$subarr[1]."\",\"".$subarr[2]."\")";
        mysqli_query($link, $temquery);
    }
}

include 'index.php';