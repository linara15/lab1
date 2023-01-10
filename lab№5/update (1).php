<?php
    require('db.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];

    // запрос и ответ
        $item = $db->query("SELECT * FROM flowers WHERE id=$id")->fetchAll(PDO::FETCH_ASSOC);
    
    // обращаемся непосредственно к нашему первому эл-ту
    if (count($item) > 0) {
        $item = $item[0];
    }
    }else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST['id'];
        $photo=$_POST['photo'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        var_dump($description);

        $db->query("UPDATE flowers SET photo='$photo', name='$name', price=$price, description='$description' WHERE id=$id");
    echo '<script>
    alert("растение успешно обновлено");
    location.href="index.php";
    </script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="photo"  value="<?php echo $item["photo"] ?>">
        <br>
        <br>
        <input type="text" name="name"  value="<?php echo $item["name"] ?>">
        <br>
        <br>
        <input type="number" name="price"  value="<?php echo $item["price"] ?>">
        <br>
        <br>
        <input type="text" name="description" value="<?php echo $item["description"] ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <br>
        <button type="submit" name="submit">Обновить</button>

    </form>
    <br>
    <br>
    <a href="index.php">Назад</a>
</body>
</html>