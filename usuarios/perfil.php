<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario'])) {
  //echo "existe sesión";
  //echo "bienvenido usuario";
  $correo_sesion = $_SESSION['u_usuario'];
  $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE correo = '$correo_sesion' AND estado = '1' ");
  $query_sesion->execute();
  $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
}
foreach ($sesion_usuarios as $sesion_usuario) {
  $id_sesion = $sesion_usuario['id'];
  $id_nombres = $sesion_usuario['nombres'];
  $id_ap_paterno = $sesion_usuario['ap_paterno'];
  $id_ap_materno = $sesion_usuario['ap_materno'];
  $id_sexo = $sesion_usuario['sexo'];
  $id_numero_control = $sesion_usuario['numero_control'];
  $id_carrera = $sesion_usuario['carrera'];
  $id_correo = $sesion_usuario['correo'];
  $id_estado_civil = $sesion_usuario['estado_civil'];
  $id_telefono = $sesion_usuario['telefono'];
  $id_ciudad = $sesion_usuario['ciudad'];
  $id_colonia = $sesion_usuario['colonia'];
  $id_calle = $sesion_usuario['calle'];
  $id_codigo_postal = $sesion_usuario['codigo_postal'];
  $id_curp = $sesion_usuario['curp'];
  $id_fecha_nacimiento = $sesion_usuario['fecha_nacimiento'];
  $id_nivel_escolar = $sesion_usuario['nivel_escolar'];
  $id_reticula = $sesion_usuario['reticula'];
  $id_entidad = $sesion_usuario['entidad'];
  $id_foto_perfil = $sesion_usuario['foto_perfil'];
  $privilegio = $sesion_usuario['cargo'];
}

//control de inactividad
$ahora = date("Y-n-j H:i:s");
$fechaGuardada = $_SESSION["ultimoAcceso"];
$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

if ($tiempo_transcurrido >= 60) {
  //si pasaron 10 minutos o más
  session_destroy(); // destruyo la sesión
  header('location:../index.php'); //envío al usuario a la pag. de autenticación
  //sino, actualizo la fecha de la sesión
} else {
  $_SESSION["ultimoAcceso"] = $ahora;
}



?>

<!DOCTYPE html>
<html>

