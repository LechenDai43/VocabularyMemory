<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET["languagetype"]; ?></title>
    </head>
    <body>
        <h1>
            新<?php echo $_GET["languagetype"]; ?>课程添加
        </h1>
        <hr/>
        <br/>
        <form method="POST" action="newlesson.php">
            <input type="hidden" name="lang" value="<?php echo $_GET["languagetype"] ?>"/>
            <table>
                <thead>
                    <td>
                        新课的标题：
                    </td>
                    <td>
                        <input id="newtitle" type="text" name="title" value=""/>
                    </td>
                </thead>
                <tr>
                    <td>
                        新单词
                    </td>
                    <td>
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
                                <tr id="keyrow">
                                    <td>
                                        <button onclick="addOne()" type="button">
                                            添加单词
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">确认提交</button>
                    </td>
                </tr>
            </table>
        </form>
        <script>
            addOne();
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

<?php;?>
