<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>移動します</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/resss/dist/ress.min.css">
</head>
<body>
    <p>移動するよ</p>
    <?php

        $id_box = $_POST['id'];
        $fin_box = $_POST['finCheck'];

        if ($fin_box == "未達成") {
            $fin_box = "達成済み";
        } elseif ($fin_box == "達成済み") {
            $fin_box = "未達成";
        }
        $finCheck = $fin_box;
        
        //　データベースに接続
        $db = new mysqli("localhost","root","Gosto0116","project_goodlife");
        if ($db->connect_error) {
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }

        //　editの文 2行はセットで覚える！
        $sqlfinCheck = "UPDATE goodlist SET fin = ? WHERE id = ?";
        //　挿入する値は空のまま、SQL実行の準備
        $stmt = $db->prepare($sqlfinCheck);
        //　挿入する値を配列に格納
        $stmt->bind_param('si', $finCheck, $id_box);
        // プリペアドステートメントを実行
        $stmt->execute();
        // ステートメントとステートメントと接続を閉じる
        $stmt->close();

        header('Location: ./index.php');
        exit;
    ?>
</body>

</html>