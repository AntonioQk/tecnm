<?php






include('../app/config/config.php');

$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$sexo = $_POST['sexo'];
$numero_control = $_POST['numero_control'];
$carrera = $_POST['carrera'];
$correo = $_POST['correo'];
$estado_civil = $_POST['estado_civil'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$codigo_postal = $_POST['codigo_postal'];
$curp = $_POST['curp'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$nivel_escolar = $_POST['nivel_escolar'];
$reticula = $_POST['reticula'];
$entidad = $_POST['entidad'];
$contraseña = $_POST['contraseña'];
$user_creacion = "ESCAMILLA";

//encriptar contraseña
$contraseña = password_hash($contraseña, PASSWORD_DEFAULT, ['cost' => 10]);

date_default_timezone_set("America/Monterrey");

$fechaHora = date('Y-m-d h:i:s');
$estado = '1';

$nombre_de_foto_perfil = "SisTECNM-" . date('Y-m-d-h-i-s');
$filename = $nombre_de_foto_perfil . "_" . $_FILES['file']['name'];

$location = "update_usuarios/" . $filename;

move_uploaded_file($_FILES['file']['tmp_name'], $location);
//echo $nombres ." - ".$ap_paterno." - ".$ap_materno." - ".$sexo." - ".$numero_control." - ".$carrera." - ".$correo." - ".$estado_civil." - ".$telefono." - ".$ciudad." - ".$colonia." - ".$calle." - ".$codigo_postal." - ".$curp." - ".$fecha_nacimiento." - ".$nivel_escolar." - ".$reticula." - ".$entidad." - ".$contraseña." - ".$user_creacion. " - ".$fechaHora." - ".$estado;

$inserta = "INSERT INTO tb_usuarios(nombres, ap_paterno, ap_materno, sexo, numero_control, carrera, correo, estado_civil, telefono, ciudad, colonia, calle, codigo_postal, curp, fecha_nacimiento, nivel_escolar, reticula, entidad, foto_perfil, contraseña, cargo, user_creacion, fyh_creacion, estado) VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$sexo', '$numero_control', '$carrera', '$correo', '$estado_civil', '$telefono', '$ciudad', '$colonia', '$calle', '$codigo_postal', '$curp', '$fecha_nacimiento', '$nivel_escolar', '$reticula', '$entidad', '$filename', '$contraseña', 2, '$user_creacion', '$fechaHora', '$estado')";

$resultado = mysqli_query($conexion, $inserta);
if (!$resultado) {
  //aler('No se pudo guardar. Inténtalo de nuevo.');
} else {

  echo '<script language="javascript">alert("Usuario registrado");window.location.href="create.php"</script>';
}
mysqli_close($conexion);
