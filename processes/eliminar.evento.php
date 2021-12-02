<?php 
include '../services/connection.php';
$id = $_REQUEST['evento'];

$eve=$pdo->prepare("DELETE FROM `tbl_evento` WHERE `tbl_evento`.`id` = ?");
$eve->bindParam(1, $id);
$eve->execute();

header("Location:../view/evento.admin.php");