<?php

include('../app/config/config.php');


//traemos las variables
//$ciudadano = $_POST['ciudadano'];
$jefe = $_POST['jefe'];
$suscribe = $_POST['suscribe'];
$alumno = $_POST['alumno'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$desempe = $_POST['desempe'];
$valor = $_POST['valor'];
$ciclo = $_POST['ciclo'];
$valorcurri = $_POST['valorcurri'];

/*
setlocale(LC_ALL, "es_ES");

$dias = date("d");
$mes = date("F");
$anio = date("Y");
*/
//sentencia sql
$sql = "INSERT INTO constancias(
                                jefe,
                                suscribe,
                                alumno,
                                matricula,
                                carrera,
                                desempe,
                                valor,
                                ciclo,
                                valorcurri) 
                                VALUES 
                                ('$jefe',
                                '$suscribe',
                                       '$alumno',
                                       '$matricula',
                                       '$carrera',
                                       '$desempe',
                                       '$valor',
                                       '$ciclo',
                                       '$valorcurri')";


//ejecutamos sql

$guardar = mysqli_query($conexion, $sql);
//verificamos la ejecucion
if (!$guardar) {
  echo '<script language="javascript">alert("No se pudo guardar la constancia");window.location.href="constancia.php"</script>';
} else {
  echo '<script language="javascript">alert("Constancia guardada satisfactoriamente");window.location.href="constancia.php"</script>';
}
mysqli_close($conexion);
