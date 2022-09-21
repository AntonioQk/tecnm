<?php

include ('../app/config/config.php');

if (isset($_POST['nombres']) && isset($_POST['ap_paterno']) && isset($_POST['ap_materno']) && isset($_POST['numero_control']) && isset($_POST['carrera']) && isset($_POST['estado']) && isset($_POST['semestre'])){
	
	$nombres=$_POST['nombres'];
    $ap_paterno=$_POST['ap_paterno'];
    $ap_materno=$_POST['ap_materno'];
    $numero_control=$_POST['numero_control'];
    $carrera=$_POST['carrera'];
    $estado=$_POST['estado'];
    $semestre=$_POST['semestre'];

	$sql = "INSERT INTO tb_tutorias(nombres, ap_paterno, ap_materno, numero_control, carrera, estado, semestre) values ('$nombres','$ap_paterno', '$ap_materno', '$numero_control', '$carrera', '$estado', '$semestre')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: tutoria.php');
