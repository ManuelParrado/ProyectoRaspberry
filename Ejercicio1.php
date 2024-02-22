<!DOCTYPE html>
<?php 

error_reporting(0);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>El Tiempo</h1>
        <form action="" method="post">
            <b>Introduzca la localidad</b><br>
            <input type="text" name="localidad" value="">
            <input type="submit" name="buscar" value="Buscar">
        </form>
        
        <?php
            if (isset($_POST['buscar'])){     
                
                if ($_POST['localidad'] != ""){
                    
                   $datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_POST['localidad'].",es&units=metric&lang=es&appid=99b3e40bfa46aa6b19b772a68302513b");
                    $tiempo = json_decode($datos);

                    if ($tiempo == null){
                        echo "<br>Localidad no encontrada";
                    } else {
                        
                        echo "<br>Localidad: ".$tiempo->name."<br>";
                        echo "<img src='https://openweathermap.org/img/wn/".$tiempo->weather[0]->icon.".png'>"."<br>";
                        echo "Descripcion: ".$tiempo->weather[0]->description."<br>";
                        echo "Temperatura: ".$tiempo->main->temp."<br>";
                        echo "Humedad: ".$tiempo->main->humidity."%<br>";
                        echo "Presión: ".$tiempo->main->pressure."<br>";

                    } 
                    
                } else {
                    
                    echo "<br>El campo está vacío";
                    
                }
                
                
                
            }
        ?>
    </body>
</html>
