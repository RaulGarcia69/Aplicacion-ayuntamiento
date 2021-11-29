<?php 
include '../services/connection.php';
$nombre = $_REQUEST['name'];
$correo = $_REQUEST['email'];
$dni = $_REQUEST['dni'];
$evento = $_REQUEST['evento'];

//puede inscribirse en el evento?
$eve=$pdo->prepare("SELECT * FROM tbl_evento WHERE id=?");
$eve->bindParam(1, $evento);
$eve->execute();

$eve=$eve->fetchAll(PDO::FETCH_ASSOC);
foreach ($eve as $eve) 
    {
        if ($eve['capacidad_even']<$eve['capacidad_max_even'])
        {
            //se puede inscribir
            //usuario ya registrado?
            $usu=$pdo->prepare("SELECT * FROM `tbl_voluntario` WHERE dni_vol=?");
            $usu->bindParam(1, $dni);
            $usu->execute();

            $usu=$usu->fetchAll(PDO::FETCH_ASSOC);
            $num=count($usu);

            if ($num==0)
                {
                    //no esta registrado
                    $stmt=$pdo->prepare("INSERT INTO `tbl_voluntario` (`id`, `nombre_vol`, `correo_vol`, `dni_vol`) VALUES (NULL, ?, ?, ?)");
                    $stmt->bindParam(1, $nombre);
                    $stmt->bindParam(2, $correo);
                    $stmt->bindParam(3, $dni);
                    $stmt->execute();

                    $stmt2=$pdo->prepare("SELECT * FROM `tbl_voluntario` WHERE dni_vol=?");
                    $stmt2->bindParam(1, $dni);
                    $stmt2->execute();

                    $stmt2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($stmt2 as $stmt2) 
                        {
                            $usuid=$stmt2['id'];
                        }
                    //se inscribe en el evento
                    $usuins=$pdo->prepare("INSERT INTO `tbl_evento_voluntario` (`id`, `id_vol`, `id_even`) VALUES (NULL, ?, ?)");
                    $usuins->bindParam(1, $usuid);
                    $usuins->bindParam(2, $eve['id']);
                    $usuins->execute();

                    //se suma la cantidad de voluntarios en el evento
                    $evensum=$pdo->prepare("UPDATE `tbl_evento` SET `capacidad_even` = (SELECT tbl_evento.capacidad_even+1 FROM tbl_evento where id=?) WHERE tbl_evento.id = ?");
                    $evensum->bindParam(1, $eve['id']);
                    $evensum->bindParam(2, $eve['id']);
                    $evensum->execute();
                }
            else 
                {
                    //esta registrado
                    foreach ($usu as $usu) 
                        {
                            $usuid=$usu['id'];
                        }

                    //esta inscrito en el evento?
                    $eventovol=$pdo->prepare("SELECT * FROM `tbl_evento_voluntario` where id_vol=? and id_even=?");
                    $eventovol->bindParam(1, $usuid);
                    $eventovol->bindParam(2, $eve['id']);
                    $eventovol->execute();

                    $eventovol=$eventovol->fetchAll(PDO::FETCH_ASSOC);
                    $num=count($eventovol);
                    if ($num==0) 
                        {
                            //se inscribe en el evento
                            $usuins=$pdo->prepare("INSERT INTO `tbl_evento_voluntario` (`id`, `id_vol`, `id_even`) VALUES (NULL, ?, ?)");
                            $usuins->bindParam(1, $usuid);
                            $usuins->bindParam(2, $eve['id']);
                            $usuins->execute();

                            //se suma la cantidad de voluntarios en el evento
                            $evensum=$pdo->prepare("UPDATE `tbl_evento` SET `capacidad_even` = (SELECT tbl_evento.capacidad_even+1 FROM tbl_evento where id=?) WHERE tbl_evento.id = ?");
                            $evensum->bindParam(1, $eve['id']);
                            $evensum->bindParam(2, $eve['id']);
                            $evensum->execute();
                        }
                    else
                        {
                            //ya estaba inscrito
                            header("Location:../view/form.php?ya-registrado=si");
                        }
                }
            header("Location:../view/login.php");
        }
        else
        {
            //no se pueden inscribir mas
            header("Location:../view/login.php");
        }
    }
