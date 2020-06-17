<div class="row">
  <div class="col-md text-center">
    <h2><b>Administracion de otros aspectos</b></h2>
  </div>
</div>
<hr>
<div class="row">
  <!-- Div para semnestres Academicos-->
  <div class="col-md box-black">
    <h4>Semestre Academico</h4>
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

        <?php foreach ($semestreAcademico as $sa) { ?>
          <tr>
            <td><?php echo $sa['anio']; ?></td>
            <td><?php echo $sa['periodo']; ?></td>
            <td>
              <a href="" onclick="cargarDatosSemestreAcademico('<?= $sa['idSemestreAcademico'] . '||' . $sa['anio'] . '||' . $sa['periodo']; ?>');" data-toggle="modal" data-target="#updateSemestreAcademico"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('semestreacademico/remove/' . $sa['idSemestreAcademico']); ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
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
        <?php foreach ($semestres as $s) { ?>
          <tr>
            <td><?php echo $s['romanos']; ?></td>
            <td><?php echo $s['nombre']; ?></td>
            <td><?php echo $s['prenombre']; ?></td>
            <td>
              <a href="" onclick="cargarDatosSemestre('<?= $s['idSemestre'] . '||' . $s['romanos'] . '||' . $s['nombre'] . '||' . $s['prenombre']; ?>');" data-toggle="modal" data-target="#updateSemestre"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('semestre/remove/') . $s['idSemestre']; ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<div class="row">
  <!-- Div para Plazos Matricula-->
  <div class="col-md box-black">
    <h4>Plazos Matricula</h4>
    <div class="container">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPlazoMatricula"><i class="fa fa-plus"></i> Agregar</button>
    </div>
    <div class="container" id="table_plazoMatricula">
      <table class="table table-striped table-bordered text-center">
        <thead class="thead-dark">
          <th>Semestre Academico</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Acciones</th>
        </thead>
        <?php foreach ($plazoMatricula as $pm) { ?>
          <tr>
            <td><?php echo $pm['anio'] . "-" . $pm['periodo']; ?></td>
            <td><?php echo $pm['fechaInicio']; ?></td>
            <td><?php echo $pm['fechaLimite']; ?></td>
            <?php $aux = $pm['idPlazoMatricula'] . '||' . $pm['fechaInicio'] . '||' . $pm['fechaLimite'] . '||' . $pm['fechaInicioRezagado'] . '||' . $pm['fechaLimiteRezagado'] . '||' . $pm['fechaInicioExtemporaneo'] . '||' . $pm['fechaLimiteExtemporaneo'] . '||' . $pm['fechaModificacion'] . '||' . $pm['idSemestreAcademico'] . '||' . $pm['anio'] . "-" . $pm['periodo']; ?>
            <td>
              <a href="" onclick="cargarDatosPlazoMatricula('<?= $aux; ?>', 'view');" data-toggle="modal" data-target="#viewPlazoMatricula"><i class="fa fa-eye"></i></a>
              <a href="" onclick="cargarDatosPlazoMatricula('<?= $aux ?>', 'update');" data-toggle="modal" data-target="#updatePlazoMatricula"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('plazomatricula/remove/' . $pm['idPlazoMatricula']); ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <!-- Div para Plazos Nota-->
  <div class="col-md box-black">
    <h4>Plazos Notas</h4>
    <div class="container">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPlazoNota"><i class="fa fa-plus"></i> Agregar</button>
    </div>
    <div class="container" id="table_plazoNota">
      <table class="table table-striped table-bordered text-center">
        <thead class="thead-dark">
          <th>Semestre Academico</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Acciones</th>
        </thead>
        <?php foreach ($plazoNota as $pn) { ?>
          <tr>
            <td><?php echo $pn['anio'] . "-" . $pn['periodo']; ?></td>
            <td><?php echo $pn['fechaInicio']; ?></td>
            <td><?php echo $pn['fechaLimite']; ?></td>
            <?php $aux = $pn['idPlazoNotas'] . '||' . $pn['fechaInicio'] . '||' . $pn['fechaLimite'] . '||' . $pn['fechaModificacion'] . '||' . $pn['fechaCreacion'] . '||' . $pn['idSemestreAcademico'] . '||' . $pn['anio'] . "-" . $pn['periodo']; ?>
            <td>
              <a href="" onclick="cargarDatosPlazoNota('<?= $aux; ?>', 'view');" data-toggle="modal" data-target="#viewPlazoNota"><i class="fa fa-eye"></i></a>
              <a href="" onclick="cargarDatosPlazoNota('<?= $aux ?>', 'update');" data-toggle="modal" data-target="#updatePlazoNota"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('plazonota/remove/' . $pn['idPlazoNotas']); ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
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
        <?php foreach ($discapacidades as $dis) { ?>
          <tr>
            <td><?php echo $dis['idDiscapacidad']; ?></td>
            <td><?php echo $dis['nombreDiscapacidad']; ?></td>
            <td>
              <a href="" onclick="cargarDatosDiscapacidad('<?= $dis['idDiscapacidad'] . '||' . $dis['nombreDiscapacidad'] ?>')" data-toggle="modal" data-target="#updateDiscapacidad"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('discapacidad/remove/' . $dis['idDiscapacidad']) ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
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
        <?php foreach ($sexos as $sexo) { ?>
          <tr>
            <td><?php echo $sexo['nombreSexo']; ?></td>
            <td><?php echo $sexo['letraSexo']; ?></td>
            <td>
              <a href="" onclick="cargarDatosGenero('<?= $sexo['idSexo'] . '||' . $sexo['nombreSexo'] . '||' . $sexo['letraSexo'] ?>');" data-toggle="modal" data-target="#updateSexo"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('sexo/remove/' . $sexo['idSexo']); ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
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
                <option value="<?php echo "I"; ?>"><?php echo "I"; ?></option>
                <option value="<?php echo "II"; ?>"><?php echo "II"; ?></option>
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


<!--Modal de Add Plazo Matricula-->
<div class="modal fade" id="addPlazoMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Plazo Matricula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row form-group">
            <div class="col-md">
              <label for="idSemestreAcademico" class="control-label">Semestre Academico:</label>
              <select name="idSemestreAcademico" id="idSemestreAcademico" class="form-control">
                <option value="">--Seleccione--</option>
                <?php foreach ($saFiltradoPlazoMatricula as $sa) { ?>
                  <option value="<?php echo $sa['idSemestreAcademico']; ?>"><?php echo $sa['anio'] . "-" . $sa['periodo']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <h4>Fecha Ordinarios:</h4>
          <div class="row form-group">
            <div class="col-md-6">
              <label for="fechaInicio" class="control-label">Fecha Inicio:</label>
              <input type="date" name="fechaInicio" class="form-control" id="fechaInicio" disabled="true" />
            </div>

            <div class="col-md-6">
              <label for="fechaLimite" class="control-label">Fecha Limite:</label>
              <input type="date" name="fechaLimite" class="form-control" id="fechaLimite" disabled="true" />
            </div>
          </div>
          <h4>Fechas Rezagados:</h4>
          <div class="row form-group">
            <div class="col-md-6">
              <label for="fechaInicioRezagado" class="control-label">Fecha Inicio:</label>
              <input type="date" name="fechaInicioRezagado" class="form-control" id="fechaInicioRezagado" disabled="true" />
            </div>

            <div class="col-md-6">
              <label for="fechaLimiteRezagado" class="control-label">Fecha Limite:</label>
              <input type="date" name="fechaLimiteRezagado" class="form-control" id="fechaLimiteRezagado" disabled="true" />
            </div>
          </div>
          <h4>Fechas Extemporaneas:</h4>
          <div class="row form-group">
            <div class="col-md-6">
              <label for="fechaInicioExtemporaneo" class="control-label">Fecha Inicio:</label>
              <input type="date" name="fechaInicioExtemporaneo" class="form-control" id="fechaInicioExtemporaneo" disabled="true" />
            </div>

            <div class="col-md-6">
              <label for="fechaLimiteExtemporaneo" class="control-label">Fecha Limite:</label>
              <input type="date" name="fechaLimiteExtemporaneo" class="form-control" id="fechaLimiteExtemporaneo" disabled="true" />
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
        <button type="button" id="btnAddPlazoMatricula" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
      </div>
    </div>
  </div>
</div>


  <!--Modal de Add Plazo Nota-->
  <div class="modal fade" id="addPlazoNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Plazo Nota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row form-group">
              <div class="col-md">
                <label for="idSemestreAcademicoPn" class="control-label">Semestre Academico:</label>
                <select name="idSemestreAcademicoPn" id="idSemestreAcademicoPn" class="form-control">
                  <option value="">--Seleccione--</option>
                  <?php foreach ($saFiltradoPlazoNota as $sa) { ?>
                    <option value="<?php echo $sa['idSemestreAcademico']; ?>"><?php echo $sa['anio'] . "-" . $sa['periodo']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="fechaInicioPn" class="control-label">Fecha Inicio:</label>
                <input type="date" name="fechaInicioPn" class="form-control" id="fechaInicioPn" disabled="true" />
              </div>

              <div class="col-md-6">
                <label for="fechaLimitePn" class="control-label">Fecha Limite:</label>
                <input type="date" name="fechaLimitePn" class="form-control" id="fechaLimitePn" disabled="true" />
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
          <button type="button" id="btnAddPlazoNota" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
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
                  <option value="<?php echo "I"; ?>"><?php echo "I"; ?></option>
                  <option value="<?php echo "II"; ?>"><?php echo "II"; ?></option>
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

  <!--Modal de Update Plazo Matricula-->
  <div class="modal fade" id="updatePlazoMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Plazo Matricula</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row form-group">
              <div class="col-md">
                <input type="text" name="upIdPlazoMatricula" id="upIdPlazoMatricula" hidden>
                <input type="text" name="upIdSemestreAcademicoPm" id="upIdSemestreAcademicoPm" hidden>
                <label for="upSemestreAcademico" class="control-label">Semestre Academico:</label>
                <input type="text" name="upSemestreAcademico" id="upSemestreAcademico" class="form-control" readonly />
              </div>
            </div>
            <h4>Fecha Ordinarios:</h4>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="upFechaInicio" class="control-label">Fecha Inicio:</label>
                <input type="date" name="upFechaInicio" class="form-control" id="upFechaInicio" />
              </div>

              <div class="col-md-6">
                <label for="upFechaLimite" class="control-label">Fecha Limite:</label>
                <input type="date" name="upFechaLimite" class="form-control" id="upFechaLimite" />
              </div>
            </div>
            <h4>Fechas Rezagados:</h4>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="upFechaInicioRezagado" class="control-label">Fecha Inicio:</label>
                <input type="date" name="upFechaInicioRezagado" class="form-control" id="upFechaInicioRezagado" />
              </div>

              <div class="col-md-6">
                <label for="upFechaLimiteRezagado" class="control-label">Fecha Limite:</label>
                <input type="date" name="upFechaLimiteRezagado" class="form-control" id="upFechaLimiteRezagado" />
              </div>
            </div>
            <h4>Fechas Extemporaneas:</h4>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="upFechaInicioExtemporaneo" class="control-label">Fecha Inicio:</label>
                <input type="date" name="upFechaInicioExtemporaneo" class="form-control" id="upFechaInicioExtemporaneo" />
              </div>

              <div class="col-md-6">
                <label for="upFechaLimiteExtemporaneo" class="control-label">Fecha Limite:</label>
                <input type="date" name="upFechaLimiteExtemporaneo" class="form-control" id="upFechaLimiteExtemporaneo" />
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
          <button type="button" id="btnUpdatePlazoMatricula" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal de Add Plazo Nota-->
  <div class="modal fade" id="updatePlazoNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Plazo Nota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row form-group">
              <div class="col-md">
                <input type="text" id="upIdPlazoNota" hidden>
                <input type="text" id="upIdSemestreAcademicoPn" hidden>
                <label for="upSemestreAcademicoPn" class="control-label">Semestre Academico:</label>
                <input type="text" name="upSemestreAcademicoPn" id="upSemestreAcademicoPn" class="form-control" disabled="true">
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="upFechaInicioPn" class="control-label">Fecha Inicio:</label>
                <input type="date" name="upFechaInicioPn" class="form-control" id="upFechaInicioPn"/>
              </div>

              <div class="col-md-6">
                <label for="upFechaLimitePn" class="control-label">Fecha Limite:</label>
                <input type="date" name="upFechaLimitePn" class="form-control" id="upFechaLimitePn"/>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
          <button type="button" id="btnUpdatePlazoNota" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
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



  <!--MODALES VIEW-->
  <!--Modal de View Plazo Matricula-->
  <div class="modal fade" id="viewPlazoMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Plazo Matricula</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row form-group">
              <div class="col-md">
                <label for="viewSemestreAcademico" class="control-label">Semestre Academico:</label>
                <input type="text" name="viewSemestreAcademico" id="viewSemestreAcademico" class="form-control" readonly />
              </div>
            </div>
            <h4>Fecha Ordinarios:</h4>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="viewFechaInicio" class="control-label">Fecha Inicio:</label>
                <input type="date" name="viewFechaInicio" class="form-control" id="viewFechaInicio" readonly />
              </div>

              <div class="col-md-6">
                <label for="viewFechaLimite" class="control-label">Fecha Limite:</label>
                <input type="date" name="viewFechaLimite" class="form-control" id="viewFechaLimite" readonly />
              </div>
            </div>
            <h4>Fechas Rezagados:</h4>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="viewFechaInicioRezagado" class="control-label">Fecha Inicio:</label>
                <input type="date" name="viewFechaInicioRezagado" class="form-control" id="viewFechaInicioRezagado" readonly />
              </div>

              <div class="col-md-6">
                <label for="viewFechaLimiteRezagado" class="control-label">Fecha Limite:</label>
                <input type="date" name="viewFechaLimiteRezagado" class="form-control" id="viewFechaLimiteRezagado" readonly />
              </div>
            </div>
            <h4>Fechas Extemporaneas:</h4>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="viewFechaInicioExtemporaneo" class="control-label">Fecha Inicio:</label>
                <input type="date" name="viewFechaInicioExtemporaneo" class="form-control" id="viewFechaInicioExtemporaneo" readonly />
              </div>

              <div class="col-md-6">
                <label for="viewFechaLimiteExtemporaneo" class="control-label">Fecha Limite:</label>
                <input type="date" name="viewFechaLimiteExtemporaneo" class="form-control" id="viewFechaLimiteExtemporaneo" readonly />
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
        </div>
      </div>
    </div>
  </div>


  
  <!--Modal de Update Plazo Nota-->
  <div class="modal fade" id="viewPlazoNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Plazo Nota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row form-group">
              <div class="col-md">
                <label for="viewSemestreAcademicoPn" class="control-label">Semestre Academico:</label>
                <input type="text" name="viewSemestreAcademicoPn" id="viewSemestreAcademicoPn" class="form-control" readonly>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <label for="viewFechaInicioPn" class="control-label">Fecha Inicio:</label>
                <input type="date" name="viewFechaInicioPn" class="form-control" id="viewFechaInicioPn" readonly/>
              </div>

              <div class="col-md-6">
                <label for="viewFechaLimitePn" class="control-label">Fecha Limite:</label>
                <input type="date" name="viewFechaLimitePn" class="form-control" id="viewFechaLimitePn" readonly/>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> Aceptar</button>
        </div>
      </div>
    </div>
  </div>