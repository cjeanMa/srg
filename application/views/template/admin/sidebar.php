<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IESTP-ILAVE</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Personas
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optEstudiantes" aria-expanded="true" aria-controls="optEstudiantes">
          <i class="fas fa-user"></i>
          <span>Estudiantes</span>
        </a>
        <div id="optEstudiantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones: </h6>
            <a class="collapse-item" href="<?php echo base_url();?>estudiante">Lista Estudiantes</a>
            <a class="collapse-item" href="<?php echo base_url();?>estudiante/add">Nuevo Estudiante</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optDocentes" aria-expanded="true" aria-controls="optDocentes">
          <i class="fas fa-user"></i>
          <span>Docentes</span>
        </a>
        <div id="optDocentes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php echo base_url();?>docente">Lista Docentes</a>
            <a class="collapse-item" href="<?php echo base_url();?>docente/add">Nuevo Docente</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Procedimientos
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optMatriculas" aria-expanded="true" aria-controls="optMatriculas">
          <i class="fas fa-fw fa-folder"></i>
          <span>Matriculas</span>
        </a>
        <div id="optMatriculas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php echo base_url();?>matricula/regular">Matricula Regular</a>
            <a class="collapse-item" href="<?php echo base_url();?>matricula/recuperacion">Matricula Recuperacion</a>
            <a class="collapse-item" href="<?php echo base_url();?>matricula/extraordinaria">Matricula Extraordinaria</a>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optPracticas" aria-expanded="true" aria-controls="optPracticas">
          <i class="fas fa-fw fa-folder"></i>
          <span>Practicas Pre Prof.</span>
        </a>
        <div id="optPracticas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php echo base_url();?>practica">Lista Practicas</a>
            <a class="collapse-item" href="<?php echo base_url();?>practica/add">Nueva Practica</a>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>certificados">
          <i class="fas fa-fw fa-table"></i>
          <span>Certificados y Constancias</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optPlazos" aria-expanded="true" aria-controls="optPlazos">
          <i class="fas fa-fw fa-folder"></i>
          <span>Plazos</span>
        </a>
        <div id="optPlazos" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php echo base_url();?>plazomatricula">Plazos Matricula</a>
            <a class="collapse-item" href="<?php echo base_url();?>plazonota">Plazos Notas</a>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administracion
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optProgramas" aria-expanded="true" aria-controls="optProgramas">
          <i class="fas fa-fw fa-folder"></i>
          <span>Programas de Estudio</span>
        </a>
        <div id="optProgramas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php echo base_url();?>escuelaprofesional">Lista de Programas</a>
            <a class="collapse-item" href="<?php echo base_url();?>modulo">Lista de Modulos</a>
            <a class="collapse-item" href="<?php echo base_url();?>unidaddidactica">Lista de Uni. Didacticas</a>
            <a class="collapse-item" href="<?php echo base_url();?>mCapacidade">Lista de Cap. Modulares</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#optUsuarios" aria-expanded="true" aria-controls="optUsuarios">
          <i class="fas fa-fw fa-folder"></i>
          <span>Usuarios</span>
        </a>
        <div id="optUsuarios" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="<?php echo base_url();?>usuario">Lista Usuarios</a>
            <a class="collapse-item" href="<?php echo base_url();?>usuario/add">Nuevo Usuario</a>
        </div>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('dashboard/administrator');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Otros</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="reportes">
          <i class="fas fa-fw fa-table"></i>
          <span>Reportes</span></a>
      </li>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
