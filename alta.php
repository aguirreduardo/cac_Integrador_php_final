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
    <main class="main-form">
        <form action="server.php" method="POST">
          <div>
            <input type="hidden" value="newlogin" name = "login">
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
          
          <h5>Registrarse como:</h5>
           
          <div class="mb-3">
            <div class="mb-3 form-check">
              <input type="radio" class="form-check-input" id="radiotype" name="radiotype" value="publico" checked>
              <label class="form-check-label" for="exampleCheck1">Publico en general</label>
            </div>
            <div class="mb-3 form-check">
              <input type="radio" class="form-check-input" id="radiotype" name="radiotype" value="orador">
              <label class="form-check-label" for="exampleCheck1">Orador</label>
            </div>
          </div>
            
          <div>
            <button type="submit" class="badge-dos">Registrar</button>
          </div>
            
        </form>

    </main>
    <?php 
    include "./footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
