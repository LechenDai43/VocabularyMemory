<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");

$japanese = [];
$japanese = fillInArray($japanese, "japanese", $link);

$korean = [];
$korean = fillInArray($korean, "korean", $link);

$vietnam = [];
$vietnam = fillInArray($vietnam, "vietnam", $link);

$thai = [];
$thai = fillInArray($thai, "thai", $link);

$malay = [];
$malay = fillInArray($malay, "malay", $link);

$swahili = [];
$swahili = fillInArray($swahili, "swahili", $link);



function fillInArray($arr,$key,$link) {
    $query = "select * from lesson where lang = \"".$key."\"";
    $rs = mysqli_query($link, $query);
    $num = mysqli_num_rows($rs);
    for($i = 0; $i < $num; $i ++){
        $line = mysqli_fetch_assoc($rs);
        array_push($arr, $line);
    }
    return $arr;
}

function completeLiForm($subarr){
    $id = $subarr['id'];
    $title = $subarr['lesson'];
    $type = $subarr['lang'];
    echo "<li><form method=\"POST\" action=\"openlesson.php\">";
    echo "<input type=\"hidden\" name=\"lesson_id\" value=\"".$id."\"/>";
    echo "<input type=\"hidden\" name=\"language\" value=\"".$type."\"/>";
    echo "<input class=\"button\" type=\"submit\" name=\"title\" value=\"".$title."\"/>";
    echo "</form></li>";
}