<!DOCTYPE html>
<html>

  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <?php
      $this->load->view('template/css');
      ?>
  </head>

  <body>
  <!-- Page Wrapper -->
  <div id="wrapper">
  <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="">

      
         <?php $this->load->view('template/main/header');?>

        <!-- Begin Page Content -->
        <div class="container p-0">
          <div class="row justify-content-md-center align-items-center bg-white pt-5 pb-5">
            <div class="col-md-4 text-center">
              <img src="<?php echo site_url('assets/ilave/img/logo.png');?>" alt="IESTP-ILAVE" style="width:90%; ";>      
            </div>
             <div class="col-md-4 bg-white pt-3 pb-3">
              <div class="card">
                <?php $this->load->view($_view); ?>
              </div>
               
            </div>
          </div>
         
          <!-- Page Heading -->


         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('template/main/footer');?>

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <?php
    $this->load->view('template/js');
    //condidional para cargar los js propios si es que fueran necesarios
   
      ?>
  </body>

</html>
