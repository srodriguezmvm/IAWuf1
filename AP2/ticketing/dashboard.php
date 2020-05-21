<!DOCTYPE html>

<html>
	<head>

		<meta charset="utf-8">
		<title>IAW - AP2 Dashboard</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>

		<nav>
			<ul class="especial">
				<table>
					<th><li><a href="cerrar_session.php">Cerrar sesion</a></li></th>
					<th><li><a href="incidencia/registro.php">Incidències</a></li></th>
					<th><li><a href="historic.php">Històric</a></li></th>
					<th><li><a href="registro.php">Admin</a></li></th>
				</table>
			</ul>
		</nav>






	      <div class="tile-stats">
	        <div class="icon"><i class="fa fa-ticket"></i></div>

								<?php
								 //conectar Ia la base de datos
								$conexion=mysqli_connect("localhost", "root", "sergi123", "AP2");

								//TOTAL

								$query = "SELECT count(*) as total from incidencies";

								$res=mysqli_query($conexion, $query);
								$data=mysqli_fetch_assoc($res);

								echo "Incidencias totales: ".$data['total']


								//% incidencias por user
								?>
	<br> <?php
	 //conectar Ia la base de datos
	$conexion=mysqli_connect("localhost", "root", "sergi123", "AP2");

	//% incidencias pendientes


	$query = "SELECT count(*)/(SELECT count(*) from incidencies)* 100 as percentage from incidencies where estat='Abierta'";

	$res=mysqli_query($conexion, $query);
	$data=mysqli_fetch_assoc($res);

	echo "Porcentaje pendientes: ".$data['percentage']."%"

	?>

	<br>



<h1>Porcentaje por usuario:</h1>
							<?php

							$conn = mysqli_connect("localhost", "root", "sergi123", "AP2");
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT usuari,count(*)/(SELECT count(*) from incidencies)* 100 as percentage from incidencies group by usuari";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		echo "<br>". $row["usuari"]. " ---> " . $row["percentage"] . "%<br>";
		}

		} else { echo "0 results"; }
		$conn->close();



							?>

<br>
<h1>Tipos de incidencias: </h1>
							<?php


							$conn = mysqli_connect("localhost", "root", "sergi123", "AP2");
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT tipus as Tipus from incidencies group by tipus";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		echo "<br>" . $row["Tipus"]."<br>";
		}

		} else { echo "0 results"; }
		$conn->close();



							?>







			</div>





	</body>
</html>
