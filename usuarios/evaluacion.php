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
  <?php
  /*
$resultado = 0;
$valor = null;
  if(isset($_POST['enviar']))
  {
 $tiempo = $_POST['tiempo'];
 $equipo = $_POST['equipo'];
 $liderazgo = $_POST['liderazgo'];
 $organiza = $_POST['organiza'];
 $realidad = $_POST['realidad'];
 $sugerencias = $_POST['sugerencias'];
 $iniciativa = $_POST['iniciativa'];

    
    $resultado = ($tiempo+$equipo+$liderazgo+$organiza+$realidad+$sugerencias+$iniciativa)/7;
    if($resultado <=4){
      $valor = 'Excelente';
    }
    if($resultado<=3){
      $valor = 'Notable';
    }
    if($resultado<=2){
      $valor = 'Bueno';
    }
    if($resultado<=1){
      $valor = 'Suficiente';
    }
    if($resultado<=0){
      $valor = 'Insuficiente';
    };

} */
  ?>


  <!DOCTYPE html>
  <html>

  <head>
    <?php include('../layout/head.php'); ?>
    <title>Guia de actividades Complementarias</title>
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
            <small>Guia de Actividades Complementarias</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Guia de Actividades Complementarias</div>
            <div class="panel-body">

              <form method="post" action="cntrlevaluacion.php">


                <center>
                  <table>


                    <tr>
                      <th>Matricula:</th>
                      <th><input type="text" name="matricula" maxlength="50"><br></th>
                      </th>

                    </tr>

                    <tr>
                      <th>Nombre Completo:</th>
                      <th><input type="text" name="nombre" maxlength="100" style="width:500px; height:20x;"><br></th>
                    </tr>

                    <tr>
                      <th>Actividad:</th>
                      <th><input type="text" name="actividad" maxlength="50" style="width:500px; height:20x;"><br></th>
                    </tr>


                    <table class="table table-bordered table-hover table-condensed">
                      <thead>
                        <tr>

                          <th>Criterios</th>
                          <th>Insuficiente</th>
                          <th>Suficiente</th>
                          <th>Bueno</th>
                          <th>Notable</th>
                          <th>Excelente</th>
                        </tr>
                      </thead>
                      <tr>
                        <td>Cumple en tiempo y forma con las actividades encomendadas alcanzando los objetivos:</td>
                        <td><label class="radio-inline"> <input type="radio" name="tiempo" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="tiempo" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="tiempo" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="tiempo" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="tiempo" value="4"> 4 </label></td>
                      </tr>
                      <tr>
                        <td>Trabaja en equipo y se adapta a nuevas situaciones:</td>
                        <td><label class="radio-inline"> <input type="radio" name="equipo" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="equipo" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="equipo" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="equipo" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="equipo" value="4"> 4 </label></td>
                      </tr>

                      <tr>
                        <td>Muestra liderazgo en las actividades encomendadas:</td>
                        <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="liderazgo" value="4"> 4 </label></td>
                      </tr>

                      <tr>
                        <td>Organiza su tiempo y trabaja de manera proactiva:</td>
                        <td><label class="radio-inline"> <input type="radio" name="organiza" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="organiza" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="organiza" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="organiza" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="organiza" value="4"> 4 </label></td>
                      </tr>

                      <tr>
                        <td>Interpreta la realidad y sensibiliza aportando soluciones a la problematica con la actividad complementaria:</td>
                        <td><label class="radio-inline"> <input type="radio" name="realidad" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="realidad" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="realidad" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="realidad" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="realidad" value="4"> 4 </label></td>
                      </tr>

                      <tr>
                        <td>Realiza sugerencias innovadoras para beneficio o mejora del programa en el que participa:</td>
                        <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="sugerencias" value="4"> 4 </label></td>
                      </tr>

                      <tr>
                        <td>Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu de servicio:</td>
                        <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="0"> 0 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="1"> 1 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="2"> 2 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="3"> 3 </label></td>
                        <td><label class="radio-inline"> <input type="radio" name="iniciativa" value="4"> 4 </label></td>
                      </tr>
                    </table>

                    <!-- <table>
        <center><td colspan="6"><button name="calcular" value="calcular" class="btn btn-success"> Calcular</button></td></center>
</table> -->
                    <br>
                    <table>
                      <tr>
                      <tr>
                        <th>observaciones:</th>
                        <th><input type="text" name="obs" maxlength="50" style="width:500px; height:20x;"><br></th>
                      </tr>
                      </tr>
                      <br><br><br>
                      <tr>
                        <form class="form-horizontal">
                          <!-- <div class="form-group">
    <label class="col-sm-2 control-label">Valor numerico de la Actividad</label>
    <div class="col-sm-10">
    <imput type="text" name="numero"><?php echo $resultado ?><br>
    </div>
  </div> -->
                      </tr>
                      <br><br>
                      <tr>
                        <form class="form-horizontal">
                          <!-- <div class="form-group">
    <label class="col-sm-2 control-label">Nivel de Desempeño</label>
    <div class="col-sm-10">
    <imput type="text" name="nivel"><?php echo $valor ?><br>
    </div>
  </div> -->
                      </tr>
                      <br><br>
                      <tr>
                        <!-- <th><button  name="guardar" class="btn btn-primary" action="cntrlevaluacion.php"> Guardar</button><br></th> -->
                        <th><button name="enviar" value="enviar" class="btn btn-primary"> Guardar</button><br></th>
                      </tr>
                      </tr>




                    </table>
              </form>

            </div>
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
} ?>