<head>
  <?php include('../layout/head.php'); ?>
  <title>Perfil</title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    if ($privilegio == "0") {
      include('../layout/menu.php');
    } else if ($privilegio == "2") {
      include('../layout/menuuser.php');
    } else if ($privilegio == "1") {
      include('../layout/menumaestro.php');
    }
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- cierre sesion por inactividad -->
      <?php if ($_SESSION["ultimoAcceso"] >= 60) {
        echo ("<meta http-equiv='refresh' content='60'>");
      } ?>
      <section class="content-header">
        <h1>
          SISTEMA DE CRÉDITOS COMPLEMENTARIOS
          <small>Perfil</small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Perfil</h3>
              </div>
              <div class="panel-body">
                <form action="controlador_editar.php" method="post" enctype="multipart/form-data">
                  <div class="row">


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> Nombre(s)</label>
                        <input type="text" class="form-control" name="nombres" type="text" value="<?php echo $sesion_usuario['nombres']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> Apellido Materno</label>
                        <input type="text" class="form-control" name="ap_materno" value="<?php echo $sesion_usuario['ap_materno']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-check"></i> Número de Control</label>
                        <input type="text" class="form-control" name="numero_control" value="<?php echo $sesion_usuario['numero_control']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-envelope"></i> Correo Institucional</label>
                        <input type="email" class="form-control" name="correo" value="<?php echo $sesion_usuario['correo']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-calendar"></i> Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $sesion_usuario['fecha_nacimiento']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-phone"></i> Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $sesion_usuario['telefono']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-map-marker"></i> colonia</label>
                        <input type="text" class="form-control" name="colonia" value="<?php echo $sesion_usuario['colonia']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-equalizer"></i> Código Postal</label>
                        <input type="text" class="form-control" name="codigo_postal" value="<?php echo $sesion_usuario['codigo_postal']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-equalizer"></i> Entidad</label>
                        <input type="text" class="form-control" name="entidad" value="<?php echo $sesion_usuario['entidad']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-picture"></i> Foto de Perfil</label>
                        <input type="file" class="form-control" id="file" name="file">
                        <center>
                          <br>
                          <output id="list" style="margin-top: 0px"></output>
                        </center>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> Apellido Paterno</label>
                        <input type="text" class="form-control" name="ap_paterno" value="<?php echo $sesion_usuario['ap_paterno']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-user"></i> Sexo</label>
                        <select name="sexo" id="" class="form-control" required>
                          <option value="elegir"><?php echo $sesion_usuario['sexo']; ?></option>
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-book"></i> Carrera</label>
                        <select name="carrera" id="" class="form-control" value="<?php echo $sesion_usuario['carrera']; ?>" required>
                          <option value="elegir"><?php echo $sesion_usuario['carrera']; ?></option>
                          <option value="Ingeneria en Agronomia">Ingeneria en Agronomia</option>
                          <option value="Ingeneria Forestal">Ingeneria Forestal</option>
                          <option value="Infeneria en Industrias Alimentarias">Infeneria en Industrias Alimentarias</option>
                          <option value="Licenciatura en Biologia">Licenciatura en Biologia</option>
                          <option value="Ingeneria Informatica">Ingeneria Informatica</option>
                          <option value="Ingeneria en Administracion">Ingeneria en Administracion </option>
                          <option value="Infeneria en Gestion Empresarial">Infeneria en Gestion Empresarial</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-modal-window"></i> Estado Civil</label>
                        <select name="estado_civil" id="" class="form-control" required>
                          <option value="elegir"><?php echo $sesion_usuario['estado_civil']; ?></option>
                          <option value="Soltero/a">Soltero/a</option>
                          <option value="Casado/a">Casado/a</option>
                          <option value="Unión libre">Unión libre</option>
                          <option value="Separado/a">Separado/a</option>
                          <option value="Divorciado/a">Divorciado/a</option>
                          <option value="Viudo/a">Viudo/a</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-link"></i> CURP</label>
                        <input type="text" class="form-control" name="curp" value="<?php echo $sesion_usuario['curp']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-map-marker"></i> Ciudad</label>
                        <select name="ciudad" id="" class="form-control" required>
                          <option value="elegir">Elegir una Opcion</option>
                          <option value="Aguascalientes">Aguascalientes</option>
                          <option value="Baja California">Baja California</option>
                          <option value="Baja California Sur">Baja California Sur</option>
                          <option value="Campeche">Campeche</option>
                          <option value="Chiapas">Chiapas</option>
                          <option value="Chihuahua">Chihuahua</option>
                          <option value="CDMX">Ciudad de México</option>
                          <option value="Coahuila">Coahuila</option>
                          <option value="Colima">Colima</option>
                          <option value="Durango">Durango</option>
                          <option value="Estado de México">Estado de México</option>
                          <option value="Guanajuato">Guanajuato</option>
                          <option value="Guerrero">Guerrero</option>
                          <option value="Hidalgo">Hidalgo</option>
                          <option value="Jalisco">Jalisco</option>
                          <option value="Michoacán">Michoacán</option>
                          <option value="Morelos">Morelos</option>
                          <option value="Nayarit">Nayarit</option>
                          <option value="Nuevo León">Nuevo León</option>
                          <option value="Oaxaca">Oaxaca</option>
                          <option value="Puebla">Puebla</option>
                          <option value="Querétaro">Querétaro</option>
                          <option value="Quintana Roo">Quintana Roo</option>
                          <option value="San Luis Potosí">San Luis Potosí</option>
                          <option value="Sinaloa">Sinaloa</option>
                          <option value="Sonora">Sonora</option>
                          <option value="Tabasco">Tabasco</option>
                          <option value="Tamaulipas">Tamaulipas</option>
                          <option value="Tlaxcala">Tlaxcala</option>
                          <option value="Veracruz">Veracruz</option>
                          <option value="Yucatán">Yucatán</option>
                          <option value="Zacatecas">Zacatecas</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-map-marker"></i> Calle</label>
                        <input type="text" class="form-control" name="calle" value="<?php echo $sesion_usuario['calle']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-link"></i> Reticula</label>
                        <input type="text" class="form-control" name="reticula" value="<?php echo $sesion_usuario['reticula']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> Nivel Escolar</label>
                        <input type="text" class="form-control" name="nivel_escolar" value="<?php echo $sesion_usuario['nivel_escolar']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> Credito Academico</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> Credito ExtraEscolar</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for=""><i class="glyphicon glyphicon-education"></i> Credito Tutoria</label>
                        <input type="text" class="form-control">
                      </div>
                      <br>
                      <div class="form-group">
                        <center>
                          <a href="../index.php" class="btn btn-danger btn-lg">Cancelar</a>
                          <input type="submit" class="btn btn-primary btn-lg" value="Actualizar">
                        </center>
                      </div>
                    </div>
                  </div>

              </div>
              </form>











            </div>
          </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('../layout/footer.php'); ?>
  <?php include('../layout/footer_links.php'); ?>




</body>

</html>
<script>
  function archivo(evt) {
    var files = evt.target.files; // FileList object
    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
      //Solo admitimos imágenes.
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();
      reader.onload = (function(theFile) {
        return function(e) {
          // Insertamos la imagen
          document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('file').addEventListener('change', archivo, false);
</script>