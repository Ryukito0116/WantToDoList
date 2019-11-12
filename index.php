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
        <h1>あなたのやりたいことリスト</h1>
    </div>
    <div class="infoBoxBottom">
        <div class="left33">
            <div class="fhoto_circle"></div>
        </div>
        <div class="right66">
            <h3>やりたいことの数</h3>
            <h3>主な活動拠点</h3>
            <h3>暇な時間帯</h3>
            <h3>職業</h3>
            <button onclick="location.href='formpage.html'">追加</button>
            <button>達成済み</button>
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
        echo $_POST["WhatDo"];
    ?>
</div>
</body>
</html>