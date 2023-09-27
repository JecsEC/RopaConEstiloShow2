<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">
</head>
<body>
    <?php
        include 'header.php';
    ?>

    <div class="contenedor-tarjetas">
        <div class="tarjeta">
            <img src="images/hombre.jpg" alt="Hombres">
            <h2>HOMBRES</h2>
            <p>Ropa de moda para hombres.</p>
        </div>
        <div class="tarjeta">
            <img src="images/mujer.jpg" alt="Mujeres">
            <h2>MUJERES</h2>
            <p>Ropa elegante y moderna para mujeres.</p>
        </div>
        <div class="tarjeta">
            <img src="images/niños.jpg" alt="Niños">
            <h2>NIÑOS</h2>
            <p>Ropa cómoda y divertida para niños.</p>
        </div>
        <div class="tarjeta">   
            <img src="images/niñas.jpg" alt="Niñas">
            <h2>NIÑAS</h2>
            <p>Ropa encantadora para niñas.</p>
        </div>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>