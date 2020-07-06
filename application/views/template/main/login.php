<form action="<?=base_url();?>login/login" method="post" accept-charset="utf-8">
	<div class="row  pt-4 pb-4">
		<div class="col-12">
			<div class="text-center">

				<span class=" rounded-circle border fa fa-user fa-3x bg-primary p-4 text-white" style="border-width: 10px !important;"></span>

			</div>
			<div class="h4 font-weight-bold text-uppercase text-center mb-3 mt-3">
				CONTROL DE USUARIO
			</div>
		</div>
		<div class="col-10 offset-1 col-md-8 offset-md-2">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text bg-primary text-white"><span class="fa fa-user"></span></span>
				</div>
				<input type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="Usuario" name="username">
			</div>
			<div class="input-group mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text bg-primary text-white"><span class="fa fa-lock"></span></span>
				</div>
				<input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="Contraseña" name="password">
			</div>
			<div class="row">
				<div class="col-6 offset-3">
					<div class="text-center mb-3">
						<input type="submit" value="ENTRAR" class="btn btn-primary  text-uppercase w-100">
						<!-- <span class="btn btn-primary  text-uppercase w-100">ENTRAR</span> -->
					</div>
				</div>
			</div>
<!-- 			<div class="text-center">
				<a href="<?=base_url();?>registrar" title=""><small>Crear un cuenta!</small></a><br>	
				<a href="<?=base_url();?>" title=""><small>Regresar a <?=base_url();?></small></a>	
			</div>
			 -->

		</div>

	</div>
</form>