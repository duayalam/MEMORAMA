<?php
include "config/connection.php";
$top10=mysqli_query($conn,"SELECT a.*, max(b.nivel) as mnivel from users a, progress b where b.id_usr=a.id group by a.id order by b.nivel desc  limit 10");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio de sesion</title>
</head>
<body>


    <div class="ranking">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Top 10
        </button>
        <div class="collapse" id="collapseExample">
            <table class="table table-sm" style="text-align: center; font-size: 12px; width: 300px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nivel</th>
                        <th>Usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador=1;
                    while ($row_top10=mysqli_fetch_assoc($top10)) {
                        
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $row_top10['mnivel'];  ?></td>
                        <td><?php echo substr($row_top10['usuario'],0,10); ?>.</td>
                        <td><i class="fas fa-trophy" style="<?php 
                        if($contador == 1){
                            echo "color:rgb(255, 215, 0);";
                        }elseif($contador==2){
                            echo "color:#C0C0C0;";

                        }elseif($contador==3){
                            echo "color:#CD7F32;";
                        }else{
                            echo "display:none;";
                        }
                        ?>"></i></td>
                    </tr>
                    <?php
                        $contador++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        
    </div>
    
    <script>
        $(".container").load("login.html");
        
    </script>


<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>