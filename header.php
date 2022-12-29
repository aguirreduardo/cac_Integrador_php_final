<?php
$email = @$_SESSION['email'];
?>

<header class="contenedor-header">
    <!--Inicio Navbar-->
    <nav class="navbar navbar-expand-lg container contenedor-header">  
        <img src="./Imagenes/codoacodo.png" alt="Logo codoacodo" width="100em">
        <a class="navbar-brand" href="./index.php">Conf Bs As</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">Menu
        </button>
    
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">La conferencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="opcion" href="#">Los oradores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="opcion" href="#">El lugar y fecha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="opcion" href="#">Convierteté en orador</a>
                </li>
                <li class="nav-item">
                    <a href="tickets.php" class="nav-link" id="comprar">Comprar tickets</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Registrate
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="ingresar.php" class="nav-link dropdown-item">Ingresar</a></li>
                        <li><a class="nav-link dropdown-item" href="registro.php">Ver participantes</a></li>
                        
                    </ul>
                </li>
                <?php if (isset($email)):?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $email ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="singoff.php" class="nav-link dropdown-item">Cerrar sesión</a></li>
                    </ul>
                <?php endif;?>
            </ul>
        </div> 
    </nav>
</header>