<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>やりたい事リスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container">
    <header>
        <h1>- やりたい事リスト -</h1>
    </header>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="userinfo">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="infoBoxTop">
                            <h2>あなたのやりたいことリスト</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="left">
                            <div class="fhoto_circle"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="center">
                            <h3 class="info">やりたいことの数</h3>
                            <h3 class="info">主な活動拠点</h3>
                            <h3 class="info">フォロワー</h3>
                            <h3 class="info">達成率</h3>
                            <button onclick="location.href='formpage.html'">追加</button>
                            <button>達成済み</button>
                        </div>
                    </div>
                </div>
            </div>   
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
        $box_id = "10";
        $box_name = "Ryukito";
        $box_wantdoing = $_POST['WhatDo'];
        $box_category = $_POST['Category'];
        $box_withdo = $_POST['WhoWith'];
        $box_fin = "未達成";
        $box_good = "100";
        $box_metoo = "100";

        //データベースに接続
        $db = new mysqli("localhost","root","Gosto0116","project_goodlife");
        if ($db->connect_error) {
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }
        //INSERT文を変数に格納
        $sqlpush = "INSERT INTO goodlist (wantdoing, category, withdo) VALUES (?,?,?)";
        //挿入する値は空のまま、SQL実行の準備をする
        $stmt = $db->prepare($sqlpush);
        //挿入する値を配列に格納する
        $params = array(":id" => $box_id, ":name" => $box_name, ":wantdoing" => $box_wantdoing, ":category" => $box_category, ":withdo" => $box_withdo, ":fin" => $box_fin, ":good" => $box_good, ":metoo" => $box_metoo);
        // ここでパラメータに実際の値となる変数を入れます。
	    // sssdのところは、それぞれパラメータの型（string, string, string, double）を指定しています。
        $stmt->bind_param('ddd', $box_id, $box_name, $box_wantdoing, $box_category, $box_withdo, $box_fin, $box_good, $box_metoo);
        // プリペアドステートメントを実行します
        $stmt->execute();
        // $stmt->affected_rowsでクエリ結果を取得しています。これはInsert文などで変更された行の数を返します。
	    //printf("%d Row inserted.\n", $stmt->affected_rows);
        // ステートメントとステートメントと接続を閉じます
        $stmt->close();

        //SQL分でデータを取得
        $sql = "SELECT * from goodlist";
        if ($result = $db->query($sql)) {
            //連想配列を取得
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container'>";
                echo "<div class='row justify-content-center'>";
                echo "<div class=' col-12 col-md-10 col-lg-10'>";
                echo "<table class='DBlist'>";
                echo "<tr><td class='td_0'></td><td class='td_1'>・" . $row["wantdoing"] . "</td><td class='td_2'>" . $row["fin"] . "</td><td class='td_2'>いいね：" . $row["good"] . "</td><td class='td_2'>やりたい：" . $row["metoo"] . "</td><td class='td_0'></td></tr>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            //結果を閉じる
            $result->close();
        }
        //データベース切断
        $db->close();
    ?>
</div>
</div>
</body>
</html>