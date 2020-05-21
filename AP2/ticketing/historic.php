<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Historic</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>


    <nav>
      <ul class="especial">
        <table>
          <th><li><a href="cerrar_session.php">Cerrar sesion</a></li></th>
          <th><li><a href="incidencia/registro.php">Incidències</a></li></th>
          <th><li><a href="dashboard.php">Dashboard</a></li></th>
          <th><li><a href="registro.php">Admin</a></li></th>
        </table>
      </ul>
    </nav>


    <table>


        <tr>
    <th><h1>
        Historico incidencias cerradas
      </h1></th>

  </tr>
  <tr>
    <td>        <?php

            $fp=fopen('historic.txt','w');



            include("abrir_conexion.php");


            $resultados = mysqli_query($conexion,"SELECT * from incidencies WHERE estat = 'Cerrada';");

                    while($consulta = mysqli_fetch_array($resultados))
                    {





                      fwrite($fp,$consulta['id']."   ".$consulta['data']."   ".$consulta['usuari']."   ".$consulta['descripcio']."    ".$consulta['estat']."    ");

                    }

                    fclose($fp);

                    $file = fopen('historic.txt','r');
                    while ($line = fgets($file)){
                      echo "<br>".$line;
                    }

                  include("cerrar_conexion.php");

                    ?></td>
  </tr>


    </table>




  </body>
</html>
