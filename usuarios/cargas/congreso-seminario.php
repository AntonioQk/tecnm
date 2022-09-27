<?php

include('../../app/config/config.php');

$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

$id_act = $_POST['id_actividad'];

$num_control = $_POST['numero_control'];

$responsable = $_POST['responsable'];

$nombre_alumno = $_POST['nombre_alumno'];

if (!file_exists('Congreso Seminario Simponsio')) {
  mkdir('Congreso Seminario Simponsio', 0777, true);
  if (file_exists('Congreso Seminario Simponsio')) {
    if (file_exists('Congreso Seminario Simponsio/' . $num_control . '-' . $nombre_alumno . '-' . $id_act . '-' . 'CongresoSeminarioSimponsio.pdf')) {
      echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
    } else {
      if (move_uploaded_file($guardado, 'Congreso Seminario Simponsio/' . $num_control . '-' . $nombre_alumno . '-' . $id_act . '-' . 'CongresoSeminarioSimponsio.pdf')) {

        $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc, responsable) VALUES ('$num_control', '$id_act', 1, 'Congreso Seminario Simponsio/$num_control-$nombre_alumno-$id_act-CongresoSeminarioSimponsio.pdf', '$responsable')";
        $resultado = mysqli_query($conexion, $inserta);
        if (!$resultado) {
          echo 'Error al insertar archivo';
        } else {
          echo '<script language="javascript">alert("Archivo guardado");window.location.href="../agregar-credito-user.php"</script>';
        }
        mysqli_close($conexion);
      } else {
        echo '<script language="javascript">alert("Archivo no guardado");window.location.href="../agregar-credito-user.php"</script>';
      }
    }
  }
} else {
  if (file_exists('Congreso Seminario Simponsio/' . $num_control . '-' . $nombre_alumno . '-' . $id_act . '-' . 'CongresoSeminarioSimponsio.pdf')) {
    echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
  } else {
    if (move_uploaded_file($guardado, 'Congreso Seminario Simponsio/' . $num_control . '-' . $nombre_alumno . '-' . $id_act . '-' . 'CongresoSeminarioSimponsio.pdf')) {

      $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc, responsable) VALUES ('$num_control', '$id_act', 1, 'Congreso Seminario Simponsio/$num_control-$nombre_alumno-$id_act-CongresoSeminarioSimponsio.pdf', '$responsable')";
      $resultado = mysqli_query($conexion, $inserta);
      if (!$resultado) {
        echo 'Error al insertar archivo';
      } else {
        echo '<script language="javascript">alert("Archivo guardado");window.location.href="../agregar-credito-user.php"</script>';
      }
      mysqli_close($conexion);
    } else {
      echo '<script language="javascript">alert("Archivo no guardado");window.location.href="../agregar-credito-user.php"</script>';
    }
  }
}
