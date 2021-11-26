<?php
include_once '../services/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Actividades de Barcelona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <div class="menu">
        <div class="logo"><a href="#"><img src="../img/logo.svg"></a></div>
    </div>
        
    <div class="evento-todos">
        <h1>Actividades destacadas de los próximos días </h1>

    
<?php
    $evento=$pdo->prepare("SELECT * FROM `tbl_evento` ORDER BY tbl_evento.fecha_ini_even ASC LIMIT 3");
    $evento->execute();
    $evento=$evento->fetchAll(PDO::FETCH_ASSOC);
    foreach ($evento as $evento) {
    ?>
    <div class="evento-individual">
        <div class="evento-individual-contenido">
            <h1><?php echo $evento['nombre_even']; ?></h1>
            <p><?php echo $evento['descripcion_even']; ?></p>
            <?php
            if ($evento['fecha_fin_even']==null or $evento['fecha_fin_even']==$evento['fecha_ini_even']) {
                ?><p><strong>Cuando:</strong> El <?php echo $evento['fecha_ini_even']; ?></p>
                <?php
            }
            else{
                ?><p><strong>Cuando:</strong> De <?php echo $evento['fecha_ini_even']; ?> a <?php echo $evento['fecha_fin_even']; ?></p>
                <?php
            }
            ?>
            <p><strong>Donde:</strong> En <?php echo $evento['lugar_even']; ?></p>
            
        </div>
        <div class="evento-individual-imagen">
            <img src="../img/even_img/<?php echo $evento['img_even']; ?>" width="400vh" height="300vh">
        </div>
        <div class="inscribir"><button type='button' class='btn btn-light btn-lg' >Inscribirte</button></div>
        
        
    </div>
    
    <?php
        }
    ?>

</div>
                
</body>
</html>