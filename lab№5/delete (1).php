<?php
    require('db.php');
       
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $db->query("DELETE FROM flowers WHERE id=$id");
        }

    echo '<script>
    location.href="index.php"
    </script>'
?>