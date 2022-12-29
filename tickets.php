<?php
session_start();
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

    <title>Comprar Tickets</title>
  </head>
  <body>
    <?php
    include "./header.php"
    ?>
    <main>
        <div class="row row-cols-1 row-cols-md-3 container">
          <div class="col">
            <div class="card estudiante">
              <div class="card-body">
                <h5 class="card-title">Estudiante</h5>
                <p class="card-text">Tienen un descuento</p>
                <h5>80%</h5>
                <p class="card-text"><small class="text-muted">*presentar documentación</small></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card trainee">
              <div class="card-body">
                <h5 class="card-title">Trainee</h5>
                <p class="card-text">Tienen un descuento</p>
                <h5>50%</h5>
                <p class="card-text"><small class="text-muted">*presentar documentación</small></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card junior">
              <div class="card-body">
                <h5 class="card-title">Junior</h5>
                <p class="card-text">Tienen un descuento</p>
                <h5>15%</h5>
                <p class="card-text"><small class="text-muted">*presentar documentación</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="title-ventas">
            <p>VENTA</p>
            <h4>VALOR DE TICKET $200</h4>
        </div>
        <form action="" class="container">
          <div class="row">
            <div class="col col-form">
              <input id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Nombre">
              <p id="completar-nombre" class="incompleto"></p>
            </div>
            <div class="col col-form">
              <input id="apellido" type="text" class="form-control" placeholder="Apellido" aria-label="Apellido">
              <p id="completar-apellido" class="incompleto"></p>
            </div>
          </div>
          <div class="row form-large">
            <input type="email" class="form-control" id="email" placeholder="Correo"> 
            <p id="completar-email" class="incompleto"></p>
          </div>  
          <div class="row">
            <div class="col col-form">
              <h6>Cantidad</h6>
              <input type="number" id="cantidad" class="form-control" placeholder="cantidad" aria-label="First name">
              <p id="completar-cantidad" class="incompleto"></p>
            </div>
            <div class="col col-form col-select">
              <h6>Categoría</h6>
              <select name="select-categoria" id="select-categoria" class="form-select" aria-label="Default select example">
                <option selected>elegir categoria</option>
                <option value="estudiante">Estudiante</option>
                <option value="trainee">Trainee</option>
                <option value="junior">Junior</option>
                <option value="publico">Público en general</option>
              </select>
              <p id="completar-categoria" class="incompleto"></p>
            </div>
          </div>  
          <div class="row form-large">
            <h5 id="total-pagar" class="form-control total">Total a pagar: $</h5> 
          </div>
          <div class="row row-button">
            <div class="col col-form">
              <button onclick="cleanUp()" class="btn btn-ticket" type="button">Borrar</button>
            </div>
            <div class="col col-form">
              <button onclick="dataInput()" class="btn btn-ticket" type="button">Resumen</button>
            </div>
          </div>
        </form>

    </main>
    <?php 
    include "./footer.php"
    ?>
    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>