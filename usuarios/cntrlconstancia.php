<?php

include('../app/config/config.php');

if (isset($_POST['suscribe']) && isset($_POST['alumno']) && isset($_POST['matricula']) && isset($_POST['carrera']) && isset($_POST['desemp']) && isset($_POST['valor']) && isset($_POST['ciclo']) && isset($_POST['valorcurri']) && isset($_POST['dias']) && isset($_POST['mes']) && isset($_POST['anio'])) {


  //traemos las variables
  //$ciudadano = $_POST['ciudadano'];
  $suscribe = $_POST['suscribe'];
  $alumno = $_POST['alumno'];
  $matricula = $_POST['matricula'];
  $carrera = $_POST['carrera'];
  $desempe = $_POST['desempe'];
  $valor = $_POST['valor'];
  $ciclo = $_POST['ciclo'];
  $valorcurri = $_POST['valorcurri'];
  //$ciudad = $_POST['ciudad'];
  $dias = $_POST['dias'];
  $mes = $_POST['mes'];
  $anio = $_POST['anio'];

  //sentencia sql
  $sql = "INSERT INTO constancias (/*ciudadano,*/
                                suscribe,
                                alumno,
                                matricula,
                                carrera,
                                desempe,
                                valor,
                                ciclo,
                                valorcurri,
                                /*ciudad,*/
                                dias,
                                mes,
                                anio) 
                                VALUES 
                                (
                                       '$suscribe',
                                       '$alumno',
                                       '$matricula',
                                       '$carrera',
                                       '$desempe',
                                       '$valor',
                                       '$ciclo',
                                       '$valorcurri',
                                       
                                       '$dias',
                                       '$mes',
                                       '$anio')";


  //ejecutamos sql

  $ejecutar = mysqli_query($conexion, $sql);
  //verificamos la ejecucion
  if (!$ejecutar) {
    echo '<script language="javascript">alert("No se pudo guardar la constancia");window.location.href="constancia.php"</script>';
  } else {
    echo '<script language="javascript">alert("Constancia guardada satisfactoriamente");window.location.href="constancia.php"</script>';
  }
  mysqli_close($conexion);
}
