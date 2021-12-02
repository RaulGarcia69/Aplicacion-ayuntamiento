<!DOCTYPE html>
<?php 
include_once '../services/connection.php';
$evento_id = $_REQUEST['id'];
session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location:../view/login.php");
    }
    else{
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/code.js"></script>
</head>
<body class="body-admin">
<div class="atras"><a href="evento.admin.php"><img src="../img/back.png" ></a></div>
<div class="logout"><a href="../processes/kill-login.php"><img src="../img/logout.png" ></a></div>
<div class="menu" id="admin">
        <div class="logo2"><img src="../img/logo.svg"></div>
    </div>
<div class="historial">
    <div class="tabla">
    <table class="table table-hover" id="borde-tabla">
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
                    <td><?php echo $voluntarios['nombre_vol'] ?></td>
                    <td><?php echo $voluntarios['correo_vol'] ?></td>
                    <td><?php echo $voluntarios['dni_vol'] ?></td>
                    <td></td>
                </tr>

                <?php } ?>
        </tbody>

    </table>
    </div>
</div>
<div class="eliminar-evento"><form action="../processes/eliminar.evento.php" method="POST"><button class="btn btn-danger btn-lg" type="submit" name="evento" value="<?php echo $evento_id; ?>">Eliminar evento</button></form></div>
<div class="modificar-evento"><form action="admin.php" method="POST"><button class="btn btn-primary btn-lg" type="submit" name="id" value="<?php echo $evento_id; ?>">Modificar evento</button><input type="hidden" name="evento" value="<?php echo $evento_id; ?>"></form></div>

<?php
    if (isset($_REQUEST['evento'])) {
        $modificar_evento_id=$_REQUEST['evento'];
        
        $modificar_evento_stmt=$pdo->prepare("SELECT * FROM `tbl_evento` where id=?");
        $modificar_evento_stmt->bindParam(1, $modificar_evento_id);
        $modificar_evento_stmt->execute();

        $modificar_evento_stmt=$modificar_evento_stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($modificar_evento_stmt as $modificar_evento_stmt) {
            ?>
            <div class="region-registrarse modalmask registrado" id="region-crear">
            <a href="#cerrar" class="cerrar-evento-form" id="cerrar">x</a>
            <div class="registrarse resize" id="crear-evento-form">
                <form action="../processes/crear.evento.php" method="POST"class="registrarse-form" id="crear-evento-posicion" enctype="multipart/form-data" onsubmit="return validar_admin()">
                <div class="nom-even" id="nom-even-modificar"><h1>Modificar <?php echo $modificar_evento_stmt['nombre_even']; ?></h1></div>
                    <div class="form-crear-1 crear-evento-form" id="form-crear-1-mod">
                        <div class="input-espacio">
                            <label for="name">Nombre Actividad</label>
                            <input type="text" class="registrarse-input_username form-evento-input" name="nombre" id="nombre" value="<?php echo $modificar_evento_stmt['nombre_even']; ?>">
                        </div>
                        <div class="input-espacio">
                            <label for="dni">Capacidad Máxima Actividad</label>
                            <input type="number" class="registrarse-input_username" min="1" name="capacidad_max" value="<?php echo $modificar_evento_stmt['capacidad_max_even']; ?>">
                        </div>
                    </div>
                    <div class="form-crear-2 crear-evento-form" id="form-crear-2-mod">
                    <div class="input-espacio">
                            <label for="dni">Fecha inicio Actividad</label>
                            <input type="date" name="fecha_ini" value="<?php echo $modificar_evento_stmt['fecha_ini_even']; ?>">
                        </div>
                        <div class="input-espacio">
                            <label for="dni">Lugar Actividad</label>
                            <input type="text" class="registrarse-input_username" name="lugar" value="<?php echo $modificar_evento_stmt['lugar_even']; ?>">
                        </div>
                    </div>
                    <div class="form-crear-3 crear-evento-form" id="form-crear-3-mod">
                        <div class="input-espacio">
                            <label for="dni">Fecha fin Actividad</label>
                            <input type="date" name="fecha_fin" value="<?php echo $modificar_evento_stmt['fecha_fin_even']; ?>">
                        </div>
                        <div class="input-espacio">
                            <label for="dni">Imagen Actividad</label>
                            <input type="file" name="file" class="upload" accept="image/*">
                        </div>
                    </div>
                    <div class="form-crear-4 crear-evento-form" id="form-crear-4-mod">
                        <label for="dni" id="label-textarea">Descripcion Actividad</label>
                        <textarea name="descripcion" class="textarea" id="descripcion"><?php echo $modificar_evento_stmt['descripcion_even']; ?></textarea>
                    </div>
                    
                    <input type="submit" name="enviar" value="Crear" class="registrarse-btn_enviar" id="crear-btn">
                </form>
                
            </div>
      
</div>
        <?php 
        }
        ?>
<?php
 }
 ?>
</body>
</html>
<?php } ?>