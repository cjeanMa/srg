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
                      <a href="<?php ?>"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>
                  <?php }?>
          </table>