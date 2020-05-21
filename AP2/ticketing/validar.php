<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <nav>
      <ul class="especial">
        <table>
          <th><li><a href="index.php">Volver a intentar</a></li></th>
        </table>
      </ul>
    </nav>

    <?php
    session_start();
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

     //conectar Ia la base de datos
    $conexion=mysqli_connect("localhost", "root", "sergi123", "AP2");
    $consulta="SELECT * FROM usuaris WHERE usuari='$usuario' and contrasenya='$clave'";
    $resultado=mysqli_query($conexion, $consulta);
    while($row = mysqli_fetch_array($resultado)) {

      /*Imprimir campo por nombre*/
      $rol=$row['rol'];
    }


    $_SESSION['rol'] = $rol;

    $filas=mysqli_num_rows($resultado);


    if ($filas>0) {
    header("location:dashboard.php");

    } else {
    echo "Error en la autentificacion";
    }

    mysqli_free_result($resultado);

    mysqli_close($conexion);
    ?>

  </body>
</html>
