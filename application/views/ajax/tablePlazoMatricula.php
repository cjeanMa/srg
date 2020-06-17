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