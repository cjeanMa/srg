<div class="row">
    <div class="col-md text-center">
        <h2><b>Administracion de otros aspectos</b></h2>
    </div>
</div>
<hr>
<div class="row">
    <!-- Div para semnestres Academicos-->
    <div class="col-md box-black">
        <h4>Semestres Academicos</h4>
        <div class="container">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSemestreAcademico"><i class="fa fa-plus"></i> Agregar</button>        
        </div>
        <div class="container" id="table_sem_aca">
          <table class="table table-striped table-bordered text-center">
                  <thead class="thead-dark">
                  <th>Año</th>
                  <th>Periodo</th>
                  <th>Acciones</th>
                  </thead>

                  <?php foreach($semestreAcademico as $sa){?>
                  <tr>
                  <td><?php echo $sa['anio'];?></td>
                  <td><?php echo $sa['periodo'];?></td>
                  <td>
                      <a href="" onclick = "cargarDatosSemestreAcademico('<?=$sa['idSemestreAcademico'].'||'.$sa['anio'].'||'.$sa['periodo'];?>');" data-toggle="modal" data-target="#updateSemestreAcademico"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('semestreacademico/remove/'.$sa['idSemestreAcademico']);?>"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>
                  <?php }?>
          </table>
        </div>
    </div>
    <!-- Div para Semestres-->
    <div class="col-md box-black">
        <h4>Semestres</h4>
        <div class="container">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSemestre"><i class="fa fa-plus"></i> Agregar</button>        
        </div>  
        <div class="container" id="table_sem">
          <table class="table table-striped table-bordered text-center">
              <thead class="thead-dark">
                  <th>Def. Romanos</th>
                  <th>Semestre</th>
                  <th>PreNombre</th>
                  <th>Acciones</th>
              </thead>
              <?php foreach($semestres as $s){ ?>
              <tr>
                  <td><?php echo $s['romanos'];?></td>
                  <td><?php echo $s['nombre'];?></td>
                  <td><?php echo $s['prenombre'];?></td>
                  <td>
                      <a href="" onclick ="cargarDatosSemestre('<?=$s['idSemestre'].'||'.$s['romanos'].'||'.$s['nombre'].'||'.$s['prenombre'];?>');" data-toggle="modal" data-target="#updateSemestre"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('semestre/remove/').$s['idSemestre'];?>"><i class="fa fa-trash"></i></a>
                  </td>
              </tr>
              <?php }?>
          </table>
        </div>
    </div>
</div>

