<?php
	$user = "kaf973v6aw57qimb";
	$password = "ya08nw15qbx811el";
	$server = "vlvlnl1grfzh34vj.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
	$db = "aww4ukatfyp42dxq";
	
	$conexion = mysqli_connect( $server, $user, $password ) or die ("No se ha podido conectar al server de Base de datos");
	
	$db = mysqli_select_db( $conexion, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	$consulta = "SELECT * FROM trabajador";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	mysqli_close( $conexion );
?>