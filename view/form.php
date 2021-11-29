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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/code.js"></script>
    
</head>
<body>
    <div class="menu">
        <div class="logo"><a href="#"><img src="../img/logo.svg"></a></div>
    </div>
        
    <div class="evento-todos" id="evento-todos">
        <h1>Actividades destacadas de los próximos días </h1>

    
<?php
    $evento=$pdo->prepare("SELECT * FROM `tbl_evento` ORDER BY tbl_evento.fecha_ini_even ASC");
    $evento->execute();
    $evento=$evento->fetchAll(PDO::FETCH_ASSOC);
    foreach ($evento as $evento) {
    ?>
    <div class="evento-individual" data-id="<?php echo $evento['id']; ?>" data-nombre="<?php echo $evento['nombre_even']; ?>">
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
<div class="region-registrarse modalmask" id="modal">
    <a href="#cerrar" class="cerrar" id="cerrar">x</a>
            <div class="registrarse resize">
                <form action="../processes/register.proc.php" method="POST"class="registrarse-form">
                    <h1 id="nom-even-modal"></h1>
                    <label for="name">Introduce tu nombre</label>
                    <input type="text" placeholder="Nombre" class="registrarse-input_username" name="name">
                    <label for="email">Introduce tu correo</label>
                    <input type="email" placeholder="correo@correo.com" class="registrarse-input_username" name="email">
                    <label for="dni">Introduce tu DNI</label>
                    <input type="text" placeholder="DNI" class="registrarse-input_username" name="dni">
                    <input type="hidden" name="evento" id="eventoname">
                    <input type="submit" name="enviar" value="Inscribirse" class="registrarse-btn_enviar">
                </form>
                
            </div>
      
</div>
<?php
    if (isset($_REQUEST['registrado'])) {
        ?>
        <div class="region-registrarse modalmask registrado" id="registado">
            <div class="registrarse resize">
                    <h1>Te has registrado</h1>
                
            </div>
      
</div>
    <?php
    }elseif (isset($_REQUEST['evento-lleno'])) {
        ?>
        <div class="region-registrarse modalmask registrado" id="evento-lleno">
                    <h1>Error. El evento ya esta lleno.</h1>
                
            </div>
      
</div>
<?php
    }elseif (isset($_REQUEST['ya-registrado'])) {
        ?>
        <div class="region-registrarse modalmask registrado" id="ya-registrado">
            <div class="registrarse resize">
                    <h1>Error. Ya estas inscrito en el evento.</h1>
            </div>
      
</div>
<?php
    }
?>



                
</body>
</html>