<div class="row">
    <!-- Div para discapacidades-->
    <div class="col-md box-black">
        <h4>Discapacidades</h4>
        <div class="container">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDiscapacidad"><i class="fa fa-plus"></i> Agregar</button>        
        </div>
        <div class="container" id="table_discapacidad">
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                    <th>Id Discapacidad</th>
                    <th>Denominacion</th>
                    <th>Acciones</th>
                </thead>
                <?php foreach($discapacidades as $dis){?>
                <tr>
                    <td><?php echo $dis['idDiscapacidad'];?></td>
                    <td><?php echo $dis['nombreDiscapacidad'];?></td>
                    <td>
                        <a href="" onclick = "cargarDatosDiscapacidad('<?=$dis['idDiscapacidad'].'||'.$dis['nombreDiscapacidad']?>')" data-toggle="modal" data-target="#updateDiscapacidad"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo site_url('discapacidad/remove/'.$dis['idDiscapacidad'])?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
    <!-- Div para Sexos-->
    <div class="col-md box-black">
        <h4>Sexo / Genero</h4>
        <div class="container">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSexo"><i class="fa fa-plus"></i> Agregar</button>        
        </div>
        <div class="container" id="table_genero">
        <table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
                <th>Nombre Sexo</th>
                <th>Abreviacion</th>
                <th>Acciones</th>
            </thead>
            <?php foreach($sexos as $sexo){ ?>
            <tr>
                <td><?php echo $sexo['nombreSexo'];?></td>
                <td><?php echo $sexo['letraSexo']; ?></td>
                <td>
                    <a href="" onclick="cargarDatosGenero('<?=$sexo['idSexo'].'||'.$sexo['nombreSexo'].'||'.$sexo['letraSexo']?>');" data-toggle="modal" data-target="#updateSexo"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('sexo/remove/'.$sexo['idSexo']);?>"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php }?>
        </table> 
        </div>
    </div>
</div>

<!--#####################Modales de Agregado##########################-->

<!--Modal de Add Semestre Academico -->
<div class="modal fade" id="addSemestreAcademico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Semestre Academico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md form-group">
                    <label for="anioSemestreAcademico">Año del Semestre Academico:</label>
                    <input type="text" name="anioPeriodo" id="anioSemestreAcademico" class="form-control" placeholder="Ejm. 2019,2020">
                </div>
            </div>
            <div class="row">
                <div class="col-md form-group">
                    <label for="periodoSemestreAcademico">Periodo del Semestre Academico:</label>
                    <select name="periodoSemestreAcademico" id="periodoSemestreAcademico" class="form-control">
                        <option value="">--Seleccione--</option>
                        <option value="<?php echo "I";?>"><?php echo "I";?></option>
                        <option value="<?php echo "II";?>"><?php echo "II";?></option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnAddSemestreAcademico" data-dismiss="modal" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!--Modal de Add Semestres -->
<div class="modal fade" id="addSemestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Semestre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md form-group">
                        <label for="romanos">Numero en Romanos</label>
                        <input type="text" name="romanos" id="romanos" class="form-control" placeholder="Ejm. III, IV">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label for="nombreSemestre">Denominacion del Semestre:</label>
                        <input type="text" name="nombreSemestre" id="nombreSemestre" class="form-control" placeholder="Ejm. Primero, Tercero">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label for="preNombre">Apocope:</label>
                        <input type="text" name="preNombre" id="preNombre" class="form-control" placeholder="Ejm. Primer, Tercer">
                </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnAddSemestre" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!--Modal de Add Discapacidades -->
<div class="modal fade" id="addDiscapacidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Nueva Discapacidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md form-groupp">
                    <label for="nombreDiscapacidad">Denominacion de la discapacidad:</label>
                    <input type="text" name="nombreDiscapacidad" id="nombreDiscapacidad" class="form-control" placeholder="Ejm. Visual, Fisica">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnAddDiscapacidad"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!--Modal de Add Generos -->
<div class="modal fade" id="addSexo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Nuevo Genero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md form-group">
                    <label for="nombreSexo">Denominacion del Genero:</label>
                    <input type="text" name="nombreSexo" id="nombreSexo" class="form-control" placeholder="Ejm. Masculino, No definido">
                </div>
            </div>
            <div class="row">
                <div class="col-md form-group">
                    <label for="abreviacionSexo">Abreviacion:</label>
                    <input type="text" name="abreviacionSexo" id="abreviacionSexo" class="form-control" placeholder="Ejm. M, ND">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnAddGenero"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!--################### Modales para Update #####################-->

<!--Modal Update Semestre Academico-->
<div class="modal fade" id="updateSemestreAcademico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Semestre Academico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container">
              <div class="row">
                <div class="col-md form-group">
                  <label for="upIdSemestreAcademico">Id Semestre Academico</label>
                  <input type="text" name="upIdSemestreAcademico" id="upIdSemestreAcademico" class="form-control" readonly>
                </div>
              </div>

              <div class="row">
                  <div class="col-md form-group">
                      <label for="upAnioSemestreAcademico">Año del Semestre Academico:</label>
                      <input type="text" name="upAnioPeriodo" id="upAnioSemestreAcademico" class="form-control">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md form-group">
                      <label for="upPeriodoSemestreAcademico">Periodo del Semestre Academico:</label>
                      <select name="upPeriodoSemestreAcademico" id="upPeriodoSemestreAcademico" class="form-control">
                          <option value="">--Seleccione--</option>
                          <option value="<?php echo "I";?>"><?php echo "I";?></option>
                          <option value="<?php echo "II";?>"><?php echo "II";?></option>
                      </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnUpdateSemestreAcademico" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!--Modal Update Semestre-->
<div class="modal fade" id="updateSemestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Semestre Academico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md form-group">
                  <label for="upIdSemestre">Id del Semestre</label>
                  <input type="text" name="upIdSemestre" id="upIdSemestre" class="form-control" readonly>
                </div>
              </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label for="upRomanos">Numero en Romanos</label>
                        <input type="text" name="upRomanos" id="upRomanos" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label for="upNombreSemestre">Denominacion del Semestre:</label>
                        <input type="text" name="upNombreSemestre" id="upNombreSemestre" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label for="upPreNombre">Apocope:</label>
                        <input type="text" name="upPreNombre" id="upPreNombre" class="form-control">
                </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnUpdateSemestre" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!--Modal Update Discapacidad-->
<div class="modal fade" id="updateDiscapacidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Semestre Academico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md form-group">
              <label for="upIdDiscapacidad">Id de Discapacidad</label>
              <input type="text" name="upIdDiscapacidad" id="upIdDiscapacidad" class="form-control" readonly>
            </div>
          </div>
            <div class="row">
                <div class="col-md form-group">
                    <label for="upNombreDiscapacidad">Denominacion de la discapacidad:</label>
                    <input type="text" name="upNombreDiscapacidad" id="upNombreDiscapacidad" class="form-control">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnUpdateDiscapacidad" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!--Modal Update Sexo-->
<div class="modal fade" id="updateSexo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Semestre Academico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
              <div class="row">
                <div class="col-md form-group">
                  <label for="upIdSexo">Id del Genero:</label>
                  <input type="text" name="upIdSexo" id="upIdSexo" class="form-control" readonly>
                </div>
              </div>
            <div class="row">
                <div class="col-md form-group">
                    <label for="upNombreSexo">Denominacion del Genero:</label>
                    <input type="text" name="upNombreSexo" id="upNombreSexo" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md form-group">
                    <label for="upAbreviacionSexo">Abreviacion:</label>
                    <input type="text" name="upAbreviacionSexo" id="upAbreviacionSexo" class="form-control">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnUpdateSexo" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>
