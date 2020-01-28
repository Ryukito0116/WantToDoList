<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>やりたい事リストの編集</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/resss/dist/ress.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <header>
        <p class="TitleSize">やりたい事リスト</h1>
    </header>
</div>
    <p class="BoxTitle TitleSize2">リストの編集</p>

    <?php
    $id = $_POST['id'];
    $str = "<form action='edit.php' method='post' class='formstyle'>"
        ."<div>"
            ."<label>やりたい事　:  </label><input type='text' name='WhatDo'><br>"
        ."</div>"
        ."<div class='button'>"
            ."<button type='submit'>リストを編集</button>"
        ."</div>"
        ."<input type='hidden' name='id_int' value=" . $id . ">"
    ."</form>";
        echo $str;
    ?>
</body>
</html>