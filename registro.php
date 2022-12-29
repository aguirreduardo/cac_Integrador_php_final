<?php
session_start();
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
    
    <title>Conf Codo a Codo</title>
  </head>
  <body>
    <?php
    include "./header.php"
    ?>
    <main class = "registro">
      <?php
      if($user == 'admin'):?>    <!--    Inicio del registro para el ADMINISTRADOR    -->
        <?php
        $consulta = mysqli_query($conexion,"SELECT * FROM orador");
        $cantidad = mysqli_num_rows($consulta);
        ?>
      
        <h2>Oradores (<?= $cantidad ?>)</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Borrar</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                
                while($listado = mysqli_fetch_array($consulta)):
                    ?>

                <tr>
                  <td><?php echo $listado['ID'];?></td>
                  <td><?php echo $listado['Nombre'];?></td>
                  <td><?php echo $listado['Apellido'];?></td>
                  <td><?php echo $listado['Email'];?></td>
                  <td><a class="btn btn-outline-secondary" href="modify.php?user=orador&id=<?=$listado['ID'];?>&previous_email=<?=$listado['Email'];?>" role="button">Modificar</a></td>
                  <td>
                    <form action="server.php" method = 'POST'>
                      <input type="hidden" value="delete" name = "login">
                      <input type="hidden" value="orador" name = "user">
                      <input type="hidden" value="<?= $listado['ID']?>" name = "id">
                      <button type="submit" class="btn btn-outline-secondary">Eliminar</button>
                    </form>
                  </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <?php
        $consulta = mysqli_query($conexion,"SELECT * FROM publico");
        $cantidad = mysqli_num_rows($consulta);
        ?>
        <h2>Publico en general (<?= $cantidad ?>)</h2>
        <table class="table">
          <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Modificar</th>
                <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($listado = mysqli_fetch_array($consulta)):?>
              <tr>
                <td><?php echo $listado['ID'];?></td>
                <td><?php echo $listado['Nombre'];?></td>
                <td><?php echo $listado['Apellido'];?></td>
                <td><?php echo $listado['Email'];?></td>
                <td><a class="btn btn-outline-secondary" href="modify.php?user=publico&id=<?=$listado['ID'];?>&previous_email=<?=$listado['Email'];?>" role="button">Modificar</a></td>
                <td>
                    <form action="server.php" method = 'POST'>
                      <input type="hidden" value="delete" name = "login">
                      <input type="hidden" value="publico" name = "user">
                      <input type="hidden" value="<?= $listado['ID']?>" name = "id">
                      <button type="submit" class="btn btn-outline-secondary">Eliminar</button>
                    </form>
                </td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>


      <?php else:?>      <!--    Inicio del registro para el Oradores y Publico en general    -->
        <?php 
        $consulta = mysqli_query($conexion,"SELECT * FROM orador");
        $cantidad = mysqli_num_rows($consulta);
        ?>
      
        <h2>Oradores (<?= $cantidad ?>)</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                while($listado = mysqli_fetch_array($consulta)):?>
                  <tr>
                  <td><?php echo $listado['Nombre'];?></td>
                  <td><?php echo $listado['Apellido'];?></td>
                  <td><?php echo $listado['Email'];?></td>
                  </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <?php
        $consulta = mysqli_query($conexion,"SELECT * FROM publico");
        $cantidad = mysqli_num_rows($consulta);
        ?>
        <h2>Publico en general (<?= $cantidad ?>)</h2>
        <table class="table">
          <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($listado = mysqli_fetch_array($consulta)):?>
              <tr>
              <td><?php echo $listado['Nombre'];?></td>
              <td><?php echo $listado['Apellido'];?></td>
              <td><?php echo $listado['Email'];?></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
        <?php if(isset($user)):?>
          <div class="row">
            <div class="row form-short">
              <a class="btn btn-outline-secondary" href="modify.php" role="button">Modificar</a> 
            </div>

            <div class= 'buttons'>
              <form class="row form-short form-delete"  action="server.php" method = 'POST'>
                  <input type="hidden" value="delete" name = "login">
                  <input type="hidden" value="<?= $user;?>" name = "user">
                  <input type="hidden" value="<?= $id;?>" name = "id">
                  <button type="submit" class="btn btn-outline-secondary">Eliminar</button>
              </form>
            </div>
          </div>
        <?php endif;?>

      <?php endif; ?>
      
    </main>
    <?php 
    include "./footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>
</html>
      

  


