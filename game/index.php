<?php
session_start();
error_reporting(0);
include "../config/connection.php";
$id_usr=$_SESSION['id_usr'];
if(empty($id_usr)){
  echo "<script> window.location.replace('../'); </script>";
}

$usuario=mysqli_query($conn,"SELECT * from users where id='$id_usr'");
$row_usuario=mysqli_fetch_assoc($usuario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 🧠 Memorama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
   <!-- CSS  -->
    <style>
        :root{
            --w:calc(70vw / 6);
            --h:calc(70vh / 4);
            --blue:#00e1ff;
            --black:#000000;
            --success:rgb(0, 47, 255);
            --success50:rgba(0, 47, 255,1)
        }
        
    </style>
    
    <nav class="navbar navbar-expand-lg navbar-dark" ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fas fa-ellipsis-v"></i>
  </button>
  <b style="font-size: 30px;"><i class="fas fa-brain"></i> </b>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
    </ul>
    <?php
    list($nombre1,$nombre2) = explode(" ", $row_usuario['usuario']);
    echo $nombre1 . " " . $nombre2 ;
    ?>
  </div>
</nav>



<div class="game">


    <div class="menu">
        
            <b id="intentos">Intentos 0</b>
        

    </div>
    <div class="nivel">
        NIVEL <b id="nivel"><?php echo  $row_usuario['nivel'];  ?></b>
    </div>



        <div id="tablero">
            
            
            
        </div>
<br><br>
        <button class="nuevo-juego" type="button" onclick="generarTablero()">
            Mezclar
        </button>



</div>


    <script src="js/functions.js" defer></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>