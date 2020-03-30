<div class="col-md">
			<label for="">Modulo:</label>
			<select name="idModulo" class="form-control" id="idModulo" onchange="select_modulo();">
                <option value="">--Seleccione--</option>
                <?php if(isset($modulos)){ foreach($modulos as $m){?>
                    <option value="<?php echo $m['idModulo'];?>"><?php echo $m['nombreModulo'];?></option>
                <?php } }?>
			</select>
		</div>