<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>TECNM</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>CHINA</b>TECNM</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">


        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
            $caracter_a_buscar = ".";
            $buscar = strpos($id_foto_perfil, $caracter_a_buscar);
            if ($buscar == true) {
              // echo "existe foto de perfil";
            ?>
              <img src="<?php echo $URL; ?>../usuarios/update_usuarios/<?php echo $sesion_usuario['foto_perfil']; ?>" class="user-image" alt="User Image">
              <?php
            } else {
              if ($id_sexo  == "HOMBRE") {
              ?>

                <img src="<?php echo $URL; ?>../public/images/avatar_hombre.png" class="user-image" alt="User Image">

              <?php
              } else {
              ?>

                <img src="<?php echo $URL; ?>../public/images/avatar_mujer.png" class="user-image" alt="User Image">

            <?php
              }
            }
            ?>
            <span class="hidden-xs"><?php echo $id_nombres . " " . $id_ap_paterno . " " . $id_ap_materno; ?> </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <?php
              $caracter_a_buscar = ".";
              $buscar = strpos($id_foto_perfil, $caracter_a_buscar);
              if ($buscar == true) {
                // echo "existe foto de perfil";
              ?>
                <img src="<?php echo $URL; ?>../usuarios/update_usuarios/<?php echo $sesion_usuario['foto_perfil']; ?>" class="user-image" alt="User Image">
                <?php
              } else {
                if ($id_sexo  == "HOMBRE") {
                ?>

                  <img src="<?php echo $URL; ?>../public/images/avatar_hombre.png" class="user-image" alt="User Image">

                <?php
                } else {
                ?>

                  <img src="<?php echo $URL; ?>../public/images/avatar_mujer.png" class="user-image" alt="User Image">

              <?php
                }
              }
              ?>

              <p>
                <?php echo $id_nombres . " " . $id_ap_paterno . " " . $id_ap_materno; ?> - <?php echo $id_carrera; ?>
                <small><?php echo $id_numero_control; ?></small>
              </p>
            </li>

            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="../usuarios/perfil.php" class="btn btn-default btn-flat">Perfil</a>
          </div>
          <div class="pull-right">
            <a href="../login/controller_cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
          </div>
        </li>
      </ul>
      </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar sidebar-menu">
    <!-- Sidebar user panel -->
    <!-- <div class="user-panel">
      <div class="pull-left image">
        <?php
        $caracter_a_buscar = ".";
        $buscar = strpos($id_foto_perfil, $caracter_a_buscar);
        if ($buscar == true) {
          // echo "existe foto de perfil";
        ?>
          <img src="<?php echo $URL; ?>../usuarios/update_usuarios/<?php echo $sesion_usuario['foto_perfil']; ?>" class="user-image" alt="User Image">
          <?php
        } else {
          if ($id_sexo  == "HOMBRE") {
          ?>

            <img src="<?php echo $URL; ?>../public/images/avatar_hombre.png" class="user-image" alt="User Image">

          <?php
          } else {
          ?>

            <img src="<?php echo $URL; ?>../public/images/avatar_mujer.png" class="user-image" alt="User Image">

        <?php
          }
        }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $id_nombres . " " . $id_ap_paterno . " " . $id_ap_materno; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div><br> -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>AREA ACADEMICA</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class=" sidebar-menu treeview-menu">

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Agregar Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="lista-usuarios.php"><i class="fa fa-users"></i> Lista de Usuarios</a></li>

            <li><a href="create.php"><i class="fa fa-user"></i> Agregar Alumno</a></li>


            <li><a href="create_usuario.php"><i class="fa fa-user"></i> Agregar Usuario</a></li>

          </ul>
        </li>



        <li class="header">Calendario de Actividades</li>
        <li><a href="calendario.php"><i class="glyphicon glyphicon-calendar"></i> <span>Calendario</span></a></li>
        <li class="header">talleres</li>
        <li><a href="talleres.php"><i></i> <span>Talleres</span></a></li>

        <li class="header">Formatos</li>
        <li><a href="guia.php"><i class="glyphicon glyphicon-paperclip"></i> <span>Guia de Actividades</span></a></li>
        <li><a href="agregar-credito.php"><i class="glyphicon glyphicon-folder-open"></i> <span>Agregar Credito</span></a></li>
        <li class="header">Evaluciones</li>
        <li><a href="evaluacion.php"><i class="fa fa-book"></i> <span>Evalucion de Desempeño</span></a></li>
        <li><a href="constancia.php"><i class="fa fa-book"></i> <span>Constancias</span></a></li>
        <li><a href="generarconstancia.php"><i class="fa fa-book"></i> <span>GenerarConstancias</span></a></li>
        <li class="header">Tutorias</li>
        <li><a href="tutoria.php"><i class="fa fa-user"></i> <span>registro de tutoriados</span></a></li>
        <li><a href="lista_tutoria.php"><i class="fa fa-users"></i> <span>Lista de Tutorias</span></a></li>
      </ul>
    </li>



  </section>
  <!-- /.sidebar -->
</aside>