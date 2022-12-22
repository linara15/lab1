<?php
    if (isset($_POST['submit'])){
        // var_dump($_POST);
        $namebook=$_POST['bookname'];
        $nameauthor=$_POST['descr'];
        $namedate=$_POST['date'];

        $xml=simplexml_load_file("data.xml");

        
        $lastEl=$xml->item[($xml->count())-1];

        $newBook=$xml->addChild('item', '');
        $newBook->addChild('name', $namebook);
        $newBook->addChild('descr', $namedescr);
        $newBook->addChild('date', $namedate);
        $newBook->addAttribute('id', $lastEl['id']+1);

        $xml->saveXML('data.xml');

        echo '<script>
        alert("новая блог создан")
        </script>';

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="text" name="bookname" placeholder="название блог">
        <br>
        <br>
        <input type="text" name="descr" placeholder="описание">
        <br>
        <br>
        <input type="date" name="date" placeholder="дата">
        <br>
        <br>
        <button type="submit" name="submit">Отправить</button>

    </form>
    <br>
    <br>
    <a href="index.php">Назад</a>
</body>
</html>