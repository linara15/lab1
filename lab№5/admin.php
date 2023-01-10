<?php

    require('db.php');

    $item = $db->query("SELECT * FROM flowers")->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($_GET)) {

        if (isset($_GET['new_category_name'])) {
            $name = $_GET['new_category_name'];

            $db->query("INSERT INTO flowers (name) VALUE ('$name')");
            // не хватает обнавления
            
        }
        if (isset($_GET['submit'])) {
            $id = $_GET['id'];
            $name = $_GET['name'];

            $db->query("UPDATE flowers SET name='$name' WHERE id=$id");
            // не хватает обнавления
            
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<br>
<a href="index.php" class="">Назад</a>
<br>
<br>

<div class="">Категории</div>

<br>

<div class="">

    <form action="#">
        <input type="text" name="new_category_name" value="">
        <button>Добавить</button>
        <br>
    </form>
    <br>

    <?php foreach($item as $item)  {?>
        <form action="#">
            <input type="text" name="name" value="<?php echo $item["name"]; ?>">
            <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
            <button name="submit">Обновить</button>
            <br>
        </form>
        <br>
    <?php } ?>
</div>


    
</body>
</html>