<?php
include('../app/config/config.php');
session_start();
if (isset($_SESSION['u_usuario']) && $_SESSION['u_privilegio']  == 0) {
  //echo "existe sesión";) {
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
    <title>Constancias</title>
    <link rel="stylesheet" href="css/estilo_parrafo.css">
    <link rel="stylesheet" href="../css/StyleNew.css">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../layout/menu.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            CONSTANCIAS DE CREDITOS COMPLEMENTARIOS
            <small>Capturar los datos</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">Capatura de Datos Para la Constancia</div>
            <div class="panel-body">
              <!-- <table class="table table-bordered table-hover table-condensed">

                <body>
                  <div class="container">
                    <br>
                    <div class="row">
                      <form action="cntrlconstancia.php" method="POST">
                    </div>


              </table> -->
              <h2> CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA.</h2>
              <br>
              <!-- Opcion para ver cuantos creditos lleva el alumno (esta informacion es el resultado de la evalucion que realiza el maestro) -->
              <div class="container_input">
                <label for="matricula" class="label_input">Matricula:</label>
                <input type="text" name="matricula2" id="buscar_matricula" maxlength="50" class="input_1">
                <div value="buscar" class="btn-primary btn_buscar" onclick="datos_constancia();">Buscar</div>
              </div>
              <!-- tabla con los datos solicitados en el input anterior (matricula) -->
              <table class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr class="info">
                    <th>Nombre Alumno</th>
                    <th>Observaciones</th>
                    <th>Desempeño</th>
                    <th>Valor</th>
                    <th>Evento o Actividad</th>
                    <th>Credito</th>
                  </tr>
                </thead>
                <tbody id="body_table">
                </tbody>
              </table>

              <div class="docs" id="docs">
                <p id="credito_valor">Creditos totales: </p>

              </div>

              <!-- formulario para guardar la constancia -->
              <form method="POST" action="cntrlconstancia.php">



                <p style="margin-top:20px">
                  <input type="text" name="jefe" maxlength="100" class="input_border input_largo" placeholder="Jefe(a)">
                  <br>

                  Jefe(a) del Departamento de Servicios Escolares o su equivalente en los Institutos Tecnológicos Descentralizados

                  <br>
                  PRESENTE.
                </p>
                <br>
                <br>
                <br>
                <p class="parrafo_inputs">
                  El que se suscribe <input type="text" name="suscribe" maxlength="100" class="input_border input_largo" placeholder="Suscribe">, por
                  este medio se permite hacer de su conocimiento que
                  <br> el estudiante <input type="text" name="alumno" maxlength="100" class="input_border input_largo" placeholder="Nombre alumno">
                  con número de control <input type="text" name="matricula" maxlength="100" class="input_border input_corto" placeholder="Matricula alumno"><br>
                  de la carrera de <input type="text" name="carrera" maxlength="100" class="input_border input_largo" placeholder="Carrera del alumno">
                  ha cumplido su actividad complementaria con el nivel de desempeño<br> <input type="text" name="desempe" maxlength="100" class="input_border" placeholder="Desempeño">
                  y un valor numérico de <input type="text" name="valor" maxlength="100" class="input_border input_corto" placeholder="Valor">,
                  durante el periodo escolar <input type="text" name="ciclo" maxlength="100" class="input_border input_corto" placeholder="Ciclo escolar">
                  con un valor curricular de <input type="text" name="valorcurri" maxlength="100" class="input_border input_corto" placeholder="Valor Curricular">
                  créditos.
                </p>
                <br>

                Se extiende la presente en el poblado de Chiná a los
                <?php
                setlocale(LC_ALL, "es_ES");

                echo
                date("d") . " dias de  " .
                  date("F") . " de " . date("Y"); ?>
                <br>
                <br>

                <button name="enviar" value="enviar" class="btn btn-success">
                  Guardar
                </button>
              </form>


            </div>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          <?php include('../layout/footer.php'); ?>
          <?php include('../layout/footer_links.php'); ?>
      </div>

  </body>

  </html>
<?php
} else {
  echo "no existe sesión";
  header('Location:' . $URL . '/login');
}
?>

<script>
  function datos_constancia() {
    buscar_matricula = $("#buscar_matricula").val();
    //se manda la matricula al archivo php para buscar los datos enbase a esa matricula
    var parametros = {
      "buscar": "1",
      "buscar_matricula": buscar_matricula
    }; //fucnion que me manda esa matricula 
    $.ajax({
      data: parametros,
      dataType: 'json',
      url: 'constancia_datos.php',
      type: 'post',
      error: function() {
        alert("Error");
      },
      //funcion que recibe los datos que el archivo "datos_alumno_evaluación.php" devuelve, esto los devuelve como un objeto llamado "valores"
      success: function(datos) {
        //console.log(datos);
        const docs = document.getElementById("docs");
        const body_tabla = document.getElementById("body_table");
        console.log(datos);
        datos.forEach(element => {
          //se crean los elementos tr y td de la tabla
          let tr = document.createElement('tr');
          let td1 = document.createElement('td');

          //se agregan los valores correspondientes en la posicion correspondiente de la tabla
          td1.innerHTML = element['nombre'];
          console.log(element['nombre']);
          let td2 = document.createElement('td');
          td2.innerHTML = element['observacion'];
          let td3 = document.createElement('td');
          td3.innerHTML = element['desmp'];
          let td4 = document.createElement('td');
          td4.innerHTML = element['valor'];
          //PDFS---------------
          let div = document.createElement('div');
          div.style = "height:30px; margin-right:30px";
          let img = document.createElement('img');
          img.src = "../images/pdf_logo.png";
          img.style = "width:20px; heigth:20px; margin-right:7px";
          let a = document.createElement('a');
          a.href = `./cargas/${element[4]}`;
          a.innerHTML = element[6];
          a.target = "_blank";
          a.style = "margin-right:10px";
          div.appendChild(img);
          //se mete el elemento "a" en el div
          div.appendChild(a);
          //-----------------
          let td5 = document.createElement('td');
          td5.innerHTML = element['title'];
          let td6 = document.createElement('td');
          td6.innerHTML = element['credito'];
          a.appendChild(td5);
          //se meten todos los td en el elemento tr
          tr.appendChild(td1);
          tr.appendChild(td2);
          tr.appendChild(td3);
          tr.appendChild(td4);
          tr.appendChild(td5);
          tr.appendChild(td6);
          //se agrega el elemento tr en la tabla
          body_tabla.appendChild(tr);
          //se agrega el div con los pdfs en donde va
          docs.appendChild(div);
        });

        //obtener el credito, el cual se encuentra en la posicion 5 del arreglo "datos", despues sumo todos los creditos y los guardo en una variable para mostrarlos en pantalla --------------------------
        const valor = document.getElementById("credito_valor");
        let valorFinal = 0;
        datos.forEach(element => {
          //variable que convierte los creditos a numeros
          let numero = Number(element[5]);
          //se hace la suma de los creditos
          valorFinal = valorFinal + numero;
        });
        //se crea un elemento b
        let b = document.createElement('b');
        //se le agrega al elemento creado la suma de los creditos
        b.innerHTML = valorFinal;
        valor.appendChild(b);
        //console.log(b);
        // -----------------------------

      }


    })


  };
</script>