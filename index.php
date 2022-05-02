<?php
    require 'conexion.php';
    $ip = $_SERVER['REMOTE_ADDR'];
    //Luego de colocar la key dejar el tipo de metodo WS24 para que no arroje errores.
    $getData = file_get_contents('https://api.ip2location.com/v2/?ip='.$ip.'&key=TU_API_KEY=WS24');
    $json = json_decode($getData, true);

    $conexion = new Conexion();
    $conexion->crearTabla();
    $conexion->guardarDatos($json,$ip);
?>

<!doctype html>
<html lang="es">
  <head>
    <title>https://github.com/JkDevArg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>a{text-decoration: none;}</style>
  </head>
  <body>
    <div class="container text-center">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">❌Gracias por entrar, ahora tu ubicación ha quedado almacenada en nuestro sistema!.❌</p>
            </div>
            <div class="card-footer">
                <a href="https://github.com/JkDevArg/" class="text-success">🌟 https://github.com/JkDevArg/ 🌟</a>
            </div>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
