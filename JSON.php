<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "crud_basico";
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM users";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$usuarios = array(); //creamos un array
while($row = mysqli_fetch_array($result)) 
{ 	
	$nombre=$row['firstname'];
	$apellido1=$row['middlename'];
	$apellido2= $row['lastname'] ;
	$fechaNac=$row['birthdate'];
	
	$usuarios[] = array('nombre'=> $nombre, 'apellidoPaterno'=> $apellido1, 'apellidoMaterno'=> $apellido2,
						'fechaNacimiento'=> $fechaNac);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($usuarios);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'usuarios.json';
file_put_contents($file, $json_string);
*/
	

?>