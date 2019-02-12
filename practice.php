<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");
$query = "select * from ".$_GET["language"]." where lesson_id = ".intval($_GET["lesson_id"]);
$result = mysqli_query($link, $query);
$mainarr = [];
$num = mysqli_num_rows($result);
for($i = 0;$i < $num; $i ++){
    $arr = mysqli_fetch_assoc($result);
    $type = intval($arr["type"]);
    $one = [];
    array_push($one, $arr["linetwo"]);
    array_push($one, $arr["lineone"]);
    array_push($mainarr, $one);
    if ($type == 2) {
        $two = [];
        array_push($two, $arr["linethr"]);
        array_push($two, $arr["lineone"]);
        array_push($mainarr, $two);
    }
}
$num = count($mainarr);
$intarr = [];
for($i = 0; $i < $num; $i ++){
    array_push($intarr, $i);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET["title"]; ?></title>
        <style>
            .hidden{
                display: none;
            }
            .topic{
                width: 200px;
                text-align: right;
                padding-right: 20px;
            }
            .top{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>
            <?php echo $_GET["title"]; ?>
        </h1>
        <hr/>
        <br/>
        <form method="POST" action="openlesson.php">
            <input type="hidden" name="lesson_id" value="<?php echo $_GET["lesson_id"] ?>"/>
            <input type="hidden" name="language" value="<?php echo $_GET["language"] ?>"/>
            <input type="hidden" name="title" value="<?php echo $_GET["title"] ?>"/>
            <button type="submit">返回</button>
        </form>
        <table>
            <thead>
                <td class="top">
                    题目
                </td>
                <td class="top">
                    答案
                </td>
                <td></td>
                <td>
                    
                </td>
            </thead>
            <tbody>
                <?php
                for($i = 0; $i < $num; $i ++){
                    $index = rand(0, count($intarr)-1);
                    $tem = array_splice($intarr, $index, 1);
                    $index = intval($tem[0]);
                    $question = $mainarr[$index];
                    echo "<tr>";
                    echo "<td class=\"topic\">";
                    echo $question[0];
                    echo "</td>";
                    echo "<td>";
                    echo "<input type=\"text\" name=\"answer\" value=\"\"/>";
                    echo "</td>";
                    echo "<td>";
                    echo "<button onclick=\"checkAnswer(this)\" class=\"checkbutton\">确认</button>";
                    echo "</td>";
                    echo "<td><div class=\"hidden\">";
                    echo $question[1];
                    echo "</div></td>";
                    echo "<td>";
                    echo "<div class=\"feedback\"></div>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <td>
                        <button onclick="checkAll()">全部提交</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="teste">
            
        </div>
        <script>
            function checkAnswer(root){
                var test = document.getElementById("teste");
                var wholeline = root.parentElement.parentElement;
                var useranswer = wholeline.children[1].children[0].value;
                var correctanswer = wholeline.children[3].children[0].innerHTML;
                var score = 0;
                if(useranswer == correctanswer){
                    score = 1;
                    wholeline.children[4].children[0].innerHTML = "回答正确";
                }else{
                    wholeline.children[4].children[0].innerHTML = "回答错误";
                }
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        var result = xmlhttp.responseText;
                        test.innerHTML = result;
                    }
                }
                var p1 = "GET";
                var p2 = "upgradescore.php?language=<?php echo $_GET["language"]; ?>&lesson_id=<?php echo $_GET["lesson_id"]; ?>&word="+correctanswer+"&score="+score;
                xmlhttp.open(p1,p2,true);
                xmlhttp.send();

            }
            function checkAll(){
                var list = document.getElementsByClassName("checkbutton");
                var i = 0;
                var num = list.length;
                for(i = 0; i < num; i ++){
                    checkAnswer(list[i]);
                }
            }
        </script>
    </body>
</html>

