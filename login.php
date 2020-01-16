<?php 
  session_start();
  if (!isset($_SESSION['idusuario'])) {
  
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/alertify.css">
  <link rel="stylesheet" type="text/css" href="css/themes/default.css">

  <script src = "js/jquery-3.1.1.min.js"></script>
  <script src = "js/bootstrap.js"></script>
  <script src = "js/alertify.js"></script>
  <script src = "js/funciones.js"></script>

  <meta charset="utf-8">
  <title>. : : Validacion : : .</title>
</head>
<body>
  
<div class="container">
        <div class="card card-container">
            <img class="profile-img-card" src="img/logo_menu.png" alt="IESTP-ILAVE">
            <p id="profile-name" class="profile-name-card">REGISTRO ACADEMICO</p>
            <form class="form-signin">
              <hr>
                <input type="text" id="user" class="form-control" placeholder="Nombre de Usuario" required autofocus>
                <input type="password" id="password" class="form-control" placeholder="Contraseña" required>
                <hr>
                <button class="btn btn-lg btn-primary btn-block btn-signin" id = "login">Ingresar</button>
            </form><!-- /form -->

            <div class="text-center">
                <h6>&copy; 2018 Todos los derechos Reservados</h6>
                <h6 style = "font-size: 70%;">Instituto de Educaci&oacute;n Superior Tecnol&oacute;gico P&uacute;blico Ilave</h6>
                </div>
            </div><!-- /card-container -->
    </div><!-- /container -->
  
</body>
<footer id="footer"></footer>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#footer').load('componentes/footer.php');
    $('#login').click(function(){
      user = $('#user').val();
      password = $('#password').val();
      if (user!="" && password !="") {verificar_login(user, password);}
      else {alertify.error("INGRESE USUARIO Y PASSWORD");}
    });
  });

</script>

<?php 
  }
  else{
    echo "<script>window.location = 'index'</script>";
  }

 ?>