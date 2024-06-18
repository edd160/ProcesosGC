<?php

error_reporting (E_ALL  ^  E_NOTICE  ^  E_DEPRECATED);

// 1.- IDENTIFICACION nombre de la base, del usuario, clave y servidor

$db_host="nombre_del_host";
$db_name="nombre_de_la_base_de_datos";
$db_login="usuario";
$db_pswd="contraseña";

$con = mysqli_connect($db_host, $db_login, $db_pswd, $db_name);
if(!$con){
    die("Conexión a la Base de Datos Incorrecto".mysql_error($con));
    exit();
}

// 2.- CONEXION A LA BASE DE DATOS
mysqli_select_db($con, $db_name) or die(mysql_error());

// 3.- EJECUCIÓN DE LA ORDEN
$llegan=$_GET;
$peticion=$llegan['orden'];

if(mysqli_query($con, $peticion)){
    echo "Registros añadidos correctamente ";
}
else{
    echo "Registros no añadidos";
}

mysqli_close($con);
?>