<?php

include('../../app/config/config.php');

$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

$id_act = $_POST['id_actividad'];

$num_control = $_POST['numero_control'];

if (!file_exists('Diseño en proyecto')) {
  mkdir('Diseño en proyecto', 0777, true);
  if (file_exists('Diseño en proyecto')) {
    if (file_exists('Diseño en proyecto/' . $num_control . $nombre)) {
      echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
    } else {
      if (move_uploaded_file($guardado, 'Diseño en proyecto/' . $num_control . $nombre)) {
        //insertar datos en la tabla
        $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc) VALUES ('$num_control', '$id_act', 1, 'Diseño en proyecto/$num_control$nombre')";
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
  if (file_exists('Diseño en proyecto/' . $num_control . $nombre)) {
    echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
  } else {
    if (move_uploaded_file($guardado, 'Diseño en proyecto/' . $num_control . $nombre)) {
      //insertar datos en la tabla
      $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc) VALUES ('$num_control', '$id_act', 1, 'Diseño en proyecto/$num_control$nombre')";
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
