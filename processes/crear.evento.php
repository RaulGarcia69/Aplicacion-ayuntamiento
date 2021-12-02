<?php 
include '../services/connection.php';
$nombre = $_REQUEST['nombre'];
$descripcion = $_REQUEST['descripcion'];
$lugar = $_REQUEST['lugar'];
$fecha_ini = $_REQUEST['fecha_ini'];
$fecha_fin = $_REQUEST['fecha_fin'];
$capacidad = $_REQUEST['capacidad_max'];
$file=$_FILES['file']['name'];
$path="../img/even_img/".$_FILES['file']['name'];


if (move_uploaded_file($_FILES['file']['tmp_name'],$path)) {
    try{
        $query="INSERT INTO tbl_evento(nombre_even, descripcion_even, lugar_even, fecha_ini_even, fecha_fin_even, capacidad_max_even, img_even) VALUES(?,?,?,?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $descripcion);
        $stmt->bindParam(3, $lugar);
        $stmt->bindParam(4, $fecha_ini);
        $stmt->bindParam(5, $fecha_fin);
        $stmt->bindParam(6, $capacidad);
        $stmt->bindParam(7, $file);
        $stmt->execute();
        header("Location:../view/evento.admin.php");
    }catch(\Throwable $th){
        unlink($path);
        header("Location:../view/evento.admin.php");
    }
}
else{
    header("Location:../view/evento.admin.php");
}
