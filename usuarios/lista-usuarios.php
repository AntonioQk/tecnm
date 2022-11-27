<?php
include('../app/config/config.php');
session_start();



if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 0) {
  //echo "existe sesión";
  //echo "bienvenido usuario";
  $correo_sesion = $_SESSION['u_usuario'];
  $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE correo = '$correo_sesion' AND estado = '1' ");
  $query_sesion->execute();
  $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Listado de Alumnos Activos</title>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../layout/menu.php'); ?>


      <!-- cierre sesion por inactividad -->
      <?php if ($_SESSION["ultimoAcceso"] >= 60) {
        echo ("<meta http-equiv='refresh' content='60'>");
      } ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SISTEMA DE CREDITOS COMPLENTARIOS
            <small>Listado de Alumnos Activos</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Listado de Usuarios Activos</div>
            <div class="panel-body">
              <table class="table table-bordered table-hover table-condensed">
                <center>
                  <th>Nro</th>
                </center>
                <center>
                  <th>Nombre Completo</th>
                </center>

                <center>
                  <th>Correo Institucional</th>
                </center>
                <center>
                  <th>Cargo</th>
                </center>



                <?php
                $contador_usuarios = 0;
                $query_usuarios = $pdo->prepare("SELECT * FROM tb_usuarios");
                $query_usuarios->execute();
                $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
                foreach ($usuarios as $usuario) {
                  $id = $usuario['id'];
                  $nombres = $usuario['nombres'];
                  $ap_paterno = $usuario['ap_paterno'];
                  $ap_materno = $usuario['ap_materno'];
                  $sexo = $usuario['sexo'];
                  $numero_control = $usuario['numero_control'];
                  $carrera = $usuario['carrera'];
                  $correo = $usuario['correo'];
                  $foto_perfil = $usuario['foto_perfil'];
                  $contador_usuarios = $contador_usuarios + 1;
                  $privilegio = $usuario['cargo'];

                  $rol = '';
                  if ($privilegio == 0) {
                    $rol = 'Administrador';
                  } else if ($privilegio == 1) {
                    $rol = 'Maestro';
                  } else if ($privilegio == 2) {
                    $rol = 'Alumno';
                  }
                ?>
                  <tr>
                    <td>
                      <center><?php echo $contador_usuarios; ?></center>
                    </td>
                    <td><?php echo $nombres . " " . $ap_paterno . " " . $ap_materno; ?></td>

                    <td>
                      <center><?php echo $correo; ?></center>
                    </td>
                    <td>
                      <center><?php echo $rol ?></center>
                    </td>

                    <td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>


                  </tr>
                <?php
                }
                ?>


              </table>
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
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
