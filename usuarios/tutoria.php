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
    <title>Agregar Tutoriado</title>
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
            <small>Agregar Tutoriado</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Agregar Tutoriado</h3>
                </div>
                <div class="panel-body">
                  <form action="tutoria_create.php" method="post" enctype="multipart/form-data">
                    <div class="row">


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Nombres</label>
                          <input type="text" class="form-control" name="nombres" required>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Apellido Materno</label>
                          <input type="text" class="form-control" name="ap_materno" required>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-check"></i> Numero de Control</label>
                          <input type="text" class="form-control" name="numero_control" required>
                        </div>


                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-user"></i> Apellido Paterno</label>
                          <input type="text" class="form-control" name="ap_paterno" required>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-book"></i> Semestre</label>
                          <select name="semestre" id="" class="form-control">
                            <option value="elegir">Elegir una Opcion</option>
                            <option value="Primer Semestre">Primer Semestre</option>
                            <option value="Segundo Semestre">Segundo Semestre</option>
                            <option value="Tercer Semestre">Tercer Semestre</option>
                            <option value="Cuarto Semestre">Cuarto Semestre</option>
                            <option value="Quinto Semestre">Quinto Semestre</option>
                            <option value="Sexto Semestre">Sexto Semestre</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for=""><i class="glyphicon glyphicon-book"></i> Carrera</label>
                          <select name="carrera" id="" class="form-control" required>
                            <option value="elegir">Elegir una Opcion</option>
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
                          <label for=""><i class="glyphicon glyphicon-book"></i> Estado del Alumno</label>
                          <select name="estado" id="" class="form-control">
                            <option value="elegir">Elegir una Opcion</option>
                            <option value="Acreditado">Acreditado</option>
                            <option value="NO Acreditado">NO Acreditado</option>
                          </select>
                        </div>
                        <div class="col-md-6">



                          <br>
                          <div class="form-group">
                            <center>
                              <a href="" class="btn btn-danger btn-lg">Cancelar</a>
                              <input type="submit" class="btn btn-primary btn-lg" value="Registrar">
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
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
