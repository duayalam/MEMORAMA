<?php
session_start();
include "config/connection.php";

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];


if(empty($usuario) || empty($clave)){
    echo "<div class='alert alert-danger'>Campos incompletos</div>";
    session_destroy();

}else{
    $validar=mysqli_query($conn,"SELECT * from users where usuario='$usuario'");
    $row_validar=mysqli_fetch_assoc($validar);


    if(mysqli_num_rows($validar) == 0){
        echo "<div class='alert alert-danger'>Usuario no existe</div>";
        session_destroy();
    }else{
        if($clave == $row_validar['clave']){
            echo "<div class='alert alert-primary'>Bienvenido, preparando todo para ti...</div>";
            $_SESSION['id_usr']=$row_validar['id'];
            $_SESSION['nombre']=$row_validar['nombre'];
            ?>
<script>
    setTimeout(function(){
        window.location.replace("game/");
    },2000)
</script>
            <?php

        }else{
            echo "<div class='alert alert-danger'>Contraseña incorrecta</div>"; 
            session_destroy();
        }
    }
}

?>