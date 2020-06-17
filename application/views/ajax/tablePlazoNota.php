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