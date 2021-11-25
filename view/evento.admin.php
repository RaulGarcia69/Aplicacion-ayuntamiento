<!DOCTYPE html>
<?php 
include_once '../services/connection.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Actividades de Barcelona</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="../js/code.js"></script>
</head>
<body>
<div class="logout"><a href="../processes/kill-login.php"><img src="../img/logout.png" ></a></div>
<div class="visualizar-eventos">
<?php

    function limit_words($string, $word_limit)
    {
        $words = explode(" ",$string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    $evento=$pdo->prepare("SELECT * from tbl_evento");
    $evento->execute();
    $evento=$evento->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($evento as $evento) {
        $nombre=$evento['nombre_even'];
        $id=$evento['id'];
        $numero_evento="nombre_even=".$nombre."&id=".$id;
?>
    
    <div class="evento" onclick="location.href='admin.php?<?php echo $numero_evento?>';">
    <div class="evento-contenido">
    <h3><?php echo $evento['nombre_even']; ?></h3>
    <p><?php echo limit_words($evento['descripcion_even'],20); ?>...</p>
    </div>
    </div>
    

<?php
        }
    ?>
    </div>
    
</body>
</html>