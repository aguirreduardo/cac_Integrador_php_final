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


    <title>Conf Codo a Codo</title>
  </head>
  <body>
    <?php
    include "./header.php"
    ?>
    <main>
      <div class="main-imagenes">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./Imagenes/ba1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./Imagenes/ba2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./Imagenes/ba3.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span> 
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="texto-encima container">
          <h2>Conf Bs As</h2>
          <div>
            <p>Bs As llega por primera veza Argentina. Un evento para compartir con nuestra comunidad el conocimiento y experiencia de los expertos que estan creando el futuro de internet. Ven a conocer a miembros del evento, a otros estudiantes de Codo a Codo y los oradores de primer nivel que tenemos para ti. Te esperamos!</p>
          </div>
          <div>
            <button class="badge-uno">Quiero ser orador</button>
            <button type="button" id="tickets" onclick="window.location.href='tickets.php';" class="badge-dos">Comprar tickets</button>

          </div>
         

                       
        </div>

      </div>

      <div class="oradores">
        <p class="p-oradores">CONOCE A LOS</p>
        <h4>ORADORES</h4>
      </div>

      
      <div class="card-group container">
        <div class="card">
          <img src="./Imagenes/steve.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            
            <span class="badge bg-warning text-dark">JavaScript</span>
            <span class="badge bg-secondary">React</span>
            <h6 class="card-title">Steve Jobs</h6>
            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam consequatur quasi minima quod nihil saepe dignissimos iste itaque odio accusamus, voluptatibus ipsum nesciunt quo veniam maxime facilis dolores, veritatis excepturi?.</p>
          </div>
            
            
        </div>
        <div class="card">
          <img src="./Imagenes/bill.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <span class="badge bg-warning text-dark">JavaScript</span>
            <span class="badge bg-secondary">React</span>
            <h6 class="card-title">Bill Gates</h6>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque aliquid officiis obcaecati soluta? Voluptatem, ex suscipit aperiam exercitationem illo reprehenderit numquam, aut eum eaque totam amet eveniet corporis architecto eligendi!.</p>
          </div>
        </div>
        <div class="card">
          <img src="./Imagenes/ada.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <span class="badge bg-warning text-dark">JavaScript</span>
            <span class="badge bg-secondary">React</span>
            <h6 class="card-title">Ada Lovelace</h6>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia vero eligendi incidunt ea ullam vitae repellat molestiae impedit magni! Numquam necessitatibus exercitationem veniam accusamus doloribus illo, eligendi rerum omnis?.</p>
          </div>
        </div>
      </div>
      
      <div class="bsas-octubre">
        <img src="./Imagenes/honolulu.jpg" alt="foto de playa">
        <div class="bsas-octubre-text">
          <h5>Bs As - Octubre</h5>
          <p>Buenos Aires es la provincia y localidad más grande del estado de Argentina, en los Estados Unidos. Honolulu es la más sureña de entre las principales cuidades estadounidenses. Aunque el nombre de Honolulu se refiere al área urbana en la costa sureste de la isla de Oahu, la ciudad y el condado de Honolulu hassn formado una ciudad-condado consolidada que cubre toda la ciudad (aproximadamente 600 km2 de superficie).</p>
          <button class="badge-tres">Conocé más</button>
        </div>
      </div>

      <div class="ser-orador">
        <p>CONVIERTETÉ EN UN</p>
        <h4>ORADOR</h4>
        <h6>Anótate como orador para dar una <u>charla ignite</u>. Cuéntanos de que quieres hablar.</h6>
      </div>

      <div class="postulacion">
        <form action="postulantes.html">
          <div>
            <input type="text" name="" id="nombre" placeholder="Nombre">
            <input type="text" name="" id="apellido" placeholder="Apellido">
          </div>
          <div>
            <textarea name="" id="charla" cols="71" rows="5" placeholder="Sobre qué quieres hablar?"></textarea>
          </div>
          <p>Recuerda incluir un titulo para tu charla</p>
          <input type="submit" name="" id="enviar">

        </form>
      </div>
      
    </main>
    <?php 
    include "./footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
    
  </body>
</html>
