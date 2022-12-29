<?php //En este archivo se encuentran el registro para la carga de un nuevo usuario, el login para inicio de session, para modificar usuario y para eliminar usuario. 
  
  session_start(); //Inicio de sesión
  $login = $_POST['login'];
  $user = @$_SESSION['user'];
  $id = @$_SESSION['id'];
  include "./conexion.php";
?>


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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Conf Codo a Codo</title>
  </head>
  <body>
    <?php
    include "./header.php"
    ?>
    <main> 
      <?php if($login == 'newlogin'):?> <!-------------CARGAR UN NUEVO REGISTRO ------------>
                    
        
       <!-------------  ------------>


        <?php //los datos provienen de alta.php
        $name = htmlentities($_POST["name"]);
        $lastname = htmlentities($_POST["lastname"]);
        $email = htmlentities($_POST["email"]);
        $pass = htmlentities($_POST["password"]);
        $radiotype = $_POST["radiotype"];?>

        <?php if (isset($name) && isset($lastname) && isset($email) && isset($pass)):?> <!--Me aseguro que contengan informacion -->
         
          <?php //consulto si en existe el mail en las BBDD admin, publico u orador
          $consulta_a = mysqli_query($conexion,"SELECT * FROM `admin` WHERE Email='$email'");
          $consulta_p = mysqli_query($conexion,"SELECT * FROM `publico` WHERE Email='$email'");
          $consulta_o = mysqli_query($conexion,"SELECT * FROM `orador` WHERE Email='$email'");


          if (($consulta_p->num_rows) || ($consulta_o->num_rows) || ($consulta_a->num_rows)):?>
            <h5>El correo ingresado ya fue registrado. Por favor prueba con otro correo. Vuelve a <a href="alta.php">registrarte</a></h5>         
          <?php else: ?>
            <?php 
            $insertar = mysqli_query($conexion,"INSERT INTO `$radiotype`(`Nombre`, `Apellido`, `Email`, `Password`) VALUES ('$name','$lastname','$email','$pass')");
            $consulta = mysqli_query($conexion,"SELECT * FROM `$radiotype` WHERE Email='$email' AND Password='$pass'"); //traigo la información del usuario recien creado
            if($consulta -> num_rows):?> <!--Aqui confirmo que el registro fue un exito-->
              <?php $listado = mysqli_fetch_array($consulta)?>
              <h5>Bienvenido <?= $listado['Nombre'];?>!! Tu registro fue exitoso. Sera muy grato tenerte entre el público!!</h5>
              <h5>Puedes confirmar tu inscripción <a href="registro.php">aquí</a>.</h5>
              <?php 
              $_SESSION['user'] = $radiotype;
              $_SESSION['id'] = $listado['ID'];
              $_SESSION['email'] = $listado['Email'];
              ?>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Bienvenido <?= $listado['Nombre'];?>!! Tu registro fue exitoso!',
                  footer: 'A continuacion podras ingresar con tu usuario y contraseña.'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href="registro.php"
                  }
                })
              </script>
            <?php else:?>
              <h5>Por algun motivo no pudimos registrarte. Por favor vuelve a intentar <a href="alta.php">registrarte</a>.</h5>
            <?php endif;?>
          <?php endif; ?>
          
        <?php else:?>
          <h5>Faltó completar alguna información solicitada. Vuelve a <a href="alta.php">registrarte</a> y asegurate de completar todos los campos. </h5>
        <?php endif; ?>

      <?php elseif ($login == 'ingreso'):?> <!------INGRESO NORMAL ----->
        <?php 
        $email = htmlentities($_POST["email"]); //los datos provienen de ingreso.php
        $pass = htmlentities($_POST["password"]);
        $consulta_a = mysqli_query($conexion,"SELECT * FROM `admin` WHERE Email='$email'");
        $consulta_p = mysqli_query($conexion,"SELECT * FROM `publico` WHERE Email='$email'");
        $consulta_o = mysqli_query($conexion,"SELECT * FROM `orador` WHERE Email='$email'");
        
        if ($consulta_a -> num_rows):?> <!--Aqui consulta si el mail ingresado esta en la tabla 'admin' de la BBDD-->
          <?php $consulta = mysqli_query($conexion,"SELECT * FROM `admin` WHERE Email='$email' AND Password='$pass'"); 
          if($consulta -> num_rows):?> <!--Aqui consulta si el password ingresado coincide con el mail-->
            <?php
            $listado = mysqli_fetch_array($consulta)?>
            <h5>Hola <?= $listado['Nombre'];?>, tu ingreso fue exitoso. Estas registrado como administrador.</h5>
            <h5><a href="registro.php">Ver participantes</a></h5>
            
            <?php 
            $_SESSION['user'] = 'admin';
            $_SESSION['id'] = $listado['ID'];
            $_SESSION['email'] = $listado['Email'];
            ?>

            <script>
              Swal.fire({
                icon: 'success',
                title: 'Hola <?= $listado['Nombre'];?>!!',
                text: 'Estas registrado como Administrador',
                footer: 'A continuacion veras la lista de participantes'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href="registro.php"
                }
              })
            </script>
          <?php else:?>
            <h5>Contraseña incorrecta. Ingrésala nuevamente</h5>
            <form action="server.php" method="POST">
              <div>
                <input type="hidden" value="ingreso" name = "login">
              </div>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value = '<?= $email ?>'>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>
            </form>
          <?php endif; ?>
        <?php elseif ($consulta_p -> num_rows):?> <!--Aqui consulta si el mail ingresado esta en la tabla 'publico' de la BBDD.-->
          <?php $consulta = mysqli_query($conexion,"SELECT * FROM `publico` WHERE Email='$email' AND Password='$pass'"); 
          if($consulta -> num_rows):?> <!--Aqui consulta si el password ingresado coincide con el mail-->
            <?php $listado = mysqli_fetch_array($consulta)?>
            <h5>Hola <?= $listado['Nombre'];?>, tu ingreso fue exitoso. Sera muy grato tenerte entre el público!!</h5>
            <h5><a href="registro.php">Ver participantes</a></h5>
           
            <?php 
            $_SESSION['user'] = 'publico';
            $_SESSION['id'] = $listado['ID'];
            $_SESSION['email'] = $listado['Email'];
            ?>

            <script>
              Swal.fire({
                icon: 'success',
                title: '¡¡Hola <?= $listado['Nombre'];?>!!',
                text: '¡Estamos felices de verte por aquí!',
                footer: 'A continuacion veras la lista de participantes'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href="registro.php"
                }
              })
            </script>
          <?php else:?>
            <h5>Contraseña incorrecta. Ingresala nuevamente</h5>
            <form action="server.php" method="POST">
              <div>
                <input type="hidden" value="ingreso" name = "login">
              </div>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value = '<?= $email ?>'>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>
            </form>
          <?php endif; ?>
        <?php elseif ($consulta_o -> num_rows):?> <!--Aqui consulta si el mail ingresado esta en la tabla 'orador' de la BBDD -->
          <?php $consulta = mysqli_query($conexion,"SELECT * FROM `orador` WHERE Email='$email' AND Password='$pass'");
          if($consulta -> num_rows):?> <!--Aqui consulta si el password ingresado coincide con el mail-->
            <?php
            $listado = mysqli_fetch_array($consulta)?>
            <h5>Hola <?= $listado['Nombre'];?>, tu ingreso fue exitoso. Estas registrado como orador.</h5>
            <h5><a href="registro.php">Ver participantes</a></h5>
            <?php 
            $_SESSION['user'] = 'orador';
            $_SESSION['id'] = $listado['ID'];
            $_SESSION['email'] = $listado['Email'];

            ?>
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Hola <?= $listado['Nombre'];?>!!',
                text: '¡Tu charla sera todo un exito!',
                footer: 'A continuacion veras la lista de participantes'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href="registro.php"
                }
              })
            </script>
          <?php else:?>
            <h5>Contraseña incorrecta. Ingrésala nuevamente</h5>
            <form action="server.php" method="POST">
              <div>
                <input type="hidden" value="ingreso" name = "login">
              </div>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value = '<?= $email ?>'>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>
            </form>
          <?php endif; ?>
        
        <?php else: ?>
          <h5>Email no registrado</h5>
          <ul>
            <li>Si te registraste anteriomente, por favor verifica que estes en la lista <a href="registro.php">Ver participantes</a></li>
            <li>Si no figuras en la lista o deseas registrarte por primera vez, puedes hacerlo <a href="alta.php">aquí</a>.</li>
          </ul>
        <?php endif; ?>

      <?php elseif($login == 'modify'):?> <!------------- INICIO DE UNA MODIFICACION ------------>
        <?php // los datos provienen de modify.php
        $id = $_POST["id"]; 
        $name = htmlentities($_POST["name"]);
        $lastname = htmlentities($_POST["lastname"]);
        $email = htmlentities($_POST["email"]);
        $pass = htmlentities($_POST["password"]);
        $radiotype = $_POST["radiotype"];
        
        if ($user == 'admin'):
          $previous_email = $_POST["previous_email"];?>
        <?php else:
          $previous_email = $_SESSION['email'];
        endif;?>        

        <?php if (isset($name) && isset($lastname) && isset($email) && isset($pass)):?> <!--Me aseguro que contengan informacion -->
         
          <?php 
          $consulta_p = mysqli_query($conexion,"SELECT * FROM `publico` WHERE Email='$email'");
          $consulta_o = mysqli_query($conexion,"SELECT * FROM `orador` WHERE Email='$email'");

          if ((($consulta_p->num_rows) || ($consulta_o->num_rows))&($email!=$previous_email)):?>
            <h5>El correo ingresado ya fue registrado. Por favor prueba con otro correo. Vuelve a intentar <a href="registro.php">aqui</a></h5>
            <script>
              Swal.fire({
                icon: 'error',
                title: 'El correo ingresado ya fue registrado por otro usuario!',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href="registro.php"
                }
              })
            </script>         
          <?php else: ?>
            <?php 
            if ($user != 'admin'): //cambio el email de la session
              $_SESSION['email'] = $email;
            endif;?> 

            <?php 
            $consulta = mysqli_query($conexion,"UPDATE `$radiotype` SET `Nombre`='$name',`Apellido`='$lastname',`Email`='$email',`Password`='$pass' WHERE ID = '$id'");
            ?>
            <h5><?= $name ?> puedes confirmar tu modificación <a href="registro.php">aquí</a>.</h5>
            <script>
              Swal.fire({
                icon: 'success',
                title: 'La modificación fue un exito!',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href="registro.php"
                }
              })
            </script>
          <?php endif; ?>
          
        <?php else:?>
          <h5>Faltó completar alguna información solicitada. Vuelve a intentar <a href="registro.php">aqui</a> y asegurate de completar todos los campos. </h5>
        <?php endif; ?>
      

      <?php elseif($login == 'delete'):?> <!------- INICIO DE UNA ELIMINACIÓN DE USUARIO --------->
        <?php if (isset($user)):
          if ($user=='admin'): 
            $user= $_POST['user'];
            $id = $_POST['id'];
          endif;?>

            <?php
              $consulta = mysqli_query($conexion,"SELECT * FROM `$user` WHERE ID='$id'");
              $listado = mysqli_fetch_array($consulta);

              $name = $listado['Nombre'];
              $lastname = $listado['Apellido'];
              $email = $listado['Email'];
              $pass = $listado['Password'];

              $consulta = mysqli_query($conexion, "INSERT INTO `deleted`(`Nombre`, `Apellido`, `Email`, `Password`, `User`) VALUES ('$name','$lastname','$email','$pass','$user')");
            ?>
            <?php
              $delete = mysqli_query($conexion,"DELETE FROM `$user` WHERE ID='$id'");
            ?>
            <h6>Se borro el usuario satisfactoriamente de la lista de <?=$user?>. Puedes verificar <a href="registro.php">aquí</a>.</h6>

          <?php if ($_SESSION['user'] != 'admin'):
            session_destroy();
          endif;?>

          <script>
            Swal.fire({
              icon: 'success',
              title: 'Usuario borrado satisfactoriamente',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href="registro.php"
              }
            })
          </script>

        <?php else:?>
          <h6>No se encontró ningun usuario registrado. Por favor vuelva a ingresar e intentelo nuevamente. <a href="ingresar.php">Ingresar</a>.</h6>

        <?php endif;
      endif; ?>
    </main>
    <?php 
    include "./footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  
</html>