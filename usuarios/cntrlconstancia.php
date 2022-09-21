<?php

include('../app/config/config.php');
//traemos las variables
$ciudadano = $_POST['ciudadano'];
$suscribe = $_POST['suscribe'];
$alumno = $_POST['alumno'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$desempe = $_POST['desempe'];
$valor = $_POST['valor'];
$ciclo = $_POST['ciclo'];
$valorcurri = $_POST['valorcurri'];
$ciudad = $_POST['ciudad'];
$dias = $_POST['dias'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];

//sentencia sql
$sql = "INSERT INTO constancias (ciudadano,
                                suscribe,
                                alumno,
                                matricula,
                                carrera,
                                desempe,
                                valor,
                                ciclo,
                                valorcurri,
                                ciudad,
                                dias,
                                mes,
                                anio) 
                                VALUES 
                                ('$ciudadano',
                                       '$suscribe',
                                       '$alumno',
                                       '$matricula',
                                       '$carrera',
                                       '$desempe',
                                       '$valor',
                                       '$ciclo',
                                       '$valorcurri',
                                       '$ciudad',
                                       '$dias',
                                       '$mes',
                                       '$anio')";


//ejecutamos sql

$ejecutar = mysqli_query($conexion, $sql);
//verificamos la ejecucion
if (!$ejecutar) {
  echo 'Error al registrarse';
} else {
  header('Location: constancia.php');
}
mysqli_close($conexion);
