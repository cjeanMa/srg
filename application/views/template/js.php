
  <!-- Bootstrap core JavaScript-->
  <script src="<?=asset_url()?>theme/vendor/jquery/jquery.min.js"></script>
  <script src="<?=asset_url()?>theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=asset_url()?>theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=asset_url()?>theme/js/sb-admin-2.min.js"></script>
  
  <!-- Modificar el o los archivos js que se utilizara-->
 <?php if(!empty($javascript)){
    foreach($javascript as $js){
   ?>
		  <script src="<?=asset_url().'modulos/'.$js?>"></script>
	<?php } } ?>




