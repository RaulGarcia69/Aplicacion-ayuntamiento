<!DOCTYPE html>
<?php 
include_once '../services/connection.php';
$evento_id = $_REQUEST['id'];
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
</head>
<body class="body-admin">
<div class="atras"><a href="evento.admin.php"><img src="../img/back.png" ></a></div>
<div class="logout"><a href="../processes/kill-login.php"><img src="../img/logout.png" ></a></div>
<div class="menu">
        <div class="logo2"><img src="../img/logo.svg"></div>
    </div>
<div class="historial">
    <table class="table tablehover">
    <thead class="thead-dark">
        <tr><form action="admin.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $evento_id?>">
                <th><input type="text" name="nombre" placeholder="Nombre"></th>
                <th><input type="text" name="correo" placeholder="Correo"></th>
                <th><input type="text" name="dni" placeholder="DNI"></th>
                <th><input type="submit" name="enviar" value="Filtrar"></th>
        </form></tr>

        <?php
    $queryGeneral = "SELECT tbl_voluntario.nombre_vol,tbl_voluntario.correo_vol, tbl_voluntario.dni_vol FROM `tbl_voluntario`
     INNER JOIN tbl_evento_voluntario on tbl_voluntario.id=tbl_evento_voluntario.id_vol 
     INNER JOIN tbl_evento on tbl_evento_voluntario.id_even=tbl_evento.id where tbl_evento.id={$evento_id} ";

    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $query_nombre = "AND nombre_vol LIKE '%$nombre%'";
        $queryGeneral = $queryGeneral.$query_nombre;
    }
    if(isset($_POST['correo'])){
        $correo = $_POST['correo'];
        $query_correo = "AND correo_vol LIKE '%$correo%'";
        $queryGeneral = $queryGeneral.$query_correo;
    }
    if(isset($_POST['dni'])){
        $dni = $_POST['dni'];
        $query_dni = "AND dni_vol LIKE '%$dni%'";
        $queryGeneral = $queryGeneral.$query_dni;
    }

        $voluntarios=$pdo->prepare($queryGeneral);
        $voluntarios->execute();
        $voluntarios = $voluntarios->fetchAll(PDO::FETCH_ASSOC);
        ?>      


        
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>DNI</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($voluntarios as $voluntarios) { ?>
                <tr>
                    <td id="textocolor"><?php echo $voluntarios['nombre_vol'] ?></td>
                    <td id="textocolor"><?php echo $voluntarios['correo_vol'] ?></td>
                    <td id="textocolor"><?php echo $voluntarios['dni_vol'] ?></td>
                    <td></td>
                </tr>

                <?php } ?>
        </tbody>

    </table>
</div>
    
</body>
</html>