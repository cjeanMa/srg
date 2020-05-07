<div class="row form-group">
			<div class="col-md">			
				<label for="dni" class="col-md-4 control-label">DNI:</label>
				<input type="text" name="dni" class="form-control" id="dni" maxlength="8" value="<?php echo $persona['idPersona'];?>" required/>
			</div>
			<div class="col-md">
				<hr>
				<a class="btn btn-info btn-block" onclick="datos_persona_estudiante('documentos');" title="Buscar"><i class="fa fa-search"></i> Buscar</a>
			</div>
			<div class="col-md">
				<label for="idEstudiante">Programa de Estudio:</label>
				<select name="idEstudiante" id="idEstudiante" onchange="buscar_modulos();" class="form-control" <?php echo $estudiante!=null?"":"disabled";?>>
                    <option value="">--Seleccione--</option>
                    <?php foreach($estudiante as $e){?>
                        <option value="<?php echo $e['idEstudiante'];?>"><?php echo $e['nombreEscuelaProfesional'];?></option>
                    <?php }?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md text-center">
                <?php if(isset($persona)){ $name_data = explode(" ",$persona['nombres']);?> 
				<h1><b><?php echo ucfirst($persona['apellidoPaterno'])." ".ucfirst($persona['apellidoMaterno']).", ";foreach($name_data as $nd){ echo ucfirst($nd)." ";}?></b></h1>
                <?php } else{?>
                    <div class="alert alert-danger">
                        <h3>Dicha Persona no se encuentra en la base de datos</h3>
                    </div>
                <?php }?>
            </div>
		</div>