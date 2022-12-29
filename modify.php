<?php
session_start();
$user = @$_SESSION['user'];
$id = @$_SESSION['id'];
include "./conexion.php";?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/style.css">
        <link rel="stylesheet" href="./CSS/style2.css">

        <title>Conf Codo a Codo</title>
    </head>
    <body>
        <?php
        include "./header.php"
        ?>
        <main>
            <?php if (isset($id)):   
                if ($user=='admin'): // modifica las variables si el usuario es el administrador
                
                    $user = $_GET['user'];
                    $id = $_GET['id'];
                    $previous_email = $_GET['previous_email'];

                endif;?> 

                <form action="server.php" method="POST" class= 'container'> <!--form para cargar las modificaciones-->
                    <div>
                        <input type="hidden" value="modify" name = "login">
                        <input type="hidden" value="<?= $id ?>" name="id" id="">
                        <input type="hidden" value="<?= $previous_email ?>" name="previous_email" id="">
                        <input type="hidden" value="<?= $user ?>" name="radiotype" id="">

                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" minlength = "2" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido" minlength = "2" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Correo" minlength = "8" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Password" minlength = "6" required>
                    </div>
                        
                    <div>
                        <button type="submit"onclick = "modify()" class="badge-dos">Modificar</button>
                    </div>
                    
                </form>
            <?php else:?>
                <h5>No se encontró ningun usuario registrado. Por favor vuelva a ingresar e intentelo nuevamente. <a href="ingresar.php">Ingresar</a>.</h5>
            <?php endif; ?>

        </main>
        <?php 
        include "./footer.php"
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./js/alert.js"></script>

    </body>
</html>


