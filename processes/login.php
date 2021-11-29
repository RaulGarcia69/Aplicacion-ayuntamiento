<?php
include_once '../services/connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password);

$stmt=$pdo->prepare("SELECT * FROM `tbl_admin` WHERE correo_admin=? and pass_admin=?");
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $password);


$stmt->execute();

$stmt=$stmt->fetchAll(PDO::FETCH_ASSOC);
$num=count($stmt);

try {
    if ($num==1)
    {
        session_start();
        $_SESSION['admin']=$username;
        header("Location:../view/evento.admin.php");
 
    }
    else {
        header("Location:../view/login.php");
    }
}catch(PDOException $e){
    header("Location:../view/login.php");
 }

