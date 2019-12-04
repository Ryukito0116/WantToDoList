<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>やりたい事リスト</title>
    <link rel="stylesheet" href="https://unpkg.com/resss/dist/ress.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>- やりたい事リスト -</h1>
</header>
<div class="userinfo">
    <div class="infoBoxTop">
        <h2>あなたのやりたいことリスト</h2>
    </div>
    <div class="infoBoxBottom">
        <div class="left">
            <div class="fhoto_circle"></div>
        </div>
        <div class="center">
            <h3 class="info">やりたいことの数</h3>
            <h3 class="info">主な活動拠点</h3>
            <h3 class="info">フォロワー</h3>
            <h3 class="info">達成率</h3>
            <button onclick="location.href='formpage.html'">追加</button>
            <button>達成済み</button>
        </div>
        <div class="right">
            <h3>  :12</h3>
            <h3>  :神戸</h3>
            <h3>  :256</h3>
            <h3>  :100%</h3>
        </div>
    </div>
</div>
<br>
<div class="TitleBox">
    <h1 class="TitleStyle">リスト一覧</h1>
</div>
<br>
<div class="WantToDoList">
    <?php
        // データベースに接続
        $db = new mysqli("localhost","root","Gosto0116","project_goodlife");
        if ($db->connect_error) {
            echo $db->connect_error;
            exit();
        } /*else {
            echo "sucsess!";
            $db->set_charset("utf8");
        }*/

        echo "<table>";
        //SQL分でデータを取得
        $sql = "SELECT * from goodlist";
        if ($result = $db->query($sql)) {
            //連想配列を取得
            while ($row = $result->fetch_assoc()) {
                echo "<div class='DBlist'>
                        <tr class='DBlis'><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["wantdoing"] . "</td><td>" . $row["category"] . "</td><td>" . $row["withdo"] . "</td><td>" . $row["fin"] . "</td><td>" . $row["good"] . "</td><td>" . $row["metoo"] . "</td></tr>
                      </div>";
            }
            //結果を閉じる
            $result->close();
        }
        echo "</table>";

        //データベース切断
        $db->close();
    ?>
</div>
</body>
</html>