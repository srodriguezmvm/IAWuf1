<html>
<head>
  <title>AP2 Incidències</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

  <nav>
    <ul class="especial">
      <table>
        <th><li><a href="../cerrar_session.php">Cerrar sesion</a></li></th>
        <th><li><a href="../dashboard.php">Dashboard</a></li></th>
        <th><li><a href="../historic.php">Històric</a></li></th>
        <th><li><a href="../registro.php">Admin</a></li></th>
      </table>
    </ul>
  </nav>

<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>Incidències</h1></center>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      <label for="doc">ID</label>
      <input type="text" name="id" class="form-control" id="id">
    </div>

    <div class="form-group">
        <label for="nombre">Descripció</label>
        <input type="text" name="nombre" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="dir">Tipus de categoria:</label>
        <select name="cat" class="form-control" id="cat">
			<option value ="Hardware">Hardware</option>
			<option value ="Internet">Xarxa</option>
			<option value ="Software">Software</option>
		</select>
    </div>

    <div class="form-group">
        <label for="tel">Usuari</label>
        <input type="text" name="res" class="form-control" id="res">
    </div>

     <div class="form-group">
        <label for="tel">Estat</label>
        <select name="est" class="form-control" id="est">
			<option value= "Abierta">Abierta</option>
			<option value= "Cerrada">Cerrada</option>
		</select>
    </div>

    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("abrir_conexion.php");

      $id    ="";
      $nombre ="";
      $cat    ="";
      $res    ="";
      $est    ="";

      if(isset($_POST['btn_registrar']))
      {
         $id    =$_POST['id'];
         $nombre    =$_POST['nombre'];
         $cat    =$_POST['cat'];
         $res    =$_POST['res'];
         $est    =$_POST['est'];


		 if($nombre=="" || $est=="")
		 {
			 echo "Los campos son obligatorios";
		 }else
		 {
		    mysqli_query($conexion, "INSERT INTO $tabla_db1 (id, descripcio, tipus, usuari, estat, data)
		    values (NULL, '$nombre', '$cat', '$res', '$est',NOW())");
		    echo "Se ha añadido correctamente a la base de datos."."<br>";

      }

	}

      if(isset($_POST['btn_consultar']))
      {
		 $id    =$_POST['id'];
		 $x=0;
		 if($id=="")
		 {
			 echo "Los campos son obligatorios";
		 }else
		 {
		  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id ='$id'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
			echo $variable=$consulta['id']."<br>";
			echo $consulta['descripcio']."<br>";
			echo $consulta['tipus']."<br>";
			echo $consulta['usuari']."<br>";
			echo $consulta['estat']."<br>";
			$x++;
		  }
		  if($x==0){echo "No existe.";}
	  }
	}



    session_start();

    error_reporting(0);

    $varsesion = $_SESSION['rol'];

    if($varsesion!= "Admin"){

        echo "<br>"."Este usuario no tiene permisos para entrar eliminar o modificar incidencias.";

        die();

    }



      if(isset($_POST['btn_actualizar']))
      {
        $id    =$_POST['id'];
         $nombre    =$_POST['nombre'];
         $cat    =$_POST['cat'];
         $res    =$_POST['res'];
         $est    =$_POST['est'];


		 if($id=="")
		 {
			 echo "Los campos son obligatorios (ID).";
		 }else
		 {
			$X=0;
		  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id ='$id'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
			$x++;
		  }
		  if($x==0)
		  {
			echo "No existe";
		}else
		{
			$_UPDATE_SQL="UPDATE $tabla_db1 Set id='$id',descripcio='$nombre',tipus='$cat',usuari='$res',estat='$est' WHERE id='$id'";
			mysqli_query($conexion,$_UPDATE_SQL);
			echo "Se ha actualizado perfectamente.";
		}

      }
      }

      if(isset($_POST['btn_eliminar']))
      {
       $id    =$_POST['id'];
		 $x=0;
		 if($id=="")
		 {
			 echo "Los campos son obligatorios (ID)";
		 }else
		 {
		  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id ='$id'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {

			$x++;
		  }
		  if($x==0){echo "No existe";}
		  else
		  {
			   $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE id = '$id'";
				mysqli_query($conexion,$_DELETE_SQL);
				echo "Se ha eliminado correctamente.";
		  }
	  }
      }

    include("cerrar_conexion.php");
  ?>

  </div>

  <div class="col-md-4"></div>
</div>

</body>
</html>
