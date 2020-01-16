<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo_menu.png" alt="IESTP-ILAVE" style="width:170px; heigth:60px; margin:-20px 20px; padding:0px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Estudiantes <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="ing_estudiantes"><span class ="glyphicon glyphicon-plus"></span> Nuevo Ingresante</a></li>
          <li class="divider"></li>
          <li><a href="ing_nuevacarrera"><span class ="glyphicon glyphicon-plus"></span> Segunda Carrera</a></li>
          <li class="divider"></li>
          <li><a href="lista_estudiantes"><span class ="glyphicon glyphicon-th-list"></span> Lista de Ingresantes </a></li>
        </ul>
      </li>

  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matriculas<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="matricula"><span class ="glyphicon glyphicon-plus"></span> Nuevo Matricula</a></li>
          <li class="divider"></li>
          <li><a href="lista_matriculas"><span class ="glyphicon glyphicon-th-list"></span> Lista de Matriculados</a></li>
          <li class="divider"></li>
          <li><a href="notas"><span class ="glyphicon glyphicon-check"></span> Ingresar Notas</a></li>
          <li class="divider"></li>
          <li><a href="ver_notas"><span class ="glyphicon glyphicon-list"></span> Ver Notas</a></li>
          <li class="divider"></li>
          <li><a href="imprimir_notas"><span class ="glyphicon glyphicon-print"></span> Imprimir Notas</a></li>
        </ul>
      </li>
      <?php 
      if ($_SESSION['permiso'] == "1") {
     ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="ing_usuario"><span class ="glyphicon glyphicon-plus"></span> Nuevo Usuario</a></li>
          <li class="divider"></li>
          <li><a href="lista_usuario"><span class ="glyphicon glyphicon-th-list"></span> Ver Usuarios</a></li>
        </ul>
    </li>
<?php 
      };
 ?>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentos<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="certificados"><span class ="glyphicon glyphicon-list"></span> Certificado de Estudios</a></li>
          <li class="divider"></li>
          <li><a href="constancias"><span class ="glyphicon glyphicon-list"></span> Constancias</a></li>
          <li class="divider"></li>
          <li><a href="reg_mat"><span class ="glyphicon glyphicon-blank"></span> Registro de Matriculas</a></li>
          <li class="divider"></li>
          <li><a href="consolidado_notas"><span class ="glyphicon glyphicon-th-list"></span> Consolidado de Notas</a></li>
        </ul>
    </li>
      <?php if ($_SESSION['permiso'] == "1") {

       ?>
      <li><a href="administracion">Administracion</a></li>
       <?php }; ?>
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?><b class="caret"></b>
        </a>
          <ul class="dropdown-menu">
            <li><a href="perfil"><span class ="glyphicon glyphicon-user"></span> Ver Perfil</a></li>
          <li class="divider"></li>
          <li><a  id="cerrar_sesion"><span class ="glyphicon glyphicon-off"></span> Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script>
  $(document).ready(function(){
    $('#cerrar_sesion').click(function(){
      if (confirm("¿Quieres cerrar sesion?")){
        window.location = "cerrar_sesion.php"
      }
    });
  });
</script>
