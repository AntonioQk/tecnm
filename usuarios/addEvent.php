<?php

include('../app/config/config.php');

if (isset($_POST['title']) && isset($_POST['descripcion']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['respons'])) {

  $title = $_POST['title'];
  $descripcion = $_POST['descripcion'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $color = $_POST['color'];
  $respons = $_POST['respons'];

  $sql = "INSERT INTO events(title, descripcion, start, end, color, respons) values ('$title','$descripcion', '$start', '$end', '$color', '$respons')";

  echo $sql;

  $query = $bdd->prepare($sql);
  if ($query == false) {
    print_r($bdd->errorInfo());
    die('Erreur prepare');
  }
  $sth = $query->execute();
  if ($sth == false) {
    print_r($query->errorInfo());
    die('Erreur execute');
  }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
