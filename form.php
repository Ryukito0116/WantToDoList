<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>あなたのやりたい事リスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/resss/dist/ress.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>テスト</h1>
<?php
  echo $_POST["Name"] ."さんのやりたい事は". $_POST["WantDo1"] ."と". $_POST["WantDo2"] ."です。";
?>
</body>
</html>
