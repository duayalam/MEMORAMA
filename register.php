<?php
include "config/connection.php";
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];


if(empty($usuario) || empty($clave) || empty($nombre)){
    echo "<div class='alert alert-danger'>Campos incompletos</div>";

}else{

    $select=mysqli_query($conn,"select * FROM users where usuario = '$usuario'");
    if(mysqli_num_rows($select) > 0){
        echo "<div class='alert alert-danger'>Usuario ya existe</div>";
    }else{
        $insert=mysqli_query($conn,"INSERT INTO users (nombre,usuario,clave) values
        ('$nombre','$usuario','$clave')");
        echo "<div class='alert alert-primary'>Registrado con exito, preparando todo para ti...</div>";
    }

}
?>