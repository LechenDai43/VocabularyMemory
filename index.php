<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include 'formain.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>首页</title>
        <style>
            td{
                width: 175px;
                margin: 5px;
                padding: 5px;
                text-align: center;
            }
            .button{
                width: 150px;
            }
            li{
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <h1>
            单词背诵
        </h1>
        <br/>
        <hr/>
        <table>
            <thead>
                <td>
                    にほんご
                </td>
                <td>
                    한국어
                </td>
                <td>
                    Tiếng Việt Nam
                </td>
                <td>
                    ภาษาไทย
                </td>
                <td>
                    Bahasa Melayu
                </td>
                <td>
                    Kiswahili
                </td>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <ul id="jpul">
                            <?php 
                            foreach ($japanese as $subarr) {
                                completeLiForm($subarr);
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul id="krul">
                            <?php 
                            foreach ($korean as $subarr) {
                                completeLiForm($subarr);
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul id="vtul">
                            <?php 
                            foreach ($vietnam as $subarr) {
                                completeLiForm($subarr);
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul id="thul">
                            <?php 
                            foreach ($thai as $subarr) {
                                completeLiForm($subarr);
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul id="bmul">
                            <?php 
                            foreach ($malay as $subarr) {
                                completeLiForm($subarr);
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <ul id="bmul">
                            <?php 
                            foreach ($swahili as $subarr) {
                                completeLiForm($subarr);
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="addlesson.php" method="GET">
                            <button type="submit">添加日本语课</button>
                            <input type="hidden" name="languagetype" value="japanese"/>
                        </form>
                    </td>
                    <td>
                        <form action="addlesson.php" method="GET">
                            <button type="submit">添加韩国语课</button>
                            <input type="hidden" name="languagetype" value="korean"/>
                        </form>
                    </td>
                    <td>
                        <form action="addlesson.php" method="GET">
                            <button type="submit">添加越南语课</button>
                            <input type="hidden" name="languagetype" value="vietnam"/>
                        </form>
                    </td>
                    <td>
                        <form action="addlesson.php" method="GET">
                            <button type="submit">添加泰国语课</button>
                            <input type="hidden" name="languagetype" value="thai"/>
                        </form>
                    </td>
                    <td>
                        <form action="addlesson.php" method="GET">
                            <button type="submit">添加马来语课</button>
                            <input type="hidden" name="languagetype" value="malay"/>
                        </form>
                    </td>
                    <td>
                        <form action="addlesson.php" method="GET">
                            <button type="submit">添加斯瓦西里语课</button>
                            <input type="hidden" name="languagetype" value="swahili"/>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<?php 
mysqli_close($link);
unset($link);                  
?>
