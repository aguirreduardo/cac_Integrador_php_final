<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'cac_integrador';
    $conexion = mysqli_connect($servername,$username,$password,$database);

    if(mysqli_connect_errno()):?>
        <h3>Error de conección</h3>
    <?php endif; ?>