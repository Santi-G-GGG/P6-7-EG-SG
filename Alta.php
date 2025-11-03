<html>
    <head>
        <title>Alta Usuario</title>
    </head>
    <body>
        <?php
            include("conexion.php");
            
            //Captura datos desde el Form anterior
            $vCiudad = $_POST['ciudad'];
            $vPais = $_POST['pais'];
            $vHabitantes = $_POST['habitantes'];
            $vSuperficie = $_POST['superficie'];
            $vTieneMetro = $_POST['tieneMetro'];

            //Arma la instrucción SQL y luego la ejecuta
            $vSql = "SELECT Count(ciudad) as canti FROM Ciudades WHERE ciudad='$vCiudad'";
            $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
            $vCantUsuarios = mysqli_fetch_assoc($vResultado);

            //$vCantUsuarios = mysqli_result($vResultado, 0);
            if ($vCantUsuarios ['canti']!=0){
                echo ("El Usuario ya Existe<br>");
                echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
            }
            else {
                $vSql = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
                values ('$vCiudad','$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
                mysqli_query($link, $vSql) or die (mysqli_error($link));
                echo("El Usuario fue Registrado, Pronto recibirás un email, confirmandote la actualizaciòn a nuestra pagina<br>");
                echo ("<A href='Menu.html'>VOLVER AL MENU</A>");

                // Liberar conjunto de resultados
                mysqli_free_result($vResultado);
            }

            // Cerrar la conexion
            mysqli_close($link);
        ?>
    </body>
</html>