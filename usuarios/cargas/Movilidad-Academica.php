<?php

include('../../app/config/config.php');

$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

$id_act = $_POST['id_actividad'];

$num_control = $_POST['numero_control'];

/*
if (!file_exists('Modalidad Academica')) {
  mkdir('Modalidad Academica', 0777, true);
  if (file_exists('Modalidad Academica')) {
    if (move_uploaded_file($guardado, 'Modalidad Academica/' . $num_control . $nombre)) {
      
      $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc) VALUES ('$num_control', '$id_act', 1, 'Modalidad Academica/$nombre-$num_control')";
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
} else {
  if (move_uploaded_file($guardado, 'Modalidad Academica/' . $num_control . $nombre)) {
    
    $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc) VALUES ('$num_control', '$id_act', 1, 'Modalidad Academica/$nombre-$num_control')";
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
}*/

if (!file_exists('Modalidad Academica')) {
  mkdir('Modalidad Academica', 0777, true);
  if (file_exists('Modalidad Academica')) {
    if (file_exists('Modalidad Academica/' . $num_control . $nombre)) {
      echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
    } else {
      if (move_uploaded_file($guardado, 'Modalidad Academica/' . $num_control . $nombre)) {

        $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc) VALUES ('$num_control', '$id_act', 1, 'Modalidad Academica/$num_control$nombre')";
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
  if (file_exists('Modalidad Academica/' . $num_control . $nombre)) {
    echo '<script language="javascript">alert("El archivo ya existe");window.location.href="../agregar-credito-user.php"</script>';
  } else {
    if (move_uploaded_file($guardado, 'Modalidad Academica/' . $num_control . $nombre)) {

      $inserta = "INSERT INTO evidencia(numero_control, id_evento, subido, ruta_doc) VALUES ('$num_control', '$id_act', 1, 'Modalidad Academica/$num_control$nombre')";
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
