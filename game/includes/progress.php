<?php
session_start();
error_reporting(0);
include "../../config/connection.php";
$id_usr=$_SESSION['id_usr'];

$usuario=mysqli_query($conn,"SELECT * from users where id='$id_usr'");
$row_usuario=mysqli_fetch_assoc($usuario);

$nivel=$_POST['nivel'];
$acertadas=$_POST['acertadas'];
$intentos=$_POST['intentos'];
$insert=mysqli_query($conn,"INSERT INTO progress (id_usr,nivel,acertadas,intentos) values ('$id_usr','$nivel','$acertadas','$intentos')");

if($_POST['nt']/2 == $acertadas){
    $nivel=$nivel+1;
}
$user=mysqli_query($conn,"UPDATE users SET nivel = '$nivel' where id='$id_usr'");


?>
