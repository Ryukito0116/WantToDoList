<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>移動します</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/resss/dist/ress.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <p>移動するよ</p>
    <?php
        $box_wantdoing = $_POST['WhatDo'];
        $box_category = $_POST['Category'];
        $box_withdo = $_POST['WhoWith'];
        $box_fin = "未達成";

        //　データベースに接続
        $db = new mysqli("localhost","root","Gosto0116","project_goodlife");
        if ($db->connect_error) {
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }
        //　INSERT文を変数に格納
        $sqlpush = "INSERT INTO goodlist (wantdoing, category, withdo, fin) VALUES (?,?,?,?)";
        //　挿入する値は空のまま、SQL実行の準備
        $stmt = $db->prepare($sqlpush);
        //　挿入する値を配列に格納
        //$params = array(":wantdoing" => $box_wantdoing, ":category" => $box_category, ":withdo" => $box_withdo, ":fin" => $box_fin);
        // ここでパラメータに実際の値となる変数を入れる
	    // sssdのところは、それぞれパラメータの型（string, string, string）を指定
        $stmt->bind_param('ssss',$box_wantdoing, $box_category, $box_withdo, $box_fin);
        // プリペアドステートメントを実行
        $stmt->execute();
        // ステートメントとステートメントと接続を閉じる
        $stmt->close();

        header('Location: ./index.php');
        exit;
    ?>
</body>

</html>