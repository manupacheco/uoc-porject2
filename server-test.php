<a href="/">home</a>
<a href="/info-riesgos.html">riesgos</a>

<?php
	$user = "kaf973v6aw57qimb";
	$password = "ya08nw15qbx811el";
	$server = "vlvlnl1grfzh34vj.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
	$db = "aww4ukatfyp42dxq";
	
	$conexion = mysqli_connect( $server, $user, $password ) or die ("No se ha podido conectar al server de Base de datos");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT * FROM trabajador";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table borde='2'>";
	echo "<tr>";
	echo "<th>Nombre</th>";
	echo "<th>Sexo</th>";
	echo "</tr>";
	
	// Bucle while que recorre cada registro y muestra cada campo en la tabla.
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['sexo'] . "</td>";
		echo "</tr>";
	}
	
	echo "</table>"; // Fin de la tabla
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
?>