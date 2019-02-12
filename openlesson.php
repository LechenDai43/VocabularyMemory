<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");

$query = "select * from ".$_POST["language"]." where lesson_id = ".intval($_POST["lesson_id"]);
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_POST["title"]; ?></title>
        <style>
            td{
                width: 150px;
                margin: 5px;
                padding: 5px;
                text-align: center;
            }
            table{
                position: relative;
                width: 700px;
                border: 5px solid black;
                top: -120px;
                left: 170px;
            }
            input{
                width: 100px;
            }
            thead td{
                border-bottom-color: darkgrey;
                border-bottom-style: dashed;
                border-bottom-width: 3px;
            }
            #rightdiv{
                position: sticky;
                width: 130px;
                height: 100px;
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <h1>
            <?php echo $_POST["title"]; ?>
        </h1>
        <hr/>
        <br/>
        <div id="rightdiv">
            <form method="GET" action="changelesson.php">
                <input type="submit" name="change" value="修改单词表"/>
                <input type="hidden" name="language" value="<?PHP echo $_POST["language"] ?>"/>
                <input type="hidden" name="lesson_id" value="<?PHP echo $_POST["lesson_id"] ?>"/>
                <input type="hidden" name="title" value="<?PHP echo $_POST["title"] ?>"/>
            </form>
            <form method="GET" action="practice.php">
                <input type="submit" name="test" value="练习单词"/>
                <input type="hidden" name="language" value="<?PHP echo $_POST["language"] ?>"/>
                <input type="hidden" name="lesson_id" value="<?PHP echo $_POST["lesson_id"] ?>"/>
                <input type="hidden" name="title" value="<?PHP echo $_POST["title"] ?>"/>
            </form>
            <form method="GET" action="index.php">
                <input type="submit" name="test" value="返回主页"/>
            </form>
        </div>
        <table>
            <thead>
                <td>
                    单词
                </td>
                <td>
                    词义
                </td>
                <td>
                    备注
                </td>
                <td>
                    得分
                </td>
            </thead>
            <tbody>
                <?PHP
                $num = mysqli_num_rows($result);
                for($i = 0; $i < $num; $i ++){
                    echo "<tr>";
                    $line = mysqli_fetch_assoc($result);
                    echo "<td>".$line["lineone"]."</td>";
                    echo "<td>".$line["linetwo"]."</td>";
                    echo "<td>".$line["linethr"]."</td>";
                    echo "<td>".number_format(((float)intval($line["correct"])/(float)intval($line["overall"]))*100,1)."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
    </body>
</html>