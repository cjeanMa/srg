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

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="doc1-tab" data-toggle="tab" href="#doc1" role="tab" aria-controls="doc1" aria-selected="true">Certificados y Constancias</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="doc2-tab" data-toggle="tab" href="#doc2" role="tab" aria-controls="doc2" aria-selected="false">Consolidados</a>
    </li>

    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="doc1" role="tabpanel" aria-labelledby="doc1-tab">
    <div class="row">
        <div class="col-md">
        <div class="card">
            <div class="card-header text-center">
                CONSTANCIAS Y CERTIFICADOS
            </div>

            <div class="card-body">
                <!--Division para cargar los datos basicos como los id's de estudiante, mediante el select carrer_estudainte-->
	
                <!--Division para cargar los datos basicos como los id's de estudiante, mediante el select carrer_estudainte-->
                    <div id="datos_base">
                        <div class="row form-group">
                            <div class="col-md">			
                                <label for="dni" class="col-md-4 control-label">DNI:</label>
                                <input type="text" name="dni" class="form-control" id="dni" maxlength="8" placeholder="Numero de Documento de Identidad" required/>
                            </div>
                            <div class="col-md">
                                <hr>
                                <a class="btn btn-info btn-block" onclick="datos_persona_estudiante('documentos');" title="Buscar"><i class="fa fa-search"></i> Buscar</a>
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
                            <select name="typeDocument" id="typeDocument" class="form-control" disabled>
                                <option value="">--Seleccione--</option>
                                <?php $i = 0 ;foreach($tipoDocumento as $td){?>
                                    <option value="<?=$i++?>"><?=$td?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md form-group">
                            <label for="singleDocument">Documento:</label>
                            <select name="singleDocument" id="singleDocument" class="form-control" disabled>
                                <option value="">--Seleccione--</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md" id="select_modulo" hidden>
                            <label for="modulo">Modulo:</label>
                            <select name="modulo" id="modulo" class="form-control" disabled>

                            </select>
                        </div>
                    </div>
                <hr>
                    <div class="row">
                        <div class="col-md">
                            <a id="mandar_datosDocumento" onclick="printPDF();" class="btn btn-secondary btn-block" disabled><i class="fa fa-print" target="_blank"></i> Generar Documento</a>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!--tab 2-->
    <div class="tab-pane fade" id="doc2" role="tabpanel" aria-labelledby="doc2-tab">
            <div class="card">
                <h5 class="card-header text-center">CONSOLIDADOS</h5>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md">
                            <label for="typeReport">Tipo de Documento:</label>
                            <select name="typeReport" id="typeReport" class="form-control">
                                <option value="">--Seleccione--</option>
                                <?php $i=0; foreach($tipoReporte as $tr){?>
                                    <option value="<?=$i++?>"><?=$tr?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md">
                            <label for="report">Documento:</label>
                            <select name="report" onchange="cargarAfterReport();" id="report" class="form-control" disabled>
                                <option value="">--Seleccione--</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="inputReport" hidden>
                        <div class="col-md">
                                <label for="classReport">Modalidad:</label>
                                <select name="classReport" id="classReport" onchange="cargarAfterClassReport();" class="form-control" disabled>
                                    <option value="">--Seleccione--</option>
                                    <?php foreach($tipoMatricula as $tm){?>
                                    <option value="<?=$tm['idTipoMatricula']?>"><?=$tm['nombreTipoMatricula']?></option>
                                    <?php }?>
                                </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md"  id="groupInputs1" hidden>
                            <label for="pAcademico">Periodo Academico:</label>
                            <select name="pAcademico" id="pAcademico" onchange="cargarAfterPeriodo();" class="form-control" disabled>
                                <option value="">--Seleccione--</option>
                                <?php foreach($semestreAcademico as $sa){?>
                                    <option value="<?=$sa['idSemestreAcademico']?>"><?=$sa['anio']."-".$sa['periodo']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md"  id="groupInputs2" hidden>
                            <label for="pEstudio">Programa de Estudio:</label>
                            <select name="pEstudio" id="pEstudio" onchange="cargarAfterProgram();" class="form-control" disabled>
                                <option value="">--Seleccione--</option>
                                <?php foreach($escuelaProfesional as $ep){?>
                                    <option value="<?=$ep['idEscuelaProfesional']?>"><?=$ep['nombreEscuelaProfesional']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md" id="groupInputs3" hidden>
                            <label for="sAcademico">Semestre:</label>
                            <select name="sAcademico" id="sAcademico" onchange="cargarAfterSemestre();" class="form-control" disabled>
                                <option value="">--Seleccione--</option>
                                <?php foreach($semestre as $semes){?>
                                    <option value="<?=$semes['idSemestre']?>"><?=$semes['romanos']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md">
                            <a class="btn btn-secondary btn-block" onclick="printReport();" id="btn_goReport" target="_blank"><i class="fa fa-print"></i> Generar Reporte</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </div>

    
</div>
