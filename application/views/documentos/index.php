<div class="container">
    <div class="row">
        <div class="col-md">
            <h2 class="text-center">Documentos</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md pull-riht">
            <a href="<?=$_SERVER['HTTP_REFERER'];?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
        </div>
    </div>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-md">
        <div class="card">
            <div class="card-header">
                Certificados y Constancias
            </div>
            <div class="card-body">
                <!--Division para cargar los datos basicos como los id's de estudiante, mediante el select carrer_estudainte-->
	
                <!--Division para cargar los datos basicos como los id's de estudiante, mediante el select carrer_estudainte-->
                    <div id="datos_base_practicas">
                        <div class="row form-group">
                            <div class="col-md">			
                                <label for="dni" class="col-md-4 control-label">DNI:</label>
                                <input type="text" name="dni" class="form-control" id="dni" maxlength="8" placeholder="Numero de Documento de Identidad" required/>
                            </div>
                            <div class="col-md">
                                <hr>
                                <a class="btn btn-info btn-block" onclick="datos_persona_estudiante('practicas');" title="Buscar"><i class="fa fa-search"></i> Buscar</a>
                            </div>
                            <div class="col-md">
                                <label for="idEstudiante">Programa de Estudio:</label>
                                <select name="idEstudiante" id="idEstudiante" class="form-control" disabled>
                                    <option value="">--Seleccione--</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md text-center">
                                <h1><b></b></h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md form-group">
                            <label for="typeDocument">Tipo de Documento:</label>
                            <select name="typeDocument" id="typeDocument" class="form-control">
                                <option value="">--Seleccione--</option>
                            </select>
                        </div>
                        <div class="col-md form-group">
                            <label for="singleDocument">Documento:</label>
                            <select name="singleDocument" id="singleDocument" class="form-control">
                                <option value="">--Seleccione--</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md">
                            <a id="mandar_datosDocumento" class="btn btn-warning btn-block" disabled><i class="fa fa-print"></i> Generar Documento</a>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>
