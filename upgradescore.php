<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");
$query = "select * from ".$_GET["language"]." where lesson_id = ".intval($_GET["lesson_id"])." and lineone = \"".$_GET["word"]."\"";
$result = mysqli_query($link, $query);
$line = mysqli_fetch_assoc($result);
$correct = intval($line["correct"]);
$overall = intval($line["overall"]);
$overall ++;
$correct += intval($_GET["score"]);
$query = "update ".$_GET["language"]." set overall = ".$overall." where lesson_id = ".intval($_GET["lesson_id"])." and lineone = \"".$_GET["word"]."\"";
mysqli_query($link, $query);
$query = "update ".$_GET["language"]." set correct = ".$correct." where lesson_id = ".intval($_GET["lesson_id"])." and lineone = \"".$_GET["word"]."\"";
mysqli_query($link, $query);
