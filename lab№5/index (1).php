<?php
    require('db.php');

    $item = $db->query("SELECT * FROM flowers")->fetchAll(PDO::FETCH_ASSOC);
    
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
    <h1 class="shop__title">Цветочный магазин</h1>
    <hr>
    <br>

    <a href="admin.php">Админка</a>

    <br>
    <br>
    <hr>
    <br>
    <div class="shop__items">
        <?php foreach ($item as $item) { ?>
            <div class="shop__item">
                <img src="<?php echo $item['photo'] ?>" alt="">
                <div><?php echo $item['name'] ?></div>
                <div><?php echo $item['price'] ?></div>
                <div><?php echo $item['description'] ?></div>
                <br>
                <a href="update.php?id=<?php echo $item['id'];?>">Подробнее</a>
                <a href="delete.php?id=<?php echo $item['id'];?>">Удалить</a>
            </div>
        <?php } ?>
    </div>

</body>
</html>