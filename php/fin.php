<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>やりたい事リスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/button.css">
</head>
<body>
<div class="container">
<br>
        <p class="TitleStyle TitleSize">やりたい事リスト</p>
</div>
<div class="table_box col-12 col-md-8 col-lg-6">
    <table>
        <tr>
            <td class="p_center td_size"><button class="button_size" onclick="location.href='../php/index.php'">ホーム</button></td>
            <td class="p_center td_size"><button class="button_size" onclick="location.href='../html/formpage.html'">追加</button></td>
            <td class="p_center td_size"><button class="button_size" onclick="location.href='../php/fin.php'">達成済み</button></td>
        </tr>
    </table>
</div>

<!-- <div class="container1">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="userinfo">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="infoBoxTop">
                            <p class="TitleSize2">あなたのやりたいことリスト</h6>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="left">
                            <div class="useimage">
                                <img src="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="right">
                            <p class="info">やりたいことの数</p>
                            <p class="info">主な活動拠点</p>
                            <p class="info">フォロワー</p>
                            <p class="info">達成率</p>
                            <div class='buttons'>
                                <button onclick="location.href='formpage.html'">追加</button>
                                <button onclick="location.href='fin.php'">達成済みリスト</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div> -->
<br>
<div class="container2">
    <p class="TitleStyle TitleSize">達成済一覧</p>
</div>
<br>

<div class="WantToDoList">
    <?php
        //　データベースに接続
        $db = new mysqli("localhost","root","Gosto0116","project_goodlife");
        

        //　SQL分でデータを取得
        $sql = "SELECT * from goodlist WHERE fin = '達成済み'";
        if ($result = $db->query($sql)) {
            echo "<div class='container'>";
            echo "<div class='row justify-content-center'>";
            echo "<div class=' col-12 col-md-10 col-lg-10'>";
            echo "<div class='DBlist'>";
            
            //　連想配列を取得
            while ($row = $result->fetch_assoc()) {
                echo "<div class='row justify-content-center'>";
                echo "<div class=' col-12 col-md-10 col-lg-10'>";
                echo "<div class='td_1'>・ {$row["wantdoing"]} </div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='statusbox'>";
                echo "<div class='status'>
                            <table>
                                    <tr>
                                        <td class='td_2'>いいね： {$row["good"]} </td>
                                        <td class='td_2'>やりたい： {$row["metoo"]} </td>
                                        <td class='td_2'> {$row["fin"]} </td>
                                    </tr>
                                    <tr>
                                        <td class='td_2'>
                                            <form action='checkOut.php' method='post'>
                                                <input type='submit' value='削除' class='button1'>
                                                <input type='hidden' name='id' value= {$row['id']} ></form>
                                        </td>
                                    </tr>
                            </table><br>
                    </div>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            //　結果を閉じる
            $result->close();
        }
        //　データベース切断
        $db->close();
    ?>
</div>
</div>
</body>
</html>