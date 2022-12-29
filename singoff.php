<?php 
session_start();
session_destroy(); 
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Conf Codo a Codo</title>
  </head>
  <body>
    <?php
    include "./header.php"
    ?>
    <main>
        <h5>Volver a <a href="index.php">pagina principal</a></h5>
        <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Sesión cerrada',
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href="index.php"
                    }
                  })
                </script>
    </main>
    <?php 
    include "./footer.php"
    ?>
    
  </body>
</html>



