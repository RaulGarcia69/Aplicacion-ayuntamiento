<?php 
include '../services/connection.php';
$nombre = $_REQUEST['nombre'];
$correo = $_REQUEST['correo'];
$dni = $_REQUEST['dni'];


$usu=$pdo->prepare("SELECT * FROM `tbl_voluntario` WHERE dni_vol=?");
$usu->bindParam(1, $dni);
$usu->execute();

$usu=$usu->fetchAll(PDO::FETCH_ASSOC);
$num=count($usu);

if ($num==0)
    {
        $stmt=$pdo->prepare("INSERT INTO `tbl_voluntario` (`id`, `nombre_vol`, `correo_vol`, `dni_vol`) VALUES (NULL, ?, ?, ?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $correo);
        $stmt->bindParam(3, $dni);
        $stmt->execute();
    }

