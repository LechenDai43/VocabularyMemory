<?php
$link = mysqli_connect("localhost:3306", "root", "0921", "vocabularymemory");
mysqli_query($link, "set names utf8");
$query = "select * from ".$_GET["language"]." where lesson_id = ".intval($_GET["lesson_id"]);
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET["title"]; ?></title>
    </head>
    <body>
        <h1>
            <?php echo $_GET["title"]; ?>
        </h1>
        <hr/>
        <br/>
        <form method="POST" action="dochange.php">
            <input type="hidden" name="lesson_id" value="<?php echo $_GET["lesson_id"];?>"/>
            <input type="hidden" name="language" value="<?php echo $_GET["language"];?>"/>
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
                </thead>
                <tbody id="tbody">
                    <?PHP
                    $num = mysqli_num_rows($result);
                    for($i = 0; $i < $num; $i ++){
                        echo "<tr>";
                        $line = mysqli_fetch_assoc($result);
                        echo "<td><input type=\"text\" name=\"lineone[]\" value=\"".$line["lineone"]."\"/></td>";
                        echo "<td><input type=\"text\" name=\"linetwo[]\" value=\"".$line["linetwo"]."\"/></td>";
                        echo "<td><input type=\"text\" name=\"linethr[]\" value=\"".$line["linethr"]."\"/></td>";
                        echo "</tr>";
                    }
                    ?>
                    <tr id="keyrow">
                        <td>
                            <button onclick="addOne()" type="button">
                                添加单词
                            </button>
                        </td>
                        <td>
                            <input type="submit" name="submit" value="确认改变"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="test">
                
            </div>
        </form>
        <script>
            function addOne(){
                var test = document.getElementById("test");
                var iptone = document.createElement("input");
                iptone.type = "text";
                iptone.name = "lineone[]";
                var ipttwo = document.createElement("input");
                ipttwo.type = "text";
                ipttwo.name = "linetwo[]";
                var iptthree = document.createElement("input");
                iptthree.type = "text";
                iptthree.name = "linethr[]";
                var tdone = document.createElement("td");
                var tdtwo = document.createElement("td");
                var tdthree = document.createElement("td");
                tdone.appendChild(iptone);
                tdtwo.appendChild(ipttwo);
                tdthree.appendChild(iptthree);
                var tr = document.createElement("tr");
                tr.appendChild(tdone);
                tr.appendChild(tdtwo);
                tr.appendChild(tdthree);
                var outer = document.getElementById("tbody");
                var key = document.getElementById("keyrow");
                outer.insertBefore(tr,key);
            }
        </script>
    </body>
</html>

