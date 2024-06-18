<html>
<head>
</head>
<body>
<?php
$db_host="db5010731919.hosting-data.io";
$db_name="dbs9079939";
$db_login="dbu720940";
$db_pswd="#procesos_cdg";

$data1 = "";
$conn = mysqli_connect($db_host,$db_login,$db_pswd,$db_name);
    if(!$conn)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3> </h3><hr><br>";
    }

$sql = 'SELECT * FROM prueba';  
$resultado = mysqli_query($conn, $sql);

if(!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error();
    exit;
}
if($resultado->num_rows>0){
$num_filas = $resultado->num_rows;

$data ="";
$data = $data."var puntos = { 'type':'FeatureCollection', \n 'features': [ \n";
$i=1;
while ($fila=$resultado->fetch_assoc())
{   if($i < $num_filas){
    $data = $data."{'type':'Feature',\n 'properties':{'id_encuestado':'".$fila['id_encuestado']."', 'r1':'".$fila['r1']."', 'r2':'".$fila['r2']."'}, \n'geometry':{ 'type':'Point', 'coordinates':[".$fila['longitud'].",".$fila['latitud']."] }},\n";
    $i++;
    }
    else{
     $data = $data."{'type':'Feature',\n 'properties':{'id_encuestado':'".$fila['id_encuestado']."', 'r1':'".$fila['r1']."', 'r2':'".$fila['r2']."'}, \n'geometry':{ 'type':'Point', 'coordinates':[".$fila['longitud'].",".$fila['latitud']."] }}\n";
     
    }

}
    $data = $data.']};';

}

//echo $data;
$file = fopen("encuestados_pcdg.js", "w");
fwrite($file, $data);
fclose($file);

mysqli_free_result($resultado);


?>





</body>
</html>