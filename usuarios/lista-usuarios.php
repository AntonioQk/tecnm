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


      <!-- Content Wrapper. Contains page content -->
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
                <th>Nro</th>
                <th>Nombre Completo</th>

                <th>Correo Institucional</th>
                <th>Foto Perfil</th>
                <th>Acciones</th>



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
                      <?php
                      $caracter_a_buscar = ".";
                      $buscar = strpos($foto_perfil, $caracter_a_buscar);
                      if ($buscar == true) {
                        // echo "existe foto de perfil";
                      ?>
                        <center>
                          <img src="<?php echo $URL; ?>/usuarios/update_usuarios/<?php echo $foto_perfil; ?>" width="100px" alt="">
                        </center>
                        <?php
                      } else {
                        if ($sexo == "Hombre") {
                        ?>
                          <center>
                            <img src="<?php echo $URL; ?>/public/images/avatar_hombre.png" width="100px" alt="">
                          </center>
                        <?php
                        } else {
                        ?>
                          <center>
                            <img src="<?php echo $URL; ?>/public/images/avatar_mujer.png" width="100px" alt="">
                          </center>
                      <?php
                        }
                      }
                      ?>

                    </td>
                    <td><a href="update.php?id=<?php echo $fila['id']; ?>" class="btn__update">Editar</a></td>
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
